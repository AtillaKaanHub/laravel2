<header>
    <div class="custom-container">
        <nav>

            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('logo.jpg') }}" class="h-20 w-auto">
            </a>

           <ul class="nav-links">
    <li>
        <a href="{{ url('/') }}">
            {{ $setting->menu_home ?? 'Ana Sayfa' }}
        </a>
    </li>

    <li>
        <a href="{{ url('/hizmetler') }}">
            {{ $setting->menu_services ?? 'Hizmetler' }}
        </a>
    </li>

    <li>
        <a href="{{ url('/kurumsal') }}">
            {{ $setting->menu_corporate ?? 'Kurumsal' }}
        </a>
    </li>

    <li>
        <a href="{{ url('/iletisim') }}">
            {{ $setting->menu_contact ?? 'İletişim' }}
        </a>
    </li>
</ul>

            <a href="{{ url('/teklif-al') }}" class="btn-header">Teklif Al</a>

        </nav>
    </div>
</header>
