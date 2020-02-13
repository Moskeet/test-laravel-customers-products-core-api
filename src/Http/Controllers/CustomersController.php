<?php

namespace Core\Api\Http\Controllers;

use Core\Api\Http\Controllers\Controller;
use Core\Api\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function show($id)
    {
        return Customer::findOrFail($id);

    }

    public function create()
    {
        return view('api::customers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'firstName'     => 'required|max:255',
            'lastName'      => 'required|max:255',
            'dateOfBirth'   =>  'required|date',
        ]);
        $customer = Customer::create([
            'firstName' =>  $request->get('firstName'),
            'lastName' =>  $request->get('lastName'),
            'dateOfBirth' =>  $request->get('dateOfBirth'),
            'status' =>  'new',
        ]);
        return response($customer,200);
    }



    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        if ($customer === null) {
            return response('Product Not Found',404);
        }
        $request->validate([
            'firstName'     => 'required|max:255',
            'lastName'      => 'required|max:255',
            'dateOfBirth'   =>  'required|date',
        ]);
        $customer->update($request->all());
        return response($customer,200);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if ($customer === null) {
            return response('Product Not Found',404);
        }
        $customer->destroy();
        return response('',200);
    }
}
