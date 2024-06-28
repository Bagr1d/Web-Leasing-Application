<?php

namespace App\Http\Controllers;

use App\Models\LeasingContract;
use App\Models\Offer;
use App\Models\Users;
use Illuminate\Http\Request;

class LeasingContractController extends Controller
{
    public function index()
    {
        $contracts = LeasingContract::all();
        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        $offers = Offer::all();
        $users = Users::all();
        return view('contracts.create', compact('offers', 'users'));
    }

    public function store(Request $request)
    {
        LeasingContract::create($request->all());
        return redirect()->route('contracts.index');
    }

    public function edit(LeasingContract $contract)
    {
        $offers = Offer::all();
        $users = Users::all();
        return view('contracts.edit', compact('contract', 'offers', 'users'));
    }

    public function update(Request $request, LeasingContract $contract)
    {
        $contract->update($request->all());
        return redirect()->route('contracts.index');
    }

    public function destroy(LeasingContract $contract)
    {
        $contract->delete();
        return redirect()->route('contracts.index');
    }
}
