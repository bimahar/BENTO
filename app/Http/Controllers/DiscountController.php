<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function create()
    {
        return view('dashboardcashier.discount.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:discounts|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        Discount::create($validated);

        return redirect()->route('discounts.create')->with('success', 'Diskon berhasil ditambahkan.');
    }
}
