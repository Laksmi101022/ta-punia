<?php
include_once 'connection.php';

$name = $_REQUEST['name'];
$dateNow = date('Y-m-d H:i:s');

switch ($name) {
    case 'list':
        try {
            // Ambil semua data dari tabel gallery
            $stmt = $db->prepare("SELECT * FROM gallery");
            $stmt->execute();
            $photos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Proses data menjadi array yang sesuai dengan format yang diinginkan
            $photos = array_map(function ($photo) {
                return [
                    'source' => asset('/gallery') . '/' . $photo['link'], // Sesuaikan dengan jalur penyimpanan Anda
                    'options' => [
                        'type' => 'local', // Menandakan bahwa file sudah ada di server
                        'metadata' => [
                            'id' => $photo['id_gallery'],
                        ],
                    ],
                ];
            }, $photos);

            // Tampilkan hasil (opsional untuk debugging)
            header('Content-Type: application/json');
            echo json_encode($photos);
        } catch (PDOException $e) {
            // Tangani kesalahan database
            echo "Error: " . $e->getMessage();
        }
        break;
    case 'store':
        $existingFiles = isset($_REQUEST['existingFiles']) ? $_REQUEST['existingFiles'] : []; // ID file lama
        $uploadedFiles = isset($_FILES['files']) ? $_FILES['files'] : null; // File baru yang diunggah

        try {
            // 1. Tangani file lama
            $keptFiles = [];
            if (!empty($existingFiles)) {
                $placeholders = implode(',', array_fill(0, count($existingFiles), '?'));
                $stmt = $db->prepare("SELECT * FROM gallery WHERE id_gallery IN ($placeholders)");
                $stmt->execute($existingFiles);
                $keptFiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            // 2. Hapus file yang tidak ada di daftar
            $filesToDelete = [];
            if (!empty($existingFiles)) {
                $placeholders = implode(',', array_fill(0, count($existingFiles), '?'));
                $sql = "SELECT * FROM gallery WHERE id_gallery NOT IN ($placeholders)";
                $stmt = $db->prepare($sql);
                $stmt->execute($existingFiles);
                $filesToDelete = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // Jika $existingFiles kosong, ambil semua file
                $stmt = $db->query("SELECT * FROM gallery");
                $filesToDelete = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            $galleryPath = $_SERVER['DOCUMENT_ROOT'] . '/pondok-gita-ubud/assets/gallery/';
            if (!is_dir($galleryPath)) {
                mkdir($galleryPath, 0777, true); // Buat folder dengan izin penuh
            }
            foreach ($filesToDelete as $photo) {
                $filePath = $galleryPath . $photo['link'];
                if (file_exists($filePath)) {
                    unlink($filePath); // Hapus file fisik
                }

                // Hapus record dari database
                $deleteStmt = $db->prepare("DELETE FROM gallery WHERE id_gallery = ?");
                $deleteStmt->execute([$photo['id_gallery']]);
            }

            // 3. Tangani file baru
            if ($uploadedFiles && isset($uploadedFiles['name'])) {
                foreach ($uploadedFiles['name'] as $index => $originalName) {
                    $sanitizedFilename = preg_replace('/\s+/', '_', $originalName);
                    $uniqueFilename = time() . '_' . $sanitizedFilename;

                    $destination = $galleryPath . $uniqueFilename;

                    if (move_uploaded_file($uploadedFiles['tmp_name'][$index], $destination)) {
                        // Masukkan ke database
                        $insertStmt = $db->prepare("INSERT INTO gallery (link, created_at, updated_at) VALUES (?, ?, ?)");
                        $insertStmt->execute([
                            $uniqueFilename,
                            date('Y-m-d H:i:s'), // created_at
                            date('Y-m-d H:i:s')  // updated_at
                        ]);

                        // Tambahkan ke daftar keptFiles
                        $keptFiles[] = [
                            'link' => $uniqueFilename,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        ];
                    }
                }
            }

            echo "Proses berhasil dilakukan.";
        } catch (Exception $e) {
            echo "Terjadi kesalahan: " . $e->getMessage();
        }
        break;

    default:
        # code...
        break;
}
exit();