<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yorum;

class YorumController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ad' => 'required',
            'mesaj' => 'required'
        ]);

        Yorum::create([
            'ad' => $request->ad,
            'mesaj' => $request->mesaj,
            'onay' => false
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Yorumunuz başarıyla alındı!'
        ]);
    }
}