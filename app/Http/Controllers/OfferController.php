<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Car;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('offers.create', compact('cars'));
    }

    public function store(Request $request)
    {
        Offer::create($request->all());
        return redirect()->route('offers.index');
    }

    public function edit(Offer $offer)
    {
        $cars = Car::all();
        return view('offers.edit', compact('offer', 'cars'));
    }

    public function update(Request $request, Offer $offer)
    {
        $offer->update($request->all());
        return redirect()->route('offers.index');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('offers.index');
    }
}
