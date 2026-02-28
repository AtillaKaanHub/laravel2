<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        return view('admin.menu.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $setting->menu_home = $request->menu_home;
        $setting->menu_services = $request->menu_services;
        $setting->menu_corporate = $request->menu_corporate;
        $setting->menu_contact = $request->menu_contact;
        $setting->save();

        return back()->with('success', 'Menüler güncellendi!');
    }
}