<?php

namespace App\Http\Controllers;

use App\Models\Hitung;
use App\Models\Jabatan;
use App\Models\Level;
use App\Models\Subdit;
use App\Models\Unit;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('superadmin');
        return view('jabatan.index', [
            'title' => 'Daftar Jabatan',
            'active' => 'jabatan',
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->guest()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'jabatan' => 'required|unique:jabatans|min:8',
        ]);
        Jabatan::create($validatedData);
        return back()->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        if (auth()->guest()) {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        if (auth()->guest()) {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJabatanRequest  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        if (auth()->guest()) {
            abort(403);
        }
        $validatedData = $request->validate([
            'jabatan' => ['required', 'min:4', 'unique:jabatans,jabatan,' . $jabatan->id]
        ]);
        Jabatan::where('id', $jabatan->id)->update($validatedData);
        return redirect('/jabatan')->with('success', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        if (auth()->guest()) {
            abort(403);
        }
        Jabatan::destroy($jabatan->id);
        return redirect('/jabatan')->with('success', 'Data Berhasil dihapus!');
    }
}
