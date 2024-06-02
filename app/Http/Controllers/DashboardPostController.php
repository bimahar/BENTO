<?php

namespace App\Http\Controllers;

use App\Models\DashboardCashier;
use App\Http\Requests\StoreDashboardCashierRequest;
use App\Http\Requests\UpdateDashboardCashierRequest;

class DashboardCashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('dashboardcashier.index');
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