<?php

namespace App\Http\Controllers;

use App\Models\nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.nilai.list",[
            "nilai" => nilai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.nilai.form",[
            "mahasiswa" => \App\Models\mahasiswa::all(),
            "matakuliah" => \App\Models\matakuliah::all()
        ]);
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
            "nim" => "required",
            "matakuliah_id" => "required",
            "nilai" => "required|integer|between:0,100"
        ]);

        Nilai::create($request->except("_token"));

        return redirect()
                ->route("nilai.index")
                ->with("info","Berhasil tambah nilai");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(nilai $nilai)
    {
        return view("pages.nilai.form",[
            "mahasiswa" => \App\Models\mahasiswa::all(),
            "matakuliah" => \App\Models\matakuliah::all(),
            "nilai" => $Nilai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nilai $nilai)
    {
        $nilai->update($request->except("_token"));

        return redirect()
                ->route("nilai.index")
                ->with("info","Berhasil update nilai");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(nilai $nilai)
    {
        $nilai->delete();

        return redirect()
            ->route("nilai.index")
            ->with("info","Berhasil hapus nilai");
    }
}
