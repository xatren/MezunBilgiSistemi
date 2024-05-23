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

$type = $_GET['type'];

$sql = "";
$title = "";

switch ($type) {
    case 'doktora':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE EgitimBilgileri.AkademikEgitim = 'Doktora'";
        $title = "Doktora Yapan Öğrenciler";
        break;
    case 'doktora_turkiye':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE EgitimBilgileri.AkademikEgitim = 'Doktora' AND EgitimBilgileri.Ulke = 'Türkiye'";
        $title = "Türkiye'de Doktora Yapan Öğrenciler";
        break;
    case 'doktora_yurtdisi':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE EgitimBilgileri.AkademikEgitim = 'Doktora' AND EgitimBilgileri.Ulke != 'Türkiye'";
        $title = "Yurtdışında Doktora Yapan Öğrenciler";
        break;
    case 'yukseklisans':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE EgitimBilgileri.AkademikEgitim = 'Yüksek Lisans'";
        $title = "Yüksek Lisans Yapan Öğrenciler";
        break;
    case 'yukseklisans_turkiye':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE EgitimBilgileri.AkademikEgitim = 'Yüksek Lisans' AND EgitimBilgileri.Ulke = 'Türkiye'";
        $title = "Türkiye'de Yüksek Lisans Yapan Öğrenciler";
        break;
    case 'yukseklisans_yurtdisi':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE EgitimBilgileri.AkademikEgitim = 'Yüksek Lisans' AND EgitimBilgileri.Ulke != 'Türkiye'";
        $title = "Yurtdışında Yüksek Lisans Yapan Öğrenciler";
        break;
    case 'ise_giren':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE TIMESTAMPDIFF(YEAR, Mezuniyet_Tarihi, IseGirisTarihi) BETWEEN 3 AND 5";
        $title = "Mezuniyetinin Ardından 3-5 Yıl Arası İşe Girenler";
        break;
    case 'yonetici':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE TIMESTAMPDIFF(YEAR, Mezuniyet_Tarihi, IseGirisTarihi) <= 10 AND Unvan LIKE '%Yönetici%'";
        $title = "Mezuniyetinin Ardından 10 Yıl İçinde Yönetici Konumuna Gelenler";
        break;
    case '2020_mezunlari':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE YEAR(Mezuniyet_Tarihi) = 2020";
        $title = "2020 Yılında Mezun Olan Öğrenciler";
        break;
    case 'bilisim_sektorunde':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE IsBilgileri.Sektor = 'Bilişim'";
        $title = "Bilişim Sektöründe Çalışan Öğrenciler";
        break;
    case 'yeni_mezunlar':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE Mezuniyet_Tarihi >= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)";
        $title = "Son 2 Yılda Mezun Olan Öğrenciler";
        break;
    case 'turkiye_disinda':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE IsBilgileri.Ulke != 'Türkiye'";
        $title = "Türkiye Dışında Çalışan Öğrenciler";
        break;
    case 'kamuda_calisan':
        $sql = "SELECT Ogrenciler.*, EgitimBilgileri.*, IsBilgileri.* 
                FROM Ogrenciler 
                LEFT JOIN EgitimBilgileri ON Ogrenciler.Ogrenci_NO = EgitimBilgileri.Ogrenci_NO 
                LEFT JOIN IsBilgileri ON Ogrenciler.Ogrenci_NO = IsBilgileri.Ogrenci_NO 
                WHERE IsBilgileri.Kamu_Ozel = 'Kamu'";
        $title = "Kamuda Çalışan Öğrenciler";
        break;
    default:
        echo "Geçersiz rapor türü.";
        exit;
}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        max-width: 2200px;
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
        <h2 class="text-center"><?php echo $title; ?></h2>
        <a href="projeindex.php" class="btn btn-info mb-4">Geri Dön</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Öğrenci No</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Mezuniyet Tarihi</th>
                    <th>Cep Telefonu</th>
                    <th>E-posta</th>
                    <th>Ev Telefonu</th>
                    <th>Ev Ülke</th>
                    <th>Ev Şehir</th>
                    <th>Ev Adres</th>
                    <th>Akademik Eğitim</th>
                    <th>Başlangıç Tarihi</th>
                    <th>Bitiş Tarihi</th>
                    <th>Ülke</th>
                    <th>Şehir</th>
                    <th>Üniversite</th>
                    <th>İşe Giriş Tarihi</th>
                    <th>İşten Ayrılış Tarihi</th>
                    <th>Kamu/Özel</th>
                    <th>Sektör</th>
                    <th>Unvan</th>
                    <th>Pozisyon</th>
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
                        echo "<td>" . $row["AkademikEgitim"] . "</td>";
                        echo "<td>" . $row["Baslangic"] . "</td>";
                        echo "<td>" . $row["Bitis"] . "</td>";
                        echo "<td>" . $row["Ulke"] . "</td>";
                        echo "<td>" . $row["Sehir"] . "</td>";
                        echo "<td>" . $row["Universite"] . "</td>";

                        // İş bilgileri kontrol edilerek yazdırılıyor
                        echo "<td>" . (isset($row["IseGirisTarihi"]) ? $row["IseGirisTarihi"] : '') . "</td>";
                        echo "<td>" . (isset($row["IstenAyrilisTarihi"]) ? $row["IstenAyrilisTarihi"] : '') . "</td>";
                        echo "<td>" . (isset($row["Kamu_Ozel"]) ? $row["Kamu_Ozel"] : '') . "</td>";
                        echo "<td>" . (isset($row["Sektor"]) ? $row["Sektor"] : '') . "</td>";
                        echo "<td>" . (isset($row["Unvan"]) ? $row["Unvan"] : '') . "</td>";
                        echo "<td>" . (isset($row["Pozisyon"]) ? $row["Pozisyon"] : '') . "</td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='21' class='text-center'>Veri bulunamadı.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
$conn->close();
?>