<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7d4bff396b.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Pengaduan Digital - SMK Negeri 6 Kota Bekasi</title>
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: "Poppins", sans-serif;
        line-height: 1.6;
        color: #333;
        background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
        transition: all 0.3s ease-in-out;
    }

    header {
        background-color: #f5f0f7; 
        padding: 1rem;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .header-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        transition: all 0.3s ease-in-out;
    }

    .logo {
        display: flex;
        align-items: center;
        transition: all 0.3s ease-in-out;
    }

    .logo img {
        width: 50px;
        height: 50px;
        margin-right: 10px;
        transition: all 0.3s ease-in-out;
    }

    .logo-text {
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease-in-out;
    }

    .logo-text .title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        transition: all 0.3s ease-in-out;
    }

    .logo-text .desc {
        font-size: 14px;
        color: #666;
        transition: all 0.3s ease-in-out;
    }

    .navbar {
        background-color: #f0ecf3; 
        padding: 1rem 0;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar:hover {
        background-color: #f4e6c0; /* Sand (hover effect) */
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .nav-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        transition: all 0.3s ease-in-out;
    }

    .nav-links {
        display: flex;
        gap: 1.5rem;
        transition: all 0.3s ease-in-out;
    }

    .nav-links a,
.dropdown .dropbtn {
    color: #ae3add; /* Warna teks ungu */
    text-decoration: none;
    font-size: 1rem;
    font-family: 'Montserrat', sans-serif; /* Terapkan font Wendy One */
    transition: color 0.3s, transform 0.3s;
    font-weight: bold;
}


    .nav-links a:hover,
    .dropdown:hover .dropbtn {
        color: #f4e6c0; /* Sand */
        transform: scale(1.1);
    }

    .dropdown {
        position: relative;
        z-index: 1000;
        transition: all 0.3s ease-in-out;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f8f5e4; /* Sand */
        min-width: 160px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        border-radius: 4px;
        transition: all 0.3s ease-in-out;
        top: 100%;
        left: 0;
    }

    .dropdown-content a {
        color: #333;
        padding: 12px 16px;
        display: block;
        transition: background-color 0.3s;
    }

    .dropdown-content a:hover {
        background-color: #d6cdbd; /* Soft sand */
    }

    .dropdown:hover .dropdown-content {
        display: block;
        animation: fadeIn 0.3s ease-in-out;
        z-index: 1000;
    }

    .search-form {
        display: flex;
        gap: 0.5rem;
        transition: all 0.3s ease-in-out;
    }

    .search-form input {
        padding: 0.5rem;
        border: 1px solid #d6cdbd; /* Sand border */
        border-radius: 4px;
        transition: all 0.3s ease-in-out;
    }

    .search-form input:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(135, 206, 250, 0.5); /* Sky blue */
    }

    .search-form button {
        padding: 0.5rem 1rem;
        background: linear-gradient(#0f0c29, #6760c3, #24243e);
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    .search-form button:hover {
        background-color: #4682b4; /* Steel blue */
        transform: scale(1.05);
    }

    .main-content {
        max-width: 1500px;
        padding: 2rem;
        background: linear-gradient(to bottom,  #cab2d7, #6760c3, #414155);
        transition: all 0.3s ease-in-out;
    }

    footer {
        background-color: #add8e6; /* Light sky blue */
        color: #333;
        text-align: center;
        padding: 1rem 0;
        position: fixed;
        bottom: 0;
        width: 100%;
        transition: all 0.3s ease-in-out;
    }

    @media only screen and (max-width: 768px) {
        .header-content,
        .nav-content {
            flex-direction: column;
            text-align: center;
        }

        .nav-links {
            margin-top: 1rem;
        }

        .search-form {
            margin-top: 1rem;
        }
    }

    .popup {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Black background with transparency */
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }

    .btn {
        background-color: #87ceeb; /* Sky blue */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #4682b4; /* Steel blue */
    }

    #scrollToTopBtn {
    position: fixed;
    bottom: 65px;
    right: 50px;
    display: none; /* Tombol akan tersembunyi secara default */
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    font-size: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s;
    animation: idleAnim 2s infinite ease-in-out; /* Efek idle */
}

#scrollToTopBtn:hover {
    background-color: #2c81ba;
    transform: scale(1.1);
}

.logo-text .title, .logo-text .desc {
    color: #ae3add;
}

/* Animasi idle naik-turun */
@keyframes idleAnim {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
    100% {
        transform: translateY(0);
    }
}

</style>


</head>

<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="images/Logo6.png" alt="Logo">
                <div class="logo-text">
                    <span class="title">PENGADUAN DIGITAL</span>
                    <span class="desc">SMK NEGERI 6 KOTA BEKASI</span>
                </div>
            </div>
            <i class="fas fa-bell"></i>
        </div>
    </header>

    <nav class="navbar">
        <div class="nav-content">
            <div class="nav-links">
                <a href="index.php"><i class="fas fa-home"></i> Beranda</a>
                <a href="index.php?page=kontak"><i class="fas fa-address-book"></i> Kontak</a>
                <div class="dropdown">
                    <a href="#" class="dropbtn"><i class="fas fa-user"></i> Login</a>
                    <div class="dropdown-content">
                        <a href="index.php?page=loginsiswa"><i class="fas fa-user-graduate"></i> Siswa</a>
                        <a href="index.php?page=loginpetugas"><i class="fas fa-user-tie"></i> Petugas</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropbtn"><i class="fas fa-edit"></i> Pengaduan</a>
                    <div class="dropdown-content">
                        <a onclick="showLoginPopup()"><i class="fas fa-tools"></i> Pengaduan Sarana</a>
                        <a onclick="showLoginPopup()"><i class="fas fa-building"></i> Pengaduan Prasarana</a>
                        <a onclick="showLoginPopup()"><i class="fas fa-book"></i> Pengaduan KBM</a>
                    </div>
                </div>
                <!-- Popup for Login -->
    <div class="popup" id="loginPopup">
        <div class="popup-content">
            <h2>Login Terlebih Dahulu</h2>
            <p>Silakan login untuk melanjutkan.</p>
            <button class="btn" onclick="window.location.href='index.php?page=loginsiswa'">Login</button>
            <button class="btn" onclick="closeLoginPopup()">Tutup</button>
        </div>
    </div>

    <button id="scrollToTopBtn" title="Kembali ke atas">⬆</button>


    <script>
        function showLoginPopup() {
            document.getElementById('loginPopup').style.display = 'flex'; // Show the popup
        }

        function closeLoginPopup() {
            document.getElementById('loginPopup').style.display = 'none'; // Hide the popup
        }

        // Mendapatkan elemen tombol
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');

        // Tampilkan tombol saat menggulir ke bawah
        window.onscroll = function () {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollToTopBtn.style.display = 'block'; // Tampilkan tombol
            } else {
                scrollToTopBtn.style.display = 'none'; // Sembunyikan tombol
            }
        };

        // Gulir ke atas dengan animasi smooth
        scrollToTopBtn.onclick = function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth', // Gulir perlahan
            });
        };
    </script>
               
            </div>
            <form class="search-form">
                <input type="text" placeholder="Cari..." aria-label="Cari">
                <button type="submit"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>
    </nav>

    <div class="main-content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'loginsiswa':
                    include "pages/siswa/loginsiswa.php";
                    break;
                case 'loginpetugas':
                    include "pages/operator/loginpetugas.php";
                    break;
                case 'registersiswa':
                    include "pages/siswa/registersiswa.php";
                    break;
                case 'registerpetugas':
                    include "pages/operator/registerpetugas.php";
                    break;
                case 'daftarsiswa':
                    include "pages/daftarsiswa.php";
                    break;
                case 'homes':
                    include "pages/homes.php";
                    break;
                case 'kontak';
                    include "pages/kontak.php";
                    break;
            }
            exit();
        } else {
            include "pages/homes.php";
        }
        ?>
    </div>

    <footer>
        <p>&copy; 2024 Layanan Pengaduan Digital | SMK NEGERI 6 KOTA BEKASI</p>
    </footer>
</body>
