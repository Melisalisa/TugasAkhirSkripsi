<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Siswa;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all();

        $alternatif = Alternatif::all();

        return view('dashboard.pages.siswa', compact('data', 'alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Siswa::create([
            'nama_siswa' => $request->input('nama'),
            'kelas' => $request->input('kelas'),
            'alternatif' => $request->input('alternatif'),
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Siswa::findOrFail($id)->update([
            'nama_siswa' => $request->input('nama'),
            'kelas' => $request->input('kelas'),
            'alternatif' => $request->input('alternatif'),
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::findOrFail($id)->delete();

        return back();
    }
}
