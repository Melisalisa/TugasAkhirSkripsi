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
            <h6 class="mb-0">Siswa</h6>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data Siswa
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Alternatif</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/tambah-siswa">
                            @csrf
                            <div class="mb-3">
                                <input name="nama" type="text" placeholder="Nama Siswa" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <input name="kelas" type="text" placeholder="Kelas" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="alternatif" id="alternatif">
                                    @foreach ($alternatif as $item)
                                    <option value="{{ $item->alternatif }}">{{ $item->alternatif }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">No</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Alternatif</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->alternatif }}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning m-2 btn btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit{{$item->id}}">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdropEdit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah data alternatif</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/edit-siswa/{{$item->id}}">
                                            @csrf
                                            @method('put')
                                            <div class="mb-3">
                                                <input name="nama" type="text" placeholder="Nama Siswa" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="{{ $item->nama_siswa }}">
                                            </div>
                                            <div class="mb-3">
                                                <input name="kelas" type="text" placeholder="Kelas" class="form-control" id="exampleInputPassword1" value="{{ $item->kelas }}">
                                            </div>
                                            <div class="mb-3">
                                                <select class="form-select" name="alternatif" id="alternatif">
                                                    @foreach ($alternatif as $alternatifval)
                                                    <option value="{{ $alternatifval->alternatif }}" {{ $item->alternatif == $alternatifval->alternatif ? 'selected' : '' }}>{{ $alternatifval->alternatif }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>


                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#staticBackdropHapus{{$item->id}}">
                                Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdropHapus{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus data siswa?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/siswa-hapus/{{$item->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
