<?php
//Template
$title = "Demirbaş Ekle";
ob_start();

// Veritabanı bağlantısı yapılıyor
include 'baglanti.php';

// Tüm farklı grup adlarını al
$sql = "SELECT DISTINCT grup FROM demirbaslar";
$result = mysqli_query($conn, $sql);

// Grup adlarını bir diziye kaydet
$gruplar = array();
while ($row = mysqli_fetch_assoc($result)) {
    $gruplar[] = $row['grup'];
}


?>

<main>
  <div class="container">
    <h2 class="section-title">Demirbaş Ekle</h2>

    <form action="kayit.php" method="post">
      <div class="form-group">
        <label for="barkod">Barkod:</label>
        <input type="text" id="barkod" name="barkod" required>
      </div>
      <div class="form-group">
        <label for="personel">Personel:</label>
        <input type="text" id="personel" name="personel" required>
      </div>
      <div class="form-group">
        <label for="lokasyon">Lokasyon:</label>
        <input type="text" id="lokasyon" name="lokasyon" required>
      </div>
      <div class="form-group">
        <label for="tarih">Tarih:</label>
        <input type="date" id="tarih" name="tarih" required>
      </div>
      <div class="form-group">
        <label for="grup">Grup:</label>
        <select id="grup" name="grup" required>
          <?php foreach ($gruplar as $grup) : ?>
            <option value="<?php echo $grup; ?>"><?php echo $grup; ?></option>
          <?php endforeach;?>
        </select>
      </div>
      <div class="form-group">
        <label for="marka">Marka:</label>
        <input type="text" id="marka" name="marka" required>
      </div>
      <div class="form-group">
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required>
      </div>
      <div class="form-group">
        <label for="serino">Seri No:</label>
        <input type="text" id="serino" name="serino" required>
      </div>
      <button type="submit" class="button">Kaydet</button>
    </form>
  </div>
</main>

<?php

// Formdan gelen veriler veritabanına kaydediliyor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $barkod = mysqli_real_escape_string($conn, $_POST['barkod']);
  $personel = mysqli_real_escape_string($conn, $_POST['personel']);
  $lokasyon = mysqli_real_escape_string($conn, $_POST['lokasyon']);
  $tarih = mysqli_real_escape_string($conn, $_POST['tarih']);
  $grup = mysqli_real_escape_string($conn, $_POST['grup']);
  $marka = mysqli_real_escape_string($conn, $_POST['marka']);
  $model = mysqli_real_escape_string($conn, $_POST['model']);
  $serino = mysqli_real_escape_string($conn, $_POST['serino']);

  $sql = "INSERT INTO demirbaslar (barkod, personel, lokasyon, tarih, grup, marka, model)
          VALUES ('$barkod', '$personel', '$lokasyon', '$tarih', '$grup', '$marka', '$model', '$serino')";

  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit();
  } else {
    header("Location: hata.php");
    exit();
  }
}

//Template
$content = ob_get_clean();
include 'css/template.php';
?>
