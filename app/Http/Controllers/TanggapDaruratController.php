<?php

namespace App\Http\Controllers;

use App\Http\Requests\TanggapDaruratRequest;
use App\Models\TanggapDarurat;

class TanggapDaruratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontaks = TanggapDarurat::orderBy('kategori')->orderBy('nama')->get();

        return view('pages.tanggap-darurat.index', compact('kontaks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TanggapDaruratRequest $request)
    {
        TanggapDarurat::create($request->validated());

        alert()->success('Berhasil', 'Kontak darurat berhasil ditambahkan');

        return redirect()->route('tanggap-darurat.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TanggapDaruratRequest $request, TanggapDarurat $tanggapDarurat)
    {
        $tanggapDarurat->update($request->validated());

        alert()->success('Berhasil', 'Kontak darurat berhasil diperbarui');

        return redirect()->route('tanggap-darurat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TanggapDarurat $tanggapDarurat)
    {
        $tanggapDarurat->delete();

        alert()->success('Berhasil', 'Kontak darurat berhasil dihapus');

        return redirect()->route('tanggap-darurat.index');
    }
}
