@extends('partials.template')

@section('content')

<div class="d-flex justify-content-center align-items-center vh-100 vw-100">
    <div class="col-lg-4 mx-auto my-5 border border-secondary p-5 rounded-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Ukur Kadar Gula Darah
                </li>
            </ol>
        </nav>

        <div class="col-lg-12 my-5">
            <h3 class="bg-primary text-light px-4 py-3 rounded-3">Ukur Kadar Gula Darah</h3>

            <form action="/sugar" method="POST" class="col-lg-11 mx-auto mt-5">
                @csrf
                <input type="hidden" name="user_id" value="{{ session('user_id') }}">

                <h3>Nama Pasien</h3>

                <div class="form-floating mb-3">
                    <input type="nama" class="form-control" name="patient_name" id="nama"
                        placeholder="Masukkan Nama Pasien" required>
                    <label for="nama" class="text-dark">Nama Pasien</label>
                </div>

                <div class="text-center my-4">
                    <h4 class="fs-1 fw-bold">
                        Kadar Gula Darah
                    </h4>
                    <input class="fs-1 fw-bold w-100 border-0 text-center" name="patient_sugar_level"
                        id="realtime-glukosa" value="0 mg/dl" />
                </div>

                <div class="text-center">
                    <button class="btn btn-primary fs-5">Simpan Data Pasien</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="/assets/js/index.bundle.js"></script>

@endsection