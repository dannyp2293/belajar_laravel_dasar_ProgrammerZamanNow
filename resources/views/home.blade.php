<!DOCTYPE html>
<html>
<head>
    <title>Contoh URL Generation Laravel</title>
</head>
<body>
    <h1>🏠 Halaman Utama</h1>

    <h3>🔗 Contoh URL Helper</h3>
    <p><a href="{{ url('profile') }}">Ke Profil (pakai url())</a></p>

    <h3>🔗 Contoh Route Helper</h3>
    <p><a href="{{ route('user.show', ['id' => 10]) }}">Lihat User #10 (pakai route())</a></p>
    <p><a href="{{ route('user.edit', ['id' => 10]) }}">Edit User #10</a></p>

    <h3>🔗 Contoh Action Helper</h3>
    <p><a href="{{ action([App\Http\Controllers\UserControllerUrlGenerations::class, 'profile']) }}">Profil (pakai action())</a></p>
    <p><a href="{{ action([App\Http\Controllers\UserControllerUrlGenerations::class, 'show'], ['id' => 5]) }}">Lihat User #5</a></p>

    <h3>📎 Contoh Form ke Route</h3>
    <form action="{{ route('user.edit', ['id' => 7]) }}" method="GET">
        <button type="submit">Edit User #7</button>
    </form>

    <hr>
    <small>Generated URL contoh: {{ url()->current() }}</small>
</body>
</html>
