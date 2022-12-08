<?php

namespace App\Http\Controllers;

use App\Masjid;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blm = Masjid::where('status', 'Belum ACC')->count();
        $acc = Masjid::where('status', 'ACC')->count();
        return view('home', compact('blm', 'acc'));
    }
}
