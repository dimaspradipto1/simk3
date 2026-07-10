<?php

namespace App\Http\Controllers;

use App\DataTables\KaryawanDataTable;
use App\Http\Requests\KaryawanRequest;
use App\Models\Departemen;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KaryawanDataTable $dataTable)
    {
        return $dataTable->render('pages.karyawan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departemens = Departemen::orderBy('nama_departemen')->get();

        return view('pages.karyawan.create', compact('departemens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KaryawanRequest $request)
    {
        Karyawan::create($request->validated());

        alert()->success('Berhasil', 'Karyawan baru berhasil ditambahkan');

        return redirect()->route('karyawan.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        $departemens = Departemen::orderBy('nama_departemen')->get();

        return view('pages.karyawan.edit', compact('karyawan', 'departemens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KaryawanRequest $request, Karyawan $karyawan)
    {
        $karyawan->update($request->validated());

        alert()->success('Berhasil', 'Data karyawan berhasil diperbarui');

        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        alert()->success('Berhasil', 'Karyawan berhasil dihapus');

        return redirect()->route('karyawan.index');
    }
}
