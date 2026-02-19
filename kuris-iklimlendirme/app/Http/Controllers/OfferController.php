<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\PlaceType;

class OfferController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $places = PlaceType::all();

        return view('teklif-al', compact('services', 'places'));
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
