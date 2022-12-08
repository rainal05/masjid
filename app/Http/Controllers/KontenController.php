<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Masjid;
use Illuminate\Http\Request;

class KontenController extends Controller
{
    // public function front()
    // {
    //     $info = Berita::orderBy('created_at', 'DESC')->get();
    //     return view('informasi.index', compact('info'));
    // }

    public function index()
    {
        $konten = Berita::get();
        $masjid = Masjid::where('status', 'ACC')->get();
        return view('konten.index', compact('konten', 'masjid'));
    }

    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'masjid_id' => 'required|unique:beritas',
        ], $massage);
        $masjid = Berita::create([
            'masjid_id'      => $request->masjid_id,
        ]);
        return redirect()->back()->with(['notif' => 'Konten Masjid <strong>' . $masjid->masjid->nama . '</strong> Ditambah']);
    }


    public function edit($id)
    {
        $masuk = Berita::find($id);
        $masjid = Masjid::where('status', 'ACC')->get();
        return view('konten.edit', compact('masuk', 'masjid'));
    }

    public function update(Request $request, $id)
    {
        // $massage = [
        //     'required' => ':attribute  wajib di isi !!',
        // ];

        // $this->validate($request, [
        //     'name' => 'required',
        //     'username' => 'required|unique:users,username',
        // ], $massage);
        $masuk = \App\Berita::find($id);
        $masuk->masjid_id = $request->masjid_id;
        $masuk->save();
        return redirect('/data/konten')->with(['notif' => 'Konten Masjid <strong>' . $masuk->masjid->nama . '</strong> Diupdate']);
    }
}
