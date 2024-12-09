<?php
// Koneksi database
$host = "localhost";
$username = "root";
$password = "";
$database = "pengaduandigital";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil ID pengaduan dari URL
$id_pengaduan = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_pengaduan === 0) {
    die("ID pengaduan tidak valid.");
}

// Ambil data pengaduan
$query = "SELECT p.*, s.nama AS nama_pelapor FROM pengaduan p JOIN siswa s ON p.nis = s.nis WHERE p.id_pengaduan = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $id_pengaduan);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$pengaduan = mysqli_fetch_assoc($result);

if (!$pengaduan) {
    die("Pengaduan tidak ditemukan.");
}

// Ambil data tanggapan
$query = "SELECT * FROM tanggapan WHERE id_pengaduan = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $id_pengaduan);
mysqli_stmt_execute($stmt);
$result_tanggapan = mysqli_stmt_get_result($stmt);
$tanggapan = mysqli_fetch_assoc($result_tanggapan);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Tanggapan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .hover\:scale-105:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8 fade-in">
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-2xl font-bold mb-4">
                <i class="fas fa-check-circle mr-2"></i>
                Detail Pengaduan
            </h1>
            <div class="mb-4">
                <h2 class="font-semibold">Detail Pengaduan</h2>
                <?php if ($pengaduan): ?>
                    <p><strong>Id Pengaduan:</strong> <?php echo htmlspecialchars($pengaduan['id_pengaduan']); ?></p>
                    <p><strong>Pelapor:</strong> <?php echo htmlspecialchars($pengaduan['nama_pelapor']); ?></p>
                    <p><strong>Tanggal:</strong> <?php echo date('d/m/Y', strtotime($pengaduan['tgl_pengaduan'])); ?></p>
                    <p><strong>Isi Laporan:</strong> <?php echo nl2br(htmlspecialchars($pengaduan['isi_laporan'])); ?></p>
                    <div class="bg-white p-4 rounded-lg shadow-xl mb-4">
                        <h2 class="font-bold"><i class="fas fa-image mr-2"></i>Foto Laporan</h2>
                        <?php if (!empty($pengaduan['foto'])): ?>
                            <p class="mb-2"><strong>Nama File:</strong> <?php echo htmlspecialchars($pengaduan['foto']); ?></p>
                            <img id="fotoLaporan" src="./assets/images-uploaded/<?php echo htmlspecialchars($pengaduan['foto']); ?>" alt="file foto" class="mb-4" style="max-width: 100%; height: auto;">
                        <?php else: ?>
                            <p>Tidak ada foto yang diunggah.</p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <p>Data pengaduan tidak ditemukan.</p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <h2 class="font-semibold"><i class="fas fa-comment mr-2"></i>Tanggapan</h2>
                <?php if (!empty($tanggapan) && !empty($tanggapan['tanggapan'])): ?>
                    <p><strong>Tanggapan:</strong> <?php echo htmlspecialchars($tanggapan['tanggapan']); ?></p>
                    <?php if (!empty($tanggapan['file'])): ?>
                        <p class="mb-2"><strong>Nama File:</strong> <?php echo htmlspecialchars($tanggapan['file']); ?></p>
                        <a href="assets/file/<?php echo htmlspecialchars($tanggapan['file']); ?>" download class="inline-flex mt-10 items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 transition-all duration-200 transform hover:scale-105">
                            <i class="fas fa-download mr-2"></i>Download File Tanggapan
                        </a>
                    <?php else: ?>
                        <p>Tidak ada file yang diunggah.</p>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="text-gray-500 italic">Belum Ada Tanggapan</p>
                <?php endif; ?>
            </div>

            <a href="indexsiswa.php?page=sarana" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 transition-all duration-200 transform hover:scale-105">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
            
            <!-- Tombol Cetak Laporan -->
            <button id="cetakLaporan" class="inline-flex mt-4 items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300 transition-all duration-200 transform hover:scale-105">
                <i class="fas fa-print mr-2"></i>Cetak Laporan
            </button>
        </div>
    </div>

    <script>
        document.getElementById('cetakLaporan').addEventListener('click', function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Menambahkan detail pengaduan ke PDF
            doc.setFont("helvetica", "normal");
            doc.text("Detail Pengaduan", 20, 20);
            doc.text("Id Pengaduan: <?php echo $id_pengaduan; ?>", 20, 30);
            doc.text("Pelapor: <?php echo htmlspecialchars($pengaduan['nama_pelapor']); ?>", 20, 40);
            doc.text("Tanggal: <?php echo date('d/m/Y', strtotime($pengaduan['tgl_pengaduan'])); ?>", 20, 50);
            doc.text("Isi Laporan: <?php echo nl2br(htmlspecialchars($pengaduan['isi_laporan'])); ?>", 20, 60);

            // Menambahkan foto pengaduan ke PDF jika ada
            <?php if (!empty($pengaduan['foto'])): ?>
                doc.addImage("./assets/images-uploaded/<?php echo htmlspecialchars($pengaduan['foto']); ?>", "JPEG", 20, 70, 180, 120);
            <?php endif; ?>

            // Output PDF
            doc.save('Laporan_Pengaduan_<?php echo $id_pengaduan; ?>.pdf');
        });
    </script>
</body>
</html>
