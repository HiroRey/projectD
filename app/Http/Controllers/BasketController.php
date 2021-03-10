<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');

        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view('basket', compact('order'));
        }

        return redirect()->route('index');

    }
    public function basketPlace()
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);

        return view('order', compact('order'));
    }
    public function basketConfirm(Request $request)
    {

        $orderId = session('orderId');

        $order = Order::find($orderId);
       $success = $order->saveOrder($request->name, $request->phone);

       if ($success) {
           session()->flash('success', __('basket.you_order_confirmed'));
       } else {
           session()->flash('warning', __('basket.you_cant_order_more'));
       }


        return redirect()->route('index');
    }

    public function basketAdd($productId)
    {


       $orderId = session('orderId');
        $order = Order::create()->id;

       if (is_null($orderId)) {

           session(['orderId' => $order]);
       } else {
           $order = Order::find($orderId);
       }

        if(is_int($order)) {
            session()->flash('warning', __('basket.an_error_occurred_please_try_again'));
            return redirect()->route('index');
        }

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }
        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }
        $product = Product::find($productId);

        session()->flash('success',  __('basket.added') . $product->name);

        return redirect()->route('basket');
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
           return redirect()->route('basket');
        }
            $order = Order::find($orderId);
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $product = Product::find($productId);
        session()->flash('warning',  __('basket.removed') . $product->name);

        return redirect()->route('basket');
    }
}
