@extends('layouts.app')

@section('title', 'Data Guru')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Data Guru</h4>
        <a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah Guru</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($guru as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('guru.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
