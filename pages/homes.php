<div class="page">
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .slider-container {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px;
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 100%;
        }

        .slider-image {
            min-width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slider-nav button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.7);
            color: #333;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .slider-nav button:hover {
            background-color: rgba(255, 255, 255, 0.9);
        }

        .slider-nav .prev {
            left: 20px;
        }

        .slider-nav .next {
            right: 20px;
        }

        .slider-dot {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }

        .slider-dot button {
            width: 12px;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            border-radius: 50%;
            margin: 0 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .popup {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
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
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }


        .slider-dot button.active {
            background-color: #fff;
            transform: scale(1.2);
        }

        .visitors {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .visitors h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .service-description p {
            margin-bottom: 15px;
        }

        .cta-button {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="slider-container">
            <div class="slider-wrapper">
                <img src="images/slider1.JPG" alt="Sekolah" class="slider-image">
                <img src="images/slider2.jpg" alt="Sekolah" class="slider-image">
                <img src="images/slider.3.jpg" alt="Sekolah" class="slider-image">
            </div>
            <div class="slider-nav">
                <button class="prev" onclick="changeSlide(-1)">&lt;</button>
                <button class="next" onclick="changeSlide(1)">&gt;</button>
            </div>
            <div class="slider-dot">
                <button class="dot active"></button>
                <button class="dot"></button>
                <button class="dot"></button>
            </div>
        </div>

        <div class="visitors">
            <h2>Layanan Pengaduan Digital SMKN 6 Kota Bekasi</h2>
            <div class="service-description">
                <p>
                    Selamat datang di Layanan Pengaduan Digital SMKN 6 KOTA BEKASI. Kami berkomitmen untuk terus meningkatkan kualitas sarana, prasarana sekolah, dan pelayanan melalui Mekanisme Penyampaian Pengaduan Digital yang kami sediakan.
                </p>
                <p>
                    Kami mengajak seluruh warga sekolah untuk berpartisipasi aktif dalam mewujudkan visi dan misi sekolah kita. Setiap suara Anda sangat berarti bagi kemajuan SMKN 6 Kota Bekasi.
                </p>
                <p>
                    Mari bersama-sama kita wujudkan SMKN 6 Kota Bekasi yang lebih baik!
                </p>
            </div>
            <a href="indexsiswa.php?page=sarana" class="cta-button">Sampaikan Pengaduan Anda</a>
        </div>
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slider-image');
        const dots = document.querySelectorAll('.slider-dot button');

        function showSlide(n) {
            currentSlide = (n + slides.length) % slides.length;
            const offset = -currentSlide * 100;
            document.querySelector('.slider-wrapper').style.transform = `translateX(${offset}%)`;
            updateDots();
        }

        function changeSlide(n) {
            showSlide(currentSlide + n);
        }

        function updateDots() {
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function autoSlide() {
            changeSlide(1);
        }

        // Initialize slider
        showSlide(0);

        // Start auto slide every 5 seconds
        setInterval(autoSlide, 8000);

        // Add click events to dots
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
            
            function showLoginPopup() {
                document.getElementById('loginPopup').style.display = 'flex';
            }

            function closeLoginPopup() {
                document.getElementById('loginPopup').style.display = 'none';
            }

            document.querySelector('.cta-button').addEventListener('click', (event) => {
                event.preventDefault(); // Mencegah peralihan halaman
                showLoginPopup();
});



        });
    </script>

<div class="popup" id="loginPopup">
    <div class="popup-content">
        <h2>Login Terlebih Dahulu</h2>
        <p>Silakan login untuk melanjutkan.</p>
        <button class="btn" onclick="window.location.href='index.php?page=loginsiswa'">Login</button>
        <button class="btn" onclick="closeLoginPopup()">Tutup</button>
    </div>
</div>

    </body>
    </div>
</div>