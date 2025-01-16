<?php
include 'connection.php';
ob_start();
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php
$css = ob_get_clean();
?>


<?php
$title = $pageTitle = 'Fasilitas';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/breadcrumb.php';

$sql = "SELECT * FROM facilities";
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="ftco-section ">
    <div class="container">
        <div class="row">
            <?php
            foreach ($rows as $key => $row) {
            ?>
                <div class="col-md-6 ftco-animate">
                    <div class="media d-flex block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5 mr-3">
                            <span class="bi bi-<?= $row['icon'] ?>"></span>
                        </div>
                        <div class="media-body text-white">
                            <h3 class="heading text-white"><?= $row['name'] ?></h3>
                            <p><?= $row['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>


<?php
include __DIR__ . '/../layouts/footer.php';
?>