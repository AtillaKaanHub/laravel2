@extends('admin.layout')

@section('content')
<h1>Gelen Mesajlar</h1>

<table>
    <thead>
        <tr>
            <th>Ad</th>
            <th>Telefon</th>
            <th>Mesaj</th>
            <th>Tarih</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $msg)
        <tr>
            <td>{{ $msg->ad }}</td>
            <td>{{ $msg->telefon }}</td>
            <td>{{ $msg->mesaj }}</td>
            <td>{{ $msg->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection