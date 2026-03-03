<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teklif;
use App\Models\Yorum;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function teklifler()
{
    
    $teklifler = Teklif::latest()->get();
    return view('admin.teklifler', compact('teklifler'));
}

  public function destroy($id)
{
    $teklif = \App\Models\Teklif::findOrFail($id);
    $teklif->delete();

    return redirect()->back()->with('success', 'Teklif silindi');
}



    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role !== 'admin') {
                Auth::logout();
                return back()->with('error', 'Yetkisiz giriş!');
            }

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Email veya şifre yanlış!');
    }

    public function dashboard()
{
    $teklifler = Teklif::latest()->get();
    $yorumlar  = Yorum::latest()->get();
    $mesajlar  = Message::latest()->get();
    $setting   = Setting::first(); 

    return view('admin.dashboard', compact('teklifler','yorumlar','mesajlar','setting'));
}
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
    public function yorumlar()
{
    $yorumlar = Yorum::latest()->get();
    return view('admin.yorumlar', compact('yorumlar'));
}

public function mesajlar()
{
    $mesajlar = Message::latest()->get();
    return view('admin.mesajlar', compact('mesajlar'));
}

public function yorumOnayla($id)
{
    $yorum = Yorum::findOrFail($id);
    $yorum->onay = 1;
    $yorum->save();

    return back()->with('success', 'Yorum onaylandı.');
}

public function yorumSil($id)
{
    $yorum = Yorum::findOrFail($id);
    $yorum->delete();

    return back()->with('success', 'Yorum silindi.');
}

public function updateLogo(Request $request)
{
    $request->validate([
        'logo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('logos', 'public');

        $setting = Setting::firstOrCreate([]);
        $setting->logo = $logoPath;
        $setting->save();
    }

    return back()->with('success', 'Logo güncellendi.');
}
 public function heroUpdate(Request $request)
    {
        $settings = DB::table('settings')->first();

        DB::table('settings')->update([
            'hero_badge' => $request->hero_badge ?? $settings->hero_badge,
            'hero_title' => $request->hero_title ?? $settings->hero_title,
            'hero_description' => $request->hero_description ?? $settings->hero_description,
            'hero_button_text' => $request->hero_button_text ?? $settings->hero_button_text,
            'hero_button_link' => $request->hero_button_link ?? $settings->hero_button_link,
            'hero_phone' => $request->hero_phone ?? $settings->hero_phone,
            'hero_image' => $request->hasFile('hero_image') ? $request->file('hero_image')->store('hero','public') : $settings->hero_image,
            'hero_feature_title' => $request->hero_feature_title ?? $settings->hero_feature_title,
            'hero_feature_subtitle' => $request->hero_feature_subtitle ?? $settings->hero_feature_subtitle,
        ]);

        return back()->with('success', 'Hero alanı güncellendi!');
    }

    public function aboutUpdate(Request $request)
{
    $settings = Setting::firstOrCreate([]);

    $settings->about_title = $request->about_title;
    $settings->about_description = $request->about_description;
    $settings->about_item1 = $request->about_item1;
    $settings->about_item2 = $request->about_item2;
    $settings->about_item3 = $request->about_item3;

    if ($request->hasFile('about_image')) {
        $imageName = time().'.'.$request->about_image->extension();
        $request->about_image->move(public_path('uploads'), $imageName);

        $settings->about_image = 'uploads/'.$imageName;
    }

    $settings->save();

    return back()->with('success', 'Hakkımızda bölümü güncellendi');
}
}


class HeroController extends Controller
{
    public function updateHero(Request $request)
    {
        $settings = DB::table('settings')->first();

        DB::table('settings')->update([
            'hero_badge' => $request->hero_badge ?? $settings->hero_badge,
            'hero_title' => $request->hero_title ?? $settings->hero_title,
            'hero_description' => $request->hero_description ?? $settings->hero_description,
            'hero_button_text' => $request->hero_button_text ?? $settings->hero_button_text,
            'hero_button_link' => $request->hero_button_link ?? $settings->hero_button_link,
            'hero_phone' => $request->hero_phone ?? $settings->hero_phone,
            'hero_image' => $request->hasFile('hero_image') ? $request->file('hero_image')->store('hero','public') : $settings->hero_image,
            'hero_feature_title' => $request->hero_feature_title ?? $settings->hero_feature_title,
            'hero_feature_subtitle' => $request->hero_feature_subtitle ?? $settings->hero_feature_subtitle,
        ]);

        return back()->with('success', 'Hero alanı güncellendi!');
    }
}