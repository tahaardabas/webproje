<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.html');
    exit;
}

function clean_value($value): string
{
    return htmlspecialchars(trim((string)$value), ENT_QUOTES, 'UTF-8');
}

function clean_array(array $items): array
{
    return array_map(static function ($item) {
        return htmlspecialchars(trim((string)$item), ENT_QUOTES, 'UTF-8');
    }, $items);
}

$fullName = clean_value($_POST['fullName'] ?? '');
$studentNo = clean_value($_POST['studentNo'] ?? '');
$email = clean_value($_POST['email'] ?? '');
$phone = clean_value($_POST['phone'] ?? '');
$cityName = clean_value($_POST['cityName'] ?? '');
$contactDate = clean_value($_POST['contactDate'] ?? '');
$subject = clean_value($_POST['subject'] ?? '');
$contactType = clean_value($_POST['contactType'] ?? '');
$topics = isset($_POST['topics']) && is_array($_POST['topics']) ? clean_array($_POST['topics']) : [];
$priority = clean_value($_POST['priority'] ?? '');
$message = clean_value($_POST['message'] ?? '');
$newsletter = isset($_POST['newsletter']) ? 'Evet' : 'Hayir';
$validationMode = clean_value($_POST['validationMode'] ?? 'Belirtilmedi');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iletisim Formu Sonucu</title>
  <meta name="description" content="PHP tarafindan islenen iletisim formu verileri.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body data-page="contact">
  <main class="page-shell">
    <section class="page-hero compact-hero">
      <div class="container">
        <p class="eyebrow">PHP Sonucu</p>
        <h1>Gonderilen form verileri</h1>
        <p class="page-intro">
          Bu sayfa, iletisim formundan gelen tum verileri sunucu tarafinda alir ve duzenli bir bicimde ekrana yazar.
        </p>
      </div>
    </section>

    <section class="section-shell">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-8">
            <section class="glass-card reveal">
              <h2>Form ozeti</h2>
              <div class="table-responsive">
                <table class="table form-result-table">
                  <tbody>
                    <tr><th>Ad Soyad</th><td><?php echo $fullName !== '' ? $fullName : '-'; ?></td></tr>
                    <tr><th>Ogrenci Numarasi</th><td><?php echo $studentNo !== '' ? $studentNo : '-'; ?></td></tr>
                    <tr><th>E-posta</th><td><?php echo $email !== '' ? $email : '-'; ?></td></tr>
                    <tr><th>Telefon</th><td><?php echo $phone !== '' ? $phone : '-'; ?></td></tr>
                    <tr><th>Sehir</th><td><?php echo $cityName !== '' ? $cityName : '-'; ?></td></tr>
                    <tr><th>Uygun Tarih</th><td><?php echo $contactDate !== '' ? $contactDate : '-'; ?></td></tr>
                    <tr><th>Konu</th><td><?php echo $subject !== '' ? $subject : '-'; ?></td></tr>
                    <tr><th>Iletisim Tercihi</th><td><?php echo $contactType !== '' ? $contactType : '-'; ?></td></tr>
                    <tr><th>Ilgi Alanlari</th><td><?php echo !empty($topics) ? implode(', ', $topics) : '-'; ?></td></tr>
                    <tr><th>Oncelik</th><td><?php echo $priority !== '' ? $priority . '/5' : '-'; ?></td></tr>
                    <tr><th>Bulten Izni</th><td><?php echo $newsletter; ?></td></tr>
                    <tr><th>Dogrulama Yontemi</th><td><?php echo $validationMode; ?></td></tr>
                  </tbody>
                </table>
              </div>
            </section>
          </div>
          <div class="col-lg-4">
            <section class="glass-card reveal">
              <h2>Mesaj</h2>
              <p class="message-box"><?php echo $message !== '' ? nl2br($message) : 'Mesaj alani bos gonderildi.'; ?></p>
              <div class="hero-actions">
                <a class="btn btn-accent" href="contact.html">Forma don</a>
                <a class="btn btn-outline-light" href="index.html">Ana sayfa</a>
              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="js/common.js"></script>
</body>
</html>
