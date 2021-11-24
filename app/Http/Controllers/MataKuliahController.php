<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.matakuliah.list",[
            "matakuliah" => Matakuliah::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.matakuliah.form");
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
            "nama" => "required"
        ]);

        Matakuliah::create($request->except("_token"));

        return redirect()
                ->route("matakuliah.index")
                ->with("info","Berhasil tambah mata kuliah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MataKuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(MataKuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MataKuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(MataKuliah $matakuliah)
    {
        return view("pages.matakuliah.form",[
            "matakuliah" => $matakuliah
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MataKuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mataKuliah $matakuliah)
    {
        $matakuliah->update($request->except("_token"));

        return redirect()
                ->route("matakuliah.index")
                ->with("info","Berhasil update mata kuliah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MataKuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(mataKuliah $matakuliah)
    {
        $matakuliah->delete();

        return redirect()
            ->route("matakuliah.index")
            ->with("info","Berhasil hapus mata kuliah");
    }
}
