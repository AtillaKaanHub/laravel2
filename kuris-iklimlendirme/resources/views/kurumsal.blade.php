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

        /* Kurumsal Sayfası için özel stil */
        .timeline-item {
            position: relative;
            padding-left: 30px;
            margin-bottom: 40px;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 2px;
            height: 100%;
            background-color: #e0e0e0;
        }
        .timeline-item::after {
            content: '';
            position: absolute;
            left: -8px;
            top: 0;
            width: 18px;
            height: 18px;
            background-color: var(--primary-blue);
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 0 0 2px var(--primary-blue);
        }
        .timeline-item:last-child::before {
            height: calc(100% - 18px); /* Son öğenin çizgisini tamamlama */
        }
        .value-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
        }
    </style>
@endsection

   @section('content')

    <div class="pt-32 pb-16 bg-gradient-to-r from-blue-900 to-blue-600 text-white text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10">
            <i class="fa-solid fa-building absolute top-10 left-10 text-9xl"></i>
            <i class="fa-solid fa-handshake absolute bottom-10 right-10 text-9xl"></i>
        </div>
        <div class="custom-container relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Kurumsal Kimliğimiz</h1>
            <p class="text-lg text-blue-100 max-w-2xl mx-auto">Kuriş İklimlendirme'nin hikayesini, değerlerini ve geleceğe yönelik vizyonunu keşfedin.</p>
        </div>
    </div>

    <section id="our-story" class="py-20 bg-gray-50">
        <div class="custom-container">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Hikayemiz</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="mekan.jpg" alt="Ofis Ortamı" class="rounded-2xl shadow-xl border-4 border-white">
                </div>
                <div>
                    <p class="text-gray-700 leading-relaxed text-lg mb-6">
                        Kuriş İklimlendirme, sektördeki 7 yılı aşkın tecrübesiyle, müşteri memnuniyetini ve sürdürülebilir kaliteyi ilke edinmiş bir kuruluştur. Kurulduğumuz günden bu yana, modern iklimlendirme çözümleri sunarak konforlu ve sağlıklı yaşam alanları yaratmayı hedefledik.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Başlangıçta küçük bir atölyede başlayan yolculuğumuz, zamanla genişleyen ürün gamımız, uzman ekibimiz ve ülke geneline yayılan hizmet ağımızla büyük bir başarı hikayesine dönüştü. Bugün, hem bireysel hem de kurumsal müşterilerimize en yeni teknolojilerle donatılmış iklimlendirme sistemleri sunmaktan gurur duyuyoruz.
                    </p>
                </div>
            </div>

            <div class="mt-20">
                <h3 class="text-2xl font-bold text-gray-800 mb-8 text-center">Zaman Çizelgesi</h3>
                <div class="max-w-3xl mx-auto">
                    <div class="timeline-item">
                        <div class="text-blue-700 font-semibold mb-2 text-lg">2019</div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">Şirket Kurulumu</h4>
                        <p class="text-gray-600">Küçük bir atölyede yerel müşterilere hizmet vermeye başladık.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="text-blue-700 font-semibold mb-2 text-lg">2020</div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">Bölgesel Büyüme</h4>
                        <p class="text-gray-600">Hizmet ağımızı genişleterek çevre illere de ulaşmaya başladık.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="text-blue-700 font-semibold mb-2 text-lg">2022</div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">VRF Sistemleri</h4>
                        <p class="text-gray-600">VRF sistemleri portföyümüze ekleyerek ticari projelere adım attık.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="text-blue-700 font-semibold mb-2 text-lg">2024</div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">Dijitalleşme</h4>
                        <p class="text-gray-600">Online platformlarda yerimizi alarak dijital müşteri deneyimini geliştirdik.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="text-blue-700 font-semibold mb-2 text-lg">2026</div>
                        <h4 class="text-xl font-semibold text-gray-800 mb-2">Çevre Dostu Çözümler</h4>
                        <p class="text-gray-600">Enerji verimliliği yüksek ve çevre dostu ürün gamımızı genişlettik.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="mission-vision" class="py-20 bg-white">
        <div class="custom-container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-gradient-to-br from-blue-700 to-blue-500 p-8 rounded-2xl shadow-lg text-white">
                    <div class="flex items-center mb-4">
                        <i class="fa-solid fa-bullseye text-4xl mr-4 opacity-75"></i>
                        <h3 class="text-3xl font-bold">Misyonumuz</h3>
                    </div>
                    <p class="text-blue-100 leading-relaxed text-lg">
                        Müşterilerimizin yaşam ve çalışma alanlarında ideal iklimlendirme koşullarını sağlamak, enerji verimliliği yüksek, çevre dostu ve yenilikçi çözümler sunarak konfor ve sağlık standartlarını en üst seviyeye taşımaktır.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-cyan-700 to-cyan-500 p-8 rounded-2xl shadow-lg text-white">
                    <div class="flex items-center mb-4">
                        <i class="fa-solid fa-eye text-4xl mr-4 opacity-75"></i>
                        <h3 class="text-3xl font-bold">Vizyonumuz</h3>
                    </div>
                    <p class="text-cyan-100 leading-relaxed text-lg">
                        İklimlendirme sektöründe lider, teknolojik gelişmeleri yakından takip eden, müşteri odaklı hizmet anlayışıyla sektör standartlarını belirleyen ve global pazarda tanınan bir marka olmaktır.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="our-values" class="py-20 bg-gray-50">
        <div class="custom-container">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Değerlerimiz</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md text-center value-card">
                    <i class="fa-solid fa-medal text-5xl text-blue-600 mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Kalite Odaklılık</h4>
                    <p class="text-gray-600">Her projede en yüksek kalite standartlarını benimseriz.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md text-center value-card">
                    <i class="fa-solid fa-users text-5xl text-blue-600 mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Müşteri Memnuniyeti</h4>
                    <p class="text-gray-600">Müşterilerimizin ihtiyaçlarına odaklanır, beklentilerini aşmayı hedefleriz.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md text-center value-card">
                    <i class="fa-solid fa-lightbulb text-5xl text-blue-600 mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Yenilikçilik</h4>
                    <p class="text-gray-600">Sürekli gelişimi ve teknolojik yenilikleri takip ederiz.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md text-center value-card">
                    <i class="fa-solid fa-handshake-angle text-5xl text-blue-600 mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Güvenilirlik</h4>
                    <p class="text-gray-600">Dürüst ve şeffaf hizmet anlayışıyla güven inşa ederiz.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md text-center value-card">
                    <i class="fa-solid fa-leaf text-5xl text-blue-600 mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Çevreye Saygı</h4>
                    <p class="text-gray-600">Çevre bilinciyle hareket eder, sürdürülebilir çözümler sunarız.</p>
                </div>
                 <div class="bg-white p-6 rounded-xl shadow-md text-center value-card">
                    <i class="fa-solid fa-graduation-cap text-5xl text-blue-600 mb-4"></i>
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Uzmanlık</h4>
                    <p class="text-gray-600">Alanında yetkin ve sürekli eğitimli bir ekiple çalışırız.</p>
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