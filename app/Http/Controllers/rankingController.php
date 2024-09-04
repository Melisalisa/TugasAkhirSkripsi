<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rangking;

class rankingController extends Controller
{
    //

    public function index(){

        $ranking = Rangking::where('id_user', Auth::user()->id)
        ->orderBy('hasil', 'desc')
        ->get();

        return view('dashboard.pages.ranking',compact('ranking'));
    }
}
