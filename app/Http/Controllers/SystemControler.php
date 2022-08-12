<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class SystemControler extends Controller
{
    public function dashboard(){
        $clients = Client::count();
        $providers = Provider::count();
        $products = Product::count();
        $users = User::count();
        $sales = Sale::count();

        $my_products = Product::where('inversor_id', Auth::id())->orderBy('updated_at', 'desc')->take(5)->get();
        $my_sales = Sale::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->take(5)->get();

        return view('dashboard', compact('clients', 'providers', 'products', 'users', 'my_products', 'sales', 'my_sales'));
    }

    public function passwordMailSended(){
        return view('Auth.password-restore-sended');
    }
}