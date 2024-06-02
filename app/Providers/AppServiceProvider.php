<?php

namespace App\Providers;

use App\Models\CartItemOrder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['layout.main', 'other.layout'], function ($view) {
            $user_id = auth()->id();
            $carts = CartItemOrder::where('user_id', $user_id)->get();
            $totalItems = $carts->sum('jumlah');
            $view->with('totalItems', $totalItems);
        });
    }

    
}
