<?php
include_once 'connection.php';

$title = $pageTitle = 'Tentang Kami';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/breadcrumb.php';

$sql = "SELECT * FROM reviews WHERE status = '1' ORDER BY id_review DESC LIMIT 100";
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="ftco-about d-md-flex">
    <div class="one-half img">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/QyOFpMdwjmo?si=z4Ryl22j2COTMM66" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    <div class="one-half ftco-animate">
        <div class="overlap">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">Pondok Gita Ubud</h2>
            </div>
            <div>
                <p>Pondok Gita Ubud, didirikan pada tahun 2023 oleh Ibu Ni Wayan Sukerti, menawarkan akomodasi nyaman
                    dan terjangkau di Jl. Yudistira Timur, Peliatan, Ubud. Dengan empat kamar berfasilitas lengkap,
                    seperti AC, kamar mandi modern, serta akses WiFi gratis, kami menjadi pilihan ideal bagi wisatawan
                    dengan anggaran terbatas. Kami juga menyediakan balkon dan teras untuk bersantai, serta parkir
                    pribadi gratis bagi para tamu. <br>
                    Terletak hanya 2,2 km dari Monkey Forest Ubud, 2,7 km dari Goa Gajah, dan 3,6 km dari Ubud Palace,
                    Pondok Gita Ubud menghadirkan lokasi strategis untuk menikmati keindahan Ubud. Nikmati pengalaman
                    menginap yang menyenangkan sambil merasakan pesona keindahan alam dan budaya khas Ubud, yang sangat
                    disukai oleh pasangan, dengan lokasi yang dinilai sempurna untuk perjalanan dua orang.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section" style="background-color: #08070A;">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-2">Ulasan</h2>
                <p> Kami mendengarkan setiap cerita dan pengalaman Anda." Temukan apa yang membuat mereka jatuh cinta pada layanan kami.</p>
            </div>
        </div>
        <?php
        if (count($rows)):
        ?>
            <div class="owl-carousel owl-theme">
                <?php
                foreach ($rows as $key => $row) {
                ?>
                    <div class="item">
                        <div class="testimony">
                            <blockquote>
                                <p>&ldquo; <?= $row['message'] ?> &rdquo;</p>
                            </blockquote>
                            <div class="author d-flex mt-4">
                                <div class="name align-self-center"><?= $row['name'] ?> <span
                                        class="position"><?= $row['country'] ?></span></div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        else:
        ?>
            <div class="text-center">Tidak Ada data.</div>
        <?php
        endif ?>
    </div>
</section>
<?php
ob_start();
?>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 2500,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
</script>
<?php
$scripts = ob_get_clean();
?>
<?php
include __DIR__ . '/../layouts/footer.php';
?>