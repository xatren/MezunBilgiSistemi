<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: projeLogin.php");
    exit;
}

include ("dataabase.php");


// Formdan gelen verileri işleme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Genel Bilgiler
    $studentNo = $_POST['studentNo'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $graduationDate = $_POST['graduationDate'];
    $mobilePhone = $_POST['mobilePhone'];
    $email = $_POST['email'];
    $homePhone = $_POST['homePhone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $notes = $_POST['notes'];

    // Eğitim Bilgileri
    $academicEducation = $_POST['academicEducation'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $educationCountry = $_POST['educationCountry'];
    $educationCity = $_POST['educationCity'];
    $university = $_POST['university'];

    // İş Bilgileri
    $jobStartDate = $_POST['jobStartDate'];
    $jobEndDate = $_POST['jobEndDate'];
    $publicPrivate = $_POST['publicPrivate'];
    $sector = $_POST['sector'];
    $title = $_POST['title'];
    $position = $_POST['position'];

    // Veritabanı bağlantısını oluştur
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Bağlantıyı kontrol et
    if ($conn->connect_error) {
        die("Veritabanına bağlantı sağlanamadı: " . $conn->connect_error);
    }

    // Genel Bilgiler veritabanına veri ekleme
    $sql1 = "INSERT INTO Ogrenciler (Ogrenci_NO, AD, Soyad, Mezuniyet_Tarihi, CepTel, Eposta, EvTel, EvUlke, EvSehir, EvAdress) 
    VALUES ('$studentNo', '$firstName', '$lastName', '$graduationDate', '$mobilePhone', '$email', '$homePhone', '$country', '$city', '$address')";

    // Eğitim Bilgileri veritabanına veri ekleme
    $sql2 = "INSERT INTO EgitimBilgileri (Ogrenci_NO, AkademikEgitim, Baslangic, Bitis, Ulke, Sehir, Universite) 
    VALUES ('$studentNo', '$academicEducation', '$startDate', '$endDate', '$educationCountry', '$educationCity', '$university')";

    // İş Bilgileri veritabanına veri ekleme
    $sql3 = "INSERT INTO IsBilgileri (Ogrenci_NO, IseGirisTarihi, IstenAyrilisTarihi, Kamu_Ozel, Sektor, Unvan, Pozisyon) 
    VALUES ('$studentNo', '$jobStartDate', '$jobEndDate', '$publicPrivate', '$sector', '$title', '$position')";

    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
        echo "Yeni kayıt başarıyla eklendi.";
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Kayit Ekle</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Yeni Kayit Ekle</h2>
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="genel-bilgiler" role="tabpanel"
                    aria-labelledby="genel-bilgiler-tab">
                    <div class="form-group">
                        <label for="studentNo">Öğrenci No:</label>
                        <input type="text" class="form-control" id="studentNo" name="studentNo" required>
                    </div>
                    <div class="form-group">
                        <label for="firstName">Ad:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Soyad:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>
                    <div class="form-group">
                        <label for="graduationDate">Mezuniyet Tarihi:</label>
                        <input type="date" class="form-control" id="graduationDate" name="graduationDate" required>
                    </div>
                    <div class="form-group">
                        <label for="mobilePhone">Cep Telefonu:</label>
                        <input type="text" class="form-control" id="mobilePhone" name="mobilePhone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-posta:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="homePhone">Ev Telefonu:</label>
                        <input type="text" class="form-control" id="homePhone" name="homePhone">
                    </div>
                    <div class="form-group">
                        <label for="country">Ev Ülke:</label>
                        <input type="text" class="form-control" id="country" name="country" required>
                    </div>
                    <div class="form-group">
                        <label for="city">Ev Şehir:</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Ev Adres:</label>
                        <textarea class="form-control" id="address" name="address" required></textarea>
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
                            required>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Başlangıç Tarihi:</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="form-group">
                        <label for="endDate">Bitiş Tarihi:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" required>
                    </div>
                    <div class="form-group">
                        <label for="educationCountry">Ülke:</label>
                        <input type="text" class="form-control" id="educationCountry" name="educationCountry" required>
                    </div>
                    <div class="form-group">
                        <label for="educationCity">Şehir:</label>
                        <input type="text" class="form-control" id="educationCity" name="educationCity" required>
                    </div>
                    <div class="form-group">
                        <label for="university">Üniversite:</label>
                        <input type="text" class="form-control" id="university" name="university" required>
                    </div>
                </div>
                <div class="tab-pane fade" id="is-bilgileri" role="tabpanel" aria-labelledby="is-bilgileri-tab">
                    <div class="form-group">
                        <label for="jobStartDate">İşe Giriş Tarihi:</label>
                        <input type="date" class="form-control" id="jobStartDate" name="jobStartDate" required>
                    </div>
                    <div class="form-group">
                        <label for="jobEndDate">İşten Ayrılış Tarihi:</label>
                        <input type="date" class="form-control" id="jobEndDate" name="jobEndDate" required>
                    </div>
                    <div class="form-group">
                        <label for="publicPrivate">Kamu/Özel:</label>
                        <input type="text" class="form-control" id="publicPrivate" name="publicPrivate" required>
                    </div>
                    <div class="form-group">
                        <label for="sector">Sektör:</label>
                        <input type="text" class="form-control" id="sector" name="sector" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Unvan:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Pozisyon:</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
            <a href="projeindex.php" class="btn btn-info">Geri Dön</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>