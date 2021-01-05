<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::all();
        return view('pasien', compact('pasien'));
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
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'umur' => 'required'
        ]);

        Pasien::create([
            'nama_pasien' => $request->nama_pasien,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur
        ]);
        return back()->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'umur' => 'required'
        ]);

        Pasien::where('id', $id)->update([
            'nama_pasien' => $request->nama_pasien,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur
        ]);

        return back()->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasien::destroy($id);
        return back()->with('success', 'Berhasil hapus data');
    }
}
