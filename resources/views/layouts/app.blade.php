<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kampus - @yield('title', 'Dashboard')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #1e40af; /* biru navy */
            color: white;
            padding: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 900px;
            background: white;
            margin: 30px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h1, h2 {
            color: #1e40af;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 8px 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #1e3a8a;
            color: white;
            text-align: left;
        }

        a.btn {
            display: inline-block;
            background: #1e40af;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }

        a.btn:hover {
            background: #1d4ed8;
        }

        button {
            background: #dc2626;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #b91c1c;
        }

        form.inline {
            display: inline;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <!-- 🔹 Navigasi Global -->
    <nav>
        <a href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
        <a href="{{ route('prodi.index') }}">Prodi</a>
        <a href="{{ route('fakultas.index') }}">Fakultas</a>
    </nav>

    <!-- 🔹 Container utama -->
    <div class="container">
        <!-- 🔹 Pesan sukses/error -->
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- 🔹 Isi konten -->
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Sistem Kampus | Laravel 11</p>
    </footer>
</body>
</html>
