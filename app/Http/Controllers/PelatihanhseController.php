<?php

namespace App\Http\Controllers;

use App\DataTables\PelatihanhseDataTable;
use App\Http\Requests\PelatihanhseRequest;
use App\Models\Pelatihanhse;

class PelatihanhseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PelatihanhseDataTable $dataTable)
    {
        return $dataTable->render('pages.pelatihanhse.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pelatihanhse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PelatihanhseRequest $request)
    {
        Pelatihanhse::create($request->validated());

        alert()->success('Berhasil', 'Data pelatihan HSE berhasil ditambahkan');

        return redirect()->route('pelatihanhse.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelatihanhse $pelatihanhse)
    {
        return view('pages.pelatihanhse.show', compact('pelatihanhse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelatihanhse $pelatihanhse)
    {
        return view('pages.pelatihanhse.edit', compact('pelatihanhse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PelatihanhseRequest $request, Pelatihanhse $pelatihanhse)
    {
        $pelatihanhse->update($request->validated());

        alert()->success('Berhasil', 'Data pelatihan HSE berhasil diperbarui');

        return redirect()->route('pelatihanhse.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelatihanhse $pelatihanhse)
    {
        $pelatihanhse->delete();

        alert()->success('Berhasil', 'Data pelatihan HSE berhasil dihapus');

        return redirect()->route('pelatihanhse.index');
    }
}
