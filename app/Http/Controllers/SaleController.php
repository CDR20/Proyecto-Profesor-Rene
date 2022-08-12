<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::latest('updated_at')->paginate(25);

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {

        $products = Product::find($request->products);
        $clients = Client::latest()->get();

        return view('sales.create', compact('products', 'clients'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->IVAs);
        foreach($request->products as $key => $product){

            //Jalamos el producto Actual de la Venta
            $selledProduct = Product::find($product);

            //Verificamos si el producto aun cuenta con stock
            if($selledProduct->stock === 0){
                //si no cuenta con stock redireccionamos con un mensaje de error
                return redirect()->route('products.index')->with('error', "Ups parece que alguien adquirio el ultimo articulo de $selledProduct->name ya no contamos con existencias");
            }else{
                //si cuenta con stock generamos la venta y asignamos los datos de la venta
                $sale = new Sale();
                $sale->code = Sale::makeSaleCode();
                $sale->total = substr($request->totals[$key], 8);
                $sale->subtotal = substr($request->subtotals[$key], 11);
                $sale->iva = substr($request->IVAs[$key], 6);
                $sale->payment_day = strtoupper($request->payment_days[$key]);
                $sale->client_id = $request->clients[$key];
                $sale->user_id = $request->users[$key];

                // Los productos pueden cambiar de provedor y precio, asi que se resguarda su informacion fija
                $sale->product = json_encode([
                    'name' => $selledProduct->name,
                    'code' => $selledProduct->code,
                    'price' => $selledProduct->shop_price
                ]);

                //Generamos la Factura y la Guardamos y Regresamos el producto con su path de factura para consultarla cuando se requiera
                $sale = $this->makeFacture($sale, Product::find($product));

                // return $this->makeFacture($sale, Product::find($product));

                //disminuimos el stock del producto vendido
                $selledProduct->stock -= 1;
                //guardamos el producto vendido en la base de datos con su nuevo stock
                $selledProduct->save();
                //Guardamos la nueva Venta
                $sale->save();
            }
        }
        return redirect()->route('sales.show', compact('sale'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return view('sales.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function makeFacture(Sale $sale, Product $product){

        $data = [
            'sale' => $sale,
            'product' => $product
        ];

        // $pdf = pdf::loadView('sales.pdf.invoice', ['data' => $data ]);

        // return $pdf->stream();

        Pdf::loadView('sales.pdf.invoice', ['data' => $data ])->save("storage/invoices/Factura-{$sale->code}.pdf");

        $sale->invoice_path = "storage/invoices/Factura-{$sale->code}.pdf";

        return $sale;
    }

    public function getInvoice($code){
        return response()->file(public_path()."/storage/invoices/Factura-$code.pdf");
    }
}
