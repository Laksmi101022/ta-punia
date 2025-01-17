<?php
include_once 'connection.php';

$name = $_REQUEST['name'];
$dateNow = date('Y-m-d H:i:s');

switch ($name) {
    case 'update':
        try {
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
            $value = isset($_REQUEST['value']) ? $_REQUEST['value'] : '';

            $sql = "UPDATE reviews SET status = ? WHERE id_review = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$value, $id]);

            $text = $value == '1' ? 'Ditampilkan' : 'Disembunyikan';
            echo json_encode(value: ['success' => true, 'message' => 'Ulasan Berhasil ' . $text]);
        } catch (PDOException $e) {
            echo json_encode(value: ['success' => false, 'message' => $e->getMessage()]);
        }
        break;
    default:
        break;
}
exit();
