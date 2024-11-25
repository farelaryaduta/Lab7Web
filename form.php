<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
</head>
<body>
    <h2>Masukkan Data Anda</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Nama: <input type="text" placeholder="Masukkan Nama" name="nama"><br><br>
        Tanggal Lahir: <input type="date" name="tanggal_lahir"><br><br>
        Pekerjaan:
        <select name="pekerjaan">
            <option value="Manager IT">Manager IT</option>
            <option value="Desain Grafis">Desain Grafis</option>
            <option value="Office Boy">Office Boy</option>
            <option value="Operator Produksi">Operator Produksi</option>
            <option value="Admin Gudang">Admin Gudang</option>
            <option value="Tour Guide">Tour Guide</option>
        </select><br><br>
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        $umur = $today->diff($birthDate)->y;

        switch ($pekerjaan) {
            case "Manager IT":
                $gaji = 20000000;
                break;
            case "Desain Grafis":
                $gaji = 10000000;
                break;
            case "Office Boy":
                $gaji = 3000000;
                break;
            case "Operator Produksi":
                $gaji = 5000000;
                break;
            case "Admin Gudang":
                $gaji = 8000000;
                break;
            case "Tour Guide":
                $gaji = 7000000;
                break;
            default:
                $gaji = 0;
        }

        // Menampilkan hasil
        echo "<h2>Data yang Anda Masukkan:</h2>";
        echo "Nama: " . $nama . "<br>";
        echo "Umur: " . $umur . " tahun<br>";
        echo "Pekerjaan: " . $pekerjaan . "<br>";
        echo "Gaji: Rp " . number_format($gaji, 0, ",", ".") . "<br>";
    }
    ?>


    
</body>
</html>