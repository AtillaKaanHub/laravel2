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
    
    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Hizmetler</a>
    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">Kurumsal</a>
    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-700">İletişim</a>

    <!-- Menü Yönetimi -->
   <button onclick="showSection('menu', this)" 
        class="block w-full text-left px-4 py-2 rounded bg-gray-800 hover:bg-gray-700 text-white">
    Ana Sayfa
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
        <div id="dashboard">

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
        <div id="teklifler" class="hidden">

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
       <div id="yorumlar" class="hidden">
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
<div id="menu" class="hidden">

    <h1 class="text-2xl font-bold mb-6">Header Menü Yönetimi</h1>
    <hr class="my-6">

<h2 class="text-xl font-bold mb-4">Logo Yönetimi</h2>

<form action="{{ url('/admin/logo-update') }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="mb-8">

    @csrf

    <label class="block mb-2 font-semibold">Logo Yükle</label>

    <input type="file" 
           name="logo" 
           class="w-full border p-3 rounded-lg mb-4">

    <button type="submit" 
            class="bg-blue-600 text-white px-6 py-3 rounded-lg">
        Logoyu Kaydet
    </button>
</form>

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
</div>

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

    </main>
</div>

<script>

function showSection(id, element){
    // 'menu' id'sini bu listeye ekledik
    let sections = ['dashboard', 'teklifler', 'yorumlar', 'site', 'menu'];
    let links = document.querySelectorAll('.sidebar-link');

    sections.forEach(sec=>{
        // Eğer element varsa gizle (hata almamak için ufak bir güvenlik kontrolü)
        let sectionElement = document.getElementById(sec);
        if(sectionElement) {
            sectionElement.classList.add('hidden');
        }
    });

    // Sadece tıklanan id'yi göster
    let targetElement = document.getElementById(id);
    if(targetElement) {
        targetElement.classList.remove('hidden');
    }

    // Aktif class'ını ayarla
    links.forEach(link => link.classList.remove('active'));
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