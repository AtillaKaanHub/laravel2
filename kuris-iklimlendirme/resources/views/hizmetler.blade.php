@extends('layouts.app')

@section('title','Hizmetlerimiz | Kuriş İklimlendirme')


@section('styles')
    <style>
        /* --- ANA SAYFA İLE AYNI STİLLER --- */
        :root {
            --primary-blue: #0056b3;
            --accent-blue: #00a8cc;
            --gradient-bg: linear-gradient(135deg, #0056b3 0%, #00a8cc 100%);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background-color: #f8fafc;
        }

        /* Header */
        header {
            background-color: rgba(255, 255, 255, 0.95);
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

        .nav-links a:hover, .nav-links a.active {
            color: var(--accent-blue);
        }

        .btn-header {
            background: var(--gradient-bg);
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
        }

        /* Whatsapp Animasyonu */
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 2s infinite;
        }

        /* Kart Hover Efekti */
        .service-card-detail {
            transition: all 0.4s ease;
        }
        .service-card-detail:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
        }
    </style>
    @endsection


    
@section('content')
    <div class="pt-32 pb-16 bg-gradient-to-r from-blue-900 to-blue-600 text-white text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10">
            <i class="fa-solid fa-snowflake absolute top-10 left-10 text-9xl"></i>
            <i class="fa-solid fa-wind absolute bottom-10 right-10 text-9xl"></i>
        </div>
        <div class="custom-container relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Hizmetlerimiz</h1>
            <p class="text-lg text-blue-100 max-w-2xl mx-auto">Eviniz ve iş yeriniz için sunduğumuz profesyonel iklimlendirme çözümlerini keşfedin.</p>
        </div>
    </div>

    <section class="py-20 bg-gray-50">
        <div class="custom-container">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="bg-white rounded-2xl overflow-hidden shadow-lg service-card-detail group">
                    <div class="h-64 overflow-hidden relative">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition duration-500 z-10"></div>
                        <img src="{{ asset('evtipi.jpg') }}" alt="evtipi"  class="w-full h-full object-cover object-center">
                    </div>
                    <div class="p-8">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-2xl mb-6">
                            <i class="fa-solid fa-house-chimney"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Ev Tipi Split Klimalar</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Evleriniz için en sessiz ve yüksek enerji tasarruflu duvar tipi klima çözümleri sunuyoruz. Keşiften montaja kadar tüm süreçte yanınızdayız.
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> A++ Enerji Verimliliği</li>
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> Sessiz Çalışma Modu</li>
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> 2 Yıl Montaj Garantisi</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-2xl overflow-hidden shadow-lg service-card-detail group">
                    <div class="h-64 overflow-hidden relative">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition duration-500 z-10"></div>
                        <img src="{{ asset('merkezi.jpg') }}" alt="VRF Sistem" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                    </div>
                    <div class="p-8">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-2xl mb-6">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Ticari VRF Sistemleri</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Plazalar, oteller, hastaneler ve büyük ofisler için merkezi iklimlendirme sistemleri. Tek merkezden tüm binayı kontrol edin.
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> Yüksek Kapasite</li>
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> Merkezi Kontrol Paneli</li>
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> Projelendirme Hizmeti</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white rounded-2xl overflow-hidden shadow-lg service-card-detail group">
                    <div class="h-64 overflow-hidden relative">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition duration-500 z-10"></div>
                        <img src="{{ asset('işçi.jpg') }}" alt="Klima Bakım" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                    </div>
                    <div class="p-8">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-2xl mb-6">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Teknik Servis & Bakım</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Klimalarınızın ömrünü uzatmak ve performansını artırmak için periyodik bakım hizmeti. Gaz dolumu, filtre temizliği ve arıza tespiti.
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> 7/24 Acil Destek</li>
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> Antibakteriyel Temizlik</li>
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> Orijinal Yedek Parça</li>
                        </ul>
                    </div>
                </div>

                 <div class="bg-white rounded-2xl overflow-hidden shadow-lg service-card-detail group">
                    <div class="h-64 overflow-hidden relative">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition duration-500 z-10"></div>
                        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1931&auto=format&fit=crop" alt="Projelendirme" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                    </div>
                    <div class="p-8">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-2xl mb-6">
                            <i class="fa-solid fa-clipboard-check"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Ücretsiz Keşif & Proje</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Mekana en uygun cihazı belirlemek için uzman ekibimizle ücretsiz keşif yapıyoruz. Doğru BTU hesabı ile tasarruf sağlayın.
                        </p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> Yerinde İnceleme</li>
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> Termal Analiz</li>
                            <li class="flex items-center gap-2 text-sm text-gray-500"><i class="fa-solid fa-check text-green-500"></i> Fiyat Performans Raporu</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 bg-white border-t border-gray-100">
        <div class="custom-container text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-12">Nasıl Çalışıyoruz?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="relative">
                    <div class="w-20 h-20 bg-blue-600 text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-xl z-10 relative">1</div>
                    <h4 class="font-bold text-lg mb-2">İletişim</h4>
                    <p class="text-sm text-gray-500">Bize ulaşın ve talebinizi iletin.</p>
                </div>
                <div class="relative">
                    <div class="hidden md:block absolute top-10 right-1/2 w-full h-1 bg-gray-200 -z-0"></div>
                    <div class="w-20 h-20 bg-blue-500 text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-xl z-10 relative">2</div>
                    <h4 class="font-bold text-lg mb-2">Keşif</h4>
                    <p class="text-sm text-gray-500">Uzman ekibimiz yerinde inceleme yapar.</p>
                </div>
                <div class="relative">
                     <div class="hidden md:block absolute top-10 right-1/2 w-full h-1 bg-gray-200 -z-0"></div>
                    <div class="w-20 h-20 bg-cyan-500 text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-xl z-10 relative">3</div>
                    <h4 class="font-bold text-lg mb-2">Montaj</h4>
                    <p class="text-sm text-gray-500">Profesyonel ve temiz kurulum yapılır.</p>
                </div>
                <div class="relative">
                     <div class="hidden md:block absolute top-10 right-1/2 w-full h-1 bg-gray-200 -z-0"></div>
                    <div class="w-20 h-20 bg-green-500 text-white rounded-full flex items-center justify-center text-3xl mx-auto mb-4 shadow-xl z-10 relative">4</div>
                    <h4 class="font-bold text-lg mb-2">Teslim</h4>
                    <p class="text-sm text-gray-500">Sistem test edilir ve teslim edilir.</p>
                </div>
            </div>
        </div>
    </section>

 

    <a href="https://wa.me/905010303361" target="_blank" class="fixed bottom-6 right-6 z-50 group">
        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 transition duration-300 animate-bounce-slow">
            <i class="fa-brands fa-whatsapp text-white text-4xl"></i>
        </div>
        <span class="absolute top-0 right-0 w-16 h-16 bg-green-500 rounded-full opacity-75 animate-ping -z-10"></span>
    </a>
@endsection
