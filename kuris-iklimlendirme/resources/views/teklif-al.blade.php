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
            max-width: 1200px;
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
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 168, 204, 0.3);
        }

        /* Custom Checkbox Design */
        .service-radio:checked + div {
            border-color: #00a8cc;
            background-color: #e0f7fa;
            color: #0056b3;
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
        }
    </style>
@endsection

   
@section('content')
    <div class="pt-32 pb-12 bg-gradient-to-r from-cyan-600 to-blue-800 text-white text-center relative overflow-hidden">
        <div class="absolute top-0 right-0 w-full h-full opacity-10">
            <i class="fa-solid fa-file-signature absolute bottom-5 right-10 text-9xl"></i>
        </div>
        <div class="custom-container relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold mb-4">Ücretsiz Keşif & Teklif Formu</h1>
            <p class="text-lg text-blue-100 max-w-2xl mx-auto">İhtiyacınıza en uygun iklimlendirme çözümü için formu doldurun, uzman ekibimiz en kısa sürede sizinle iletişime geçsin.</p>
        </div>
    </div>

    <section class="py-16">
        <div class="custom-container">
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="p-8 md:p-12">
                    
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif



                    <form action="{{ route('teklif.store') }}" method="POST">
    @csrf
                        <h3 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2 flex items-center gap-2">
                            <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-sm">1</span>
                            İletişim Bilgileriniz
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Ad Soyad</label>
                                <input type="text" name="name" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="Adınız Soyadınız">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Telefon Numarası</label>
                                <input type="tel" name="phone" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="05XX XXX XX XX">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">E-Posta Adresi</label>
                                <input type="email" name="email" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="ornek@email.com">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">İl / İlçe</label>
                                <input type="text" name="city" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition" placeholder="Örn: Mersin / Yenişehir">
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2 flex items-center gap-2">
                            <span class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-sm">2</span>
                            Hizmet Detayları
                        </h3>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-3">Hangi Hizmetle İlgileniyorsunuz?</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <label class="cursor-pointer">
                                    <input type="radio"  name="service" value="Split Klima" class="service-radio hidden">
                                    <div class="border-2 border-gray-200 rounded-xl p-4 text-center hover:border-blue-400 transition h-full flex flex-col items-center justify-center gap-2">
                                        <i class="fa-solid fa-snowflake text-2xl mb-1"></i>
                                        <span class="font-semibold text-sm">Split Klima</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="service" value="VRF Sistem" class="service-radio hidden">
                                    <div class="border-2 border-gray-200 rounded-xl p-4 text-center hover:border-blue-400 transition h-full flex flex-col items-center justify-center gap-2">
                                        <i class="fa-solid fa-building text-2xl mb-1"></i>
                                        <span class="font-semibold text-sm">VRF Sistem</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="service" value="Tamir / Bakım" class="service-radio hidden">
                                    <div class="border-2 border-gray-200 rounded-xl p-4 text-center hover:border-blue-400 transition h-full flex flex-col items-center justify-center gap-2">
                                        <i class="fa-solid fa-fire text-2xl mb-1"></i>
                                        <span class="font-semibold text-sm">Tamir / Bakım</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="service" value="Ücretsiz Keşif & Proje" class="service-radio hidden">
                                    <div class="border-2 border-gray-200 rounded-xl p-4 text-center hover:border-blue-400 transition h-full flex flex-col items-center justify-center gap-2">
                                        <i class="fa-solid fa-screwdriver-wrench text-2xl mb-1"></i>
                                        <span class="font-semibold text-sm">Keşif & Proje</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Mekan Tipi</label>
                                <select  name="place_type"  class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-blue-500 outline-none">
                                    <option>Ev / Daire</option>
                                    <option>Ofis / İş Yeri</option>
                                    <option>Mağaza</option>
                                    <option>Sanayi / Fabrika</option>
                                    <option>Otel / Pansiyon</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Yaklaşık Alan (m²)</label>
                                <input type="number" name="square_meter" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-blue-500 outline-none" placeholder="Örn: 120">
                            </div>
                        </div>

                        <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Eklemek İstedikleriniz / Notunuz</label>
                            <textarea  name="note" rows="4" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-blue-500 outline-none" placeholder="Varsa marka tercihi, özel durumlar veya keşif için uygun olduğunuz saatler..."></textarea>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg transform hover:-translate-y-1 transition duration-300 text-lg flex items-center justify-center gap-3">
                            <span>TEKLİF İSTEĞİNİ GÖNDER</span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                        <p class="text-center text-gray-500 text-sm mt-4">Formu göndererek kişisel verilerinizin işlenmesini kabul etmiş olursunuz.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

  

