<?php
//Template
$title = "Demirbaş Listesi";
ob_start();
// Veritabanı bağlantısı yapılıyor
include 'baglanti.php';

// Arama kutusunda bir şey aranmamışsa tüm demirbaşlar listeleniyor
if (empty($_GET['search'])) {
  $sql = "SELECT * FROM demirbaslar";
} else {
  // Arama kutusunda bir şey aranmışsa sadece ilgili demirbaşlar listeleniyor
  $search = mysqli_real_escape_string($conn, $_GET['search']);
  $sql = "SELECT * FROM demirbaslar WHERE barkod LIKE '%$search%' OR lokasyon LIKE '%$search%' OR personel LIKE '%$search%'";
}

$result = mysqli_query($conn, $sql);
?>

<h2>Demirbaş Listesi</h2>

<form action="listele.php" method="get">
  <label for="search">Ara:</label>
  <input type="text" id="search" name="search">
  <button type="submit">Ara</button>
</form>

<table>
  <tr>
    <th>Barkod</th>
    <th>Lokasyon</th>
    <th>Personel</th>
    <th></th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['barkod']; ?></td>
      <td><?php echo $row['lokasyon']; ?></td>
      <td><?php echo $row['personel']; ?></td>
      <td><a href="duzenle.php?barkod=<?php echo $row['barkod']; ?>">Düzenle</a></td>
    </tr>
  <?php } ?>
</table>

<?php
$content = ob_get_clean();
include 'css/template.php';
?>

