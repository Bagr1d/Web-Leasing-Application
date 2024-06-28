<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Offer;
use App\Models\LeasingContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('offer')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, $offerId)
    {
        $offer = Offer::findOrFail($offerId);

        Cart::create([
            'user_id' => Auth::id(),
            'offer_id' => $offer->id,
            'status' => 'pending',
        ]);

        $offer->update(['reserved' => true]);

        return redirect()->route('cart.index')->with('success', 'Offer added to cart.');
    }

    public function remove(Cart $cart)
    {
        $offer = Offer::find($cart->offer_id);
        $cart->delete();

        $offer->update(['reserved' => false]);

        return redirect()->route('cart.index')->with('success', 'Offer removed from cart.');
    }

    public function manage()
    {
        $cartItems = Cart::with('user', 'offer')->get();
        return view('cart.manage', compact('cartItems'));
    }

    public function approve(Cart $cart)
    {
        $cart->update(['status' => 'approved']);

        LeasingContract::create([
            'user_id' => $cart->user_id,
            'offer_id' => $cart->offer_id,
            'start_date' => now(),
            'end_date' => now()->addMonths($cart->offer->lease_term),
            'total_cost' => $cart->offer->monthly_payment * $cart->offer->lease_term,
        ]);

        return redirect()->route('cart.manage')->with('success', 'Offer approved.');
    }

    public function reject(Cart $cart)
    {
        $cart->update(['status' => 'rejected']);
        $offer = Offer::find($cart->offer_id);
        $offer->update(['reserved' => false]);

        return redirect()->route('cart.manage')->with('success', 'Offer rejected.');
    }
}
