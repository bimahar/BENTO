<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Favorite;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class FavoriteController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('beranda', [
            'user' => $user,
            'favorites' => Favorite::all()->where('user_id', $user->id)
        ]);
    }


    public function store()
    {
        $validated = request()->validate([
            'menu_id' => 'required',
        ]);

        $validated['user_id'] = auth()->id();
        Favorite::create($validated);

        return redirect()->back();
    }

    public function destroy($menuId)
    {
        $user = Auth::user();
        
        // Cari instance model Menu berdasarkan ID
        $menu = Menu::findOrFail($menuId);
    
        // Hapus favorit yang sesuai dengan user_id dan menu_id
        Favorite::where('user_id', $user->id)->where('menu_id', $menu->id)->delete();
    
        return redirect()->back();
    }
}
