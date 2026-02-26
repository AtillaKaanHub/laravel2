<?php

namespace App\Http\Controllers;
use App\Models\Yorum;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $yorumlar = Yorum::where('onay', 1)
                     ->latest()
                     ->take(6)
                     ->get();

    return view('home', compact('yorumlar'));
}
}
