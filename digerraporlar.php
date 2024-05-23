<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diğer Raporlar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Diğer Raporlar</h2>
        <div class="row mt-4">
            <div class="col-md-12">
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=2020_mezunlari'">2020 Yılında Mezun Olan
                    Öğrenciler</button>
                <button class="btn btn-secondary btn-block"
                    onclick="window.location.href='rapor.php?type=bilisim_sektorunde'">Bilişim Sektöründe Çalışan
                    Öğrenciler</button>
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=yeni_mezunlar'">Son 2 Yılda Mezun Olan
                    Öğrenciler</button>
                <button class="btn btn-secondary btn-block"
                    onclick="window.location.href='rapor.php?type=turkiye_disinda'">Türkiye Dışında Çalışan
                    Öğrenciler</button>
                <button class="btn btn-primary btn-block"
                    onclick="window.location.href='rapor.php?type=kamuda_calisan'">Kamuda Çalışan Öğrenciler</button>
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