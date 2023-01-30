<?php

namespace App\Http\Controllers;

use App\Models\Hitung;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Kinerja;
use App\Models\Unit;
use App\Models\Subdit;
use App\Models\Level;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
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

        return view('admin.admin', [
            'title' => 'Dashboard Admin',
            'active' => 'dashboard',
            'user' => User::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'hitung' => Hitung::where('id_user', '=', auth()->user()->id)->sum('total'),
            'belum' => Kinerja::where('id_status', '=', 1)->count('id_status'),
            'kinerja' => Kinerja::all(),
            'jabatan' => Jabatan::all()
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

    public function lihat_kinerja(User $user)
    {
        return view('admin.kinerja', [
            'title' => 'Lihat Kinerja',
            'active' => 'kinerja',
            'name' => User::where('id', '=', $user->id)->get('name'),
            'user' => User::all(),
            'status' => Status::all(),
            'jabatan' => Jabatan::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'kinerja' => Kinerja::where('id_user', '=', $user->id)->get(),
            'hitung' => Hitung::where('id_user', '=', $user->id)->sum('total'),
        ]);
    }

    public function dashboard_kinerja(User $user)
    {
        return view('admin.dashboard', [
            'title' => 'Lihat Kinerja',
            'active' => 'kinerja',
            'name' => User::where('id', '=', $user->id)->get('name'),
            'user' => User::all(),
            'id_user' => User::where('id', '=', $user->id)->get('id'),
            'status' => Status::all(),
            'jabatan' => Jabatan::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'kinerja' => Kinerja::where('id_user', '=', $user->id)->get('id_user'),
            'id_sub' => Kinerja::where('id_sub', '=', $user->id_sub)->where('id_user', '=', $user->id)->get('id_sub'),
            'hitung' => Hitung::where('id_user', '=', $user->id)->sum('total'),
            'belum' => Kinerja::where('id_status', '=', 1)->where('id_user', '=', $user->id)->count('id_status'),
            'user_id' => Kinerja::get('id_user')
        ]);
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.kinerja', [
            'title' => 'Lihat Kinerja',
            'active' => 'kinerja',
            'user' => User::all(),
            'status' => Status::all(),
            'jabatan' => Jabatan::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'kinerja' => Kinerja::where('id_user', '=', $user->id)->get()
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
        //
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
