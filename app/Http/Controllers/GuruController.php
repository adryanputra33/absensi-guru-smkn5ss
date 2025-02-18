<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::latest()->paginate(10);
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:guru,nip',
            'status' => 'required|in:0,1',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id); // Cari data guru berdasarkan ID
        return view('guru.edit', compact('guru')); // Kirim data ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => [
                'nullable',
                'numeric',
                Rule::unique('guru', 'nip')->ignore($guru->id),
            ],
            'status' => 'required|in:0,1', // Validasi status hanya bisa 0 atau 1
        ]);


        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Coba update data Guru
            $guru->update($validatedData);

            // Jika tidak ada error, commit transaksi
            DB::commit();

            // Kembali ke halaman index dengan pesan sukses
            return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
        } catch (\Exception $e) {
            // Jika terjadi error, rollback transaksi
            DB::rollBack();

            // Kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data guru. Silakan coba lagi.');
        }
    }

}
