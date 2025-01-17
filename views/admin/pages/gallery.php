<?php
ob_start();
?>
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />

<style>
    .filepond--item {
        width: calc(50% - 0.5em);
    }

    @media (min-width: 30em) {
        .filepond--item {
            width: calc(50% - 0.5em);
        }
    }

    @media (min-width: 50em) {
        .filepond--item {
            width: calc(33.33% - 0.5em);
        }
    }
</style>

<?php
$css = ob_get_clean();
?>

<?php
$pageTitle = 'Galeri';
include __DIR__ . '/../layouts/header.php';
?>

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Galeri</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
            </div>

            <div class="card-body">
                <input type="file" id="gallery" name="file[]" multiple />
            </div>

            <div class="card-footer">
                <button id="save-gallery" class="btn btn-primary">Save</button>
            </div>

        </div>
</div>
</section>
</div>

<?php
ob_start();
?>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
$js = ob_get_clean();
?>

<?php
ob_start();
?>
<script>
    $(document).ready(function () {

        FilePond.registerPlugin(FilePondPluginImagePreview);

        // Ambil file lama dari server
        $.ajax({
            url: '<?= route('/admin/gallery-controller') ?>?name=list', // Route untuk mengambil data file lama
            method: 'GET',
            dataType: 'json',
            success: function (photos) {

                // Mapping data dari server ke dalam format FilePond
                const existingFiles = photos.map((photo) => ({
                    // Server file reference (contohnya URL file)
                    source: photo.source,

                    // Set type ke 'local' untuk file yang sudah diunggah
                    options: {
                        metadata: {
                            type: 'local',
                            id: photo.options.metadata.id, // ID file dari server
                        },
                    },
                }));


                // Inisialisasi FilePond dengan file lama
                const pond = FilePond.create(document.querySelector("#gallery"), {
                    files: existingFiles, // Masukkan file lama di sini
                });

                // Contoh akses metadata dari file yang sudah dimuat
                pond.getFiles().forEach((file) => {
                    console.log("Metadata file:", file.getMetadata());
                });

                // Menyimpan file ketika tombol save diklik
                $("#save-gallery").on("click", function () {
                    const formData = new FormData();

                    // Proses semua file di FilePond
                    pond.getFiles().forEach((item) => {
                        console.log(item);

                        if (item.getMetadata('type') === 'local') {
                            // Jika file sudah ada di server, kirim metadata-nya
                            formData.append('existingFiles[]', item.getMetadata('id')); // Mengirim id file lama
                        } else {
                            // Jika file baru, kirim file-nya
                            formData.append('files[]', item.file); // Mengirim file baru
                        }
                    });
                    formData.append('name', 'store');
                    // Kirim data ke server
                    $.ajax({
                        url: '<?= route('/admin/gallery-controller') ?>',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function (response) {
                            Swal.fire({
                                title: 'Success',
                                text: 'Gallery saved.',
                                icon: 'success',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                },
                                buttonsStyling: false
                            });
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                title: 'Success',
                                text: 'Failed to save gallery.',
                                icon: 'success',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                },
                                buttonsStyling: false
                            });
                        },
                    });
                });
            },
            error: function (error) {
                console.error("Error loading photos:", error);
            },
        });


    });
</script>
<?php
$scripts = ob_get_clean();
?>

<?php
include __DIR__ . '/../layouts/footer.php';
?>