<?php

namespace App\Http\Controllers;

use App\DataTables\ObservasiBahayaDataTable;
use App\Http\Requests\ObservasiRequest;
use App\Models\ObservasiBahaya;

class ObservasiBahayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ObservasiBahayaDataTable $dataTable)
    {
        return $dataTable->render('pages.observasi-bahaya.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.observasi-bahaya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ObservasiRequest $request)
    {
        ObservasiBahaya::create($request->validated());

        alert()->success('Berhasil', 'Observasi bahaya berhasil ditambahkan');

        return redirect()->route('observasi-bahaya.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ObservasiBahaya $observasiBahaya)
    {
        return view('pages.observasi-bahaya.edit', compact('observasiBahaya'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ObservasiRequest $request, ObservasiBahaya $observasiBahaya)
    {
        $observasiBahaya->update($request->validated());

        alert()->success('Berhasil', 'Data observasi bahaya berhasil diperbarui');

        return redirect()->route('observasi-bahaya.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ObservasiBahaya $observasiBahaya)
    {
        $observasiBahaya->delete();

        alert()->success('Berhasil', 'Observasi bahaya berhasil dihapus');

        return redirect()->route('observasi-bahaya.index');
    }
}
