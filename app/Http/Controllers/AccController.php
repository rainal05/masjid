<?php

namespace App\Http\Controllers;

use App\Masjid;
use Illuminate\Http\Request;

class AccController extends Controller
{
    public function index()
    {
        $acc = Masjid::where('status', 'ACC')->get();
        return view('acc.index', compact('acc'));
    }

    public function belum()
    {
        $belum = Masjid::where('status', 'Belum ACC')->get();
        return view('acc.belum', compact('belum'));
    }

    public function acc($id)
    {
        $acc = Masjid::find($id);
        return view('acc.acc', compact('acc'));
    }

    public function update(Request $request, $id)
    {
        // $massage = [
        //     'required' => ':attribute  wajib di isi !!',
        // ];

        // $this->validate($request, [
        //     'nama' => 'required',
        //     'nisn' => 'required',
        // ], $massage);
        $acc = \App\Masjid::find($id);
        $acc->acc = $request->acc;
        $acc->status = 'ACC';
        $acc->save();
        return redirect('/data/masjid/acc')->with(['notif' => 'Masjid <strong>' . $acc->nama . '</strong> Telah Di ACC']);
    }

    public function detail($id)
    {
        $det = Masjid::find($id);
        return view('masjid.detail', compact('det'));
    }
}
