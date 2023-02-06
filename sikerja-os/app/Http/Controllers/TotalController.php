<?php

namespace App\Http\Controllers;

use App\Models\Total;
use App\Models\Hitung;
use App\Models\Jabatan;
use App\Models\Subdit;
use App\Models\Unit;
use App\Models\User;
use App\Models\Kinerja;
use App\Models\Level;
use App\Models\Status;
use Illuminate\Http\Request;

class TotalController extends Controller
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
        return view('admin.test', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'users' => User::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'hitung' => Hitung::where('id_user', '=', auth()->user()->id)->sum('total'),
            'belum' => Kinerja::where('id_user', '=', auth()->user()->id)->where('id_status', '=', 1)->count('id_status'),
            'kinerja' => Kinerja::all()
        ]);
    }

    public function test(User $user)
    {
        if (auth()->guest()) {
            abort(403);
        }

        return view('dashboard.test', [
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
            'belum' => Kinerja::where('id_status', '=', 1)->count('id_status'),
        ]);
    }

    public function total($hitung_id)
    {
        $hitung = Hitung::where('id', $hitung_id)->get();
        $th = floor($hitung[0]['tot_hari']);
        $tj = floor($hitung[0]['tot_jam']);
        $tm = floor($hitung[0]['tot_menit']);
        $h = floor($th * 600);
        $j = floor($tj * 60);
        $m = $tm;
        $diff = round(abs($h + $j + $m));
        $total = $diff;

        $temp3 = [];
        $temp3['id_user'] = $hitung[0]['id_user'];
        $temp3['id_hitung'] = $hitung[0]['id_hitung'];
        $temp3['id_status'] = $hitung[0]['id_status'];
        $temp3['total'] = $total;
        Total::create($temp3);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Total  $total
     * @return \Illuminate\Http\Response
     */
    public function show(Total $total)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Total  $total
     * @return \Illuminate\Http\Response
     */
    public function edit(Total $total)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Total  $total
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Total $total)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Total  $total
     * @return \Illuminate\Http\Response
     */
    public function destroy(Total $total)
    {
        //
    }
}
