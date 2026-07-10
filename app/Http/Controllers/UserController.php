<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_active' => $request->boolean('is_active'),
        ]);

        alert()->success('Berhasil', 'Pengguna baru berhasil ditambahkan');

        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        return view('pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'is_active' => $request->boolean('is_active'),
        ]);

        alert()->success('Berhasil', 'Data pengguna berhasil diperbarui');

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        if ($user->id === auth()->id()) {
            alert()->error('Gagal', 'Anda tidak dapat menghapus akun Anda sendiri');

            return redirect()->route('user.index');
        }

        $user->delete();

        alert()->success('Berhasil', 'Pengguna berhasil dihapus');

        return redirect()->route('user.index');
    }

    /**
     * Show the form for updating the user's password.
     */
    public function updatePasswordForm(User $user)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        return view('pages.user.update-password', compact('user'));
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        alert()->success('Berhasil', 'Password pengguna berhasil diperbarui');

        return redirect()->route('user.index');
    }
}
