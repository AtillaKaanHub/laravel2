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
            'mesaj' => 'required',
            'puan' => 'required|integer|min:1|max:5'
        ]);

        Yorum::create([
            'ad' => $request->ad,
            'mesaj' => $request->mesaj,
            'puan' => $request->puan,
            'onay' => false
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Yorumunuz başarıyla alındı!'
        ]);
    }
}