<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller {
    // ...existing code...

    public function create(Request $request) {
        $order = new Order;
        $order->fill($request->all());
        $order->save();
        return response()->json($order, 201);
    }

    public function update(Request $request, $id) {
        $order = Order::findOrFail($id);
        $order->fill($request->all());
        $order->save();
        return response()->json($order, 200);
    }

    public function delete($id) {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(null, 204);
    }

    // ...existing code...
}
