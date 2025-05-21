<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
</head>

<body>
    <h2>Halo, {{ $user->name }}</h2>
    <p>Terima kasih telah mendaftar. Berikut adalah kode verifikasi email Anda:</p>
    <h1 style="letter-spacing: 4px;">{{ $otp }}</h1>
    <p>Kode ini berlaku untuk satu kali verifikasi.</p>
    <p>Jika Anda tidak merasa melakukan pendaftaran, silakan abaikan email ini.</p>
    <br>
    <p>Salam,</p>
    <p><strong>Evolvance Development</strong></p>
</body>

</html>