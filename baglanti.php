<?php
// Veritabanı bağlantısı
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Bağlantı kontrolü yapılıyor
$conn = new mysqli($servername, $username, $password, $dbname);
// Hata varsa hata.php sayfasına yönlendiriliyor
if ($conn->connect_error) {
  header("Location: hata.php");
  exit();
}
?>
