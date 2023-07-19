<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // TODO: when the 'place order' button is submitted, then store all products in the cart.
    // Then the cart helper is cleared.
    // So you should have a table to store the 'transaction' of the carts.

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::all();
        return view('page.transaction', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = new Transaction;

        $arr = \Cart::getContent();

        if (!\Cart::isEmpty()) {
            foreach ($arr as $item) {
                $data = [
                    'user_id' => Auth::id(),
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                    'total' => round(($item->price * $item->quantity), -3)
                ];
                Transaction::create($data);
                \Cart::clear();
            }
        }

        return redirect()->route('page.transaction');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
