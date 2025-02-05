<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->age = $request->age;
        $customer->save();
        return redirect()->back();
    }

    public function update(Request $request){
        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->age = $request->age;
        $customer->save();
        return redirect()->back();
    }

    public function destroy($id){
        Customer::destroy($id);
        return redirect()->back();
    }
}
