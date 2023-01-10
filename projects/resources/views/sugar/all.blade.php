@extends('partials.template')

@section('content')

<div class="col-lg-8 mx-auto mt-5">
    <table class="table">
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