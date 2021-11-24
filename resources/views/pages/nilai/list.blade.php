@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>List Nilai</h1>
    <hr>
    <div class="d-flex flex-row-reverse mb-2">
        <a href="{{ route("nilai.create") }}" class="btn btn-success">Tambah</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Mata Kuliah</th>
                <th>Nilai</th>
                <th colspan=2 width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($nilai as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nim }}</td>
            <td>{{ $item->mahasiswa->nama }}</td>
            <td>{{ $item->matakuliah->nama }}</td>
            <td>{{ $item->nilai }}</td>
            <td><a href="{{ route("nilai.edit",$item) }}" class="btn btn-warning btn-block">Rubah</a></td>
            <td><a href="#" class="btn btn-danger"
                onclick="event.preventDefault();
                document.getElementById('hapus-nilai-{{ $item->id }}').submit();">Hapus</a>
                <form id="hapus-nilai-{{ $item->id }}" action="{{ route("nilai.destroy",$item) }}" method="post">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
</div>
@endsection