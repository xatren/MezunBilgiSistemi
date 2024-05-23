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

if (!isset($_GET['id'])) {
    echo "Geçersiz öğrenci ID";
    exit;
}

$studentNo = $_GET['id'];

// Genel Bilgiler
$sql1 = "SELECT * FROM ogrenciler WHERE Ogrenci_NO = '$studentNo'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
} else {
    echo "Öğrenci bulunamadı.";
    exit;
}

// Eğitim Bilgileri
$sql2 = "SELECT * FROM EgitimBilgileri WHERE Ogrenci_NO = '$studentNo'";
$result2 = $conn->query($sql2);
$education = [];
if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $education[] = $row2;
    }
}

// İş Bilgileri
$sql3 = "SELECT * FROM IsBilgileri WHERE Ogrenci_NO = '$studentNo'";
$result3 = $conn->query($sql3);
$jobs = [];
if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) {
        $jobs[] = $row3;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Öğrenci Detayları</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Öğrenci Detayları</h2>
        <div class="mb-3">
            <h4>Genel Bilgiler</h4>
            <p><strong>Öğrenci No:</strong> <?php echo $row1['Ogrenci_NO']; ?></p>
            <p><strong>Ad:</strong> <?php echo $row1['AD']; ?></p>
            <p><strong>Soyad:</strong> <?php echo $row1['Soyad']; ?></p>
            <p><strong>Mezuniyet Tarihi:</strong> <?php echo $row1['Mezuniyet_Tarihi']; ?></p>
            <p><strong>Cep Telefonu:</strong> <?php echo $row1['CepTel']; ?></p>
            <p><strong>E-posta:</strong> <?php echo $row1['Eposta']; ?></p>
            <p><strong>Ev Telefonu:</strong> <?php echo $row1['EvTel']; ?></p>
            <p><strong>Ev Ülke:</strong> <?php echo $row1['EvUlke']; ?></p>
            <p><strong>Ev Şehir:</strong> <?php echo $row1['EvSehir']; ?></p>
            <p><strong>Ev Adres:</strong> <?php echo $row1['EvAdress']; ?></p>
        </div>
        <div class="mb-3">
            <h4>Eğitim Bilgileri</h4>
            <?php if (count($education) > 0): ?>
            <ul>
                <?php foreach ($education as $edu): ?>
                <li>
                    <p><strong>Akademik Eğitim:</strong> <?php echo $edu['AkademikEgitim']; ?></p>
                    <p><strong>Başlangıç Tarihi:</strong> <?php echo $edu['Baslangic']; ?></p>
                    <p><strong>Bitiş Tarihi:</strong> <?php echo $edu['Bitis']; ?></p>
                    <p><strong>Ülke:</strong> <?php echo $edu['Ulke']; ?></p>
                    <p><strong>Şehir:</strong> <?php echo $edu['Sehir']; ?></p>
                    <p><strong>Üniversite:</strong> <?php echo $edu['Universite']; ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
            <p>Eğitim bilgisi bulunamadı.</p>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <h4>İş Bilgileri</h4>
            <?php if (count($jobs) > 0): ?>
            <ul>
                <?php foreach ($jobs as $job): ?>
                <li>
                    <p><strong>İşe Giriş Tarihi:</strong> <?php echo $job['IseGirisTarihi']; ?></p>
                    <p><strong>İşten Ayrılış Tarihi:</strong> <?php echo $job['IstenAyrilisTarihi']; ?></p>
                    <p><strong>Kamu/Özel:</strong> <?php echo $job['Kamu_Ozel']; ?></p>
                    <p><strong>Sektör:</strong> <?php echo $job['Sektor']; ?></p>
                    <p><strong>Unvan:</strong> <?php echo $job['Unvan']; ?></p>
                    <p><strong>Pozisyon:</strong> <?php echo $job['Pozisyon']; ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
            <p>İş bilgisi bulunamadı.</p>
            <?php endif; ?>
        </div>
        <a href="projeindex.php" class="btn btn-info">Geri Dön</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>