<?php

namespace App\Http\Controllers;

use App\Models\Hitung;
use App\Models\Unit;
use App\Models\Subdit;
use App\Models\Level;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class UnitController extends Controller
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
        return view('unit.index', [
            'title' => 'Unit Kerja',
            'active' => 'unit',
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->guest()) {
            abort(403);
        }
        $validatedData = $request->validate([
            'unit' => 'required|unique:units',
        ]);
        Unit::create($validatedData);
        return back()->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        if (auth()->guest()) {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        if (auth()->guest()) {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        if (auth()->guest()) {
            abort(403);
        }
        $validatedData = $request->validate([
            'unit' => ['required', 'unique:units,unit,' . $unit->id]
        ]);
        Unit::where('id', $unit->id)->update($validatedData);
        return redirect('/unit')->with('success', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        if (auth()->guest()) {
            abort(403);
        }
        Unit::destroy($unit->id);
        return redirect('/unit')->with('success', 'Data Berhasil dihapus!');
    }
}
