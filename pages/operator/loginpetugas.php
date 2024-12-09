<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7d4bff396b.js" crossorigin="anonymous"></script>
    <title>Login Siswa</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: linear-gradient(to bottom, #0f0c29, #6760c3, #24243e);
            display: block;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: url("https://img.freepik.com/premium-vector/abstract-realistic-technology-particle-background_23-2148414765.jpg?w=740") no-repeat center/ cover;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            margin: 3% 35%;
        }

        .login-box h2 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .input-field {
            position: relative;
            margin-bottom: 20px;
        }

        /* Input field styling */
        .input-field input {
            padding: 12px 40px 12px 40px; /* Space for the icon */
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        /* Styling for icons inside input fields */
        .input-field .fa {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
        }

        /* Password toggle styling */
        .password-toggle {
            margin-bottom: 20px;
        }

        .password-toggle input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #ffffff;
            color: #8c1bb9;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-weight: bold; /* Membuat teks menjadi tebal (bold) */
            font-family: 'Roboto', Arial, sans-serif; /* Pilih font yang lebih tebal */
        }

        input[type="submit"]:hover {
            background-color: #bd62e1;
            transform: scale(1.05);
        }

        .error-message {
            color: #ff0000;
            text-align: center;
            margin-top: 10px;
        }

        .success-message {
            color: #008000;
            text-align: center;
            margin-top: 10px;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            color: white; /* warnna daftar kiri */
        }

        .register-link a {
            color: #ae3add; /* warna daftar nya */
            font-weight: bold; /* Menambahkan font tebal */
            text-decoration: none; /* Menghapus garis bawah */
        }

        .register-link a:hover {
            color: #8e44ad; /* Warna ungu lebih gelap saat hover */
        text-decoration: underline; /* Garis bawah saat hover */
        }
        label {
            color: white; /* Mengubah warna teks menjadi putih */
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login Petugas</h2>
        <form class="login" action="" method="post">
            <!-- Username Input Field with Icon -->
            <div class="input-field">
                <i class="fa fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>

            <!-- Password Input Field with Icon -->
            <div class="input-field">
                <i class="fa fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>

            <!-- Show Password Toggle -->
            <div class="password-toggle">
                <input type="checkbox" id="showPassword" onclick="togglePassword()">
                <label for="showPassword">Tampilkan password</label>
            </div>

            <!-- Submit Button -->
            <input type="submit" value="Login">
        </form>

        <!-- Script for Toggling Password Visibility -->
        <script>
            function togglePassword() {
                var passwordInput = document.getElementById("password");
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            }
        </script>

        <!-- Registration Link -->
        <div class="register-link">
            Belum punya akun? <a href="index.php?page=registerpetugas">Daftar di sini</a>
        </div>

        <?php        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pengaduandigital";

        // Koneksi ke database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari form login
            $username = $conn->real_escape_string($_POST['username']);
            $password = $conn->real_escape_string($_POST['password']);

            // Query untuk mendapatkan data pengguna berdasarkan username dan password
            $sql = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Jika data ditemukan, ambil informasi petugas
                $row = $result->fetch_assoc();
                
                // Start session untuk menyimpan data pengguna
                session_start();
                $_SESSION['nama_petugas'] = $row['nama_petugas'];
                $_SESSION['id_petugas'] = $row['id_petugas'];
                $_SESSION['level'] = $row['level']; // Simpan level pengguna

                // Redirect ke halaman sesuai level
                if ($row['level'] == 'admin') {
                    echo "<script>
                    window.location.href = 'indexadmin.php';
                    </script>";
                } elseif ($row['level'] == 'operator') {
                    echo "<script>
                    window.location.href = 'indexoperator.php';
                    </script>";
                } else {
                    echo "<p class='error-message'>Level pengguna tidak dikenali</p>";
                }
                exit();
            } else {
                // Jika data tidak ditemukan, tampilkan pesan error
                echo "<p class='error-message'>Username atau password salah</p>";
            }
        }

        $conn->close();        
        ?>
    </div>
</body>
</html>
