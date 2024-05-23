<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapor Alma Sayfası</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Rapor Alma Sayfası</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Eğitim Bilgileri Raporlar</h3>
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=doktora'">Doktora Yapan Öğrencileri Listele</button>
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=doktora_turkiye'">Türkiye'de Doktora Yapan Öğrencileri
                    Listele</button>
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=doktora_yurtdisi'">Yurtdışında Doktora Yapan
                    Öğrencileri Listele</button>
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=yukseklisans'">Yüksek Lisans Yapan Öğrencileri
                    Listele</button>
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=yukseklisans_turkiye'">Türkiye'de Yüksek Lisans Yapan
                    Öğrencileri Listele</button>
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=yukseklisans_yurtdisi'">Yurtdışında Yüksek Lisans
                    Yapan Öğrencileri Listele</button>
            </div>
            <div class="col-md-6">
                <h3>İş Bilgileri Raporlar</h3>
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=ise_giren'">Mezuniyetinin Ardından 3-5 Yıl Arası İşe
                    Girenler</button>
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=yonetici'">Mezuniyetinin Ardından 10 Yıl İçinde
                    Yönetici Konumuna Gelenler</button>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="projeindex.php" class="btn btn-info">Geri Dön</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>