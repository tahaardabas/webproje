<?php
session_start();

$expectedStudentNo = 'B241210066';
$expectedPassword = 'B241210066';
$allowedEmails = [
    'b241210066@sakarya.edu.tr',
    'b241210066@ogr.sakarya.edu.tr',
    'taha.bas@ogr.sakarya.edu.tr',
];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$email = isset($_POST['loginEmail']) ? trim($_POST['loginEmail']) : '';
$password = isset($_POST['loginPassword']) ? trim($_POST['loginPassword']) : '';

if ($email === '' || $password === '') {
    header('Location: login.php?error=' . urlencode('Lutfen tum alanlari doldurun.') . '&email=' . urlencode($email));
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: login.php?error=' . urlencode('Gecerli bir mail adresi giriniz.') . '&email=' . urlencode($email));
    exit;
}

$emailIsValid = in_array(strtolower($email), $allowedEmails, true);
$passwordIsValid = strcasecmp($password, $expectedPassword) === 0;

if ($emailIsValid && $passwordIsValid) {
    $_SESSION['student_no'] = $expectedStudentNo;
    $_SESSION['login_email'] = strtolower($email);
    header('Location: welcome.php');
    exit;
}

header('Location: login.php?error=' . urlencode('Kullanici adi veya sifre hatali. Tekrar deneyiniz.') . '&email=' . urlencode($email));
exit;
?>
