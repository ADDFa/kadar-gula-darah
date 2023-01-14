@extends('partials.template')

@section('content')

<div class="col-lg-10 mx-auto my-5">
    <h1 class="mb-4">Obrolan</h1>

    <div class="row align-content-between" style="min-height: 75vh">
        <ul class="list-group p-0 mb-5" id="messages" data-role="{{ session('role') }}">
            @foreach ($messages as $message)
            @php

            $color = 'success';
            $position = 'start';
            $messageTitle = 'Saya';

            if (session('role') === 'dokter') {
            if (!$message->is_dokter) {
            $color = 'primary';
            $position = 'end';
            $messageTitle = $message->user->name;
            }
            } else {
            if ($message->is_dokter) {
            $color = 'primary';
            $position = 'end';
            $messageTitle = 'Dokter';
            }
            }

            $lastMessage = $message->id;

            @endphp
            <li class="list-group-item 
            list-group-item-{{ $color }} d-flex flex-column align-items-{{ $position }}">
                <span class="text-secondary" style="font-size: 12px">
                    {{$messageTitle . ' | ' . date('H.i', $message->times) }}
                </span>
                {{ $message->message }}
            </li>
            @endforeach
        </ul>

        <form class="form-floating p-0 d-flex flex-column align-items-end" data-last-message="{{ $lastMessage ?? '' }}">
            @csrf

            <input type="hidden" name="is_dokter" value="{{ (session('role') === 'dokter') ? 1 : 0 }}" />

            @if (session('role') === 'dokter')

            <div class="mb-3 w-100">
                <label for="user_id" class="form-label">Pilih Pasien</label>
                <select name="user_id" id="user_id" class="form-select">
                    @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            @else

            <input type="hidden" name="user_id" value="{{ session('user_id') }}" />

            @endif

            <div class="form-floating w-100 mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="messageTA" style="height: 100px"
                    name="message"></textarea>
                <label for="messageTA">Ketik Pesan</label>
            </div>

            <button class="btn btn-primary" id="send-message">Kirim</button>
        </form>
    </div>
</div>

<script src="/assets/js/pages/messages.js"></script>

@endsection