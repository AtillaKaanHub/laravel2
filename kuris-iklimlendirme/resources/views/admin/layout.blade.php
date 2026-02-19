<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            display: flex;
        }

        .sidebar {
            width: 220px;
            background: #0056b3;
            color: white;
            height: 100vh;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 15px 0;
        }

        .content {
            flex: 1;
            padding: 30px;
            background: #f4f6f9;
        }

        .topbar {
            background: white;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }

        button {
            padding: 6px 10px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Admin</h2>
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
</div>

<div class="content">

    <div class="topbar">
        <div>
            Hoşgeldin {{ Auth::user()->name }}
        </div>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Çıkış Yap</button>
        </form>
    </div>

    @yield('content')

</div>

</body>
</html>
