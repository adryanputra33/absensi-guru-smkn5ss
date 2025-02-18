@extends('layouts.apptest')

@section('content')
    <div class="container">
        <h1>Edit Guru</h1>

        <form action="{{ route('guru.update', $guru->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" required>
            </div>
            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ $guru->nip }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Status:</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Non-Aktif</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
