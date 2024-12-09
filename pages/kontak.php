<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - SMKN 6 Kota Bekasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background: #f8f5e4;
            color: #2c3e50;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1100px;
            margin: 2rem auto;
            padding: 1rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 2rem;
            flex-direction: row-reverse; /* Membalikkan urutan elemen */
        }

        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            flex: 1;
            min-width: 320px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ae3add;
            margin-bottom: 1rem;
        }

        .card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            gap: 1rem;
        }

        .contact-item i {
            font-size: 1.5rem;
            color: #3498db;
        }

        iframe {
            border-radius: 12px;
            width: 100%;
            height: 250px;
            border: none;
        }

        .btn {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.8rem 1.5rem;
            background: #ae3add;
            color: white;
            font-weight: 500;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #2c81ba;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Informasi Sekolah -->
        <div class="card">
            <div class="card-header">Informasi Sekolah</div>
            <img src="images/kepsek6.png" alt="Kepala Sekolah">
            <h3>R. Prawoto Hari Wibowo, M.Pd</h3>
            <p>Kepala SMK Negeri 6 Kota Bekasi</p>
            <div class="contact-item">
            <i class="fas fa-map-marker-alt" style="color: #ae3add;"></i>
                <span>Jl. Kusuma Utara X No.169, Bekasi, Jawa Barat 17111</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone" style="color: #ae3add;"></i>
                <span>(021) 8801386</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope" style="color: #ae3add;"></i>
                <span>info@smkn6kotabekasi.sch.id</span>
            </div>
            <a class="btn" href="https://smkn6kotabekasi.sch.id" target="_blank">Kunjungi Situs Sekolah</a>
        </div>

        <!-- Lokasi Kami -->
        <div class="card">
            <div class="card-header">Lokasi Kami</div>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3027687320535!2d107.00332011485787!3d-6.228847495493223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c71cf827309%3A0xd63b9944d54dc4e1!2sSMK%20Negeri%206%20Kota%20Bekasi!5e0!3m2!1sen!2sid!4v1635774286693!5m2!1sen!2sid" 
                width="100%" 
                height="300" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>
    </div>
</body>
</html>
