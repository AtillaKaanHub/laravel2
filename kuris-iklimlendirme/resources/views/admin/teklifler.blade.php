@extends('layouts.app')

@section('content')

<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6">Gelen Teklifler</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Ad</th>
                    <th class="p-2 border">Telefon</th>
                    <th class="p-2 border">Hizmet</th>
                    <th class="p-2 border">m²</th>
                    <th class="p-2 border">Fiyat</th>
                    <th class="p-2 border">Tarih</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teklifler as $teklif)
                    <tr>
                        <td class="p-2 border">{{ $teklif->name }}</td>
                        <td class="p-2 border">{{ $teklif->phone }}</td>
                        <td class="p-2 border">{{ $teklif->service }}</td>
                        <td class="p-2 border">{{ $teklif->square_meter }}</td>
                        <td class="p-2 border">
                            {{ number_format($teklif->calculated_price, 0, ',', '.') }} ₺
                        </td>
                        <td class="p-2 border">{{ $teklif->created_at->format('d.m.Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
