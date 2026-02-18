<footer id="footer" class="relative bg-gradient-to-b from-[#0b1220] to-black text-gray-300 pt-20 pb-10 overflow-hidden">

  <!-- Arka plan efektleri -->
  <div class="absolute top-0 left-1/3 w-96 h-96 bg-blue-600/20 blur-[120px] rounded-full pointer-events-none"></div>
  <div class="absolute bottom-0 right-1/3 w-96 h-96 bg-cyan-600/20 blur-[120px] rounded-full pointer-events-none"></div>

  <div class="relative max-w-[1280px] mx-auto px-6">

    <!-- Üst grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12">

      <!-- Logo + açıklama -->
     <div class="lg:col-span-2">
    <div class="flex items-center gap-3">
        
        <img src="{{ asset('sembol.png.png') }}" alt="Kuriş Logo" class="w-16 h-16 object-contain bg-white rounded-lg p-1">
        <span class="text-2xl font-bold text-white tracking-wide">KURİŞ</span>
    </div>

        <p class="mt-4 text-gray-400 max-w-md">
          İklimlendirme sektöründe güven ve kalitenin adresi. Eviniz ve iş yeriniz için modern, enerji tasarruflu ve çevre dostu çözümler.
        </p>

        <div class="mt-6 space-y-3 text-sm">
          <a href="https://www.google.com/maps/search/?api=1&query=Hürriyet,+İsmet+İnönü+Blv.+no:111/A,+33120+Yenişehir/Mersin"
             target="_blank"
             class="flex items-center gap-3 hover:text-blue-400 transition">
            <i class="fa-solid fa-location-dot text-blue-500"></i>
            Hürriyet, İsmet İnönü Blv. no:111/A, Yenişehir/Mersin
          </a>

          <p class="flex items-center gap-3">
            <i class="fa-solid fa-phone text-blue-500"></i>
            +90 501 030 3361
          </p>

          <p class="flex items-center gap-3">
            <i class="fa-solid fa-envelope text-blue-500"></i>
            info@kurisiklim.com
          </p>
        </div>
      </div>

      <!-- Hizmetler -->
      <div>
        <h3 class="text-white font-bold mb-4 text-lg border-b border-gray-800 pb-2 inline-block">
          <a href="{{ url('/hizmetler') }}" class="hover:text-blue-400 transition">
            Hizmetler
          </a>
        </h3>

        <ul class="space-y-3 text-sm text-gray-400">
          <li class="cursor-default">Split Klima</li>
          <li class="cursor-default">VRF Sistemleri</li>
          <li class="cursor-default">Kombi Bakım</li>
        </ul>
      </div>

      <!-- Kurumsal -->
      <div>
        <h3 class="text-white font-bold mb-4 text-lg border-b border-gray-800 pb-2 inline-block">
          <a href="{{ url('/kurumsal') }}" class="hover:text-blue-400 transition">
            Kurumsal
          </a>
        </h3>

        <ul class="space-y-3 text-sm text-gray-400">
          <li class="cursor-default">Hakkımızda</li>
          <li class="cursor-default">Belgelerimiz</li>
        </ul>
      </div>

      <!-- Çalışma saatleri -->
      <div>
        <h3 class="text-white font-bold mb-4 text-lg border-b border-gray-800 pb-2 inline-block">
          Çalışma Saatleri
        </h3>

        <ul class="space-y-3 text-sm text-gray-400">
          <li class="flex justify-between"><span>Pzt - Cuma:</span><span class="text-white">08:00 - 19:00</span></li>
          <li class="flex justify-between"><span>Cmtesi:</span><span class="text-white">08:00 - 19:00</span></li>
          <li class="flex justify-between"><span>Pazar:</span><span class="text-red-400">Kapalı</span></li>
        </ul>
      </div>

    </div>

    <!-- Alt kısım -->
    <div class="mt-16 border-t border-gray-800 pt-8 flex flex-col md:flex-row items-center justify-between gap-6">

      <p class="text-sm text-gray-500">
        © 2024 Kuriş İklimlendirme. Tüm hakları saklıdır.
      </p>

      <div class="flex gap-4">
        <a href="https://www.facebook.com/4mevsimiklimlendirme/?locale=pa_IN" class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-800 hover:bg-blue-600 transition text-white">
          <i class="fa-brands fa-facebook-f"></i>
        </a>

        <a href="https://www.instagram.com/kurisiklimlendirme/" class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-800 hover:bg-pink-600 transition text-white">
          <i class="fa-brands fa-instagram"></i>
        </a>
      </div>

    </div>
  </div>
</footer>