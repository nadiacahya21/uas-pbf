<?php

namespace App\Http\Controllers;

use App\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::all();
        return view('dokter', compact('dokter'));
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
            'nama_dokter' => 'required|string|max:255'
        ]);

        Dokter::create([
            'nama_dokter' => $request->nama_dokter,
        ]);
        return back()->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255'
        ]);

        Dokter::where('id', $id)->update([
            'nama_dokter' => $request->nama_dokter,
        ]);

        return back()->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dokter::destroy($id);
        return back()->with('success', 'Berhasil hapus data');
    }
}
