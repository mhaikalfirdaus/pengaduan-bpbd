<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PagesController extends Controller
{
    public function index()
    {
        // if(\Auth::guard('petugas')){
        //     return redirect('home/petugas');
        // }else if(\Auth::guard('masyarakat')){
        //     return redirect('home/masyarakat');
        // }
        $model = Pengaduan::get();
        // dd($model);
        return view('home',compact('model'));
    }

    public function dashboard_masyarakat()
    {
       
        return view('masyarakat.dashboard');
    }
    public function dashboard_petugas()
    {
        return view('petugas.dashboard');
    }
}
