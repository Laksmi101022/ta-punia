<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pondok Gita Ubud - <?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="<?= asset('/user/css/open-iconic-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/animate.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/aos.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/ionicons.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/bootstrap-datepicker.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/jquery.timepicker.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/icomoon.css') ?>">
    <link rel="stylesheet" href="<?= asset('/user/css/style.css') ?>">
    <link rel="icon" href="<?= asset('/user/images/pondok-gita-logo.png') ?>" type="image/png">


    <!-- Placeholder untuk css dan style tambahan -->
    <?php
    if (!empty($css)) {
        echo $css;
    }

    if (!empty($style)) {
        echo $style;
    }
    ?>
</head>

<body>
    <?php
    include __DIR__ . '/../components/navbar.php';
