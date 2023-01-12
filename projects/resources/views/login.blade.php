@extends('partials.template')

@section('content')

<div class="vw-100 d-flex flex-column justify-content-center align-items-center min-vh-100">
    @if (session('loginFail') ?? false)
    <div class="alert alert-danger" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <div class="col-lg-4 bg-secondary p-5 rounded-2 text-white h-50">
        <h1 class="text-center fw-bold mb-3">Login</h1>

        <div class="col-lg-10 mx-auto">
            <form action="" method="POST">
                @csrf

                <label class="text-center w-100 mb-3">Masuk Untuk Memulai Sesi</label>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email" class="text-dark">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password" class="text-dark">Kata Sandi</label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary float-end">Masuk</button>
                </div>
            </form>

            <p>Belum Punya Akun? <a href="/registration" class="text-light">Daftar!</a></p>
        </div>
    </div>
</div>

@endsection