<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Ensure DB facade is imported
use Illuminate\Support\Facades\Auth; // Ensure Auth facade is imported

class OrderController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'exists:products,id',
            'products.*.quantity' => 'integer|min:1'
        ]);

        DB::beginTransaction();
        try {
            $totalPrice = 0;
            $order = Order::create([
                'user_id' => Auth::id(), // Use Auth facade
                'total_price' => 0,
                'status' => 'pending'
            ]);

            foreach ($request->products as $productData) {
                $product = Product::findOrFail($productData['id']);
                $quantity = $productData['quantity'];
                $price = $product->price * $quantity;
                $totalPrice += $price;

                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price
                ]);
            }

            $order->update(['total_price' => $totalPrice]);

            DB::commit();
            return redirect()->route('orders.index')->with('success', 'Order placed successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Order could not be placed');
        }
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('products')->get(); // Use Auth facade
        return view('orders.index', compact('orders'));
    }
}

