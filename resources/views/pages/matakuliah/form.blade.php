@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Form Mata Kuliah</h1>
    <hr>
    <form action="{{ isset($matakuliah)?route("matakuliah.update",$matakuliah):route("matakuliah.store") }}" method="POST">
        @isset($matakuliah)
            @method("PUT")
        @endisset
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control @error("nama") is-invalid @enderror"
                value="{{ isset($matakuliah)?$matakuliah->nama:old("nama") }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-success">
        </div>
    </form>
</div>
@endsection