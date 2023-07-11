<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = \Cart::getContent();
        $subtotal = \Cart::getSubTotal();
        return view('page.checkout', compact('data', 'subtotal'));
    }

    public function addToCart(Request $request)
    {
        $userID = 1;

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image
            )
        ));
        
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('page.products');
    }

    public function updateCart(Request $request)
    {
        if ($request->quantity <= 0) {
            \Cart::remove($request->id);
            session()->flash('success', 'Item cart removed sucessfully');
        }

        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('page.checkout');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('page.checkout');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('page.checkout');
    }
}
