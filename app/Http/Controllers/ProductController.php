<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('updated_at', 'desc')
            ->where('name', 'LIKE', "%$request->q%")
            ->orWhere('code', 'LIKE', "%$request->q%")
            ->paginate(20);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::all();
        $inversors = User::where('role', 'ADMIN')->get();

        return view('products.create', compact('providers', 'inversors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = new Product($request->except(['image', 'code']));
            $product->image = $request->file('image')->store('products', 'public');
            $product->code = Product::makeProductCode();

            $product->save();

            return redirect()->route('products.index')->with('message', "Se ah creado correctamente: $product->name");
        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('error', 'Ocurrio un error interno contacte un administrador');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $inversors = User::where('id', '!=', $product->inversor_id)->where('role', 'ADMIN')->get();
        $providers = Provider::where('id', '!=', $product->provider_id)->get();

        return view('products.edit', compact('product', 'inversors', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            if($request->hasFile('image')){
                Storage::disk('public')->delete($product->image);
                $product->image = $request->file('image')->store('products', 'public');
            }

            $product->update($request->except(['code', 'image']));

            return redirect()->route('products.index')->with('message', "Se modificado correctamente: $product->name");

        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('error', 'Ocurrio un error interno contacte un administrador');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return redirect()->route('products.index')->with('message', "Se eliminó correctamente: $product->name");
        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('error', 'Ocurrio un error interno contacte un administrador');
        }
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'Productos.xlsx');
    }
}
