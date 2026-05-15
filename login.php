<?php
session_start();

if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    session_start();
}

$error = isset($_GET['error']) ? htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') : '';
$lastEmail = isset($_GET['email']) ? htmlspecialchars($_GET['email'], ENT_QUOTES, 'UTF-8') : '';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taha Arda Bas | Login</title>
  <meta name="description" content="Ogrenci numarasi tabanli giris sistemi.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body data-page="login">
  <header class="site-header">
    <nav class="navbar navbar-expand-lg site-nav">
      <div class="container">
        <a class="navbar-brand brand-mark" href="index.html">TAB</a>
        <button class="navbar-toggler nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Menuyu ac">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
            <li class="nav-item"><a class="nav-link" href="index.html">Hakkinda</a></li>
            <li class="nav-item"><a class="nav-link" href="cv.html">CV</a></li>
            <li class="nav-item"><a class="nav-link" href="city.html">Sehrim</a></li>
            <li class="nav-item"><a class="nav-link" href="heritage.html">Mirasimiz</a></li>
            <li class="nav-item"><a class="nav-link" href="interests.html">Ilgi Alanlarim</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.html">Iletisim</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="page-shell">
    <section class="page-hero compact-hero">
      <div class="container">
        <p class="eyebrow">Login</p>
        <h1>Giriş Sistemi</h1>
        <p class="page-intro">Ogrenci numarasi ve email tabanli basit bir giris sistemi. Giris bilgileri asagida belirtilmistir.
        </p>
      </div>
    </section>

    <section class="section-shell">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 col-xl-6">
            <section class="glass-card reveal">
              <?php if ($error !== ''): ?>
                <div class="validation-banner is-error"><?php echo $error; ?></div>
              <?php endif; ?>

              <div id="loginClientMessage" class="validation-banner is-error d-none" aria-live="polite"></div>

              <div class="credential-box">
                <h2>Odev icin tanimli giris</h2>
                <p><strong>Kullanici adi:</strong> b241210066@sakarya.edu.tr</p>
                <p><strong>Sifre:</strong> B241210066</p>
              </div>

              <form id="loginForm" action="login-handler.php" method="post" novalidate>
                <div class="mb-3">
                  <label class="form-label" for="loginEmail">Kullanici Adi</label>
                  <input class="form-control" id="loginEmail" name="loginEmail" type="email" value="<?php echo $lastEmail; ?>" placeholder="b241210066@sakarya.edu.tr">
                  <div class="field-error" id="loginEmailError"></div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="loginPassword">Sifre</label>
                  <input class="form-control" id="loginPassword" name="loginPassword" type="password" placeholder="Ogrenci numarasi">
                  <div class="field-error" id="loginPasswordError"></div>
                </div>
                <button class="btn btn-accent w-100" type="submit">Giris Yap</button>
              </form>
            </section>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container footer-bottom">
      <span>&copy; <span data-current-year></span> Web Teknolojileri Projesi</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="js/common.js"></script>
</body>
</html>
