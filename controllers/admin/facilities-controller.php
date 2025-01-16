<?php
include_once 'connection.php';

$name = $_REQUEST['name'];
$dateNow = date('Y-m-d H:i:s');

switch ($name) {
    case 'store':
        try {
            $facility_name = isset($_REQUEST['facility_name']) ? $_REQUEST['facility_name'] : '';
            $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
            $icon = isset($_REQUEST['icon']) ? $_REQUEST['icon'] : '';

            $sql = "INSERT INTO facilities (name, description, icon, created_at, updated_at) VALUES (?,?,?,now(), now())";
            $stmt = $db->prepare($sql);
            $stmt->execute([$facility_name, $description, $icon]);

            echo json_encode(value: ['success' => true, 'message' => 'Berhasil menambahkan fasilitas']);
        } catch (PDOException $e) {
            echo json_encode(value: ['success' => false, 'message' => $e->getMessage()]);
        }
        break;
    case 'update':
        try {
            $id = isset($_REQUEST['id_facility']) ? $_REQUEST['id_facility'] : '';
            $facility_name = isset($_REQUEST['facility_name']) ? $_REQUEST['facility_name'] : '';
            $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : '';
            $icon = isset($_REQUEST['icon']) ? $_REQUEST['icon'] : '';

            $sql = "UPDATE facilities SET 
                    name = ?, 
                    description = ?, 
                    icon = ?, 
                    updated_at = now()
                    WHERE id_facility = ?";
            $stmt = $db->prepare($sql);
            if ($stmt->execute([$facility_name, $description, $icon, $id])) {
                echo json_encode(value: ['success' => true, 'message' => 'Berhasil memperbarui fasilitas']);
            } else {
                echo json_encode(value: ['success' => false, 'message' => 'Gagal memperbarui fasilitas']);
            }

        } catch (PDOException $e) {
            echo json_encode(value: ['success' => false, 'message' => $e->getMessage()]);
        }
        break;
    case 'destroy':
        try {
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

            $sql = "DELETE FROM facilities WHERE id_facility = ?";
            $stmt = $db->prepare($sql);
            if ($stmt->execute([$id])) {
                echo json_encode(value: ['success' => true, 'message' => 'Berhasil menghapus fasilitas']);
            } else {
                echo json_encode(value: ['success' => false, 'message' => 'Gagal menghapus fasilitas']);
            }
        } catch (PDOException $e) {
            echo json_encode(value: ['success' => false, 'message' => $e->getMessage()]);
        }
        break;

    default:
        # code...
        break;
}
exit();