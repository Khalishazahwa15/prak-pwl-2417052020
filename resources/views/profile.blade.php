<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            background: url('{{ asset('images/bg.jpg') }}') no-repeat center center fixed; 
            background-size: cover;
        }
        .profile-card {
            width: 100%;
            max-width: 380px;
            background: #fffdf7;
            border-radius: 20px;
            padding: 40px 32px 32px;
            box-shadow: 0 10px 30px rgba(201, 164, 60, 0.18), 0 2px 6px rgba(0,0,0,0.04);
            border: 1px solid #f2e2ab;
            position: relative;
            overflow: hidden;
        }

        .profile-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #f5c542, #f2a541, #f5c542);
        }

        .avatar-wrap {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(145deg, #fdf0cf, #f7e2a8);
            border: 3px solid #f5d67a;
            box-shadow: 0 6px 14px rgba(214, 170, 45, 0.25);
        }

        .avatar img {
            width: 100%; 
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .name-heading {
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            color: #3a2f14;
            margin-bottom: 2px;
        }

        .name-sub {
            text-align: center;
            font-size: 13px;
            color: #b08a2e;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 26px;
            text-transform: uppercase;
        }

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fdf6e3;
            border: 1px solid #f0e0ab;
            border-radius: 12px;
            padding: 13px 18px;
        }

        .info-row .label {
            font-size: 12px;
            font-weight: 700;
            color: #a07f2c;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .info-row .value {
            font-size: 15px;
            font-weight: 600;
            color: #2e2712;
        }

        .footer-note {
            text-align: center;
            margin-top: 26px;
            font-size: 11px;
            color: #c2a45c;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>

    <div class="profile-card">
        <div class="avatar-wrap">
            <div class="avatar">
                <img src="{{ asset('images/image.jpeg') }}" alt="Foto Profil">
            </div>
        </div>

        <div class="name-heading">{{ $nama }}</div>
        <div class="name-sub">Mahasiswa Ilmu Komputer</div>

        <div class="info-list">
            <div class="info-row">
                <span class="label">Nama</span>
                <span class="value">{{ $nama }}</span>
            </div>
            <div class="info-row">
                <span class="label">Kelas</span>
                <span class="value">{{ $kelas === 'SI' ? 'Sistem Informasi' : $kelas }}</span>
            </div>
            <div class="info-row">
                <span class="label">NPM</span>
                <span class="value">{{ $npm }}</span>
            </div>
        </div>

        <div class="footer-note">Pemrograman Web Lanjut &middot; Universitas Lampung</div>
    </div>

</body>
</html>