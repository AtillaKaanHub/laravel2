<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>

<h1>Admin Paneline Hoşgeldin {{ Auth::user()->name }}</h1>

<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit">Çıkış Yap</button>
</form>

</body>
</html>
