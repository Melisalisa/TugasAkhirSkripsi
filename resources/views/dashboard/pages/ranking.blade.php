@extends('dashboard.layouts')

@section('pages')

<div class="container-fluid pt-4 px-4">
    <div class="col-md-12 col-xl-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Rekomendasi alternatif ektrakurikuler untuk {{ Auth::user()->name }}</h6>
            <canvas id="worldwide-sales"></canvas>
        </div>
    </div>
</div>

<!-- penambahan deskripsi  -->
<div class="container-fluid pt-4 px-4">
<div class="col-md-12 col-xl-12">
<div class="bg-light rounded h-100 p-4">
<div class="mb-0">
    Berdasarkan hasil rekomendasi pemilihan ekstrakurikuler yang terpilih sesuai dengan
    perhitungan yang diperoleh dari nilai pada setiap alternatif terhadap kriteria minat, pengalaman, bakat dan prestasi untuk
    <strong>{{ Auth::user()->name }}</strong> adalah <strong>{{ $ranking->first()->alternatif }}</strong>
</div>  
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Ranking</h6>   
        </div>   
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">No</th>
                        <th scope="col">Alternatif</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ranking as $item)
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->alternatif }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
