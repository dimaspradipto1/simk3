<?php

namespace App\Http\Controllers;

use App\DataTables\DokumenDataTable;
use App\Http\Requests\DokumenRequest;
use App\Models\Dokumen;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DokumenDataTable $dataTable)
    {
        return $dataTable->render('pages.dokumen.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DokumenRequest $request)
    {
        Dokumen::create($request->validated());

        alert()->success('Berhasil', 'Dokumen HSE berhasil ditambahkan');

        return redirect()->route('dokumen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumen $dokumen)
    {
        return view('pages.dokumen.show', compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DokumenRequest $request, Dokumen $dokumen)
    {
        $dokumen->update($request->validated());

        alert()->success('Berhasil', 'Dokumen HSE berhasil diperbarui');

        return redirect()->route('dokumen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen)
    {
        $dokumen->delete();

        alert()->success('Berhasil', 'Dokumen HSE berhasil dihapus');

        return redirect()->route('dokumen.index');
    }
}
