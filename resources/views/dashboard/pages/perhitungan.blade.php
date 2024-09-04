@extends('dashboard.layouts')

@section('pages')

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">

</div>
<!-- Sale & Revenue End -->

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap">
            <h6 class="mb-0">Data Ekstrakulikuler Anda</h6>

            @if ($dataExists)
                <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete">
                Hapus Perhitungan
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdropDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Proses data saat ini?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/hapus-perhitungan">
                            @csrf
                            @method('delete')
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Proses</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>


            @elseif(!$ekskulExist)

            <div class="alert alert-warning mt-2 mb-2" role="alert">
                Isi Data Ekstrakulikuler Anda terlebih dahulu! <a href="/voting">disini</a>
            </div>


            @else
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Proses Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Proses data saat ini?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/proses-aktual">
                            @csrf
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Proses</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            @endif

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
            <h6 class="mb-0">Bobot</h6>
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
                    @foreach ($bobotData as $item)
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

@endsection
