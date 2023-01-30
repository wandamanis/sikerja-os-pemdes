<?php

namespace App\Http\Controllers;

use App\Models\Hitung;
use App\Models\Kinerja;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HitungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(Request $request, Kinerja $kinerja)
    {
        // $id_user = Kinerja::where('id_user', $kinerja->id_user)->get();
        // $id_kinerja = Kinerja::where('id', $kinerja->id)->get();
        // $id_status = $request->get('2');
        // // $tm = Kinerja::where('tgl_mulai', $kinerja->tgl_mulai)->get();
        // // $ts = Kinerja::where('tgl_selesai', $kinerja->tgl_selesai)->get();
        // // $jm = Kinerja::where('jam_mulai', $kinerja->jam_mulai)->get();
        // // $js = Kinerja::where('jam_selesai', $kinerja->jam_selesai)->get();
        // $tm = microtime(true);
        // $ts = microtime(true);
        // $jm = microtime(true);
        // $js = microtime(true);
        // $tot_hari = $ts - $tm;
        // $tot_jam = $js - $jm;
        // // $validatedData['id_user'] = $request->get($id_user);
        // // $validatedData['id_status'] = $request->get($id_status);
        // // $validatedData['id_kinerja'] = $request->get($id_kinerja);
        // // $validatedData['tot_hari'] = $request->get($tot_hari);
        // // $validatedData['tot_jam'] = $request->get($tot_jam);
        // Hitung::create([
        //     'id_user' => $id_user,
        //     'id_kinerja' => $id_kinerja,
        //     'id_status' => $id_status,
        //     'tot_hari' => $tot_hari,
        //     'tot_jam' => $tot_jam
        // ]);
        // return back()->with('success', 'Kinerja Disetujui');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function show(Hitung $hitung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function edit(Hitung $hitung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hitung $hitung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hitung  $hitung
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hitung $hitung)
    {
        //
    }


    public function setuju($kinerja_id, Request $request)
    {
        $kinerja = Kinerja::where('id', $kinerja_id)->get();

        $selesai = strtotime($kinerja[0]['tgl_selesai'] . ' ' . $kinerja[0]['jam_selesai'] . ':00');
        $mulai = strtotime($kinerja[0]['tgl_mulai'] . ' ' . $kinerja[0]['jam_mulai'] . ':00');
        $diff = round(abs($selesai - $mulai) / 60, 2);
        $d = floor($diff / 1440);
        $h = floor(($diff - $d * 1440) / 60);
        $m = $diff - ($d * 1440) - ($h * 60);
        $t = round(abs($d * 600) + ($h * 60) + ($m));
        //print('<br>');
        //print($d . " hari " . $h . " jam " . $m . ' menit ');
        //print('<br>');
        //print($diff . ' menit');

        $temp = [];
        $temp['id_user'] = $kinerja[0]['id_user'];
        $temp['id_kinerja'] = $kinerja[0]['id'];
        $temp['id_status'] = 2;
        $temp['tot_hari'] = $d;
        $temp['tot_jam'] = $h;
        $temp['tot_menit'] = $m;
        $temp['total'] = $t;
        Hitung::create($temp);

        $temp2 = [];
        $temp2['id_status'] = 2;
        $temp2['comment'] = $request->get('comment');
        Kinerja::where('id', $kinerja_id)->update($temp2);

        return back()->with('success', 'Persetujuan Berhasil !');
    }

    public function tolak(Request $request, Kinerja $kinerja)
    {
        $temp2 = [];
        $temp2['id_status'] = 3;
        $temp2['comment'] = $request->get('comment');
        Kinerja::where('id', $kinerja->id)->update($temp2);

        return back()->with('success', 'Persetujuan Berhasil !');
    }
}
