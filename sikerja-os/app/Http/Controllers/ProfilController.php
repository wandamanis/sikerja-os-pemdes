<?php

namespace App\Http\Controllers;

use App\Models\Hitung;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Level;
use App\Models\Subdit;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->guest()) {
            abort(403);
        }
        return view('profil.index', [
            'title' => 'User',
            'user' => User::all(),
            'jabatan' => Jabatan::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'hitung' => Hitung::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function password($id)
    {
        if (auth()->guest()) {
            abort(403);
        }

        return view('profil.password', [
            'title' => 'User',
            'user' => User::findOrFail($id),
            'jabatan' => Jabatan::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'hitung' => Hitung::all()
        ]);
    }

    public function update_password(Request $request, User $user)
    {
        if (auth()->guest()) {
            abort(403);
        }
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:5', 'confirmed'],
            'password_confirmation' => ['required',]
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            User::where('id', $user->id)->update(['password' => Hash::make($request->password)]);
            // auth()->user()->update(['password' => Hash::make($request->password)]);
            return back()->with('success', 'Password Berhasil diubah');
        }

        throw ValidationException::withMessages([
            'current_password' => 'Current Password Anda Salah!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->guest()) {
            abort(403);
        }

        return view('profil.index', [
            'title' => 'User',
            'user' => User::findOrFail($id),
            'jabatan' => Jabatan::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'hitung' => Hitung::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'username' => ['required', 'min:4', 'unique:users,username,' . $user->id],
            'id_jab' => 'required',
            'id_unit' => 'required',
            'id_sub' => 'required',
            'id_level' => 'required',
            'foto' => 'image|file'
        ]);

        if ($request->hasFile('foto')) {
            if ($request->oldFoto) {
                $file_name = $user->foto;
                $file_path = public_path('storage/user-image/' . $file_name);
                unlink($file_path);
                Storage::delete($request->oldFoto);
            }
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->get('username') . '.' . $extension;
            $file->move('storage/user-image/', $filename);
            $validatedData['foto'] = $filename; // Save the new and correct file name into the input
        }
        User::where('id', $user->id)->update($validatedData);

        return redirect('/profil')->with('success', 'User Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
