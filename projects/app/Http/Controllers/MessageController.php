<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::with('user')->where('user_id', session('user_id'))->orWhere('is_dokter', 1)->get();
        $isDoc = session('role') === 'dokter';

        $data = [
            'title'     => 'Obrolan | Kadar Gula Darah',
            'messages'  => $isDoc ? Message::with('user')->get() : $messages
        ];

        return view('messages.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $data = $request->validated() + [
            'times'     => time()
        ];

        return response()->json(Message::create($data), 200);
    }

    public function messages(Message $message)
    {
        $doc = (session('role') === 'dokter') ? 0 : 1;

        $messages = Message::with('user')
            ->where('messages.id', '>', $message->id)
            ->where('is_dokter', $doc)
            ->get();

        return response()->json($messages);
    }
}
