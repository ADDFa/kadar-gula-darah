@extends('partials.template')

@section('content')

<div class="d-flex justify-content-center align-items-center vh-100 vw-100">
    <div class="col-lg-4 mx-auto my-5 border border-secondary p-5 rounded-4 bg-secondary bg-opacity-50 text-light">
        <h1 class="text-center fw-bold mb-3">Buat Akun</h1>

        <form action="/registration" method="POST">
            @csrf

            <div class="form-floating mb-3">
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                    name="name" placeholder="name" value="{{ old('name') }}" aria-describedby="nameFeedback">
                <label for="name" class="text-dark">Nama</label>
                <div class="invalid-feedback" id="nameFeedback">{{ $errors->first('name') }}</div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                    name="email" placeholder="email" value="{{ old('email') }}" value="{{ old('email') }}"
                    aria-describedby="emailFeedback">
                <label for="email" class="text-dark">Email</label>
                <div class="invalid-feedback" id="emailFeedback">{{ $errors->first('email') }}</div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    id="password" name="password" placeholder="password" aria-describedby="passwordFeedback">
                <label for="password" class="text-dark">Password</label>
                <div class="invalid-feedback" id="passwordFeedback">{{ $errors->first('password') }}</div>
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