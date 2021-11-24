@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>List Mata Kuliah</h1>
    <hr>
    <div class="d-flex flex-row-reverse mb-2">
        <a href="{{ route("matakuliah.create") }}" class="btn btn-success">Tambah</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="10%">No.</th>
                <th>Nama</th>
                <th colspan=2 width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($matakuliah as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama }}</td>
            <td><a href="{{ route("matakuliah.edit",$item) }}" class="btn btn-warning btn-block">Rubah</a></td>
            <td><a class="btn btn-danger btn-block"
                onclick="event.preventDefault();document.getElementById('hapus-matakuliah-{{$item->id}}').submit();">Hapus</a>
                <form id="hapus-matakuliah-{{$item->id}}" action="{{ route("matakuliah.destroy",$item) }}" method="post">
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