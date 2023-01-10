@extends('partials.template')

@section('content')

<div class="d-flex justify-content-center align-items-center vh-100 vw-100">
    <div class="col-lg-4 mx-auto my-5 border border-secondary p-5 rounded-4 bg-secondary text-light">
        <h1 class="text-center fw-bold mb-3">Buat Akun</h1>

        <form action="/" method="POST">
            @csrf

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
                <label for="name" class="text-dark">Nama</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="email">
                <label for="email" class="text-dark">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                <label for="password" class="text-dark">Password</label>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="mb-3">
                <p>Belum Punya Akun?
                    <a href="/" class="text-light">Masuk!</a>
                </p>
            </div>
        </form>
    </div>
</div>

@endsection