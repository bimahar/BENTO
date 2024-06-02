<?php

namespace App\Http\Controllers;

use App\Models\OrderTable;
use App\Models\CartItemOrder;
use App\Models\DashboardCashier;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDashboardCashierRequest;
use App\Http\Requests\UpdateDashboardCashierRequest;

class DashboardCashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dashboardCashiers = DashboardCashier::with(['orderTable.user', 'orderTable.cartItemOrders.menu'])->get();
        
        // Group data by orderTable
        $orders = [];
        foreach ($dashboardCashiers as $dashboardCashier) {
            $orderTableId = $dashboardCashier->orderTable->id;
            if (!isset($orders[$orderTableId])) {
                $orders[$orderTableId] = [
                    'dashboardCashier' => $dashboardCashier,
                    'items' => [],
                    'totalQty' => 0,
                    'totalPrice' => 0
                ];
            }

            foreach ($dashboardCashier->orderTable->cartItemOrders as $item) {
                $orders[$orderTableId]['items'][] = $item;
                $orders[$orderTableId]['totalQty'] += $item->jumlah;
                $orders[$orderTableId]['totalPrice'] += $item->menu->harga * $item->jumlah;
            }
        }

        return view('dashboardcashier.index', compact('orders'));
     
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
    public function store(StoreDashboardCashierRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DashboardCashier $dashboardCashier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardCashier $dashboardCashier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardCashierRequest $request, DashboardCashier $dashboardCashier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardCashier $dashboardCashier)
    {
        //
    }
}
