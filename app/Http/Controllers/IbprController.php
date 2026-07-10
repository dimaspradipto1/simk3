<?php

namespace App\Http\Controllers;

use App\DataTables\IbprDataTable;
use App\Http\Requests\IbprRequest;
use App\Models\Ibpr;

class IbprController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IbprDataTable $dataTable)
    {
        return $dataTable->render('pages.ibpr.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ibpr.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IbprRequest $request)
    {
        Ibpr::create($request->validated());

        alert()->success('Berhasil', 'Identifikasi risiko berhasil ditambahkan');

        return redirect()->route('ibpr.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ibpr $ibpr)
    {
        return view('pages.ibpr.edit', compact('ibpr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IbprRequest $request, Ibpr $ibpr)
    {
        $ibpr->update($request->validated());

        alert()->success('Berhasil', 'Identifikasi risiko berhasil diperbarui');

        return redirect()->route('ibpr.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ibpr $ibpr)
    {
        $ibpr->delete();

        alert()->success('Berhasil', 'Identifikasi risiko berhasil dihapus');

        return redirect()->route('ibpr.index');
    }
}
