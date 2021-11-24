@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>Form Mahasiswa</h1>
    <hr>
    <form action="{{ isset($nilai)?route("nilai.update",$nilai):route("nilai.store") }}" method="post">
        @isset ($nilai)
            @method("PUT")
        @endisset
        @csrf
        <div class="form-group">
            <label for="nim">NIM</label>
            <select name="nim" id="nim" class="form-control @error("nim") is-invalid @enderror">
            @foreach ($mahasiswa as $item)
                <option value="{{ $item->nim }}" {{ isset($nilai) && $nilai->nim==$item->nim?"selected":"" }}>{{ $item->nama }}</option>
            @endforeach
            </select>
            @error('nim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="matakuliah">Mata Kuliah</label>
            <select name="matakuliah_id" id="matakuliah" class="form-control @error("matakuliah_id") is-invalid @enderror">
            @foreach ($matakuliah as $item)
                <option value="{{ $item->id }}" {{ isset($nilai) && $nilai->nama==$item->nama?"selected":"" }}>{{ $item->nama }}</option>
            @endforeach
            </select>
            @error('matakuliah_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" class="form-control @error("nilai") is-invalid @enderror" name="nilai"
                value="{{ isset($nilai)?$nilai->nilai:old("nilai") }}">
            @error('nilai')
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