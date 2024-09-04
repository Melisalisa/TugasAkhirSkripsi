<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class alternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Alternatif::all();

        return view('dashboard.pages.alternatif', compact('data'));
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
        Alternatif::create([
            'alternatif' => $request->input('alternatif'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return redirect('/alternatif');
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
        Alternatif::findOrFail($id)->update([
            'alternatif' => $request->input('alternatif'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return redirect('/alternatif');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Alternatif::findOrFail($id)->delete();

        return redirect('/alternatif');
    }
}
