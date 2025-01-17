<?php
ob_start();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php
$css = ob_get_clean();
?>

<?php
include 'connection.php';
$sql = "SELECT * FROM facilities LIMIT 3";
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$title = $pageTitle = 'Home';
include __DIR__ . '/../layouts/header.php';
?>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?= asset(path: '/user/images/bg-primary.jpg') ?>);">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-left ftco-animate">
                    <span class="subheading">Selamat Datang</span>
                    <h1 class="mb-4">Pondok Gita Ubud</h1>
                    <p class="mb-4 mb-md-5">Selamat datang di Pondok Gita Ubud, destinasi impian Anda di jantung Bali.
                        Dikelilingi oleh keindahan alam Ubud, kami menawarkan akomodasi mewah dengan suasana yang tenang
                        dan menenangkan. </p>
                    <p><a href="<?= route('/facilities') ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Lihat Fasilitas</a> </p>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-2">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-2">Fasilitas Spesial</h2>
                <p> Menikmati pengalaman terbaik dengan fasilitas istimewa yang dirancang khusus untuk memenuhi kebutuhan Anda.</p>
            </div>
        </div>
        <div class="row d-md-flex">
            <div class="col-lg-12 ftco-animate p-md-5">
                <div class="container">
                    <div class="row">
                        <?php
                        if (count($rows) > 0):
                            foreach ($rows as $key => $row) {
                        ?>
                                <div class="col-md-4 ftco-animate">
                                    <div class="media d-block text-center block-6 services">
                                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                                            <span class="bi bi-<?= $row['icon'] ?>"></span>
                                        </div>
                                        <div class="media-body">
                                            <h3 class="heading text-white"><?= $row['name'] ?></h3>
                                            <p class="text-white"><?= $row['description'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        else:
                            ?>
                            <div class="col-md-12 ftco-animate">
                                <div class="media d-block text-center block-6 services">
                                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                                        <span class="bi bi-x-circle"></span>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="heading text-white">Facility not found</h3>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>

                    </div>
                    <?php if (count(value: $rows) > 0): ?>
                        <div class="text-center">
                            <a class="btn btn-outline-primary" href="<?= route('/facilities') ?>">View All</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
ob_start();
?>
<script>
    console.log("Hello from Index page!");
    document.addEventListener("DOMContentLoaded", function() {
        // alert("Index page is loaded!");
    });
</script>
<?php
$scripts = ob_get_clean();
?>

<?php
include __DIR__ . '/../layouts/footer.php';
?>