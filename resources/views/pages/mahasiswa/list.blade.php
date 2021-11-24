@extends('layouts.app')
{{-- @extends('layouts/app.blade.php') --}}

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>List Mahasiswa</h1>'
    <hr>
    <div class="d-flex flex-row-reverse mb-2">
        <a href="{{ route("mahasiswa.create") }}" class="btn btn-success">Tambah</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th colspan=2 class="w-25">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($mahasiswa as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nim }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->telepon }}</td>
            <td>{{ $item->email }}</td>
            <td><a href="{{ route("mahasiswa.edit",$item) }}"
                class="btn btn-warning btn-block">Rubah</a></td>
            <td>
                <a class="btn btn-danger btn-block"
                    onclick="event.preventDefault();
                    document.getElementById('hapus-mahasiswa-{{$item->id}}').submit();">Hapus</a>
                <form action="{{ route("mahasiswa.destroy",$item) }}"
                    id="hapus-mahasiswa-{{$item->id}}" method="post">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection