<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $cartItems = [];
        $total = 0;

        foreach ($cart as $id => $item) {
            $product = Product::find($id);
            if ($product) {
                $item['product'] = $product;
                $item['subtotal'] = $product->price * $item['quantity'];
                $total += $item['subtotal'];
                $cartItems[] = $item;
            }
        }

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        $orderItems = [];

        foreach ($cart as $id => $item) {
            $product = Product::find($id);
            if ($product) {
                $subtotal = $product->price * $item['quantity'];
                $total += $subtotal;
                $orderItems[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ];
            }
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => auth()->id(),
                'total_price' => $total,
                'status' => 'pending',
            ]);

            foreach ($orderItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product']->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);

                $item['product']->decrement('stock', $item['quantity']);
            }

            DB::commit();

            session()->forget('cart');

            return redirect()->route('checkout.success')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to place order. Please try again.');
        }
    }

    public function success()
    {
        return view('checkout.success');
    }
}
