<?php
session_start();

if (!isset($_SESSION['student_no'])) {
    header('Location: login.php?error=' . urlencode('Once giris yapmalisiniz.'));
    exit;
}

$studentNo = htmlspecialchars($_SESSION['student_no'], ENT_QUOTES, 'UTF-8');
$loginEmail = htmlspecialchars($_SESSION['login_email'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hosgeldiniz <?php echo $studentNo; ?></title>
  <meta name="description" content="Basarili giris sayfasi.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body data-page="login">
  <main class="welcome-shell">
    <section class="glass-card welcome-card">
      <p class="eyebrow">Giris Basarili</p>
      <h1>Hosgeldiniz <?php echo $studentNo; ?></h1>
      <p>Aktif kullanici: <?php echo $loginEmail; ?></p>
      <div class="hero-actions justify-content-center">
        <a class="btn btn-accent" href="index.html">Siteye don</a>
        <a class="btn btn-outline-light" href="login.php?logout=1">Cikis yap</a>
      </div>
    </section>
  </main>
  <script src="js/common.js"></script>
</body>
</html>
