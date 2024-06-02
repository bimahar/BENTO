<?php

namespace App\Http\Controllers;

use App\Models\Melamar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PelamarController extends Controller
{
    public function index()
    {
        $pelamar = Melamar::all();
        return view('dashboard.pelamar.index', compact('pelamar'));
    }

    public function show($id)
    {
        $pelamar = Melamar::findOrFail($id);
        return view('dashboard.pelamar.show', compact('pelamar'));
    }
    
    public function downloadFoto($id)
    {
        $file = Melamar::findOrFail($id);
        $filePath = $file->getPasFoto();
        $namaFile = $file->nama;

        // return dd($filePath);

        // return response()->download($filePath, 'surat.pdf');

        if (file_exists($filePath)) {
            session()->flash('success', 'Foto berhasil diunduh.');
            return response()->download($filePath, $namaFile);
        }else{
            return redirect()->back()->with('error', 'file not found');
        }
    }

    public function downloadCV($id)
    {
        $file = Melamar::findOrFail($id);
        $filePath = $file->getPasCV();
        $namaFile = $file->nama;

        // return dd($filePath);

        // return response()->download($filePath, 'surat.pdf');

        if (file_exists($filePath)) {
            session()->flash('success', 'Foto berhasil diunduh.');
            return response()->download($filePath, $namaFile);
        }else{
            return redirect()->back()->with('error', 'file not found');
        }
    }

    public function updatestatus(Request $request, $id)
    {

        $request->validate([
            'status' => 'required'
        ]);

        $pelamar = Melamar::findOrFail($id);
        $pelamar->status = $request->input('status');
        $pelamar->save();

        return redirect('/dashboard/pelamar')->with('success', 'Status Berhasil Diubah');
    }
}
