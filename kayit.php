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

if (isset($_POST['barkod'])) {
    // barkod numarası formdan gönderilmiş, işleme devam edebiliriz
    $barkod = $_POST['barkod'];
    // burada veritabanında barkod numarasını kontrol etmek için bir sorgu çalıştırabilirsiniz
    // örneğin, barkod numarasının tabloda kaç kez tekrarlandığını sayabilirsiniz
    $result = mysqli_query($conn, "SELECT COUNT(*) FROM demirbaslar WHERE barkod = '$barkod'");
    $row = mysqli_fetch_array($result);
    $count = $row[0];
    if ($count > 0) {
        // barkod numarası veritabanında mevcut, hata mesajı gösterelim
        echo "<script>alert('Bu barkod numarası zaten kayıtlı!');  window.location='ekle.php'</script>";
        exit;
    }
}

// SQL sorgusu oluştur ve veritabanına kaydet
$sql = "INSERT INTO demirbaslar (barkod, personel, lokasyon, tarih, grup, marka, model, serino) VALUES ('$barkod', '$personel', '$lokasyon', '$tarih', '$grup', '$marka', '$model', '$serino')";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Yeni kayıt başarıyla eklendi'); window.location='listele.php';</script>";
} else {
    header("Location: listele.php");
    echo "<script>alert('Hata: " . $sql . "<br>" . $conn->error . "'); window.location='ekle.php';</script>";
}

$conn->close();

?>
