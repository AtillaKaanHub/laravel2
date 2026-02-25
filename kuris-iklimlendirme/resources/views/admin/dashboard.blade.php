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

           <button onclick="showSection('site', this)"class="sidebar-link w-full text-left px-4 py-3 rounded-lg hover:bg-gray-800 transition">
                <i class="fa-solid fa-gear mr-2"></i> Site Yönetimi
            </button>

        </nav>

        <div class="p-4 border-t border-gray-800">
            <button onclick="logout()" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg">
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

        <div class="mt-4">
            <button class="bg-green-500 text-white px-4 py-2 rounded-lg mr-2">
                Onayla
            </button>
            <button class="bg-red-500 text-white px-4 py-2 rounded-lg">
                Sil
            </button>
        </div>
    </div>
    @endforeach
</div>
        <!-- SITE YONETIM -->
        <div id="site" class="hidden">

            <h1 class="text-2xl font-bold mb-6">Site İçerik Yönetimi</h1>

            <div class="bg-white p-6 rounded-2xl shadow">

                <label class="block mb-2 font-semibold">Ana Sayfa Başlık</label>
                <input type="text" class="w-full border p-3 rounded-lg mb-4">

                <label class="block mb-2 font-semibold">Alt Açıklama</label>
                <textarea class="w-full border p-3 rounded-lg mb-4" rows="4"></textarea>

                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg">
                    Kaydet
                </button>

            </div>

        </div>

    </main>
</div>

<script>

function showSection(id, element){

    let sections = ['dashboard','teklifler','yorumlar','site'];
    let links = document.querySelectorAll('.sidebar-link');

    sections.forEach(sec=>{
        document.getElementById(sec).classList.add('hidden');
    });

    document.getElementById(id).classList.remove('hidden');

    links.forEach(link=>link.classList.remove('active'));
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
        window.location.href = "login.html";
    }
}

</script>
<script>
function toggleDetail(id) {
    document.getElementById('detail-' + id).classList.toggle('hidden');
}
</script>
</body>
</html>