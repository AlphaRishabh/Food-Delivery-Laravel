<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Make sure to use the correct namespace

class OrderController extends Controller
{
    public function index() {
        // Retrieve orders and pass them to the view
        $orders = Order::all();
        return view('orders', ['orders' => $orders]);
    }

    public function deleteOrder(Request $request) {
        $orderId = $request->input('orderId');
        $order = Order::find($orderId); // Correct variable name

        if ($order) {
            $order->delete();
            return response()->json(['message' => 'Order deleted successfully']);
        } else {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }
}
