<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7d4bff396b.js" crossorigin="anonymous"></script>
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
        background-color: #f4f4f4;
        transition: all 0.3s ease-in-out;
    }

    header {
        background-color: #f5f0f7;
        padding: 1rem;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
        width: 100px;
        height: 100px;
        margin-right: 10px;
        transition: all 0.3s ease-in-out;
    }

    .logo-text {
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease-in-out;
    }

    .logo-text .title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        transition: all 0.3s ease-in-out;
    }

    .logo-text .desc {
        font-size: 18px;
        color: #666;
        transition: all 0.3s ease-in-out;
    }

    .navbar {
        background-color: #f0ecf3;
        padding: 1rem 0;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .navbar:hover {
        background-color: #cab2d7;
        box-shadow: 0 5px 10px rgba(0,0,0,0.2);
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

    .nav-links a, .dropdown .dropbtn {
        color: #ae3add;
        text-decoration: none;
        font-size: 1rem;
        transition: color 0.3s, transform 0.3s;
        font-weight: bold;
    }

    .nav-links a:hover, .dropdown:hover .dropbtn {
        color: #ffffff;
        transform: scale(1.1);
    }

    .dropdown {
        position: relative;
        z-index: 1000;
        transition: all 0.3s ease-in-out;
    }

    .dropdown:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f5f0f7;
        min-width: 160px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
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
        background-color: #ae3add;
    }

    .dropdown:hover .dropdown-content {
        display: block ;
        animation: fadeIn 0.3s ease-in-out;
        z-index: 1000;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .search-form {
        display: flex;
        gap: 0.5rem;
        transition: all 0.3s ease-in-out;
    }

    .search-form input {
        padding: 0.5rem;
        border: none;
        border-radius: 4px;
        transition: all 0.3s ease-in-out;
    }

    .search-form input:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(46, 204, 113, 0.5);
    }

    .search-form button {
        padding: 0.5rem 1rem;
        background: linear-gradient(to bottom, #cab2d7, #6760c3, #414155);
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    .search-form button:hover {
        background-color: #27ae60;
        transform: scale(1.05);
    }

    .main-content {
        max-width: 1500px;
        padding: 5rem;
        background: linear-gradient(to bottom, #cab2d7, #6760c3, #414155);
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease-in-out;
    }

    footer {
        background-color: #f5f0f7;
        color: #773293;
        text-align: center;
        padding: 1rem 0;
        position: fixed;
        bottom: 0;
        width: 100%;
        transition: all 0.3s ease-in-out;
    }

    @media only screen and (max-width: 768px) {
        .header-content, .nav-content {
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

    .logo-text .title, .logo-text .desc {
    color: #ae3add;
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
                <a href="indexsiswa.php"><i class="fas fa-home"></i> Beranda</a>
                <a href="indexsiswa.php?page=kontak"><i class="fas fa-address-book"></i> Kontak</a>
                <div class="dropdown">
                    <a href="#" class="dropbtn"><i class="fas fa-edit"></i> Pengaduan</a>
                    <div class="dropdown-content">
                        <a href="indexsiswa.php?page=sarana"><i class="fas fa-tools"></i> Pengaduan Sarana</a>
                        <a href="indexsiswa.php?page=prasarana"><i class="fas fa-building"></i> Pengaduan Prasarana</a>
                        <a href="#menu3"><i class="fas fa-book"></i> Pengaduan KBM</a>
                    </div>
                </div>
                
            </div>
            <form class="search-form">
                <button><a style="text-decoration:none; color:white;" href="index.php"><i class="fas fa-right-from-bracket"></i>Logout</a></button>

            </form>
        </div>
    </nav>

    <div class="main-content">
        <?php 
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            switch($page) {
                case 'home ':
                    include "pages/home.php";
                    break;
                case 'kontak';
                    include "pages/kontak.php";
                    break;
                case 'sarana';
                    include "pages/siswa/saranasiswa.php";
                    break;
                case'viewsarana';
                    include "pages/viewsarana.php";
                    break;
                    case 'prasarana';
                    include "pages/siswa/prasaranasiswa.php";
                    break;
                    case 'kbm';
                    include "pages/kbm.php";
                    break;
                    case 'sended';
                    include "pages/sended.php";
                    break;
            }
        } else {
            include "pages/home.php";
        }
        ?>
    </div>

    <footer>
        <p class="footer-content">&copy; 2024 Layanan Pengaduan Digital | SMK NEGERI 6 KOTA BEKASI</p>
    </footer>
</body>
</html>
