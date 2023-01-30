<?php

namespace App\Http\Controllers;

use App\Models\Hitung;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Level;
use App\Models\Subdit;
use App\Models\Unit;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
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
        return view('users.index', [
            'title' => 'User',
            'users' => User::all(),
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
        if (auth()->guest()) {
            abort(403);
        }
        return view('users.create', [
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->guest()) {
            abort(403);
        }
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'username' => 'required|unique:users',
            'password' => 'required',
            'id_jab' => 'required',
            'id_unit' => 'required',
            'id_sub' => 'required',
            'id_level' => 'required',
            'foto' => 'image|file|max:1024'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        if ($request->hasFile('foto')) {

            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->get('name') . '.' . $extension;
            $file->move('storage/user-image/', $filename);
            $validatedData['foto'] = $filename; // Save the new and correct file name into the input
        }
        User::create($validatedData);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (auth()->guest()) {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (auth()->guest()) {
            abort(403);
        }
        return view('users.edit', [
            'title' => 'User',
            'user' => User::findOrFail($user->id),
            'jabatan' => Jabatan::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'hitung' => Hitung::all()
        ]);
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

        return redirect('/users')->with('success', 'User Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (auth()->guest()) {
            abort(403);
        }
        if ($user->foto) {
            $file_name = $user->foto;
            $file_path = public_path('storage/user-image/' . $file_name);
            unlink($file_path);
        }
        User::destroy($user->id);
        return redirect('/users')->with('success', 'User Berhasil dihapus!');
    }
}
