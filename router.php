<?php
include 'config.php';

function route($path)
{
    global $base_url;
    return rtrim($base_url, '/') . $path;
}
function asset($path)
{
    global $asset_url;
    return rtrim($asset_url, '/') . $path;
}
function isAuthenticated()
{
    if (isset($_SESSION['user'])) {
        return isset($_SESSION['user']); // Misalnya, cek apakah sesi user sudah ada
    } else {
        header('Location: ' . route('/admin/login'));
        exit;
    }
}
function redirectIfAuthenticated()
{
    if (isset($_SESSION['user'])) {
        header('Location: ' . route('/admin'));
        exit;
    }
}

$uri = trim($_SERVER['REQUEST_URI']);
$uriParts = explode('?', $uri, 2);
$route = $uriParts[0];

$route = str_replace($base_url, '', $route);
$route = rtrim($route, '/');
$route = empty($route) ? '/' : $route;

if (strpos($route, '/admin') === 0) {
    // Admin
    session_start();
    $path = 'views/admin/pages';
    switch ($route) {
        case '/admin':
            isAuthenticated();
            $file = "{$path}/dashboard.php";
            break;
        case '/admin/gallery':
            isAuthenticated();
            $file = "{$path}/gallery.php";
            break;
        case '/admin/gallery-controller':
            isAuthenticated();
            $file = "controllers/admin/gallery-controller.php";
            break;
        case '/admin/facilities':
            isAuthenticated();
            $file = "{$path}/facilities.php";
            break;
        case '/admin/facilities-controller':
            isAuthenticated();
            $file = "controllers/admin/facilities-controller.php";
            break;
        case '/admin/reviews':
            isAuthenticated();
            $file = "{$path}/reviews.php";
            break;
        case '/admin/reviews-controller':
            isAuthenticated();
            $file = "controllers/admin/reviews-controller.php";
            break;
        case '/admin/login': // Rute login tetap bisa diakses jika belum login
            redirectIfAuthenticated();
            $file = "{$path}/login.php";
            break;
        case '/admin/auth-controller':
            $file = "controllers/admin/auth-controller.php";
            break;
        case '/admin/logout':
            isAuthenticated();
            $file = "controllers/admin/auth-controller.php";
            break;
        default:
            isAuthenticated();
            $file = "{$path}/dashboard.php";
            break;
    }
} else {
    // User
    $path = 'views/user/pages';
    switch ($route) {
        case '/':
            $file = "{$path}/beranda.php";
            break;
        case '/about-us':
            $file = "{$path}/about-us.php";
            break;
        case '/facilities':
            $file = "{$path}/facilities.php";
            break;
        case '/gallery':
            $file = "{$path}/gallery.php";
            break;
        case '/contact':
            $file = "{$path}/contact.php";
            break;
        case '/review':
            $file = "controllers/user/reviews-controller.php";
            break;
        default:
            $file = 'views/404.php'; // Halaman 404 jika route tidak ditemukan
            break;
    }
}

include $file;
