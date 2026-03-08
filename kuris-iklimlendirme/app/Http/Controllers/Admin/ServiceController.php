<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Setting;

class ServiceController extends Controller
{
   public function update(Request $request)
{
   // 1) Hizmetleri güncelle
    if ($request->has('services')) {
        foreach ($request->services as $index => $serviceData) {

            if (empty($serviceData['title'])) continue;

            $imagePath = null;

            if ($request->hasFile("services.$index.image")) {
                $file = $request->file("services.$index.image");
                $imagePath = $file->store('services', 'public');
            }

            Service::updateOrCreate(
                ['id' => $serviceData['id']],
                [
                    'name'        => $serviceData['title'],
                    'title'       => $serviceData['title'],
                    'description' => $serviceData['description'] ?? null,
                    'icon'        => $serviceData['icon'] ?? null,
                    'features'    => $serviceData['features'] ?? null,
                    'image'       => $imagePath ?? ($serviceData['image'] ?? null),
                    'base_price'   => 0
                ]
            );
        }
    }

    // 2) Sayfa başlığı ve açıklamasını kaydet
    if ($request->has('page_title')) {
        Setting::updateOrCreate(
            ['key' => 'services_page_title'],
            ['value' => $request->page_title]
        );
    }

    if ($request->has('page_description')) {
        Setting::updateOrCreate(
            ['key' => 'services_page_description'],
            ['value' => $request->page_description]
        );
    }

    return back()->with('success', 'Hizmetler başarıyla güncellendi.');
}
}