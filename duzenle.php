<?php
//Template
$title = "Demirbaş Düzenle";
ob_start();


// Veritabanı bağlantısı yapılıyor
include 'baglanti.php';

// Düzenlenmek istenen demirbaşın bilgileri veritabanından alınıyor
$barkod = mysqli_real_escape_string($conn, $_GET['barkod']);
$sql = "SELECT * FROM demirbaslar WHERE barkod = '$barkod'";
$result = mysqli_query($conn, $sql);
if (!$result) {
  // Hata varsa hata.php sayfasına yönlendir
  header('Location: hata.php');
  exit();
}
$row = mysqli_fetch_assoc($result);
?>

<h2>Demirbaş Düzenle</h2>

<form action="guncelle.php" method="post">
  <label for="barkod">Barkod:</label>
  <input type="text" id="barkod" name="barkod" value="<?php echo $row['barkod']; ?>" readonly>

  <label for="personel">Personel:</label>
  <input type="text" id="personel" name="personel" value="<?php echo $row['personel']; ?>">

  <label for="lokasyon">Lokasyon:</label>
  <input type="text" id="lokasyon" name="lokasyon" value="<?php echo $row['lokasyon']; ?>">

  <label for="tarih">Tarih:</label>
  <input type="date" id="tarih" name="tarih" value="<?php echo $row['tarih']; ?>">

  <label for="grup">Grup:</label>
  <input type="text" id="grup" name="grup" value="<?php echo $row['grup']; ?>" readonly>

  <label for="marka">Marka:</label>
  <input type="text" id="marka" name="marka" value="<?php echo $row['marka']; ?>" readonly>

  <label for="model">Model:</label>
  <input type="text" id="model" name="model" value="<?php echo $row['model']; ?>" readonly>

  <label for="serino">Seri No:</label>
  <input type="text" id="serino" name="serino" value="<?php echo $row['serino']; ?>" readonly>

  <button type="submit">Güncelle</button>
</form>
<!-- Silme formu -->
<form method="post" action="sil.php">
  <input type="hidden" name="barkod" value="<?php echo $row['barkod']; ?>">
  <button type="submit" class=".btn-danger" onclick="return confirm('Bu kaydı silmek istediğinize emin misiniz?')">Sil</button>
</form>

<?php
$content = ob_get_clean();
include 'css/template.php';
?>
