<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class votingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::all();

        return view('dashboard.pages.voting', compact('alternatif'));
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

        $validator = Validator::make($request->all(), [
            'alternatif' => 'required',
            'minat' => 'required',
            'pengalaman' => 'required',
            'bakat' => 'required',
            'prestasi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Ekskul::create([
            'id_user' => Auth::user()->id,
            'alternatif' => $request->input('alternatif'),
            'minat' => $request->input('minat'),
            'pengalaman' => $request->input('pengalaman'),
            'bakat' => $request->input('bakat'),
            'prestasi' => $request->input('prestasi'),
        ]);

        return redirect('/voting');
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
        Ekskul::findOrFail($id)->update([
            'minat' => $request->input('minat'),
            'pengalaman' => $request->input('pengalaman'),
            'bakat' => $request->input('bakat'),
            'prestasi' => $request->input('prestasi'),
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ekskul::findOrFail($id)->delete();

        return back();
    }

    public function clear(){
        Ekskul::where('id_user', Auth::user()->id)->delete();

        return redirect('/voting');
    }
}
