<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teklif;

class TeklifController extends Controller
{
    public function store(Request $request)
    {
        // Basit fiyat hesaplama
        $pricePerMeter = match ($request->service) {
            'Split Klima' => 250,
            'VRF Sistem' => 400,
            'Tamir / Bakım' => 150,
            'Ücretsiz Keşif & Proje' => 0,
            default => 200,
        };

        $calculatedPrice = $request->square_meter * $pricePerMeter;

        Teklif::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'city' => $request->city,
            'service' => $request->service,
            'place_type' => $request->place_type,
            'square_meter' => $request->square_meter,
            'note' => $request->note,
            'calculated_price' => $calculatedPrice,
        ]);

        return back()->with('success', 'Teklifiniz başarıyla gönderildi!');
    }
}
