<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pondok Gita Admin - <?= $pageTitle ?></title>

    <link rel="stylesheet" href="<?= asset('/admin/assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/assets/vendors/chartjs/Chart.min.js') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/assets/css/app.css') ?>">

    <link rel="shortcut icon" href="<?= asset(path: '/user/images/pondok-gita-logo.png') ?>" type="image/x-icon">

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
    <div id="app">
        <?php
        include __DIR__ . '/../components/sidebar.php';
        ?>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="<?= asset('/admin/assets/images/avatar/avatar-s-1.png') ?>" alt=""
                                        srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block"><?= $_SESSION['user']['username'] ?>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Ubah Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= route('/admin/logout') . '?name=logout' ?>"><i
                                        data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>