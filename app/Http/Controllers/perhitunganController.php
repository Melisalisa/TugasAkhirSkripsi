<?php

namespace App\Http\Controllers;

use App\Models\Aminus;
use App\Models\Aplus;
use App\Models\Bobot;
use App\Models\Ekskul;
use App\Models\Kriteria;
use App\Models\Minus;
use App\Models\Normalbobot;
use App\Models\Normalmatriks;
use App\Models\Pembagi;
use App\Models\Plus;
use App\Models\Rangking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class perhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Kriteria::where('id_user', Auth::user()->id)->get();

        $dataExists = Kriteria::where('id_user', Auth::user()->id)->exists();

        $ekskulExist = Ekskul::where('id_user', Auth::user()->id)->exists();

        $bobotData = Bobot::all();


        return view('dashboard.pages.perhitungan', compact('data', 'bobotData', 'dataExists', 'ekskulExist'));
    }

    public function normalisasiIndex(){

        $data = Pembagi::all()->where('id_user', Auth::user()->id);

        $normalisasi = Normalmatriks::where('id_user', Auth::user()->id)->get();

        $dataExist = Normalmatriks::where('id_user', Auth::user()->id)->exists();

        $kriteriaExist = Kriteria::where('id_user', Auth::user()->id)->exists();

        return view('dashboard.pages.normalisasi', compact('data', 'normalisasi', 'dataExist', 'kriteriaExist'));
    }

    public function normalbobotIndex(){

        $data = Normalbobot::where('id_user', Auth::user()->id)->get();

        $aplus = Aplus::where('id_user', Auth::user()->id)->get();

        $aminus = Aminus::where('id_user', Auth::user()->id)->get();

        $plus = Plus::where('id_user', Auth::user()->id)->get();

        $minus = Minus::where('id_user', Auth::user()->id)->get();

        $ranking = Rangking::where('id_user', Auth::user()->id)
        ->orderBy('hasil', 'desc')
        ->get();

        return view('dashboard.pages.normalisasiterbobot', compact('data', 'aplus', 'aminus', 'plus', 'minus', 'ranking'));
    }

    public function getRankData(){

        $ranking = Rangking::where('id_user', Auth::user()->id)
        ->orderBy('hasil', 'desc')
        ->get();

        return response()->json($ranking);
    }


    public function pembagiProses(){
            // Mengambil semua data dari tabel 'kriteria'
        $data = Kriteria::where('id_user', Auth::user()->id)->get();

        // Inisialisasi variabel untuk menyimpan jumlah kuadrat dari kolom 'minat'
        $minat = 0;
        $waktu = 0;
        $pengalaman = 0;
        $bakat = 0;
        $prestasi = 0;

        // Menghitung jumlah kuadrat dari kolom 'minat' dan menjumlahkannya
        foreach ($data as $item) {
            $minat += pow($item->minat, 2);
            $waktu += pow($item->waktu, 2);
            $pengalaman += pow($item->pengalaman, 2);
            $bakat += pow($item->bakat, 2);
            $prestasi += pow($item->prestasi, 2);
        }

        // Menghitung akar kuadrat dari jumlah kuadrat 'minat'
        $akarKuadratMinat = sqrt($minat);
        $akarKuadratWaktu = sqrt($waktu);
        $akarKuadratPengalaman = sqrt($pengalaman);
        $akarKuadratBakat = sqrt($bakat);
        $akarKuadratPrestasi = sqrt($prestasi);

        Pembagi::create([
            'id_user' => Auth::user()->id,
            'minat' => $akarKuadratMinat,
            'waktu' => $akarKuadratWaktu,
            'pengalaman' => $akarKuadratPengalaman,
            'bakat' => $akarKuadratBakat,
            'prestasi' => $akarKuadratPrestasi,
        ]);

        $this->normalisasiMatriks();
        $this->normalisasiBobot();
        $this->prosesAplus();
        $this->prosesAminus();
        $this->prosesPluss();
        $this->prosesMinus();
        $this->ranking();

        return redirect('/ranking');

    }

    public function normalisasiMatriks(){
        $kriteria = Kriteria::where('id_user', Auth::user()->id)->get();
        $pembagi = Pembagi::where('id_user', Auth::user()->id)->first(); // Ambil satu baris pertama dari tabel pembagi

        $totalWaktu = 0; // Initialize the total waktu variable

        foreach ($kriteria as $key => $value) {
            $alternatif = $value->alternatif;

            // Add the current waktu value to the totalWaktu
            $totalWaktu += $value->waktu;

            // Calculate the akar kuadrat of the totalWaktu
            $akarKuadratWaktu = sqrt($totalWaktu);

            // Normalisasi minat, pengalaman, bakat, dan prestasi
            $minat = $value->minat / $pembagi->minat;
            $waktu = $akarKuadratWaktu;
            $pengalaman = $value->pengalaman / $pembagi->pengalaman;
            $bakat = $value->bakat / $pembagi->bakat;
            $prestasi = $value->prestasi / $pembagi->prestasi;



            Normalmatriks::create([
                'id_user' => Auth::user()->id,
                'alternatif' => $alternatif,
                'minat' => $minat,
                'waktu' => $waktu,
                'pengalaman' => $pengalaman,
                'bakat' => $bakat,
                'prestasi' => $prestasi,
            ]);
        }
    }


    public function normalisasiBobot(){
        $data =  Normalmatriks::where('id_user', Auth::user()->id)->get();
        $bobot = Bobot::first();

        foreach($data as $key => $value){
            $alternatif = $value->alternatif;

            $minat = $value->minat * $bobot->minat;
            $pengalaman = $value->pengalaman * $bobot->pengalaman;
            $bakat = $value->bakat * $bobot->bakat;
            $prestasi = $value->prestasi * $bobot->prestasi;

            Normalbobot::create([
                'id_user' => Auth::user()->id,
                'alternatif' => $alternatif,
                'minat' => $minat,
                'pengalaman' => $pengalaman,
                'bakat' => $bakat,
                'prestasi' => $prestasi,
            ]);

        }
    }

    public function prosesAplus(){
        $idUSer = Auth::user()->id;
        $minat = Normalbobot::where('id_user', Auth::user()->id)->max('minat');
        $pengalaman = Normalbobot::where('id_user', Auth::user()->id)->max('pengalaman');
        $bakat = Normalbobot::where('id_user', Auth::user()->id)->max('bakat');
        $prestasi = Normalbobot::where('id_user', Auth::user()->id)->max('prestasi');

        Aplus::create([
            'id_user' => $idUSer,
            'minat' => $minat,
            'pengalaman' => $pengalaman,
            'bakat' => $bakat,
            'prestasi' => $prestasi
        ]);


    }

    public function prosesAminus(){
        $idUSer = Auth::user()->id;
        $minat = Normalbobot::where('id_user', Auth::user()->id)->min('minat');
        $pengalaman = Normalbobot::where('id_user', Auth::user()->id)->min('pengalaman');
        $bakat = Normalbobot::where('id_user', Auth::user()->id)->min('bakat');
        $prestasi = Normalbobot::where('id_user', Auth::user()->id)->min('prestasi');

        Aminus::create([
            'id_user' => $idUSer,
            'minat' => $minat,
            'pengalaman' => $pengalaman,
            'bakat' => $bakat,
            'prestasi' => $prestasi
        ]);
    }


    public function ranking(){
            // Ambil semua nilai positif dari model Plus
        $plusValues = Plus::where('id_user', Auth::user()->id)->get();

        // Ambil semua nilai negatif dari model Minus
        $minusValues = Minus::where('id_user', Auth::user()->id)->get();

        // Lakukan perhitungan TOPSIS untuk setiap alternatif
        foreach ($plusValues as $key => $plus) {
            // Ambil nilai positif dan negatif untuk alternatif saat ini
            $positiveValues = $plus->hasil;
            $negativeValues = $minusValues[$key]->hasil;

            // Hitung preferensi TOPSIS
            $pref = $negativeValues / ($negativeValues + $positiveValues);

            // Simpan hasil peringkat ke dalam model Rangking
            Rangking::create([
                'id_user' => Auth::user()->id,
                'alternatif' => $plus->alternatif,
                'hasil' => $pref,
            ]);
        }
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
        // $data = Ekskul::groupBy('alternatif')
        //     ->select('alternatif',
        //             DB::raw('SUM(minat) as total_minat'),
        //             DB::raw('SUM(pengalaman) as total_pengalaman'),
        //             DB::raw('SUM(bakat) as total_bakat'),
        //             DB::raw('SUM(prestasi) as total_prestasi'))->where('id_user', Auth::user()->id)
        //     ->get();


        $data = Ekskul::where('id_user', Auth::user()->id)->get();


            foreach ($data as $item) {
                Kriteria::create([
                    'id_user' => Auth::user()->id,
                    'alternatif' => $item->alternatif,
                    'minat' => $item->minat,
                    'pengalaman' => $item->pengalaman,
                    'bakat' => $item->bakat,
                    'prestasi' => $item->prestasi,
                    // Pastikan untuk menyesuaikan kolom id_user dan timestamps sesuai kebutuhan Anda
                ]);
            }

        $this->prosesBobot();

        return redirect('/perhitungan');
    }

    public function prosesBobot(){

        $check = Bobot::count();

        if($check == 0){
            Bobot::create([
                'minat' => 0.4,
                'pengalaman' => 0.3,
                'bakat' => 0.2,
                'prestasi' => 0.1,
            ]);
        }

    }

    public function prosesPluss(){
        $data = Normalbobot::where('id_user', Auth::user()->id)->get();
        $aplus = Aplus::where('id_user', Auth::user()->id)->first();

        foreach($data as $key => $value){
            $idUSer = Auth::user()->id;

            $alternatif = $value->alternatif;

            $minatBobot = $value->minat;
            $aplusminat =$aplus->minat;

            $minatPengalaman = $value->pengalaman;
            $apluspengalaman = $aplus->pengalaman;

            $minatBakat = $value->bakat;
            $aplusbakat = $aplus->bakat;

            $minatprestasi = $value->prestasi;
            $aplusprestasi = $aplus->prestasi;

            $hasil = sqrt(pow($minatBobot - $aplusminat, 2) + pow($minatPengalaman - $apluspengalaman, 2) + pow($minatBakat - $aplusbakat, 2) + pow($minatprestasi - $aplusprestasi, 2));

            Plus::create([
                'id_user' => $idUSer,
                'alternatif' => $alternatif,
                'hasil' => $hasil,
            ]);

        }
    }

    public function prosesMinus(){
        $data = Normalbobot::where('id_user', Auth::user()->id)->get();
        $aminus = Aminus::where('id_user', Auth::user()->id)->first();

        foreach($data as $key => $value){
            $idUSer = Auth::user()->id;

            $alternatif = $value->alternatif;

            $minatBobot = $value->minat;
            $aplusminat =$aminus->minat;

            $minatPengalaman = $value->pengalaman;
            $apluspengalaman = $aminus->pengalaman;

            $minatBakat = $value->bakat;
            $aplusbakat = $aminus->bakat;

            $minatprestasi = $value->prestasi;
            $aplusprestasi = $aminus->prestasi;

            $hasil = sqrt(pow($minatBobot - $aplusminat, 2) + pow($minatPengalaman - $apluspengalaman, 2) + pow($minatBakat - $aplusbakat, 2) + pow($minatprestasi - $aplusprestasi, 2));

            Minus::create([
                'id_user' => $idUSer,
                'alternatif' => $alternatif,
                'hasil' => $hasil,
            ]);

        }
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
    public function destroy()
    {
        Kriteria::where('id_user', Auth::user()->id)->delete();
        Normalmatriks::where('id_user', Auth::user()->id)->delete();
        Pembagi::where('id_user', Auth::user()->id)->delete();
        Normalbobot::where('id_user', Auth::user()->id)->delete();
        Aplus::where('id_user', Auth::user()->id)->delete();
        Aminus::where('id_user', Auth::user()->id)->delete();
        Plus::where('id_user', Auth::user()->id)->delete();
        Minus::where('id_user', Auth::user()->id)->delete();;
        Rangking::where('id_user', Auth::user()->id)->delete();

        return redirect('/perhitungan');
    }
}
