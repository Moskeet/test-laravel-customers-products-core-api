<?php

namespace Core\Api\Http\Controllers;

use Core\Api\Http\Controllers\Controller;
use Core\Api\Models\Product;
use Core\Api\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function create()
    {
        $customers = Customer::all();
        return view('api::products.create',compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'customer_id'      => 'required|integer',
        ]);
        $product = Product::create([
            'name' =>  $request->get('name'),
            'customer_id' =>  $request->get('customer_id'),
            'status' =>  'new',
        ]);

        return response($product,200);
    }



    public function update($id, Request $request)
    {
        $product = Product::find($id);
        if ($product === null) {
            return response('Product Not Found',404);
        }
        $request->validate([
            'name'     => 'required|max:255',
            'customer_id'      => 'required|integer',
        ]);
        $product->update($request->all());

        return response($product,200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product === null) {
            return response('Product Not Found',404);
        }

        return response('',200);
    }
}
