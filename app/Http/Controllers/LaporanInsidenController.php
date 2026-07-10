<?php

namespace App\Http\Controllers;

use App\DataTables\LaporanInsidenDataTable;
use App\Http\Requests\LaporanInsidenRequest;
use App\Models\LaporanInsiden;

class LaporanInsidenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LaporanInsidenDataTable $dataTable)
    {
        return $dataTable->render('pages.laporan-insiden.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.laporan-insiden.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LaporanInsidenRequest $request)
    {
        LaporanInsiden::create([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        alert()->success('Berhasil', 'Laporan insiden berhasil ditambahkan');

        return redirect()->route('laporan-insiden.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanInsiden $laporanInsiden)
    {
        abort_unless(
            $laporanInsiden->user_id === auth()->id() || in_array(auth()->user()->role, ['admin', 'hsemanger']),
            403
        );

        return view('pages.laporan-insiden.show', compact('laporanInsiden'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanInsiden $laporanInsiden)
    {
        abort_unless(in_array(auth()->user()->role, ['admin', 'hsemanger']), 403);

        return view('pages.laporan-insiden.edit', compact('laporanInsiden'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LaporanInsidenRequest $request, LaporanInsiden $laporanInsiden)
    {
        abort_unless(in_array(auth()->user()->role, ['admin', 'hsemanger']), 403);

        $laporanInsiden->update($request->validated());

        alert()->success('Berhasil', 'Laporan insiden berhasil diperbarui');

        return redirect()->route('laporan-insiden.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanInsiden $laporanInsiden)
    {
        abort_unless(in_array(auth()->user()->role, ['admin', 'hsemanger']), 403);

        $laporanInsiden->delete();

        alert()->success('Berhasil', 'Laporan insiden berhasil dihapus');

        return redirect()->route('laporan-insiden.index');
    }
}
