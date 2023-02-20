<?php
include("baglanti.php");

// Formdan gelen verileri al
$barkod = $_POST['barkod'];
$personel = $_POST['personel'];
$lokasyon = $_POST['lokasyon'];
$tarih = $_POST['tarih'];
$grup = $_POST['grup'];
$marka = $_POST['marka'];
$model = $_POST['model'];
$serino = $_POST['serino'];

// Veritabanında ilgili demirbaşın bilgileri güncelleniyor
$sql = "UPDATE demirbaslar SET personel='$personel', lokasyon='$lokasyon', tarih='$tarih', grup='$grup', marka='$marka', model='$model', serino='$serino' WHERE barkod='$barkod'";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Demirbaş Başarıyla Güncellendi'); window.location='listele.php';</script>";
} else {
    // Hata mesajını al ve hata.php sayfasına yönlendir
    $error_msg = "Hata: " . $sql . "<br>" . $conn->error;
    header("Location: hata.php?msg=" . urlencode($error_msg));
    exit();
}

// Veritabanı bağlantısı kapatılıyor
mysqli_close($conn);
?>
