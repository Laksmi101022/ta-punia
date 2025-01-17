<?php
include_once 'connection.php';

$pageTitle = 'Ulasan';
include __DIR__ . '/../layouts/header.php';

$sql = "SELECT * FROM reviews ORDER BY id_review DESC";
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Ulasan</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-border" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th class="text-center">Status</th>
                                <th>Message</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($rows) > 0):
                                foreach ($rows as $key => $row) {
                            ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['country'] ?></td>
                                        <td class="text-center"><?= $row['status'] ? '<span class="badge bg-success"><i data-feather="eye"></i> Dtampilkan</span>' : '<span class="badge bg-secondary"><i data-feather="eye-off"></i> Disembunyikan</span>' ?></td>
                                        <td><?= $row['message'] ?></td>
                                        <td class="text-center">
                                            <?php
                                            if (!$row['status']) {
                                                echo '<button type="button" class="btn btn-success btn-xs btn-action" data-id="' . $row['id_review'] . '" data-value="1"><i data-feather="eye"></i></button>';
                                            } else {
                                                echo '<button type="button" class="btn btn-secondary btn-xs btn-action" data-id="' . $row['id_review'] . '" data-value="0"><i data-feather="eye-off"></i></button>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                            else:
                                ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data ulasan.</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
ob_start();
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$js = ob_get_clean();
?>

<?php
ob_start();
?>
<script>
    var endpoint = '<?= route('/admin/reviews-controller') ?>';

    $('.btn-action').click(function() {
        const id = $(this).data('id');
        const value = $(this).data('value');
        const text = value == 1 ? 'Ditampilkan' : 'Disembunyikan';
        Swal.fire({
            title: 'Attention',
            text: `Yakin Ulasan Akan ${text}`,
            icon: 'info',
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    url: `${endpoint}?name=update&id=${id}`,
                    data: {
                        value: value
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                                timer: 1500,
                            }).then((result) => {
                                window.location.reload();
                            })
                        } else {
                            Swal.fire({
                                title: 'Gagal',
                                text: response.message,
                                icon: 'error'
                            })
                        }
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Terjadi kesalahan jaringan.',
                            icon: 'error'
                        })
                    }
                })
            }
        })
    })
</script>
<?php
$scripts = ob_get_clean();
?>

<?php
include __DIR__ . '/../layouts/footer.php';
?>