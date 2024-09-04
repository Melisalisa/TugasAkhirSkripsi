@extends('dashboard.layouts')

@section('pages')

<!-- Recent Sales Start -->
<div class="col-sm-12 col-xl-12 mt-4 pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h6 class="mb-4">Pilih Peminatan Anda</h6>
        <form action="/simpan-voting" method="post">
        @csrf
        <div class="form-floating mb-3">
            <select name="alternatif" class="form-select" id="floatingSelect"
                aria-label="Floating label select example" required>
                <option selected disabled>Pilih Minat Ekstrakulikuler</option>
                @foreach ($alternatif as $item)
                @php
                // Query untuk mengecek apakah pengguna sudah memilih alternatif ini sebelumnya
                $selected = App\Models\Ekskul::where('id_user', Auth::id())
                                                ->where('alternatif', $item->alternatif)
                                                ->exists();
                @endphp
                {{-- Hanya menampilkan opsi jika belum dipilih sebelumnya --}}
                @unless($selected)
                    <option value="{{ $item->alternatif }}">{{ $item->alternatif }}</option>
                @endunless
                    {{-- <option value={{ $item->alternatif }}>{{ $item->alternatif }}</option> --}}
                @endforeach
            </select>
            <label for="floatingSelect">Wajib untuk diisi!</label>
        </div>
        <div class="form-floating mb-3">
            <select name="minat" class="form-select" id="floatingSelect"
            aria-label="Floating label select example" required>
                <option selected disabled>Apakah Anda Minat Mengikuti Kegiatan Ekstrakulikuler?</option>
                <option value="1">Kurang : 1</option>
                <option value="2">Cukup : 2</option>
                <option value="3">Baik : 3</option>
                <option value="4">Sangat : 4</option>
            </select>
            <label for="floatingSelect">Wajib untuk diisi!</label>
        </div>
        <div class="form-floating mb-3">
            <select name="pengalaman" class="form-select" id="floatingSelect"
                aria-label="Floating label select example" required>
                <option selected disabled>Apakah Anda Memiliki Pengalaman?</option>
                <option value="1">Kurang : 1</option>
                <option value="2">Cukup : 2</option>
                <option value="3">Baik : 3</option>
                <option value="4">Sangat : 4</option>
            </select>
            <label for="floatingSelect">Wajib untuk diisi!</label>
        </div>
        <div class="form-floating mb-3">
            <select name="bakat" class="form-select" id="floatingSelect"
                aria-label="Floating label select example" required>
                <option selected disabled>Apakah Anda Memiliki Bakat?</option>
                <option value="1">Kurang : 1</option>
                <option value="2">Cukup : 2</option>
                <option value="3">Baik : 3</option>
                <option value="4">Sangat : 4</option>
            </select>
            <label for="floatingSelect">Wajib untuk diisi!</label>
        </div>
        <div class="form-floating mb-3">
            <select name="prestasi" class="form-select" id="floatingSelect"
                aria-label="Floating label select example" required>
                <option selected disabled>Apakah Anda Memiliki Prestasi di Bidang Tersebut?</option>
                <option value="1">Kurang : 1</option>
                <option value="2">Cukup : 2</option>
                <option value="3">Baik : 3</option>
                <option value="4">Sangat : 4</option>
            </select>
            <label for="floatingSelect">Wajib untuk diisi!</label>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>

@endsection
