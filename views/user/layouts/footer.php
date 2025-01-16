<footer class="ftco-footer ftco-section ">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About Us</h2>
                    <p>Pondok Gita Ubud, didirikan pada tahun 2023 oleh Ibu Ni Wayan Sukerti, menawarkan akomodasi
                        nyaman dan terjangkau di Jl. Yudistira Timur, Peliatan, Ubud. Dengan empat kamar berfasilitas
                        lengkap, seperti AC, kamar mandi modern, serta akses WiFi gratis, kami menjadi pilihan ideal
                        bagi wisatawan dengan anggaran terbatas. Kami juga menyediakan balkon dan teras untuk bersantai,
                        serta parkir pribadi gratis bagi para tamu.</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Jl. Yudistira Timur,
                                    Peliatan, Ubud.
                                </span></li>
                            <li><a href="https://wa.me/6289668638094?text=Hello%20Pondok%20Gita%20Ubud..."
                                    target="_blank"><span class="icon icon-whatsapp"></span><span class="text">+62 896
                                        6863
                                        8094</span></a></li>
                            <li><a href="https://www.instagram.com/pondokgitaubud/"
                                    target="_blank"><span class="icon icon-instagram"></span><span
                                        class="text">@pondokgitaubud</span></a></li>
                            <li><a href="mailto:pondokgita@gmail.com?subject=Questions&body=Hello%20Pondok%20Gita%20Ubud..."
                                    target="_blank"><span class="icon icon-envelope"></span><span
                                        class="text">pondokgita@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | <a
                        href="https://colorlib.com" target="_blank">Pondok Gita Ubud</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>

<div class="whatsapp-button">
    <a href="https://wa.me/6281234567890" target="_blank" aria-label="Hubungi kami di WhatsApp">
        <i class=" icon-whatsapp"></i>
    </a>
</div>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <div style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);">
        <img src="<?= asset('/user/images/pondok-gita-logo.png') ?>" width="80px" alt="logo-pondok-gita">
    </div>
</div>

<script src="<?= asset('/user/js/jquery.min.js') ?>"></script>
<script src="<?= asset('/user/js/jquery-migrate-3.0.1.min.js') ?>"></script>
<script src="<?= asset('/user/js/popper.min.js') ?>"></script>
<script src="<?= asset('/user/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('/user/js/jquery.easing.1.3.js') ?>"></script>
<script src="<?= asset('/user/js/jquery.waypoints.min.js') ?>"></script>
<script src="<?= asset('/user/js/jquery.stellar.min.js') ?>"></script>
<script src="<?= asset('/user/js/owl.carousel.min.js') ?>"></script>
<script src="<?= asset('/user/js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?= asset('/user/js/aos.js') ?>"></script>
<script src="<?= asset('/user/js/jquery.animateNumber.min.js') ?>"></script>
<script src="<?= asset('/user/js/bootstrap-datepicker.js') ?>"></script>
<script src="<?= asset('/user/js/jquery.timepicker.min.js') ?>"></script>
<script src="<?= asset('/user/js/scrollax.min.js') ?>"></script>
<script src="<?= asset('/user/js/google-map.js') ?>"></script>
<script src="<?= asset('/user/js/main.js') ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

<!-- Placeholder untuk script tambahan -->
<?php
if (!empty($js)) {
    echo $js;
}

if (!empty($scripts)) {
    echo $scripts;
}
?>

</body>

</html>