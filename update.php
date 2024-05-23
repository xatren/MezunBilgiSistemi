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

$studentNo = $_GET['id'];

// Genel Bilgiler
$sql1 = "SELECT * FROM ogrenciler WHERE Ogrenci_NO = '$studentNo'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

// Eğitim Bilgileri
$sql2 = "SELECT * FROM EgitimBilgileri WHERE Ogrenci_NO = '$studentNo'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

// İş Bilgileri
$sql3 = "SELECT * FROM IsBilgileri WHERE Ogrenci_NO = '$studentNo'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Güncelle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Kayıt Güncelle</h2>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="genel-bilgiler-tab" data-toggle="tab" href="#genel-bilgiler" role="tab"
                    aria-controls="genel-bilgiler" aria-selected="true">Genel Bilgiler</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="egitim-bilgileri-tab" data-toggle="tab" href="#egitim-bilgileri" role="tab"
                    aria-controls="egitim-bilgileri" aria-selected="false">Eğitim Bilgileri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="is-bilgileri-tab" data-toggle="tab" href="#is-bilgileri" role="tab"
                    aria-controls="is-bilgileri" aria-selected="false">İş Bilgileri</a>
            </li>
        </ul>
        <form action="update_save.php" method="post">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="genel-bilgiler" role="tabpanel"
                    aria-labelledby="genel-bilgiler-tab">
                    <div class="form-group">
                        <label for="studentNo">Öğrenci No:</label>
                        <input type="text" class="form-control" id="studentNo" name="studentNo"
                            value="<?php echo $row1['Ogrenci_NO']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="firstName">Ad:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName"
                            value="<?php echo $row1['AD']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Soyad:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName"
                            value="<?php echo $row1['Soyad']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="graduationDate">Mezuniyet Tarihi:</label>
                        <input type="date" class="form-control" id="graduationDate" name="graduationDate"
                            value="<?php echo $row1['Mezuniyet_Tarihi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mobilePhone">Cep Telefonu:</label>
                        <input type="text" class="form-control" id="mobilePhone" name="mobilePhone"
                            value="<?php echo $row1['CepTel']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-posta:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo $row1['Eposta']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="homePhone">Ev Telefonu:</label>
                        <input type="text" class="form-control" id="homePhone" name="homePhone"
                            value="<?php echo $row1['EvTel']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="country">Ev Ülke:</label>
                        <input type="text" class="form-control" id="country" name="country"
                            value="<?php echo $row1['EvUlke']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="city">Ev Şehir:</label>
                        <input type="text" class="form-control" id="city" name="city"
                            value="<?php echo $row1['EvSehir']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Ev Adres:</label>
                        <textarea class="form-control" id="address" name="address"
                            required><?php echo $row1['EvAdress']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notlar:</label>
                        <textarea class="form-control" id="notes" name="notes"></textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="egitim-bilgileri" role="tabpanel" aria-labelledby="egitim-bilgileri-tab">
                    <div class="form-group">
                        <label for="academicEducation">Akademik Eğitim:</label>
                        <input type="text" class="form-control" id="academicEducation" name="academicEducation"
                            value="<?php echo $row2['AkademikEgitim']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Başlangıç Tarihi:</label>
                        <input type="date" class="form-control" id="startDate" name="startDate"
                            value="<?php echo $row2['Baslangic']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="endDate">Bitiş Tarihi:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate"
                            value="<?php echo $row2['Bitis']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="educationCountry">Ülke:</label>
                        <input type="text" class="form-control" id="educationCountry" name="educationCountry"
                            value="<?php echo $row2['Ulke']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="educationCity">Şehir:</label>
                        <input type="text" class="form-control" id="educationCity" name="educationCity"
                            value="<?php echo $row2['Sehir']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="university">Üniversite:</label>
                        <input type="text" class="form-control" id="university" name="university"
                            value="<?php echo $row2['Universite']; ?>" required>
                    </div>
                </div>
                <div class="tab-pane fade" id="is-bilgileri" role="tabpanel" aria-labelledby="is-bilgileri-tab">
                    <div class="form-group">
                        <label for="jobStartDate">İşe Giriş Tarihi:</label>
                        <input type="date" class="form-control" id="jobStartDate" name="jobStartDate"
                            value="<?php echo $row3['IseGirisTarihi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jobEndDate">İşten Ayrılış Tarihi:</label>
                        <input type="date" class="form-control" id="jobEndDate" name="jobEndDate"
                            value="<?php echo $row3['IstenAyrilisTarihi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="publicPrivate">Kamu/Özel:</label>
                        <input type="text" class="form-control" id="publicPrivate" name="publicPrivate"
                            value="<?php echo $row3['Kamu_Ozel']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="sector">Sektör:</label>
                        <input type="text" class="form-control" id="sector" name="sector"
                            value="<?php echo $row3['Sektor']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Unvan:</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="<?php echo $row3['Unvan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Pozisyon:</label>
                        <input type="text" class="form-control" id="position" name="position"
                            value="<?php echo $row3['Pozisyon']; ?>" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <a href="projeindex.php" class="btn btn-info">Geri Dön</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>