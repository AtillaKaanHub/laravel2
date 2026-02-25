@extends('layouts.app')

@section('title','Hizmetlerimiz | Kuriş İklimlendirme')

@section('styles')
    <style>
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
            max-width: 1200px; /* Genişliği biraz artırdık ki yan yana sığsınlar */
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

        @media (max-width: 768px) {
            .nav-links { display: none; }
        }
    </style>
@endsection

   @section('content')

    <div class="pt-32 pb-16 bg-gradient-to-r from-blue-900 to-blue-600 text-white text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10">
            <i class="fa-solid fa-headset absolute top-10 left-10 text-9xl"></i>
        </div>
        <div class="custom-container relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Bize Ulaşın</h1>
            <p class="text-lg text-blue-100 max-w-2xl mx-auto">Sorularınız, teklif istekleriniz veya teknik destek için her zaman yanınızdayız.</p>
        </div>
    </div>

    <section class="py-16 bg-white">
        <div class="custom-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">İletişim Kanalları</h2>
                    <p class="text-gray-600 mb-8">Aşağıdaki iletişim bilgilerinden bize doğrudan ulaşabilir veya yan taraftaki formu doldurabilirsiniz.</p>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-xl flex-shrink-0">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Merkez Ofis</h4>
                                <p class="text-gray-600">Hürriyet, İsmet İnönü Blv. no:111/A,<br>Yenişehir/Mersin</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-xl flex-shrink-0">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Telefon & Whatsapp</h4>
                                <p class="text-gray-600">+90 501 030 3361</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-xl flex-shrink-0">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">E-Posta</h4>
                                <p class="text-gray-600">info@kurisiklim.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h4 class="font-bold text-gray-800 mb-4">Bizi Takip Edin</h4>
                        <div class="flex gap-4">
                            <a href="#" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 hover:bg-blue-600 hover:text-white transition"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 hover:bg-pink-600 hover:text-white transition"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 rounded-2xl shadow-lg border border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Hızlı Mesaj Gönder</h3>
                  <form action="{{ route('mesaj.store') }}" method="POST">
@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div>
        <label class="block text-gray-700 text-sm font-bold mb-2">Ad Soyad</label>
        <input type="text" name="ad" class="w-full px-4 py-3 rounded-lg bg-white border border-gray-300" required>
    </div>
    <div>
        <label class="block text-gray-700 text-sm font-bold mb-2">Telefon</label>
        <input type="tel" name="telefon" class="w-full px-4 py-3 rounded-lg bg-white border border-gray-300">
    </div>
</div>

<div class="mb-6">
    <label class="block text-gray-700 text-sm font-bold mb-2">Mesajınız</label>
    <textarea name="mesaj" rows="4" class="w-full px-4 py-3 rounded-lg bg-white border border-gray-300" required></textarea>
</div>

<button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3 px-6 rounded-lg">
    GÖNDER
</button>

</form>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-100">
        <div class="custom-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <div class="flex flex-col h-full">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center text-white">
                            <i class="fa-solid fa-play"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Yol Tarifi</h2>
                    </div>
                    <div class="bg-black rounded-2xl overflow-hidden shadow-2xl h-[400px] w-full relative group">
                        <div class="flex flex-col h-full">
    <div class="mb-4 flex items-center gap-3">
        
       
    </div>
    
    <div class="bg-black rounded-2xl overflow-hidden shadow-2xl h-[400px] w-full relative group">
        
        <video class="w-full h-full object-cover" controls>
            <source src="tanitim.mp4" type="video/mp4">
            Tarayıcınız bu video formatını desteklemiyor.
        </video>
        
    </div>
   
</div>
                    </div>
                    <p class="mt-4 text-gray-600 text-sm">
                        *Sizi ofisimizde ağırlamaktan memnuniyet duyarız. Bize gelirken yolu kolayca bulmanız için bu videoyu hazırladık.
                    </p>
                </div>

                <div class="flex flex-col h-full">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Konumumuz</h2>
                    </div>
                    <div class="bg-gray-200 rounded-2xl overflow-hidden shadow-2xl h-[400px] w-full">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3197.669894676527!2d34.6234958!3d36.7807206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1527f4a47d7c6d17%3A0x8e8e8e8e8e8e8e8e!2sH%C3%BCrriyet%2C%20%C4%B0smet%20%C4%B0n%C3%B6n%C3%BC%20Blv.%20No%3A111%2C%2033110%20Yeni%C5%9Fehir%2FMersin!5e0!3m2!1str!2str!4v1680000000000!5m2!1str!2str" 
                                class="w-full h-full border-0" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <p class="mt-4 text-gray-600 text-sm">
                        * Hürriyet, İsmet İnönü Blv. no:111/A, Yenişehir/Mersin adresindeki ofisimize bekleriz.
                    </p>
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