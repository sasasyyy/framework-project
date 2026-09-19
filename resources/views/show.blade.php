<! DOCTYPE html>
<html> 
<head>
    <title>Detail Photo</title>
</head>
<body>
    <h1>Detail Photo</h1>
    <p>Anda sedang melihat foto dengan ID: {{ $id }}</p>

    <br>
    <a href="{{ route('photo.index') }}">Kembali ke Daftar Foto</a>
</body>
</html>