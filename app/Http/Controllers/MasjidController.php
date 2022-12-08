<?php

namespace App\Http\Controllers;

use File;
use App\Masjid;
use App\Masjid_ket;
use Illuminate\Http\Request;

class MasjidController extends Controller
{
    public function index()
    {
        $masjid = Masjid::orderBy('created_at', 'DESC')->get();
        $blm = Masjid::orderBy('created_at', 'DESC')->where('status', 'Belum ACC')->get();
        return view('masjid.index', compact('masjid', 'blm'));
    }

    public function acc()
    {
        // $masjid = Masjid::get();
        $acc = Masjid::where('status', 'ACC')->get();
        return view('acc.index', compact('acc'));
    }

    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'id_masjid' => 'required',
            'nama' => 'required',
            'kabko' => 'required',
            'lokasi' => 'required',
            'foto' => 'required',
            'rp' => 'required',
        ], $massage);
        $foto = $request->file('foto');
        $nama_file = time() . "_" . $foto->getClientOriginalName();
        $tujuan_upload = 'file_foto';
        $foto->move($tujuan_upload, $nama_file);
        //and foto
        $up = new \App\Masjid;
        $up->id_masjid = $request->id_masjid;
        $up->nama = $request->nama;
        $up->kabko = $request->kabko;
        $up->lokasi = $request->lokasi;
        $up->foto = $nama_file;
        $up->rp = $request->rp;
        $up->status = 'Belum ACC';
        $up->save();
        return redirect()->back()->with(['notif' => 'Data Masjid <strong>' . $up->nama . '</strong> Ditambah']);
    }

    public function detail($id)
    {
        $det = Masjid::find($id);
        return view('masjid.detail', compact('det'));
    }

    public function delete($id)
    {
        // hapus file
        $keluar = Masjid::where('id', $id)->first();
        File::delete('file_foto/' . $keluar->file);
        $keluar->berita()->delete();

        // hapus data
        Masjid::where('id', $id)->delete();

        return redirect()->back()->with(['notif' => 'Data Masjid <strong>' . $keluar->nama . '</strong> Dihapus']);
    }

    public function lap()
    {
        return view('laporan.index');
    }

    public function lapmasjid($start, $end)
    {
        // $tgl['now']     = Carbon::now()->format('d - m - Y');
        $all = Masjid::whereBetween('created_at', [$start, $end])
            ->where('status', 'ACC')
            ->get();
        return view('laporan.masjid', compact('all'));
    }
}
