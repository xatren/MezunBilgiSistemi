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

$sql1 = "UPDATE Ogrenciler SET 
        AD = '$firstName', 
        Soyad = '$lastName', 
        Mezuniyet_Tarihi = '$graduationDate', 
        CepTel = '$mobilePhone', 
        Eposta = '$email', 
        EvTel = '$homePhone', 
        EvUlke = '$country', 
        EvSehir = '$city', 
        EvAdress = '$address',
        Notes = '$notes'
        WHERE Ogrenci_NO = '$studentNo'";

$sql2 = "UPDATE EgitimBilgileri SET 
        AkademikEgitim = '$academicEducation', 
        Baslangic = '$startDate', 
        Bitis = '$endDate', 
        Ulke = '$educationCountry', 
        Sehir = '$educationCity', 
        Universite = '$university' 
        WHERE Ogrenci_NO = '$studentNo'";

$sql3 = "UPDATE IsBilgileri SET 
        IseGirisTarihi = '$jobStartDate', 
        IstenAyrilisTarihi = '$jobEndDate', 
        Kamu_Ozel = '$publicPrivate', 
        Sektor = '$sector', 
        Unvan = '$title', 
        Pozisyon = '$position' 
        WHERE Ogrenci_NO = '$studentNo'";

if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
    echo "Kayıt başarıyla güncellendi.";
    header("Location: projeindex.php?updated=1");
    exit;
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();
?>