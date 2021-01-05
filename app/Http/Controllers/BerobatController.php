<?php

namespace App\Http\Controllers;

use App\Berobat;
use App\Dokter;
use App\Obat;
use App\Pasien;
use Illuminate\Http\Request;

class BerobatController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berobat = Berobat::all();
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('berobat', compact('berobat', 'pasien', 'dokter'));
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
    public function store(Request $request)
    {
        $request->validate([
            'keluhan' => 'nullable|string|max:255',
            'diagnosa' => 'nullable|string|max:255',
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'penatalaksanaan' => 'nullable',
            'tanggal' => 'required',
        ]);

        Berobat::create([
            'keluhan' => $request->keluhan,
            'diagnosa' =>$request->diagnosa,
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'penatalaksanaan' => $request->penatalaksanaan,
            'tanggal'=> $request->tanggal,
        ]);
        return back()->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berobat  $berobat
     * @return \Illuminate\Http\Response
     */
    public function show(Berobat $berobat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berobat  $berobat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berobat = Berobat::findOrFail($id);
        $dataobat = [];
        foreach ($berobat->resep as $key => $value) {
            $dataobat[$key] = $value->id;
        }
        $obat = Obat::whereNotIn('id', $dataobat)->get();
        return view('berobat-edit', compact('berobat', 'obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berobat  $berobat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'keluhan' => 'nullable|string|max:255',
            'diagnosa' => 'nullable|string|max:255',
            'penatalaksanaan' => 'nullable',
        ]);



        if ($request->obat) {
            $berobat = Berobat::find($id);
            $berobat->resep()->attach($request->obat);
        } else if ($request->id_pasien){
          Berobat::where('id', $id)->update([
              'id_pasien' => $request->id_pasien,
              'id_dokter' => $request->id_dokter,
          ]);
        } else {
          Berobat::where('id', $id)->update([
          'keluhan' => $request->keluhan,
          'diagnosa' =>$request->diagnosa,
          'penatalaksanaan' => $request->penatalaksanaan,
      ]);
        }

        return back()->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berobat  $berobat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Berobat::destroy($id);
        return back()->with('success', 'Berhasil hapus data');
    }

    public function hapusObat(Request $request, $id)
    {
        $berobat = Berobat::find($id);
        $berobat->resep()->detach($request->obathapus);
        return back()->with('success', 'Berhasil hapus obat');
    }
}
