<!-- START nav -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= route('/'); ?>">
            <img src="<?= asset('/user/images/pondok-gita-logo.png') ?>" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= $route == '/' ? 'active' : '' ?>"><a href="<?= route('/'); ?>"
                        class="nav-link">Beranda</a></li>
                <li class="nav-item <?= $route == '/about-us' ? 'active' : '' ?>"><a href="<?= route('/about-us'); ?>"
                        class="nav-link">Tentang Kami</a></li>
                <li class="nav-item <?= $route == '/facilities' ? 'active' : '' ?>"><a
                        href="<?= route('/facilities'); ?>" class="nav-link">Fasilitas</a></li>
                <li class="nav-item <?= $route == '/gallery' ? 'active' : '' ?>"><a href="<?= route('/gallery'); ?>"
                        class="nav-link">Galeri</a></li>
                <li class="nav-item <?= $route == '/contact' ? 'active' : '' ?>"><a href="<?= route('/contact'); ?>"
                        class="nav-link">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->