<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   public function update(Request $request)
{
    // 1. Hizmetleri Kaydetme / Güncelleme
    if ($request->has('services')) {
        foreach ($request->services as $serviceData) {
            
            if (empty($serviceData['title'])) continue;

            Service::updateOrCreate(
                // ARTIK İSME GÖRE DEĞİL, ID'YE GÖRE ARIYORUZ:
                ['id' => $serviceData['id'] ?? null], 
                [
                    'name'        => $serviceData['title'],
                    'title'       => $serviceData['title'],
                    'description' => $serviceData['description'] ?? null,
                    'icon'        => $serviceData['icon'] ?? null,
                    'features'    => $serviceData['features'] ?? null,
                    'base_price'  => 0
                ]
            );
        }
    }

    // Not: Formda page_title ve process alanları da var. 
    // Onları da kaydetmek isterseniz kodlarını buraya eklemeliyiz.

    return back()->with('success', 'Hizmetler başarıyla güncellendi.');
}
}