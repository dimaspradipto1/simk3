<?php

namespace App\Http\Controllers;

use App\DataTables\DepartemenDataTable;
use App\Http\Requests\DepartemenRequest;
use App\Models\Departemen;
use Illuminate\Database\QueryException;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DepartemenDataTable $dataTable)
    {
        return $dataTable->render('pages.departemen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartemenRequest $request)
    {
        Departemen::create($request->validated());

        alert()->success('Berhasil', 'Departemen baru berhasil ditambahkan');

        return redirect()->route('departemen.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departemen $departemen)
    {
        return view('pages.departemen.edit', compact('departemen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartemenRequest $request, Departemen $departemen)
    {
        $departemen->update($request->validated());

        alert()->success('Berhasil', 'Data departemen berhasil diperbarui');

        return redirect()->route('departemen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departemen $departemen)
    {
        try {
            $departemen->delete();
        } catch (QueryException) {
            alert()->error('Gagal', 'Departemen tidak dapat dihapus karena masih memiliki data karyawan');

            return redirect()->route('departemen.index');
        }

        alert()->success('Berhasil', 'Departemen berhasil dihapus');

        return redirect()->route('departemen.index');
    }
}
