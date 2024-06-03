<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function create()
    {
        return view('dashboardcashier.discount.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:discounts|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        Discount::create($validated);

        return redirect()->route('discounts.create')->with('insertdiscountsuccess', 'Diskon berhasil ditambahkan.');
    }

    public function index()
    {
        $discounts = Discount::all();
        return view('dashboardcashier.discount.index', compact('discounts'));
    }

    public function show()
    {
        $discounts = Discount::all();
        return view('dashboardcashier.discount.show', compact('discounts'));
    }

    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return redirect()->back()->with('deletediscountsuccess', 'Diskon berhasil dihapus.');
    }
}
