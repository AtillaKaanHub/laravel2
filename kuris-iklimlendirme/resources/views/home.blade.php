@extends('layouts.app')

@section('title','Kuriş İklimlendirme | Ferah Bir Yaşam İçin')



@section('styles')
    <style>
        /* --- EKSİK OLAN ANİMASYONLARI EKLEDİM --- */
        
        /* 1. Markalar Şeridi İçin Kayan Yazı Animasyonu */
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 20s linear infinite;
        }

        /* 2. Hero Görseli İçin Yüzme Efekti */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        /* --- GENEL AYARLAR --- */
        :root {
            --primary-blue: #0056b3;
            --accent-blue: #00a8cc;
            --gradient-bg: linear-gradient(135deg, #0056b3 0%, #00a8cc 100%);
            --white: #ffffff;
            --bg-light: #f0f8ff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* Header Özelleştirmesi */
        header {
            background-color: rgba(255, 255, 255, 0.95); /* Hafif şeffaflık modern durur */
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .custom-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-blue);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 25px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--accent-blue);
        }

        .btn-header {
            background: var(--gradient-bg);
            color: var(--white);
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
        }
    

        /* Hizmetler ve Diğer Bölümler */
        .section { padding: 80px 0; }
        .section-title { text-align: center; margin-bottom: 50px; }
        .section-title h2 { font-size: 2.5rem; color: var(--primary-blue); margin-bottom: 10px; }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: var(--white);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-align: center;
            border-bottom: 4px solid var(--accent-blue);
            transition: transform 0.3s;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-card i { font-size: 3rem; color: var(--accent-blue); margin-bottom: 20px; }
        
        .bg-blue { background-color: var(--bg-light); }
        
        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
            flex-wrap: wrap;
        }
        
        .about-image img { width: 100%; border-radius: 10px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        
        /* Mobil */
        @media (max-width: 768px) {
            .nav-links { display: none; }
        }
        

        @keyframes nefes-alma {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); } /* %5 Büyüme */
            100% { transform: scale(1); }
        }

        .nefes-efekti {
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .nefes-efekti:hover {
            animation: nefes-alma 2s infinite ease-in-out; 
        }

         /* Daha yavaş zıplama efekti */
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    .animate-bounce-slow {
        animation: bounce-slow 2s infinite;
    }



    </style>
    @endsection
    


    
@section('content')
    <section id="home" class="relative w-full min-h-screen flex items-center pt-28 pb-12 bg-gradient-to-br from-slate-50 to-blue-100 overflow-hidden">
    
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-blue-400/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-72 h-72 bg-cyan-400/20 rounded-full blur-3xl"></div>

@php
    $settings = \DB::table('settings')->first();
@endphp

<div class="custom-container mx-auto px-4 relative z-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        
        <div class="text-center md:text-left space-y-6">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold mb-2 border border-blue-200">
                <i class="fa-solid fa-star text-yellow-500 mr-1"></i> {{ $settings->hero_badge ?? '%100 Müşteri Memnuniyeti' }}
            </span>
            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight">
                {!! $settings->hero_title ?? 'Mevsimleri <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Kontrol Altına Alın</span>' !!}
            </h1>
            
            <p class="text-lg text-slate-600 md:pr-10">
                {{ $settings->hero_description ?? 'Eviniz ve iş yeriniz için en verimli ısıtma ve soğutma çözümleri. Konforunuzu profesyonel ellere bırakın.' }}
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start pt-4">
                <a href="{{ $settings->hero_button_link ?? url('/teklif-al') }}" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full shadow-lg hover:shadow-blue-500/30 transition transform hover:-translate-y-1">
                    {{ $settings->hero_button_text ?? 'Hemen Teklif Al' }}
                </a>
                <a href="tel:{{ $settings->hero_phone ?? '+905550000000' }}" class="px-8 py-4 bg-white hover:bg-gray-50 text-slate-800 font-bold rounded-full shadow-md border border-gray-200 transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-phone text-blue-600"></i> Bizi Arayın
                </a>
            </div>

            <div class="flex items-center justify-center md:justify-start gap-6 pt-6 text-sm text-slate-500 font-medium">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved text-blue-500 text-lg"></i> {{ $settings->hero_feature_title ?? '2 Yıl Garanti' }}
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-bolt text-yellow-500 text-lg"></i> {{ $settings->hero_feature_subtitle ?? 'Enerji Tasarrufu' }}
                </div>
            </div>
        </div>

        <div class="relative group animate-float">
            <div class="absolute -inset-4 bg-gradient-to-r from-blue-600 to-cyan-400 rounded-2xl blur-lg opacity-30 group-hover:opacity-50 transition duration-500"></div>
            
            <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
               <img src="{{ optional($settings)->hero_image ? asset('storage/'.$settings->hero_image) : asset('hero-klima.jpg') }}">
                     alt="Kuriş İklimlendirme Klima Montajı" 
                     class="w-full h-full object-cover">
                     
                <div class="absolute bottom-6 left-6 bg-white/90 backdrop-blur-md p-4 rounded-xl shadow-lg border border-white/50 hidden sm:block">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                            <i class="fa-solid fa-leaf text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-semibold uppercase">Doğa Dostu</p>
                            <p class="text-sm font-bold text-gray-900">A++ Enerji Verimliliği</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
    </section>

  

 @php
    $setting = \App\Models\Setting::first();
@endphp

<section id="about" class="section py-16 bg-white">
    <div class="custom-container max-w-6xl mx-auto px-4">

        <div class="flex flex-col md:flex-row items-center gap-12">

            <div class="w-full md:w-1/2">
                <div class="rounded-2xl overflow-hidden border-4 border-white shadow-2xl h-80 md:h-96 relative group">
                    <img src="{{ $setting && $setting->about_image ? asset($setting->about_image) : 'http://127.0.0.1:8000/dükkan.jpg' }}"
                         alt="Hakkımızda"
                         class="w-full h-full object-cover transform transition duration-500 group-hover:scale-110">
                </div>
            </div>

            <div class="w-full md:w-1/2">

                <h2 class="text-3xl font-bold text-blue-700 mb-6">
                    {{ $setting->about_title ?? 'Kuriş İklimlendirme Hakkında' }}
                </h2>

                <p class="text-gray-600 leading-relaxed text-lg mb-6">
                    {{ $setting->about_description ?? 'Yılların verdiği tecrübe ile sektörde güvenin adresi olan firmamız, müşteri memnuniyetini her zaman ön planda tutmaktadır. İşinizi şansa değil, ustalara bırakın.' }}
                </p>

                <ul class="space-y-4">

                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fa-solid fa-check text-blue-600"></i>
                        </div>
                        <span class="text-gray-700 font-medium">
                            {{ $setting->about_item1 ?? 'Sertifikalı Uzman Kadro' }}
                        </span>
                    </li>

                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fa-solid fa-check text-blue-600"></i>
                        </div>
                        <span class="text-gray-700 font-medium">
                            {{ $setting->about_item2 ?? 'Orijinal Yedek Parça' }}
                        </span>
                    </li>

                    <li class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fa-solid fa-check text-blue-600"></i>
                        </div>
                        <span class="text-gray-700 font-medium">
                            {{ $setting->about_item3 ?? '7/24 Teknik Destek' }}
                        </span>
                    </li>

                </ul>
            </div>

        </div>

    </div>
</section>

<hr class="border-gray-100">

<section class="py-16 bg-gray-50">
    <div class="custom-container max-w-6xl mx-auto px-4">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">

            <div class="lg:col-span-1 bg-white p-6 rounded-2xl border border-gray-200 sticky top-8 shadow-sm">
                
                <h3 class="text-xl font-bold text-gray-900 mb-2">Yorum Yap</h3>
                <p class="text-sm text-gray-500 mb-6">Deneyiminizi paylaşarak bize destek olun.</p>

               <form id="yorumForm">
    @csrf

    <div>
        <input type="text" name="ad" required
               class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm"
               placeholder="Adınız Soyadınız">
    </div>

    <div class="relative">
        <select name="puan"
                class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm">
            <option value="5">⭐⭐⭐⭐⭐ - Mükemmel</option>
            <option value="4">⭐⭐⭐⭐ - İyi</option>
            <option value="3">⭐⭐⭐ - Orta</option>
            <option value="2">⭐⭐ - Geliştirilmeli</option>
            <option value="1">⭐ - Kötü</option>
        </select>
    </div>

    <div>
        <textarea name="mesaj" required rows="4"
                  class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm"
                  placeholder="Yorumunuzu buraya yazın..."></textarea>
    </div>

    <button type="submit" class="w-full bg-gray-900 text-white py-3 rounded-lg">
        Gönder
    </button>
</form>
            </div>


            <div class="lg:col-span-2">
                
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                    <h3 class="text-xl font-bold text-gray-900">Son Değerlendirmeler</h3>
                   <div class="flex items-center gap-2 text-sm text-gray-500">
    <i class="fa-solid fa-star text-yellow-400"></i>
    <span class="font-bold text-gray-900">{{ number_format($ortalama, 1) }}</span>
    <span>({{ $yorumSayisi }} Yorum)</span>
</div>
                </div>

                <div id="yanYanaListe" class="space-y-6 max-h-64 overflow-y-auto pr-2">
                    <div class="mt-8 text-center">
    
</div>

@foreach($yorumlar as $yorum)

<div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all">
    <div class="flex gap-4 items-start">
        
        <div class="w-10 h-10 rounded-full bg-blue-100 flex-shrink-0 flex items-center justify-center text-blue-600 font-bold text-sm">
            {{ strtoupper(substr($yorum->ad, 0, 1)) }}
        </div>

        <div class="flex-1">
            <div class="flex justify-between items-start">
                <h4 class="font-bold text-gray-900 text-sm">
                    {{ $yorum->ad }}
                </h4>

                <span class="text-xs text-gray-400">
                    {{ $yorum->created_at->diffForHumans() }}
                </span>
            </div>

            <div class="text-yellow-400 text-[10px] mb-2 mt-0.5">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>

            <p class="text-gray-600 text-sm leading-relaxed">
                "{{ $yorum->mesaj }}"
            </p>
        </div>

    </div>
</div>

@endforeach

</div>

</div>

        </div>
    </div>
</section>


<a href="https://wa.me/905010303361" target="_blank" class="fixed bottom-6 right-6 z-50 group">
    <div class="absolute bottom-16 right-0 w-48 bg-white p-3 rounded-xl shadow-xl border border-gray-100 hidden group-hover:block transition-all duration-300">
        <p class="text-sm text-gray-600">Merhaba! 👋 <br> Size nasıl yardımcı olabiliriz?</p>
    </div>

    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 transition duration-300 animate-bounce-slow">
        <i class="fa-brands fa-whatsapp text-white text-4xl"></i>
    </div>
    
    <span class="absolute top-0 right-0 w-16 h-16 bg-green-500 rounded-full opacity-75 animate-ping -z-10"></span>
</a>

<script>
document.getElementById('yorumForm').addEventListener('submit', function(e){
    e.preventDefault();

    let formData = new FormData(this);

    fetch("{{ route('yorum.store') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        document.getElementById('yorumForm').reset();
    });
});
</script>

@endsection

