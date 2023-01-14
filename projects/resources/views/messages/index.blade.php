@extends('partials.template')

@section('content')

<div class="col-lg-10 mx-auto my-5">
    <h1 class="mb-4">Obrolan</h1>

    <div class="row align-content-between" style="min-height: 75vh">
        <ul class="list-group p-0 mb-5" id="messages" data-user-id="{{ session('user_id') }}">
            @foreach ($messages as $message)
            @php

            $itsMe = $message->user_id === session('user_id');
            $lastMessage = $message->id;

            @endphp
            <li class="list-group-item 
            list-group-item-{{ $itsMe ? 'success' : 'primary' }}
            d-flex flex-column
            align-items-{{ $itsMe ? 'start' : 'end' }}">
                <span class="text-secondary" style="font-size: 12px">
                    @if ($message->is_dokter)
                    {{ $itsMe ? 'Saya' : 'Dokter : ' . $message->user->name }}
                    @else
                    {{ $itsMe ? 'Saya' : $message->user->name }}
                    @endif

                    | {{ date('h.i', $message->times) }}
                </span>
                {{ $message->message }}
            </li>
            @endforeach
        </ul>

        <form class="form-floating p-0 d-flex flex-column align-items-end" data-last-message="{{ $lastMessage ?? '' }}">
            @csrf

            <input type="hidden" name="user_id" value="{{ session('user_id') }}" />
            <input type="hidden" name="is_dokter" value="{{ (session('role') === 'dokter') ? 1 : 0 }}" />

            <textarea class="form-control mb-3" placeholder="Leave a comment here" id="floatingTextarea"
                style="resize: none;" name="message"></textarea>
            <label for="floatingTextarea">Ketik Pesan</label>
            <button class="btn btn-primary" id="send-message">Kirim</button>
        </form>
    </div>
</div>

<script src="/assets/js/pages/messages.js"></script>

@endsection