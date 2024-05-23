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

$deleted = false;

if (isset($_POST['delete'])) {
    if (!empty($_POST['delete'])) {
        foreach ($_POST['delete'] as $delete_id) {
            $sql = "DELETE FROM ogrenciler WHERE Ogrenci_NO = '$delete_id'";
            $conn->query($sql);
        }
        $deleted = true;
        header("Location: projeindex.php?deleted=$deleted");
        exit;
    } else {
        echo "Lütfen silmek için en az bir kayıt seçin.";
    }
}

$conn->close();
?>