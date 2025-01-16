<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="<?= asset('/user/images/pondok-gita-logo.png') ?>" alt="" srcset=""> Admin
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item <?= $route == '/admin' ? 'active' : '' ?>">
                    <a href="<?= route('/admin') ?>" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $route == '/admin/gallery' ? 'active' : '' ?> ">
                    <a href="<?= route('/admin/gallery') ?>" class='sidebar-link'>
                        <i data-feather="image" width="20"></i>
                        <span>Galeri</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $route == '/admin/facilities' ? 'active' : '' ?> ">
                    <a href="<?= route('/admin/facilities') ?>" class='sidebar-link'>
                        <i data-feather="plus-circle" width="20"></i>
                        <span>Fasilitas</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $route == '/admin/reviews' ? 'active' : '' ?> ">
                    <a href="<?= route('/admin/reviews') ?>" class='sidebar-link'>
                        <i data-feather="star" width="20"></i>
                        <span>Ulasan</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>