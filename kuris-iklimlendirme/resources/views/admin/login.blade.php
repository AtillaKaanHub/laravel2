<!DOCTYPE html>
<html>
<head>
    <title>Admin Giriş</title>
    <style>
        body {
            background: linear-gradient(135deg, #0056b3, #00a8cc);
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            width: 320px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #0056b3;
            color: white;
            border: none;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Admin Login</h2>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Şifre">
        <button type="submit">Giriş Yap</button>
    </form>
</div>

</body>
</html>
