<?php

namespace App\Http\Controllers;

use App\Models\Hitung;
use App\Models\Subdit;
use App\Models\Level;
use App\Models\Unit;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class SubditController extends Controller
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
        return view('subdit.index', [
            'title' => 'Sub Bagian Unit Kerja',
            'active' => 'subdit',
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
            'subdit' => 'required|unique:subdits',
        ]);
        Subdit::create($validatedData);
        return back()->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subdit  $subdit
     * @return \Illuminate\Http\Response
     */
    public function show(Subdit $subdit)
    {
        if (auth()->guest()) {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subdit  $subdit
     * @return \Illuminate\Http\Response
     */
    public function edit(Subdit $subdit)
    {
        if (auth()->guest()) {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Subdit  $subdit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subdit $subdit)
    {
        if (auth()->guest()) {
            abort(403);
        }
        $validatedData = $request->validate([
            'subdit' => ['required', 'unique:subdits,subdit,' . $subdit->id]
        ]);
        Subdit::where('id', $subdit->id)->update($validatedData);
        return redirect('/subdit')->with('success', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subdit  $subdit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subdit $subdit)
    {
        if (auth()->guest()) {
            abort(403);
        }
        Subdit::destroy($subdit->id);
        return redirect('/subdit')->with('success', 'Data Berhasil dihapus!');
    }
}
