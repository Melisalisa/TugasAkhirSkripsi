@extends('authentication.layouts')

@section('pages')

<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3>Sign Up</h3>
                </div>
                <form action="/daftar-akun" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="username" type="text" class="form-control" id="floatingText" placeholder="jhondoe">
                        <label for="floatingText">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Daftar</button>
                    <p class="text-center mb-0">Sudah Memiliki Akun? <a href="/">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
