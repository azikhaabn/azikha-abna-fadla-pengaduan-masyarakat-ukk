<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Pengaduan;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $user = User::all();
        return view('admin.index', compact('user'))
            ->with('i');
    }

    public function dashboard()
    {
        $allDataPengaduan = Pengaduan::all()->count();
        $belumDiproses = Pengaduan::where('status' , 'Belum Diproses')->count();
        $sedangDiproses = Pengaduan::where('status' , 'Sedang Diproses')->count();
        $selesai = Pengaduan::where('status' , 'Selesai')->count();

        return view('dashboard',compact('allDataPengaduan', 'belumDiproses', 'sedangDiproses', 'selesai'));
    }

}