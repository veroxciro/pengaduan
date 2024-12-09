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

        .slider-dot button.active {
            background-color: #fff;
            transform: scale(1.2);
        }

        .welcome-section {
            background-color: #f5f0f7;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .welcome-section h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .welcome-section p {
            margin-bottom: 15px;
        }

        .operator-tools {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .tool {
            display: block;
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .tool h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #ae3add;
        }

        .tool p {
            font-size: 16px;
            color: #7f8c8d;
        }

        .tool:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>

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

    <div class="welcome-section">
        <h2>Selamat Datang Operator SMKN 6 Kota Bekasi</h2>
        <p>Operator dapat mengelola pengaduan yang masuk melalui sistem kami. Pastikan Anda selalu update untuk memberikan layanan terbaik bagi warga sekolah.</p>
        <p>Anda dapat memulai dengan mengakses berbagai fitur di bawah ini untuk memonitor dan mengelola setiap pengaduan yang ada.</p>
    </div>

    <div class="operator-tools">
        <a href="indexoperator.php?page=sarana" class="tool">
            <h3>Dashboard Pengaduan</h3>
            <p>Monitor status pengaduan dan pastikan pengelolaannya tepat waktu.</p>
        </a>
        <a href="indexoperator.php?page=daftar" class="tool">
            <h3>Manajemen Akun</h3>
            <p>Kelola akun pengguna sekolah dan operator dengan mudah.</p>
        </a>
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

        showSlide(0);
        setInterval(autoSlide, 8000);

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => showSlide(index));
        });
    </script>
</div>



