<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SystemControler;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SaleController;

//Rutas de Authenticacion
Route::prefix('auth')->group(function(){
    Route::view('/login', 'Auth.login')->name('login');
    Route::post('/authenticate', [AuthController::class, 'login'])->name('authenticate');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::view('/register', 'Auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'createAccount'])->name('create.account');
});

Route::view('/forgot-password', 'Auth.forgot-password')->middleware('guest')->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'restorePassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', function ($token) {
    return view('Auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.update');

//Rutas que solo los Admins tienen acceso
Route::middleware(['auth:root', 'employee', 'admin'])->group(function(){
    Route::resource('users', UserController::class); // Rutas de Operadores
    Route::resource('providers', ProviderController::class)->except('show'); // Rutas de Proveedores
    Route::resource('products', ProductController::class)->except(['show', 'index']); // Rutas de Productos Administrador
    Route::get('clients/export/', [ClientController::class, 'export'])->name('clients.export'); //exportacion de clientes
    Route::get('products/export/', [ProductController::class, 'export'])->name('products.export'); //exportacion de Productos
    Route::get('providers/export/', [ProviderController::class, 'export'])->name('providers.export'); //exportacion de Proveedores
    Route::resource('sales', SaleController::class)->only('destroy'); //rutas de ventas Administrador
});

//Rutas a las que Admins y Empleados tienen Acceso
Route::middleware(['auth:root', 'employee'])->group(function(){
    Route::resource('clients', ClientController::class)->except('show'); // Ruta de Clientes
    Route::get('/dashboard', [SystemControler::class, 'dashboard'])->name('dashboard'); // Ruta de Inicio
    Route::resource('products', ProductController::class)->only('index'); // Ruta de productos Empleado
    Route::resource('sales', SaleController::class)->except(['destroy', 'create']); //Rutas de Ventas Empleado
    Route::post('sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::get('sales/invoice/{code}', [SaleController::class, 'getInvoice'])->name('sales.invoice');
});


Route::view('/', 'index')->name('index');
