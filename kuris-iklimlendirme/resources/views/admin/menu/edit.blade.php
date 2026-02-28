@extends('layouts.app') 

@section('content')

<div style="max-width:500px; margin:50px auto;">
    <h2>Header Menü Yönetimi</h2>

    @if(session('success'))
        <div style="color:green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <div>
            <label>Ana Sayfa</label>
            <input type="text" name="menu_home" 
                   value="{{ $setting->menu_home ?? 'Ana Sayfa' }}">
        </div>

        <div>
            <label>Hizmetler</label>
            <input type="text" name="menu_services" 
                   value="{{ $setting->menu_services ?? 'Hizmetler' }}">
        </div>

        <div>
            <label>Kurumsal</label>
            <input type="text" name="menu_corporate" 
                   value="{{ $setting->menu_corporate ?? 'Kurumsal' }}">
        </div>

        <div>
            <label>İletişim</label>
            <input type="text" name="menu_contact" 
                   value="{{ $setting->menu_contact ?? 'İletişim' }}">
        </div>

        <br>

        <button type="submit">Kaydet</button>
    </form>
</div>

@endsection