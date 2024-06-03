<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\CartItem;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function menu()
    {
        $user = Auth::user();
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::all();
        $sort = 'null';
        $title = 'Menu';
        // Count total items in the shopping cart
        $totalItems = 0;
        $user = Auth::user();
        if (Auth::check()) {
            $user_id = Auth::id();
            $totalItems = CartItem::where('user_id', $user_id)->sum('jumlah');
        }
        // Render view and include $totalItems
        return view('menu', compact('menus', 'categories', 'sort', 'title', 'totalItems', 'user', 'user'));
    }

    public function searchMenu(Request $request)
    {
        $query = $request->input('query');
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::where('nama', 'like', "%$query%")->get();
        $sort = 'null';
        $title = 'menu';
        $user = Auth::user();
        if (Auth::check()) {
            $user_id = Auth::id();
            $totalItems = CartItem::where('user_id', $user_id)->sum('jumlah');
        }
        return view('menu', compact('menus', 'categories', 'sort', 'title', 'totalItems', 'user_id', 'user'));
    }

    public function searchMenuByCategory($kategori, Request $request)
    {
        $query = $request->input('query');
        $categorynow = $kategori;
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::where('kategori', $kategori)->where('nama', 'like', "%$query%")->paginate(4);
        $sort = 'null';
        $title = 'menu';
        $user = Auth::user();
        if (Auth::check()) {
            $user_id = Auth::id();
            $totalItems = CartItem::where('user_id', $user_id)->sum('jumlah');
        }
        return view('showmenubycategory', compact('menus', 'categories', 'categorynow', 'sort', 'title', 'user', 'user_id', 'totalItems'));
    }

    public function sortmenu($option)
    {
        $categories = Menu::pluck('kategori')->unique();
        $sort = $option;
        $title = 'menu';
        switch ($option) {
            case 'termurah':
                $menus = Menu::orderBy('harga')->get();
                break;
            case 'termahal':
                $menus = Menu::orderByDesc('harga')->get();
                break;
        }
        $user = Auth::user();
        if (Auth::check()) {
            $user_id = Auth::id();
            $totalItems = CartItem::where('user_id', $user_id)->sum('jumlah');
        }
        return view('menu', compact('menus', 'categories', 'sort', 'title', 'user', 'user_id', 'totalItems'));
    }

    public function showMenuByCategory($kategori)
    {
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::where('kategori', $kategori)->paginate(4);
        $categorynow = $kategori;
        $sort = "null";
        $title = 'menu';
        $user = Auth::user();
        if (Auth::check()) {
            $user_id = Auth::id();
            $totalItems = CartItem::where('user_id', $user_id)->sum('jumlah');
        }
        return view('showmenubycategory', compact('menus', 'categories', 'categorynow', 'sort', 'title', 'user', 'user_id', 'totalItems'));
    }

    public function sortShowMenuByCategory($kategori, $option)
    {
        $categories = Menu::pluck('kategori')->unique();
        $categorynow = strtolower($kategori); // Convert to lowercase
        $sort = $option;
        $title = 'menu';
        switch ($option) {
            case 'termurah':
                $menus = Menu::where('kategori', $kategori)->orderBy('harga')->paginate(4);
                break;
            case 'termahal':
                $menus = Menu::where('kategori', $kategori)->orderByDesc('harga')->paginate(4);
                break;
        }
        if (Auth::check()) {
            $user_id = Auth::id();
            $totalItems = CartItem::where('user_id', $user_id)->sum('jumlah');
        }
        return view('showmenubycategory', compact('menus', 'categories', 'categorynow', 'sort', 'title', 'user', 'user_id', 'totalItems'));
    }

    public function adminMenuMakanan()
    {
        $menus = Menu::where('jenis', 'makanan')->get();
        return view('admin.menu-makanan', compact('menus'));
    }

    public function adminMenuMinuman()
    {
        $menus = Menu::where('jenis', 'minuman')->get();
        return view('admin.menu-minuman', compact('menus'));
    }

    public function create()
    {
        //
    }

    public function adminStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required|string',
                'jenis' => 'required|string',
                'kategori' => 'required|string',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'deskripsi' => 'required|string',
                'harga' => 'required|numeric|min:0',
            ]);
            $validatedData['admin_id'] = Auth::guard('admin')->user()->id;
            if ($request->hasFile('gambar')) {
                $namaGambar = time() . '.' . $request->file('gambar')->getClientOriginalExtension();
                $gambarPath = $request->file('gambar')->storeAs('public/images/menu', $namaGambar);
                $validatedData['gambar'] = '/storage/images/menu/' . $namaGambar;
            }
            $menu = Menu::create($validatedData);
            return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Mohon coba lagi.');
        }
    }

    public function show(Menu $menu)
    {
        //
    }

    public function edit(Menu $menu)
    {
        //
    }

    public function adminUpdate(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'jenis' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        try {
            DB::beginTransaction();
            $menu = Menu::findOrFail($request->id);
            $menu->nama = $request->nama;
            $menu->kategori = $request->kategori;
            $menu->deskripsi = $request->deskripsi;
            $menu->harga = $request->harga;
            $menu->jenis = $request->jenis;
            $menu->save();
            if ($request->hasFile('gambar')) {
                if ($menu->gambar) {
                    $namaGambar = basename($menu->gambar);
                    Storage::delete('public/images/menu/' . $namaGambar);
                }
                $namaGambar = time() . '.' . $request->file('gambar')->getClientOriginalExtension();
                $gambarPath = $request->file('gambar')->storeAs('public/images/menu', $namaGambar);
                $menu->gambar = '/storage/images/menu/' . $namaGambar;
                $menu->save();
            }
            DB::commit();
            return redirect()->back()->with('success', 'Menu berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal memperbarui menu. Silakan coba lagi.');
        }
    }

   
}