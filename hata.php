<?php

//Template
$title = "Demirbaş Ekle";
ob_start();

// Gelen hata mesajını yakalayalım
$error = isset($_GET['error']) ? $_GET['error'] : 'Bilinmeyen bir hata oluştu.';

// Hata mesajını gösterelim
echo "<h3>Hata:</h3><p>{$error}</p>";
?>

<?php
$content = ob_get_clean();
include 'css/template.php';
?>