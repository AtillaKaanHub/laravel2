<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kuriş Admin Panel</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body{
    font-family: 'Segoe UI', sans-serif;
}
.sidebar-link.active{
    background: linear-gradient(to right, #2563eb, #0891b2);
    color:white;
}
</style>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#0b1220] text-gray-300 flex flex-col">

        <div class="p-6 text-2xl font-bold text-white border-b border-gray-800">
            KURİŞ Admin
        </div>

        <nav class="flex-1 p-4 space-y-2">

           <button onclick="showSection('dashboard', this)" class="sidebar-link w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800 transition active">
                <i class="fa-solid fa-chart-line mr-2"></i> Dashboard
            </button>

           <button onclick="showSection('teklifler', this)" class="sidebar-link w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800 transition">
                <i class="fa-solid fa-file-signature mr-2"></i> Teklifler
            </button>

            <button onclick="showSection('yorumlar', this)"class="sidebar-link w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800 transition">
                <i class="fa-solid fa-star mr-2"></i> Yorumlar
            </button>

           <button onclick="toggleSubMenu('siteMenu')" 
        class="sidebar-link w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800 transition">
    <i class="fa-solid fa-gear mr-2"></i> Site Yönetimi
</button>

<!-- Alt Menü -->
<div id="siteMenu" class="ml-6 mt-2 space-y-2">
    
    <button onclick="showSection('hizmetler-panel', this)" 
        class="block w-full text-left px-4 py-2 rounded bg-gray-800 hover:bg-gray-700 text-white">
   Hizmetler
</button>
    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Kurumsal</a>
    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">İletişim</a>

    <!-- Menü Yönetimi -->
   <button onclick="showSection('menu', this)" 
        class="block w-full text-left px-4 py-2 rounded bg-gray-800 hover:bg-gray-700 text-white">
    Ana Sayfa
</button>
<button onclick="showSection('header-footer', this)"
class="block w-full text-left px-4 py-2 rounded bg-gray-800 hover:bg-gray-700 text-white">
    Header / Footer
</button>
</div>

        </nav>

        <div class="p-4 border-t border-gray-800">
          <button onclick="logout()" 
    class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg">
    <i class="fa-solid fa-right-from-bracket mr-2"></i> Çıkış Yap
</button>
        </div>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-8">

        <!-- DASHBOARD -->
        <div id="dashboard" class="section hidden">

            <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded-2xl shadow">
                    <p class="text-gray-500">Toplam Teklif</p>
                    <h2 class="text-3xl font-bold mt-2">24</h2>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <p class="text-gray-500">Onaylı Yorum</p>
                    <h2 class="text-3xl font-bold mt-2">12</h2>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow">
                    <p class="text-gray-500">Bekleyen Yorum</p>
                    <h2 class="text-3xl font-bold mt-2">5</h2>
                </div>

            </div>

        </div>

        <!-- TEKLIFLER -->
        <div id="teklifler" class="section hidden">

            <h1 class="text-2xl font-bold mb-6">Gelen Teklifler</h1>

            <div class="bg-white rounded-2xl shadow overflow-hidden">

                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="p-4">Ad</th>
                            <th>Telefon</th>
                            <th>Hizmet</th>
                            <th>Tarih</th>
                            <th>İşlem</th>
                        </tr>
                    </thead>

                   <tbody>
    @foreach($teklifler as $teklif)
    <tr class="border-b hover:bg-gray-50">
        <td class="p-4">{{ $teklif->name }}</td>
        <td>{{ $teklif->phone }}</td>
        <td>{{ $teklif->service }}</td>
        <td>{{ $teklif->created_at->format('d.m.Y') }}</td>
        <td>
           <button onclick="toggleDetail({{ $teklif->id }})" class="text-blue-600">
    Detay
</button>
            <form action="{{ route('admin.teklif.destroy', $teklif->id) }}" method="POST" class="inline" onsubmit="return confirm('Silmek istediğine emin misiniz?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 ml-3">
        Sil
    </button>
</form>
        </td>
    </tr>
    @endforeach
</tbody>

                </table>
                @foreach($teklifler as $teklif)
<div id="detail-{{ $teklif->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded w-96">
        <h2 class="text-xl font-bold mb-4">Teklif Detayı</h2>

        <p><strong>İsim:</strong> {{ $teklif->name }}</p>
        <p><strong>Telefon:</strong> {{ $teklif->phone }}</p>
        <p><strong>Email:</strong> {{ $teklif->email }}</p>
        <p><strong>Şehir:</strong> {{ $teklif->city }}</p>
        <p><strong>Hizmet:</strong> {{ $teklif->service }}</p>
        <p><strong>Alan:</strong> {{ $teklif->square_meter }} m²</p>
        <p><strong>Fiyat:</strong> {{ $teklif->calculated_price }} ₺</p>
        <p><strong>Not:</strong> {{ $teklif->note ?? '—' }}</p>

        <button onclick="toggleDetail({{ $teklif->id }})" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">
            Kapat
        </button>
    </div>
</div>
@endforeach

            </div>

        </div>

        <!-- YORUMLAR -->
       <div id="yorumlar" class="section hidden">
    <h1 class="text-2xl font-bold mb-6">Yorum Yönetimi</h1>

   @foreach($yorumlar as $yorum)
<div class="bg-white p-6 rounded-2xl shadow mb-4">
    <strong>{{ $yorum->ad }}</strong>
    <p class="text-gray-600 mt-2">{{ $yorum->mesaj }}</p>

    <div class="mt-4 flex">

        @if(!$yorum->onay)
        <form action="{{ route('yorum.onayla', $yorum->id) }}" method="POST" class="mr-2">
            @csrf
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">
                Onayla
            </button>
        </form>
        @endif

        <form action="{{ route('yorum.sil', $yorum->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">
                Sil
            </button>
        </form>

    </div>
</div>
@endforeach

    <h2 class="text-xl font-bold mt-10 mb-4">Gelen Mesajlar</h2>

<table class="w-full border">
    <thead>
        <tr class="bg-gray-100">
            <th class="p-2">Ad</th>
            <th class="p-2">Telefon</th>
            <th class="p-2">Mesaj</th>
            <th class="p-2">Tarih</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mesajlar as $mesaj)
        <tr class="border-b">
            <td class="p-2">{{ $mesaj->ad }}</td>
            <td class="p-2">{{ $mesaj->telefon }}</td>
            <td class="p-2">{{ $mesaj->mesaj }}</td>
            <td class="p-2">{{ $mesaj->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
        <!-- SITE YONETIM -->
       
<!-- ANA SAYFA YÖNETİMİ -->
<div id="menu" class="section hidden">

    <h1 class="text-2xl font-bold mb-6">Header Menü Yönetimi</h1>
    <hr class="my-6">



    <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white p-6 rounded-2xl shadow">
        @csrf

        <label class="block mb-2 font-semibold">Ana Sayfa</label>
        <input type="text" name="menu_home"
               value="{{ $setting->menu_home ?? 'Ana Sayfa' }}"
               class="w-full border p-3 rounded-lg mb-4">

        <label class="block mb-2 font-semibold">Hizmetler</label>
        <input type="text" name="menu_services"
               value="{{ $setting->menu_services ?? 'Hizmetler' }}"
               class="w-full border p-3 rounded-lg mb-4">

        <label class="block mb-2 font-semibold">Kurumsal</label>
        <input type="text" name="menu_corporate"
               value="{{ $setting->menu_corporate ?? 'Kurumsal' }}"
               class="w-full border p-3 rounded-lg mb-4">

        <label class="block mb-2 font-semibold">İletişim</label>
        <input type="text" name="menu_contact"
               value="{{ $setting->menu_contact ?? 'İletişim' }}"
               class="w-full border p-3 rounded-lg mb-4">

        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg">
            Kaydet
        </button>
    </form>
    <!-- HERO YÖNEİM -->
<hr class="my-6">

<h2 class="text-xl font-bold mb-4">Hero Alanı Yönetimi</h2>

<form action="{{ route('admin.hero.update') }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="bg-white p-6 rounded-2xl shadow space-y-4">

    @csrf

    <label class="block font-semibold">Üst Rozet Yazısı</label>
    <input type="text" name="hero_badge"
           value="{{ $setting->hero_badge ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Ana Başlık</label>
    <input type="text" name="hero_title"
           value="{{ $setting->hero_title ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Açıklama</label>
    <textarea name="hero_description"
              class="w-full border p-3 rounded-lg">{{ $setting->hero_description ?? '' }}</textarea>

    <label class="block font-semibold">Buton Yazısı</label>
    <input type="text" name="hero_button_text"
           value="{{ $setting->hero_button_text ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Buton Linki</label>
    <input type="text" name="hero_button_link"
           value="{{ $setting->hero_button_link ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Telefon</label>
    <input type="text" name="hero_phone"
           value="{{ $setting->hero_phone ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Hero Görsel</label>
    <input type="file" name="hero_image"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Doğa Dostu Başlık</label>
    <input type="text" name="hero_feature_title"
           value="{{ $setting->hero_feature_title ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Doğa Dostu Alt Yazı</label>
    <input type="text" name="hero_feature_subtitle"
           value="{{ $setting->hero_feature_subtitle ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <button type="submit"
            class="bg-blue-600 text-white px-6 py-3 rounded-lg">
        Hero Alanını Kaydet
    </button>

</form>

<!-- hakkımızda YÖNEİM -->


<hr class="my-6">

<h2 class="text-xl font-bold mb-4">Hakkımızda Yönetimi</h2>

<form action="{{ route('admin.about.update') }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="bg-white p-6 rounded-2xl shadow space-y-4">

    @csrf

    <label class="block font-semibold">Başlık</label>
    <input type="text" name="about_title"
           value="{{ $setting->about_title ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Açıklama</label>
    <textarea name="about_description"
              class="w-full border p-3 rounded-lg">{{ $setting->about_description ?? '' }}</textarea>

    <label class="block font-semibold">Görsel</label>
    <input type="file" name="about_image"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Madde 1</label>
    <input type="text" name="about_item1"
           value="{{ $setting->about_item1 ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Madde 2</label>
    <input type="text" name="about_item2"
           value="{{ $setting->about_item2 ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <label class="block font-semibold">Madde 3</label>
    <input type="text" name="about_item3"
           value="{{ $setting->about_item3 ?? '' }}"
           class="w-full border p-3 rounded-lg">

    <button type="submit"
            class="bg-blue-600 text-white px-6 py-3 rounded-lg">
        Kaydet
    </button>
</form>
</div> 

<!-- HEADER/FOOTER YÖNEİM -->

<div id="header-footer"class="section hidden">

    <h1 class="text-2xl font-bold mb-6">Header & Footer Yönetimi</h1>
    
    <hr class="my-6">
    <h2 class="text-xl font-bold mb-4">Logo Yönetimi</h2>

    <form action="http://127.0.0.1:8000/admin/logo-update" method="POST" enctype="multipart/form-data" class="mb-8">
        <input type="hidden" name="_token" value="ljdcAbumpIMxWBt3caH1hDyx1q28dGUMjKCoYt1b" autocomplete="off">
        <label class="block mb-2 font-semibold">Logo Yükle</label>
        <input type="file" name="logo" class="w-full border p-3 rounded-lg mb-4">
        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg">
            Logoyu Kaydet
        </button>
    </form>

    <hr class="my-6">
    <h2 class="text-xl font-bold mb-4">Menü Linkleri</h2>

    <form action="http://127.0.0.1:8000/admin/settings" method="POST" class="bg-white p-6 rounded-2xl shadow">
        <input type="hidden" name="_token" value="ljdcAbumpIMxWBt3caH1hDyx1q28dGUMjKCoYt1b" autocomplete="off">
        
        <label class="block mb-2 font-semibold">Ana Sayfa</label>
        <input type="text" name="menu_home" value="Ana Sayfa" class="w-full border p-3 rounded-lg mb-4">

        <label class="block mb-2 font-semibold">Hizmetler</label>
        <input type="text" name="menu_services" value="Hizmetler" class="w-full border p-3 rounded-lg mb-4">

        <label class="block mb-2 font-semibold">Kurumsal</label>
        <input type="text" name="menu_corporate" value="Kurumsal" class="w-full border p-3 rounded-lg mb-4">

        <label class="block mb-2 font-semibold">İletişim</label>
        <input type="text" name="menu_contact" value="İletişim" class="w-full border p-3 rounded-lg mb-4">

        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg">
            Kaydet
        </button>
    </form>
    <hr class="my-8">
    
    <h1 class="text-2xl font-bold mb-6">Footer Yönetimi</h1>

    <form action="http://127.0.0.1:8000/admin/footer-update" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow space-y-6">
        <input type="hidden" name="_token" value="ljdcAbumpIMxWBt3caH1hDyx1q28dGUMjKCoYt1b" autocomplete="off">

        <div>
            <h3 class="text-lg font-bold border-b pb-2 mb-4 text-gray-700">Firma Bilgileri & İletişim</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 font-semibold">Firma Adı (Logonun Yanındaki)</label>
                    <input type="text" name="footer_company_name" value="KURİŞ" class="w-full border p-3 rounded-lg">
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Firma Açıklaması</label>
                    <textarea name="footer_description" class="w-full border p-3 rounded-lg h-12">İklimlendirme sektöründe güven ve kalitenin adresi. Eviniz ve iş yeriniz için modern, enerji tasarruflu ve çevre dostu çözümler.</textarea>
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Adres Metni</label>
                    <input type="text" name="footer_address_text" value="Hürriyet, İsmet İnönü Blv. no:111/A, Yenişehir/Mersin" class="w-full border p-3 rounded-lg">
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Adres Harita Linki</label>
                    <input type="text" name="footer_address_link" value="https://www.google.com/maps/search/?api=1&query=Hürriyet,+İsmet+İnönü+Blv.+no:111/A,+33120+Yenişehir/Mersin" class="w-full border p-3 rounded-lg">
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Telefon Numarası</label>
                    <input type="text" name="footer_phone" value="+90 501 030 3361" class="w-full border p-3 rounded-lg">
                </div>
                <div>
                    <label class="block mb-2 font-semibold">E-Posta Adresi</label>
                    <input type="text" name="footer_email" value="info@kurisiklim.com" class="w-full border p-3 rounded-lg">
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-lg font-bold border-b pb-2 mb-4 mt-4 text-gray-700">Çalışma Saatleri</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block mb-2 font-semibold">Hafta İçi Saatleri</label>
                    <input type="text" name="footer_hours_weekday" value="08:00 - 19:00" class="w-full border p-3 rounded-lg">
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Cumartesi Saatleri</label>
                    <input type="text" name="footer_hours_saturday" value="08:00 - 19:00" class="w-full border p-3 rounded-lg">
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Pazar Durumu</label>
                    <input type="text" name="footer_hours_sunday" value="Kapalı" class="w-full border p-3 rounded-lg">
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-lg font-bold border-b pb-2 mb-4 mt-4 text-gray-700">Hızlı Linkler Listesi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <label class="block font-semibold">Hizmetler Listesi (Virgülle Ayırın)</label>
                    <input type="text" name="footer_services_list" value="Split Klima, VRF Sistemleri, Kombi Bakım" class="w-full border p-3 rounded-lg">
                    <p class="text-xs text-gray-500">Örn: Split Klima, VRF Sistemleri, Kombi Bakım</p>
                </div>
                <div class="space-y-3">
                    <label class="block font-semibold">Kurumsal Listesi (Virgülle Ayırın)</label>
                    <input type="text" name="footer_corporate_list" value="Hakkımızda, Belgelerimiz" class="w-full border p-3 rounded-lg">
                    <p class="text-xs text-gray-500">Örn: Hakkımızda, Belgelerimiz</p>
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-lg font-bold border-b pb-2 mb-4 mt-4 text-gray-700">Alt Bilgi & Sosyal Medya</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="md:col-span-3">
                    <label class="block mb-2 font-semibold">Telif Hakkı Metni (Copyright)</label>
                    <input type="text" name="footer_copyright" value="© 2024 Kuriş İklimlendirme. Tüm hakları saklıdır." class="w-full border p-3 rounded-lg">
                </div>
                <div class="md:col-span-1">
                    <label class="block mb-2 font-semibold">Facebook Linki</label>
                    <input type="text" name="footer_social_facebook" value="https://www.facebook.com/4mevsimiklimlendirme/?locale=pa_IN" class="w-full border p-3 rounded-lg">
                </div>
                <div class="md:col-span-1">
                    <label class="block mb-2 font-semibold">Instagram Linki</label>
                    <input type="text" name="footer_social_instagram" value="https://www.instagram.com/kurisiklimlendirme/" class="w-full border p-3 rounded-lg">
                </div>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-lg transition-colors">
                Footer Bilgilerini Kaydet
            </button>
        </div>

    </form>

</div>
<div id="hizmetler-panel" class="section hidden">
    <h1 class="text-2xl font-bold mb-6">Hizmetler Yönetimi</h1>

   <form action="{{ url('/admin/services-update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow space-y-6">
    @csrf

    <div>
        <h3 class="text-lg font-bold border-b pb-2 mb-4 text-gray-700">Genel Bilgiler</h3>
        <label class="block mb-2 font-semibold">Sayfa Başlığı</label>
        <input type="text" name="page_title" value="{{ $settings->page_title ?? 'Hizmetlerimiz' }}" class="w-full border p-3 rounded-lg mb-4 outline-none focus:border-blue-500">

        <label class="block mb-2 font-semibold">Sayfa Açıklaması</label>
        <textarea name="page_description" class="w-full border p-3 rounded-lg h-20 outline-none focus:border-blue-500">{{ $settings->page_description ?? 'Eviniz ve iş yeriniz için sunduğumuz profesyonel iklimlendirme çözümlerini keşfedin.' }}</textarea>
    </div>

    <hr class="my-4 border-gray-200">

    <div>
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h3 class="text-lg font-bold text-gray-700">Hizmetler Listesi</h3>
            <button type="button" class="bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600 transition">
                + Yeni Hizmet Ekle
            </button>
        </div>

        <div class="service-item mb-6 p-4 border border-gray-200 bg-gray-50 rounded-lg">
            <input type="hidden" name="services[0][id]" value="{{ $services[0]->id ?? '' }}">

            <label class="block mb-2 font-semibold">Başlık</label>
            <input type="text" name="services[0][title]" value="{{ $services[0]->title ?? 'Ev Tipi Split Klimalar' }}" class="w-full border p-3 rounded-lg mb-2 outline-none focus:border-blue-500">

            <label class="block mb-2 font-semibold">Açıklama</label>
            <textarea name="services[0][description]" class="w-full border p-3 rounded-lg h-20 mb-2 outline-none focus:border-blue-500">{{ $services[0]->description ?? 'Evleriniz için en sessiz ve yüksek enerji tasarruflu duvar tipi klima çözümleri sunuyoruz. Keşiften montaja kadar tüm süreçte yanınızdayız.' }}</textarea>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                <div>
                    <label class="block mb-2 font-semibold">İkon (Font Awesome sınıfı)</label>
                    <input type="text" name="services[0][icon]" value="{{ $services[0]->icon ?? 'fa-house-chimney' }}" class="w-full border p-3 rounded-lg outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Görsel</label>
                    <input type="file" name="services[0][image]" class="w-full border p-2 rounded-lg bg-white outline-none focus:border-blue-500">
                </div>
            </div>

            <label class="block mb-2 font-semibold">Özellikler (virgülle ayır)</label>
            <input type="text" name="services[0][features]" value="{{ $services[0]->features ?? 'A++ Enerji Verimliliği,Sessiz Çalışma Modu,2 Yıl Montaj Garantisi' }}" class="w-full border p-3 rounded-lg outline-none focus:border-blue-500">
        </div>

        <div class="service-item mb-6 p-4 border border-gray-200 bg-gray-50 rounded-lg">
            <input type="hidden" name="services[1][id]" value="{{ $services[1]->id ?? '' }}">

            <label class="block mb-2 font-semibold">Başlık</label>
            <input type="text" name="services[1][title]" value="{{ $services[1]->title ?? 'Ticari VRF Sistemleri' }}" class="w-full border p-3 rounded-lg mb-2 outline-none focus:border-blue-500">

            <label class="block mb-2 font-semibold">Açıklama</label>
            <textarea name="services[1][description]" class="w-full border p-3 rounded-lg h-20 mb-2 outline-none focus:border-blue-500">{{ $services[1]->description ?? 'Plazalar, oteller, hastaneler ve büyük ofisler için merkezi iklimlendirme sistemleri. Tek merkezden tüm binayı kontrol edin.' }}</textarea>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                <div>
                    <label class="block mb-2 font-semibold">İkon (Font Awesome sınıfı)</label>
                    <input type="text" name="services[1][icon]" value="{{ $services[1]->icon ?? 'fa-building' }}" class="w-full border p-3 rounded-lg outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Görsel</label>
                    <input type="file" name="services[1][image]" class="w-full border p-2 rounded-lg bg-white outline-none focus:border-blue-500">
                </div>
            </div>

            <label class="block mb-2 font-semibold">Özellikler (virgülle ayır)</label>
            <input type="text" name="services[1][features]" value="{{ $services[1]->features ?? 'Yüksek Kapasite,Merkezi Kontrol Paneli,Projelendirme Hizmeti' }}" class="w-full border p-3 rounded-lg outline-none focus:border-blue-500">
        </div>

        <div class="service-item mb-6 p-4 border border-gray-200 bg-gray-50 rounded-lg">
            <input type="hidden" name="services[2][id]" value="{{ $services[2]->id ?? '' }}">

            <label class="block mb-2 font-semibold">Başlık</label>
            <input type="text" name="services[2][title]" value="{{ $services[2]->title ?? 'Teknik Servis & Bakım' }}" class="w-full border p-3 rounded-lg mb-2 outline-none focus:border-blue-500">

            <label class="block mb-2 font-semibold">Açıklama</label>
            <textarea name="services[2][description]" class="w-full border p-3 rounded-lg h-20 mb-2 outline-none focus:border-blue-500">{{ $services[2]->description ?? 'Klimalarınızın ömrünü uzatmak ve performansını artırmak için periyodik bakım hizmeti. Gaz dolumu, filtre temizliği ve arıza tespiti.' }}</textarea>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                <div>
                    <label class="block mb-2 font-semibold">İkon (Font Awesome sınıfı)</label>
                    <input type="text" name="services[2][icon]" value="{{ $services[2]->icon ?? 'fa-screwdriver-wrench' }}" class="w-full border p-3 rounded-lg outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Görsel</label>
                    <input type="file" name="services[2][image]" class="w-full border p-2 rounded-lg bg-white outline-none focus:border-blue-500">
                </div>
            </div>

            <label class="block mb-2 font-semibold">Özellikler (virgülle ayır)</label>
            <input type="text" name="services[2][features]" value="{{ $services[2]->features ?? '7/24 Acil Destek,Antibakteriyel Temizlik,Orijinal Yedek Parça' }}" class="w-full border p-3 rounded-lg outline-none focus:border-blue-500">
        </div>

        <div class="service-item mb-6 p-4 border border-gray-200 bg-gray-50 rounded-lg">
            <input type="hidden" name="services[3][id]" value="{{ $services[3]->id ?? '' }}">

            <label class="block mb-2 font-semibold">Başlık</label>
            <input type="text" name="services[3][title]" value="{{ $services[3]->title ?? 'Ücretsiz Keşif & Proje' }}" class="w-full border p-3 rounded-lg mb-2 outline-none focus:border-blue-500">

            <label class="block mb-2 font-semibold">Açıklama</label>
            <textarea name="services[3][description]" class="w-full border p-3 rounded-lg h-20 mb-2 outline-none focus:border-blue-500">{{ $services[3]->description ?? 'Mekana en uygun cihazı belirlemek için uzman ekibimizle ücretsiz keşif yapıyoruz. Doğru BTU hesabı ile tasarruf sağlayın.' }}</textarea>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
                <div>
                    <label class="block mb-2 font-semibold">İkon (Font Awesome sınıfı)</label>
                    <input type="text" name="services[3][icon]" value="{{ $services[3]->icon ?? 'fa-clipboard-check' }}" class="w-full border p-3 rounded-lg outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block mb-2 font-semibold">Görsel</label>
                    <input type="file" name="services[3][image]" class="w-full border p-2 rounded-lg bg-white outline-none focus:border-blue-500">
                </div>
            </div>

            <label class="block mb-2 font-semibold">Özellikler (virgülle ayır)</label>
            <input type="text" name="services[3][features]" value="{{ $services[3]->features ?? 'Yerinde İnceleme,Termal Analiz,Fiyat Performans Raporu' }}" class="w-full border p-3 rounded-lg outline-none focus:border-blue-500">
        </div>
    </div>

    <hr class="my-4 border-gray-200">

    <div>
        <h3 class="text-lg font-bold border-b pb-2 mb-4 text-gray-700">Nasıl Çalışıyoruz? (Süreç Adımları)</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                <div class="font-bold text-blue-600 mb-2">Adım 1</div>
                <input type="hidden" name="process[0][id]" value="{{ $process[0]->id ?? '' }}">
                <label class="block mb-1 text-sm font-semibold">Başlık</label>
                <input type="text" name="process[0][title]" value="{{ $process[0]->title ?? 'İletişim' }}" class="w-full border p-2 rounded mb-2 text-sm outline-none focus:border-blue-500">
                
                <label class="block mb-1 text-sm font-semibold">Açıklama</label>
                <textarea name="process[0][description]" class="w-full border p-2 rounded h-16 text-sm outline-none focus:border-blue-500">{{ $process[0]->description ?? 'Bize ulaşın ve talebinizi iletin.' }}</textarea>
            </div>

            <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                <div class="font-bold text-blue-500 mb-2">Adım 2</div>
                <input type="hidden" name="process[1][id]" value="{{ $process[1]->id ?? '' }}">
                <label class="block mb-1 text-sm font-semibold">Başlık</label>
                <input type="text" name="process[1][title]" value="{{ $process[1]->title ?? 'Keşif' }}" class="w-full border p-2 rounded mb-2 text-sm outline-none focus:border-blue-500">
                
                <label class="block mb-1 text-sm font-semibold">Açıklama</label>
                <textarea name="process[1][description]" class="w-full border p-2 rounded h-16 text-sm outline-none focus:border-blue-500">{{ $process[1]->description ?? 'Uzman ekibimiz yerinde inceleme yapar.' }}</textarea>
            </div>

            <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                <div class="font-bold text-cyan-500 mb-2">Adım 3</div>
                <input type="hidden" name="process[2][id]" value="{{ $process[2]->id ?? '' }}">
                <label class="block mb-1 text-sm font-semibold">Başlık</label>
                <input type="text" name="process[2][title]" value="{{ $process[2]->title ?? 'Montaj' }}" class="w-full border p-2 rounded mb-2 text-sm outline-none focus:border-blue-500">
                
                <label class="block mb-1 text-sm font-semibold">Açıklama</label>
                <textarea name="process[2][description]" class="w-full border p-2 rounded h-16 text-sm outline-none focus:border-blue-500">{{ $process[2]->description ?? 'Profesyonel ve temiz kurulum yapılır.' }}</textarea>
            </div>

            <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                <div class="font-bold text-green-500 mb-2">Adım 4</div>
                <input type="hidden" name="process[3][id]" value="{{ $process[3]->id ?? '' }}">
                <label class="block mb-1 text-sm font-semibold">Başlık</label>
                <input type="text" name="process[3][title]" value="{{ $process[3]->title ?? 'Teslim' }}" class="w-full border p-2 rounded mb-2 text-sm outline-none focus:border-blue-500">
                
                <label class="block mb-1 text-sm font-semibold">Açıklama</label>
                <textarea name="process[3][description]" class="w-full border p-2 rounded h-16 text-sm outline-none focus:border-blue-500">{{ $process[3]->description ?? 'Sistem test edilir ve teslim edilir.' }}</textarea>
            </div>
        </div>
    </div>

    <div class="pt-6 border-t mt-6">
        <button type="submit" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-lg transition-colors shadow-lg">
            Tüm Değişiklikleri Kaydet
        </button>
    </div>
    </form>
</div>
</main>

    </main>
</div>

<script>

function showSection(id, element){

    // TÜM sectionları gizle
    document.querySelectorAll('.section').forEach(section => {
        section.classList.add('hidden');
    });

    // Tıklananı göster
    let target = document.getElementById(id);
    if(target){
        target.classList.remove('hidden');
    }

    // Aktif buton stilini ayarla
    document.querySelectorAll('.sidebar-link').forEach(link => {
        link.classList.remove('active');
    });

    element.classList.add('active');
}


// TEKLİF SİL
function deleteRow(btn){
    if(confirm("Bu teklifi silmek istiyor musunuz?")){
        btn.closest("tr").remove();
    }
}


// TEKLİF DETAY
function toggleDetail(btn){

    let tr = btn.closest("tr");

    if(tr.nextElementSibling && tr.nextElementSibling.classList.contains("detail-row")){
        tr.nextElementSibling.remove();
        return;
    }

    let detailRow = document.createElement("tr");
    detailRow.classList.add("detail-row");

    detailRow.innerHTML = `
        <td colspan="5" class="p-4 bg-gray-50">
            <strong>Adres:</strong> İstanbul<br>
            <strong>Mesaj:</strong> Klima montaj fiyat bilgisi istiyorum.
        </td>
    `;

    tr.after(detailRow);
}


// YORUM ONAY
function approveComment(btn){
    let card = btn.closest(".bg-white");
    card.classList.add("border-2","border-green-500");
    btn.innerText = "Onaylandı";
    btn.disabled = true;
}


// YORUM SİL
function deleteComment(btn){
    if(confirm("Yorumu silmek istiyor musunuz?")){
        btn.closest(".bg-white").remove();
    }
}


// ÇIKIŞ
function logout(){
    if(confirm("Çıkış yapmak istiyor musunuz?")){
        window.location.href = "/login";
    }
}

</script>
<script>
function toggleDetail(id) {
    document.getElementById('detail-' + id).classList.toggle('hidden');
}
</script>

<script>
function toggleSubMenu(menuId) {
    const menu = document.getElementById(menuId);
    menu.classList.toggle("hidden");
}
</script>

</body>
</html>