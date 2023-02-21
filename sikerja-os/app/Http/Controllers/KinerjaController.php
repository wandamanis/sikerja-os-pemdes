<?php

namespace App\Http\Controllers;

use App\Models\Kinerja;
use App\Models\Subdit;
use App\Models\Unit;
use App\Models\Jabatan;
use App\Models\Level;
use App\Models\Status;
use App\Models\User;
use App\Models\Hitung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class KinerjaController extends Controller
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
        return view('kinerja.index', [
            'title' => 'Kinerja',
            'active' => 'kinerja',
            'user' => User::all(),
            'status' => Status::all(),
            'jabatan' => Jabatan::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'kinerja' => Kinerja::where('id_user', auth()->user()->id)->get(),
            'hitung' => Hitung::all()
        ]);
    }

    public function tolak()
    {
        if (auth()->guest()) {
            abort(403);
        }
        return view('kinerja.tolak', [
            'title' => 'Kinerja',
            'active' => 'kinerja',
            'user' => User::all(),
            'status' => Status::all(),
            'jabatan' => Jabatan::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'kinerja' => Kinerja::where('id_user', auth()->user()->id)->get(),
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
        return view('kinerja.create', [
            'title' => 'Tambah Kinerja',
            'users' => User::all(),
            'jabatan' => Jabatan::all(),
            'unit' => Unit::all(),
            'status' => Status::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'active' => 'tambah',
            'hitung' => Hitung::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKinerjaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->guest()) {
            abort(403);
        }
        $waktuMulai = $request->get('tgl_mulai') . " " . $request->get('jam_mulai');
        $waktuSelesai = $request->get('tgl_selesai') . " " . $request->get('jam_selesai');

        $jamKerja = $this->hitung_jam_kerja($waktuSelesai, $waktuMulai);

        if ($this->validasi_time_traveller($waktuMulai) || $this->validasi_time_traveller($waktuSelesai)) {
            return redirect()->back()->withInput()->with('danger', 'Waktu yang diinput tidak boleh melebihi waktu sekarang');
        }

        if ($jamKerja < 0) {
            return redirect()->back()->withInput()->with('danger', 'Waktu selesai tidak boleh kurang dari waktu mulai');
        }

        $validatedData['id_user'] = auth()->user()->id;
        $validatedData['id_sub'] = auth()->user()->id_sub;
        $validatedData['id_status'] = $request->get('id_status');
        $validatedData['kinerja'] = $request->get('kinerja');
        $validatedData['tgl_mulai'] = $request->get('tgl_mulai');
        $validatedData['tgl_selesai'] = $request->get('tgl_selesai');
        $validatedData['jam_mulai'] = $request->get('jam_mulai');
        $validatedData['jam_selesai'] = $request->get('jam_selesai');
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'mimes:jpeg,png,jpg,pdf',
            ]);
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $file->move('storage/kinerja-file/', $filename);
            $validatedData['file'] = $filename; // Save the new and correct file name into the input
        }
        Kinerja::create($validatedData);
        return redirect('/kinerja/create')->with('success', 'Kinerja Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kinerja  $kinerja
     * @return \Illuminate\Http\Response
     */
    public function show(Kinerja $kinerja)
    {
        if (auth()->guest()) {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kinerja  $kinerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Kinerja $kinerja)
    {
        if (auth()->guest()) {
            abort(403);
        }
        return view('kinerja.edit', [
            'kinerjas' => $kinerja,
            'title' => 'Edit Kinerja',
            'users' => User::all(),
            'jabatan' => Jabatan::all(),
            'status' => Status::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'active' => 'Edit',
            'hitung' => Hitung::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKinerjaRequest  $request
     * @param  \App\Models\Kinerja  $kinerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kinerja $kinerja)
    {
        if (auth()->guest()) {
            abort(403);
        }

        $waktuMulai = $request->get('tgl_mulai') . " " . $request->get('jam_mulai');
        $waktuSelesai = $request->get('tgl_selesai') . " " . $request->get('jam_selesai');

        $jamKerja = $this->hitung_jam_kerja($waktuMulai, $waktuSelesai);

        if ($this->validasi_time_traveller($waktuMulai) || $this->validasi_time_traveller($waktuSelesai)) {
            return redirect()->back()->withInput()->with('danger', 'Waktu yang diinput tidak boleh melebihi waktu sekarang');
        }

        if ($jamKerja < 0) {
            return redirect()->back()->withInput()->with('danger', 'Waktu selesai tidak boleh kurang dari waktu mulai');
        }
        
        $validatedData = $request->validate([
            'kinerja' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        $validatedData['id_user'] = auth()->user()->id;
        $validatedData['id_sub'] = auth()->user()->id_sub;

        if ($request->hasFile('file')) {
            if ($request->oldFile) {
                $file_name = $kinerja->file;
                $file_path = public_path('storage/kinerja-file/' . $file_name);
                unlink($file_path);
                Storage::delete($request->oldFile);
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $file->move('storage/kinerja-file/', $filename);
            $validatedData['file'] = $filename; // Save the new and correct file name into the input
        }
        Kinerja::where('id', $kinerja->id)->update($validatedData);
        return redirect('/kinerja')->with('success', 'Kinerja Berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kinerja  $kinerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kinerja $kinerja)
    {
        if (auth()->guest()) {
            abort(403);
        }
        if ($kinerja->file) {
            $file_name = $kinerja->file;
            $file_path = public_path('storage/kinerja-file/' . $file_name);
            unlink($file_path);
        }

        Kinerja::destroy($kinerja->id);
        return redirect('/kinerja')->with('success', 'Kinerja Berhasil dihapus!');
    }

    public function print(Kinerja $kinerja)
    {
        if (auth()->guest()) {
            abort(403);
        }
        return view('kinerja.print', [
            'kinerja' => Kinerja::all(),
            'title' => 'Edit Kinerja',
            'user' => User::all(),
            'jabatan' => Jabatan::all(),
            'status' => Status::all(),
            'unit' => Unit::where('id', auth()->user()->id_unit)->get(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'active' => 'Edit',
            'hitung' => Hitung::all()
        ]);
    }

    public function halaman(Request $request)
    {
        if (auth()->guest()) {
            abort(403);
        }

        $month = $request->input('monthOption');
        $year = $request->input('yearOption');
        $yearmonth = $year . "-" . $month . "%";
        $data = [];
        $data = Kinerja::where('tgl_mulai', 'LIKE', $yearmonth)->get();

        return view('kinerja.halaman', [
            'kinerja' => $data,
            'title' => 'Edit Kinerja',
            'user' => User::all(),
            'jabatan' => Jabatan::all(),
            'status' => Status::all(),
            'unit' => Unit::where('id', auth()->user()->id_unit)->get(),
            'subdit' => Subdit::all(),
            'level' => Level::all(),
            'active' => 'Edit',
            'hitung' => Hitung::all(),
            'bulan' => $month,
            'tahun' => $year,
        ]);
    }

    public function hitung_jam_kerja($waktuSelesai, $waktuMulai){
        // harusnya dibagi 60
        // karena return masih menit

        $start_hour = strtotime($waktuMulai);
        $end_hour = strtotime($waktuSelesai);

        $delta_time = $end_hour - $start_hour;

        return $delta_time;
    }

    public function validasi_time_traveller($waktu){
        if($waktu > Carbon::now(('GMT+7'))){
            return false;
        }else{
            return true;
        }
    }
    
}
