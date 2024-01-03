<!DOCTYPE html>
<html>
<head>
<style>
    body {
        background-image: url('sertifikat.png');
        font-family: Arial, sans-serif;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .container {
        text-align: center;
        margin-top: 100px;
        background-color: rgba(255, 255, 255, 0.7);
        padding: 20px;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Sertifikat</h1>
        <p>Diberikan kepada:</p>
        <h2>{{ $nama }}</h2>
        <p>Atas prestasinya dalam cabang olahraga {{ $cabangOlahraga }}</p>
        <p>Kontingen: {{ $kontingen }}</p>
        <p>Medali: {{ $medali }}</p>
    </div>
</body>
</html>