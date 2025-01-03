
<div class="page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa</title>
    <style>
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #f5f0f7;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
        }
        form.register {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 15px;
            color: #555;
            font-weight: 600;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus {
            border-color: #4CAF50;
            outline: none;
        }
        input[type="submit"] {
            margin-top: 30px;
            padding: 14px;
            background-color: #ae3add;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="color: #ae3add;">Pendaftaran Siswa</h2>
        <form class="register" action="" method="POST">
            <label for="nis" style="color: #ae3add;">NIS:</label>
            <input type="text" id="nis" name="nis" required>
            
            <label for="nama" style="color: #ae3add;">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="kelas" style="color: #ae3add;">Kelas:</label>
            <input type="text" id="kelas" name="kelas" required>

            <label for="jurusan" style="color: #ae3add;">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" required>
            
            <label for="username" style="color: #ae3add;">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password" style="color: #ae3add;">Password:</label>
            <input type="password" id="password" name="password" required>
        
            <label for="telp" style="color: #ae3add;">Nomor Telepon:</label>
            <input type="text" id="telp" name="telp" required>
            
            <input type="submit" value="Daftar">
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pengaduandigital";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $nis = $conn->real_escape_string($_POST['nis']);
            $nama = $conn->real_escape_string($_POST['nama']);
            $kelas = $conn->real_escape_string($_POST['kelas']);
            $jurusan = $conn->real_escape_string($_POST['jurusan']);
            $username = $conn->real_escape_string($_POST['username']);
            $password = $conn->real_escape_string($_POST['password']); // Simpan password asli
            $telp = $conn->real_escape_string($_POST['telp']);

            $sql = "INSERT INTO siswa (nis, nama, kelas, jurusan, username, password, telp) VALUES ('$nis', '$nama', '$kelas', '$jurusan', '$username', '$password', '$telp')";
            if ($conn->query($sql) === TRUE) {
                    echo "<div class='message success'>Pendaftaran berhasil!</div>";
                    echo "<script>
                    window.location.href = 'index.php?page=loginsiswa';
                    </script>";
            } else {
                echo "<div class='message error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</div>
