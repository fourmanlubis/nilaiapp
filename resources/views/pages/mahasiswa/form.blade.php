@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>Form Mahasisa</h1>
    <hr>
    <form action="{{ isset($mahasiswa)?route("mahasiswa.update",$mahasiswa):route("mahasiswa.store") }}" method="post">
        @isset($mahasiswa)
            @method("PUT")
        @endisset
        @csrf
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control @error("nim") is-invalid @enderror" name="nim" value="{{ isset($mahasiswa)?$mahasiswa->nim:old("nim") }}">
            @error('nim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error("nama") is-invalid @enderror" name="nama" value="{{ isset($mahasiswa)?$mahasiswa->nama:old("nama") }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error("alamat") is-invalid @enderror" name="alamat" value="{{ isset($mahasiswa)?$mahasiswa->alamat:old("alamat") }}">
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" class="form-control @error("telepon") is-invalid @enderror" name="telepon" value="{{ isset($mahasiswa)?$mahasiswa->telepon:old("telepon") }}">
            @error('telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error("email") is-invalid @enderror" name="email" value="{{ isset($mahasiswa)?$mahasiswa->email:old("email") }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group float-right">
            <input type="submit" value="Simpan" class="btn btn-success">
        </div>
    </form>
</div>
@endsection