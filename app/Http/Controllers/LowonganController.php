<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Melamar;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $items = Lowongan::where('status', 1)->latest()->get();
        return view('pages.lowongan.index', [
            'title' => 'Apply',
            'items' => $items
        ]);
    }

    public function show($id)
    {
        $item = Lowongan::findOrFail($id);
        return view('pages.lowongan.show', [
            'title' => 'Apply',
            'item' => $item
        ]);
    }
    
    public function apply($id)
    {
        $item = Lowongan::findOrFail($id);
        return view('pages.lowongan.apply', [
            'title' => 'Apply',
            'item' => $item
        ]);
    }

    public function proses($lowongan_id)
    {
        request()->validate([
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'nomor_hp' => ['required'],
            'email' => ['required'],
            'pengalaman_kerja' => ['required'],
            'cv' => ['required', 'file', 'mimes:pdf'],
            'foto' => ['required', 'image', 'mimes:jpg,png,jpeg']
        ]);


        $data = request()->all();
        $data['user_id'] = auth()->id();
        $data['foto'] = request()->file('foto')->store('melamar', 'public');
        $data['cv'] = request()->file('cv')->store('melamar', 'public');
        $data['lowongan_id'] = $lowongan_id;
        Melamar::create($data);
        return redirect('/apply')->with('success', 'Anda berhasil melamar pekerjaan ini.');
    }
}
