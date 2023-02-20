<?php
// Veritabanı bağlantısı yapılıyor
include 'baglanti.php';

// Silinecek demirbaşın barkod numarası alınıyor
$barkod = mysqli_real_escape_string($conn, $_POST['barkod']);

// Veritabanından ilgili demirbaş kaydı siliniyor
$sql = "DELETE FROM demirbaslar WHERE barkod = '$barkod'";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Silme İşlemi Gerçekleşti');  window.location='listele.php'</script>";
} else {
    echo "<script>alert('Hata: " . $sql . "<br>" . $conn->error . "'); window.location='listele.php';</script>";
}

// Veritabanı bağlantısı kapatılıyor
mysqli_close($conn);
?>