@extends('dashboard.layouts')

@section('pages')

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">

</div>
<!-- Sale & Revenue End -->

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Normalisasi Terbobot</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Alternatif</th>
                        <th scope="col">Minat</th>
                        <th scope="col">Pengalaman</th>
                        <th scope="col">Bakat</th>
                        <th scope="col">Prestasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ $item->alternatif }}</td>
                        <td>{{ $item->minat }}</td>
                        <td>{{ $item->pengalaman }}</td>
                        <td>{{ $item->bakat }}</td>
                        <td>{{ $item->prestasi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">A+</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Minat</th>
                        <th scope="col">Pengalaman</th>
                        <th scope="col">Bakat</th>
                        <th scope="col">Prestasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aplus as $item)
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ $item->minat }}</td>
                        <td>{{ $item->pengalaman }}</td>
                        <td>{{ $item->bakat }}</td>
                        <td>{{ $item->prestasi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">A-</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Minat</th>
                        <th scope="col">Pengalaman</th>
                        <th scope="col">Bakat</th>
                        <th scope="col">Prestasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aminus as $item)
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ $item->minat }}</td>
                        <td>{{ $item->pengalaman }}</td>
                        <td>{{ $item->bakat }}</td>
                        <td>{{ $item->prestasi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Positif</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Alternatif</th>
                        <th scope="col">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plus as $item)
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ $item->alternatif }}</td>
                        <td>{{ $item->hasil }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Negatif</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Alternatif</th>
                        <th scope="col">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($minus as $item)
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ $item->alternatif }}</td>
                        <td>{{ $item->hasil }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
