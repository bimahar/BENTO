<?php

namespace App\Http\Controllers;

use App\Models\DashboardKollab;
use App\Http\Requests\StoreDashboardKollabRequest;
use App\Http\Requests\UpdateDashboardKollabRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardKollabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kolaborator = DashboardKollab::all();
        return view('dashboard.kollaborator.index', compact('kolaborator'));
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
    public function store(StoreDashboardKollabRequest $request)
    {

        // Lakukan validasi data
        $validatedData = $request->validate([
            'Judul' => 'required',
            'Detail' => 'required',
            'Tanggal' => 'required',
            'Gambar' => 'image|file|max:2000',
            'Status' => 'required',
        ],[
            'Judul.required' => 'Kolom judul harus terisi',
            'Detail.required' => 'Kolom detail harus terisi',
            'Tanggal.required' => 'Pilih tanggal!',
            'Gambar.image' => 'File harus format gambar seperti .jpg/jpeg/png',
            'Gambar.max' => 'Ukuran gambar tidak boleh melebihi 2MB'
        ]);

        if($request->file('Gambar')){
            $validatedData['Gambar'] = $request->file('Gambar')->store('kollab-images'); 
        }
        // Simpan data baru
        DashboardKollab::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect('/dashboard/kolaborator')->with('success', 'Kolaborator Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $kolaborasi = DashboardKollab::findOrFail($id);
        
        return view('dashboard.kollaborator.show', compact('kolaborasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($request)
    {

        $kolaborasi = DashboardKollab::findOrFail($request);

        return view('dashboard.kollaborator.edit', compact('kolaborasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardKollabRequest $request, $dashboardKollab)
    {
        // Lakukan validasi data
        $validatedData = $request->validate([
            'Judul' => 'required',
            'Detail' => 'required',
            'Tanggal' => 'required',
            'Gambar' => 'image|file|max:2000',
            'Status' => 'required',
        ],[
            'Judul.required' => 'Kolom judul harus terisi',
            'Detail.required' => 'Kolom detail harus terisi',
            'Tanggal.required' => 'Pilih tanggal!',
            'Gambar.image' => 'File harus format gambar seperti .jpg/jpeg/png',
            'Gambar.max' => 'Ukuran gambar tidak boleh melebihi 2MB'
        ]);

        if($request->file('Gambar')){
            if($request->oldGambar){
                Storage::delete($request->oldGambar);
            }

            $validatedData['Gambar'] = $request->file('Gambar')->store('kollab-images'); 
        }
        // Simpan data baru
        DashboardKollab::where('id', $dashboardKollab)->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect('/dashboard/kolaborator')->with('success', 'Kolaborator Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dashboardKollab)
    {
        $kolaborasi = DashboardKollab::findOrFail($dashboardKollab);
    
        // Hapus favorit yang sesuai dengan user_id dan menu_id
        DashboardKollab::where('id', $kolaborasi->id)->delete();
    
        return redirect('/dashboard/kolaborator')->with('success', 'Kolaborator Berhasil Dihapus');
    }
}
