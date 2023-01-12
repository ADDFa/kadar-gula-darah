@extends('partials.template')

{{-- navbar --}}
@section('search')
<form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
@endsection
{{-- navbar --}}

@section('content')

<div class="col-lg-8 mx-auto mt-5">
    <table class="table">
        <caption>Data Pasien Kadar Gula Darah</caption>

        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kadar Gula</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sugarLevels as $sugarLevel)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $sugarLevel->patient_name }}</td>
                <td>{{ $sugarLevel->patient_sugar_level }}</td>
                <td>{{ date('d-m-Y', $sugarLevel->datetime) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection