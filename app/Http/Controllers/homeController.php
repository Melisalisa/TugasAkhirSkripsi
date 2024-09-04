<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $data = Ekskul::groupBy('alternatif')
        //     ->select('alternatif',
        //             DB::raw('SUM(minat) as total_minat'),
        //             DB::raw('SUM(pengalaman) as total_pengalaman'),
        //             DB::raw('SUM(bakat) as total_bakat'),
        //             DB::raw('SUM(prestasi) as total_prestasi'))->where('id_user', Auth::user()->id)
        //     ->get();

        $data = Ekskul::where('id_user', Auth::user()->id)->get();

        // dd($data);

        return view('dashboard.pages.home', compact('data'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
