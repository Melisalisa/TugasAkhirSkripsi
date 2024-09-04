@extends('dashboard.layouts')

@section('pages')

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">

</div>
<!-- Sales Chart End -->
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Tabel Peminatan Ekskul</h6>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropPlus">
                Reset Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdropPlus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Proses data saat ini?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/voting-clear">
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
                        <th scope="col">Aksi</th>
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
                        <td>
                            {{-- Edit --}}
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdropPlusEdit{{$item->id}}">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdropPlusEdit{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Minat Ekskul?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/voting-edit/{{$item->id}}">
                                            @csrf
                                            @method('put')
                                            <div class="mb-2">
                                                <label for="floatingSelectMinat">Minat</label>
                                                <select name="minat" class="form-select" id="floatingSelectMinat"
                                                aria-label="Floating label select example" required>
                                                    <option selected disabled>Apakah Anda Minat Mengikuti Kegiatan Ekstrakulikuler?</option>
                                                    <option value="1" {{ $item->minat == 1 ? 'selected' : ''  }}>Kurang : 1</option>
                                                    <option value="2" {{ $item->minat == 2 ? 'selected' : ''  }}>Cukup : 2</option>
                                                    <option value="3" {{ $item->minat == 3 ? 'selected' : ''  }}>Baik : 3</option>
                                                    <option value="4" {{ $item->minat == 4 ? 'selected' : ''  }}>Sangat : 4</option>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label for="floatingSelectMinat">Pengalaman</label>
                                                <select name="pengalaman" class="form-select" id="floatingSelectMinat"
                                                aria-label="Floating label select example" required>
                                                    <option selected disabled>Apakah Anda Memiliki Pengalaman?</option>
                                                    <option value="1" {{ $item->pengalaman == 1 ? 'selected' : ''  }}>Kurang : 1</option>
                                                    <option value="2" {{ $item->pengalaman == 2 ? 'selected' : ''  }}>Cukup : 2</option>
                                                    <option value="3" {{ $item->pengalaman == 3 ? 'selected' : ''  }}>Baik : 3</option>
                                                    <option value="4" {{ $item->pengalaman == 4 ? 'selected' : ''  }}>Sangat : 4</option>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label for="floatingSelectMinat">Bakat</label>
                                                <select name="bakat" class="form-select" id="floatingSelectMinat"
                                                aria-label="Floating label select example" required>
                                                    <option selected disabled>Apakah Anda Memiliki Bakat?</option>
                                                    <option value="1" {{ $item->bakat == 1 ? 'selected' : ''  }}>Kurang : 1</option>
                                                    <option value="2" {{ $item->bakat == 2 ? 'selected' : ''  }}>Cukup : 2</option>
                                                    <option value="3" {{ $item->bakat == 3 ? 'selected' : ''  }}>Baik : 3</option>
                                                    <option value="4" {{ $item->bakat == 4 ? 'selected' : ''  }}>Sangat : 4</option>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label for="floatingSelectMinat">Prestasi?</label>
                                                <select name="prestasi" class="form-select" id="floatingSelectMinat"
                                                aria-label="Floating label select example" required>
                                                    <option selected disabled>Apakah Anda Memiliki prestasi?</option>
                                                    <option value="1" {{ $item->prestasi == 1 ? 'selected' : ''  }}>Kurang : 1</option>
                                                    <option value="2" {{ $item->prestasi == 2 ? 'selected' : ''  }}>Cukup : 2</option>
                                                    <option value="3" {{ $item->prestasi == 3 ? 'selected' : ''  }}>Baik : 3</option>
                                                    <option value="4" {{ $item->prestasi == 4 ? 'selected' : ''  }}>Sangat : 4</option>
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

                            {{-- Delete --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropPlusHapus{{$item->id}}">
                                Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdropPlusHapus{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Minat Ekskul?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/voting-hapus/{{$item->id}}">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
