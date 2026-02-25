@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Yorum Yönetimi</h1>

    <div class="bg-white shadow rounded-lg p-6">

        @if($yorumlar->count() > 0)
            <table class="w-full border">
                <thead>
                    <tr>
                        <th class="p-2 border">Ad</th>
                        <th class="p-2 border">Yorum</th>
                        <th class="p-2 border">Puan</th>
                        <th class="p-2 border">Durum</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($yorumlar as $yorum)
                    <tr>
                        <td class="p-2 border">{{ $yorum->ad }}</td>
                        <td class="p-2 border">{{ $yorum->mesaj }}</td>
                        <td class="p-2 border">{{ $yorum->rating ?? '-' }}</td>
                        <td class="p-2 border">
                            {{ $yorum->onay ? 'Onaylı' : 'Bekliyor' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Henüz yorum yok.</p>
        @endif

    </div>
</div>
@endsection