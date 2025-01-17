<?php
ob_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
<?php
$css = ob_get_clean();

$title = $pageTitle = 'Galeri';
include_once 'connection.php';
include __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/breadcrumb.php';

$itemsPerPage = 9; // Jumlah item per halaman
$totalItems = $db->query("SELECT COUNT(*) FROM gallery")->fetchColumn(); // Total item
$totalPages = ceil($totalItems / $itemsPerPage); // Total halaman
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Halaman aktif (default: 1)

// Validasi halaman aktif
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

// Hitung offset
$offset = ($currentPage - 1) * $itemsPerPage;

$rows = [];
try {
    $sql = "SELECT * FROM gallery ORDER BY id_gallery ASC LIMIT :limit OFFSET :offset";
    $stmt = $db->prepare($sql);

    // Binding parameter sebagai integer
    $stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<section class="ftco-section">
    <div class="container-fluid">
        <div class="row">
            <?php
            if (count($rows) > 0):
                foreach ($rows as $key => $row) {
            ?>
                    <div class="col-md-4 mb-4 ftco-animate">
                        <a href="<?= asset('/gallery/') . $row['link'] ?>" data-fancybox="gallery"
                            class="gallery img d-flex align-items-center"
                            style="background-image: url(<?= asset('/gallery/') . $row['link'] ?>);">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                <span class="icon-search"></span>
                            </div>
                        </a>
                    </div>
                <?php }
            else:
                ?>
                <div class="col-12 mb-4 ftco-animate text-center">
                    <p>Tidak ada gambar.</p>
                </div>
            <?php
            endif ?>

        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <!-- Tombol Sebelumnya -->
                        <?php if ($currentPage > 1): ?>
                            <li><a href="?page=<?= $currentPage - 1; ?>">&lt;</a></li>
                        <?php else: ?>
                            <li class="disabled"><span>&lt;</span></li>
                        <?php endif; ?>

                        <!-- Halaman Pertama -->
                        <?php if ($currentPage > 3): ?>
                            <li><a href="?page=1">1</a></li>
                            <?php if ($currentPage > 4): ?>
                                <li><span>...</span></li>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- Nomor Halaman Utama -->
                        <?php
                        $start = max(1, $currentPage - 2);
                        $end = min($totalPages, $currentPage + 2);
                        for ($i = $start; $i <= $end; $i++): ?>
                            <li class="<?= $i === $currentPage ? 'active' : ''; ?>">
                                <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <!-- Halaman Terakhir -->
                        <?php if ($currentPage < $totalPages - 2): ?>
                            <?php if ($currentPage < $totalPages - 3): ?>
                                <li><span>...</span></li>
                            <?php endif; ?>
                            <li><a href="?page=<?= $totalPages; ?>"><?= $totalPages; ?></a></li>
                        <?php endif; ?>

                        <!-- Tombol Berikutnya -->
                        <?php if ($currentPage < $totalPages): ?>
                            <li><a href="?page=<?= $currentPage + 1; ?>">&gt;</a></li>
                        <?php else: ?>
                            <li class="disabled"><span>&gt;</span></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
ob_start();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize FancyBox
        $('[data-fancybox="gallery"]').fancybox({
            // Optional FancyBox options
            loop: true,
            buttons: [
                'slideShow',
                'thumbs',
                'zoom',
                'close'
            ],
        });
    });
</script>
<?php
$js = ob_get_clean();

include __DIR__ . '/../layouts/footer.php';
?>