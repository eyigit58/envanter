<?php
$title = "Demirbaş Yönetim Sistemi - Ana Sayfa";
ob_start();
?>

<main>
    <div class="container">
        <h2 class="section-title">Ana Sayfa</h2>
        <p>Hoşgeldiniz! Demirbaş Yönetim Sistemine hoşgeldiniz.</p>
    </div>
</main>

<?php
$content = ob_get_clean();
include 'css/template.php';
?>
