<?php

namespace App\Http\Controllers;

use App\DataTables\Inpeksik3DataTable;
use App\Http\Requests\Inpeksik3Request;
use App\Models\Inpeksik3;

class Inpeksik3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Inpeksik3DataTable $dataTable)
    {
        return $dataTable->render('pages.inpeksik3.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.inpeksik3.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Inpeksik3Request $request)
    {
        Inpeksik3::create($request->validated());

        alert()->success('Berhasil', 'Data inspeksi K3 berhasil ditambahkan');

        return redirect()->route('inpeksik3.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inpeksik3 $inpeksik3)
    {
        return view('pages.inpeksik3.edit', compact('inpeksik3'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Inpeksik3Request $request, Inpeksik3 $inpeksik3)
    {
        $inpeksik3->update($request->validated());

        alert()->success('Berhasil', 'Data inspeksi K3 berhasil diperbarui');

        return redirect()->route('inpeksik3.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inpeksik3 $inpeksik3)
    {
        $inpeksik3->delete();

        alert()->success('Berhasil', 'Data inspeksi K3 berhasil dihapus');

        return redirect()->route('inpeksik3.index');
    }
}
