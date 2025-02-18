@extends('layouts.apptest')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Halaman Utama</h4>
        <div>
            <span>{{ \Carbon\Carbon::now()->translatedFormat('H:i') }} WIB | {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            <a href="#" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
    <p>Selamat Datang, saat ini anda login sebagai Administrator. Anda memiliki akses penuh terhadap sistem.</p>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('guru.index') }}" class="dashboard-card bg-success">
                <i class="bi bi-people"></i><br>
                Data Guru
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="dashboard-card bg-warning">
                <i class="bi bi-clipboard"></i><br>
                Laporan Absensi
            </a>
        </div>
        <div class="col-md-4">
            <a href="#" class="dashboard-card bg-primary">
                <i class="bi bi-gear"></i><br>
                Setting Profile
            </a>
        </div>
    </div>
@endsection
