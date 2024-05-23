<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: projeLogin.php");
    exit;
}

include ("dataabase.php");


if ($conn->connect_error) {
    die("Veritabanına bağlantı sağlanamadı: " . $conn->connect_error);
}

$sql = "SELECT * FROM ogrenciler";
$result = $conn->query($sql);
$total_records = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mezun Bilgi Sistemi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="projeindex.css" />
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        max-width: 1800px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table-container {
        overflow-x: auto;
    }

    h1 {
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Mezun Bilgi Sistemi</h1>
        <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
        <div class="alert alert-success text-center" role="alert">
            Kayıt başarı ile silindi.
        </div>
        <?php endif; ?>
        <?php if (isset($_GET['updated']) && $_GET['updated'] == 1): ?>
        <div class="alert alert-success text-center" role="alert">
            Kayıt başarıyla güncellendi.
        </div>
        <?php endif; ?>
        <div class="text-center my-4">
            <a href="projeKayitEkle.php" class="btn btn-primary">Yeni Kayıt</a>
            <form id="mainForm" method="post" action="projeSil.php"
                onsubmit="return confirm('Silmek istiyor musunuz?');" style="display:inline;">
                <input type="submit" name="delete" value="Kayıt Sil" class="btn btn-danger">
            </form>
            <a href="raporAlmaSayfasi.php" class="btn btn-success">Öğrenci Listesi Rapor</a>
            <a href="digerraporlar.php" class="btn btn-info">Diğer Raporlar</a>
        </div>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Öğrenci NO</th>
                        <th>AD</th>
                        <th>Soyad</th>
                        <th>Mezuniyet Tarihi</th>
                        <th>CepTel</th>
                        <th>Eposta</th>
                        <th>EvTel</th>
                        <th>EvÜlke</th>
                        <th>EvŞehir</th>
                        <th>EvAdress</th>
                        <th>Seçim</th>
                        <th>Detaylı Görünüm</th>
                        <th>Kayıt Güncelle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Ogrenci_NO"] . "</td>";
                            echo "<td>" . $row["AD"] . "</td>";
                            echo "<td>" . $row["Soyad"] . "</td>";
                            echo "<td>" . $row["Mezuniyet_Tarihi"] . "</td>";
                            echo "<td>" . $row["CepTel"] . "</td>";
                            echo "<td>" . $row["Eposta"] . "</td>";
                            echo "<td>" . $row["EvTel"] . "</td>";
                            echo "<td>" . $row["EvUlke"] . "</td>";
                            echo "<td>" . $row["EvSehir"] . "</td>";
                            echo "<td>" . $row["EvAdress"] . "</td>";
                            echo "<td><input type='checkbox' name='delete[]' value='" . $row["Ogrenci_NO"] . "'></td>";
                            echo "<td><a href='ogrenciDetay.php?id=" . $row["Ogrenci_NO"] . "' class='btn btn-info'>Detaylı Görünüm</a></td>";
                            echo "<td><a href='update.php?id=" . $row["Ogrenci_NO"] . "' class='btn btn-warning'>Kayıt Güncelle</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13' class='text-center'>Tabloda herhangi bir veri bulunamadı.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
            <strong>Toplam Kayıt Sayısı: <?php echo $total_records; ?></strong>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$conn->close();
?>