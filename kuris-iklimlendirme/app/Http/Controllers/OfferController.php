<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\PlaceType;
use App\Models\Yorum;

class OfferController extends Controller
{
    public function index()
    {
        $services = Service::all();
    $places   = PlaceType::all();

    $yorumlar = Yorum::where('onay', 1)
                     ->latest()
                     ->take(3)
                     ->get();

    return view('teklif-al', compact('services', 'places', 'yorumlar'));
    }

    public function calculate(Request $request)
    {
        $service = Service::find($request->service_id);
        $place = PlaceType::find($request->place_id);
        $area = $request->area;

        if ($service->base_price == 0) {
            return response()->json(['price' => 0]);
        }

        $total = $service->base_price * $area * $place->multiplier;

        return response()->json(['price' => $total]);
    }
}
