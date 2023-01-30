<?php

namespace App\Http\Controllers;

use App\Models\Subdit;
use App\Models\Unit;
use App\Models\User;
use App\Models\Hitung;
use App\Models\Jabatan;
use App\Models\Kinerja;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;
use Ramsey\Uuid\Type\Integer;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->guest()) {
            abort(403);
        }
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'users' => User::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'hitung' => Hitung::where('id_user', '=', auth()->user()->id)->sum('total'),
            'belum' => Kinerja::where('id_user', '=', auth()->user()->id)->where('id_status', '=', 1)->count('id_status'),
            'kinerja' => Kinerja::all(),
            'jabatan' => Jabatan::all()
        ]);
    }

    public function admin()
    {
        if (auth()->guest()) {
            abort(403);
        }
        return view('admin.admin', [
            'title' => 'Dashboard Admin',
            'active' => 'dashboard',
            'users' => User::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'hitung' => Hitung::where('id_user', '=', auth()->user()->id)->sum('total'),
            'belum' => Kinerja::where('id_user', '=', auth()->user()->id)->where('id_status', '=', 1)->count('id_status'),
            'kinerja' => Kinerja::all(),
            'jabatan' => Jabatan::all()
        ]);
    }

    public function superadmin()
    {
        if (auth()->guest()) {
            abort(403);
        }
        return view('superadmin.superadmin', [
            'title' => 'Dashboard Superadmin',
            'active' => 'dashboard',
            'users' => User::all(),
            'unit' => Unit::all(),
            'subdit' => Subdit::all(),
            'hitung' => Hitung::where('id_user', '=', auth()->user()->id)->sum('total'),
            'belum' => Kinerja::where('id_user', '=', auth()->user()->id)->where('id_status', '=', 1)->count('id_status'),
            'kinerja' => Kinerja::all(),
            'jabatan' => Jabatan::all()
        ]);
    }
}
