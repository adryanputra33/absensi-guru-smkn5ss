@extends('layouts.apptest')

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
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($guru as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nip }}</td>

                <!-- Form hanya untuk status -->
                <td>
                    <form action="{{ route('guru.updatestatus', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="checkbox" name="status"
                               value="1"
                               {{ $item->status == 1 ? 'checked' : '' }}
                               onchange="console.log('Checkbox diubah, form akan dikirim!'); this.form.submit();">

                    </form>
                </td>

                <td>
                    <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="fas fa-edit"></i> <!-- Icon Edit -->
                    </a>

                    <a href="" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Akun">
                        <i class="fas fa-user"></i> <!-- Icon User -->
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
