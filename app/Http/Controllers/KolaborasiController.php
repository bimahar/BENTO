<?php

namespace App\Http\Controllers;

use App\Models\DashboardKollab;
use App\Models\Kolaborasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KolaborasiController extends Controller
{
    public function index()
    {
        // $items = Kolaborasi::acc()->latest()->get();
        $items = DashboardKollab::all();
        return view('pages.kolaborasi.index', [
            'title' => 'Kolaborasi',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.kolaborasi.create', [
            'title' => 'Kolaborasi'
        ]);
    }

    public function proses()
    {
        request()->validate([
            'nama' => ['required'],
            'organisasi' => ['required'],
            'jabatan' => ['required'],
            'deskripsi_singkat' => ['required'],
            'tanggal' => ['required'],
            'surat' => ['required', 'file', 'mimes:pdf'],
            'email' => ['required', 'unique:users,email'],
            'nomor' => ['required', 'numeric'],
        ]);

        $data = request()->all();
        $data['user_id'] = auth()->id();
        $data['status'] = 0;
        $data['surat'] = request()->file('surat')->store('kolaborasi', 'public');
        Kolaborasi::create($data);
        return redirect('/kolaborasi')->with('success', 'Anda berhasil melamar pekerjaan ini.');

        // DB::beginTransaction();
        // try {
        //     $data_kolaborasi = request()->all();
        //     // create user
        //     $user = User::create([
        //         'name' => request('nama'),
        //         'email' => request('email'),
        //         'password' => bcrypt(request('password'))
        //     ]);
        //     // create kolaborasi
        //     $data_kolaborasi['status'] = 0;
        //     $data_kolaborasi['gambar'] = request()->file('gambar')->store('kolaborasi', 'public');
        //     $user->kolaborasi()->create($data_kolaborasi);
        //     DB::commit();
        //     return redirect()->back()->with('success', 'Pengajuan untuk kolaborasi berhasil dilakukan.');
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
    }

    public function show($id)
    {
        $item = DashboardKollab::findOrFail($id);
        return view('pages.kolaborasi.show', [
            'title' => 'Kolaborasi',
            'item' => $item
        ]);
    }

}
