<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sekolah;

class sekolahController extends controller
{
    public function index()
    {
        $sekolahs = Sekolah::all();
        return view('sekolahs.index') ->with ('sekolahs',$sekolahs);
    }

    public function tambah()
    {
        $sekolah = Sekolah::all();
        return view('sekolahs.tambah') ->with ('sekolah',$sekolah);
    }

    public function simpan(Request $request)
    {
        $sekolah =new sekolah();

        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->jurusan = $request->jurusan;
        $sekolah->jumlah_guru = $request->jumlah_guru;

        $sekolah->save();

        return redirect()->route('sekolahs.index');

    }

    public function edit($id)
    {
        $sekolah = sekolah::find($id);
        return view('sekolahs.edit', [
            'sekolah' => $sekolah ,
        ]); 
    }

    public function update(Request $request, $id)
    {
        $sekolah = Sekolah::find($id);

        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->alamat = $request->alamat;
        $sekolah->jurusan = $request->jurusan;
        $sekolah->jumlah_guru = $request->jumlah_guru;

        $sekolah->save();

        return redirect()->route('sekolahs.index');
    }

    public function destroy($id)
    {
        $sekolah = Sekolah::find($id);

        $sekolah->delete();

        return redirect()->route('sekolahs.index');
    }
}