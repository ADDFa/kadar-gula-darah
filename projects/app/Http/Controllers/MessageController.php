<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Models\User;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::with('user');
        if ((session('role') !== 'dokter')) $messages = $messages->where('user_id', session('user_id'));

        $data = [
            'title'     => 'Obrolan | Kadar Gula Darah',
            'messages'  => $messages->get(),
            'patients'  => User::all(['id', 'name'])
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
        $messages = Message::with('user')->where('messages.id', '>', $message->id);
        if ((session('role') !== 'dokter')) $messages = $messages->where('user_id', session('user_id'));

        return response()->json($messages->get());
    }
}
