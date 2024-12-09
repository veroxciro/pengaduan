<div class="page">
    <style>
        .page {
            display: block;
        }
        .table-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            color: #ffffff;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ae3add;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #fff;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #ddd;
            color: #333;
        }
    </style>

    <h2 style="color: #ffffff;">Daftar Siswa</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pengaduandigital";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "SELECT nis, nama, username, password, telp FROM siswa";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<table>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Telepon</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["nis"]."</td>
                    <td>".$row["nama"]."</td>
                    <td>".$row["username"]."</td>
                    <td>".$row["password"]."</td>
                    <td>".$row["telp"]."</td>
                  </tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "Tidak ada data siswa.";
    }

    $conn->close();
    ?>

    <!-- Tombol Kembali -->
    <div style="text-align: center;">
        <a href="indexoperator.php" class="back-button">Kembali</a>
    </div>
</div>
