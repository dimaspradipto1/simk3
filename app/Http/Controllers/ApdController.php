<?php

namespace App\Http\Controllers;

use App\DataTables\ApdDataTable;
use App\Http\Requests\ApdRequest;
use App\Models\Apd;

class ApdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ApdDataTable $dataTable)
    {
        return $dataTable->render('pages.apd.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.apd.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApdRequest $request)
    {
        Apd::create($request->validated());

        alert()->success('Berhasil', 'Data APD berhasil ditambahkan');

        return redirect()->route('apd.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apd $apd)
    {
        return view('pages.apd.edit', compact('apd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApdRequest $request, Apd $apd)
    {
        $apd->update($request->validated());

        alert()->success('Berhasil', 'Data APD berhasil diperbarui');

        return redirect()->route('apd.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apd $apd)
    {
        $apd->delete();

        alert()->success('Berhasil', 'Data APD berhasil dihapus');

        return redirect()->route('apd.index');
    }
}
