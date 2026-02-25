<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        Message::create([
            'ad' => $request->ad,
            'telefon' => $request->telefon,
            'mesaj' => $request->mesaj,
        ]);

        return back()->with('success', 'Mesajınız alındı!');
    }
}