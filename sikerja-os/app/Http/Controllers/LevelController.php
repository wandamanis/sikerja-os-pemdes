<?php

namespace App\Http\Controllers;

use App\Models\Hitung;
use App\Models\Level;
use App\Models\Subdit;
use App\Models\Unit;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class LevelController extends Controller
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
        return view('level.index', [
            'title' => 'Level User',
            'active' => 'level',
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
            'level' => 'required|unique:levels',
        ]);
        Level::create($validatedData);
        return back()->with('success', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        if (auth()->guest()) {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        if (auth()->guest()) {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        if (auth()->guest()) {
            abort(403);
        }
        $validatedData = $request->validate([
            'level' => ['required', 'unique:levels,level,' . $level->id]
        ]);
        Level::where('id', $level->id)->update($validatedData);
        return redirect('/level')->with('success', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        if (auth()->guest()) {
            abort(403);
        }
        Level::destroy($level->id);
        return redirect('/level')->with('success', 'Data Berhasil dihapus!');
    }
}
