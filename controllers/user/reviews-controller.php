<?php
include_once 'connection.php';

$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$country = isset($_REQUEST['country']) ? $_REQUEST['country'] : '';
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : '';

try {
    $sql = "INSERT INTO reviews (name, email, status, country, message, created_at) VALUES (?,?,'1',?,?,now())";
    $stmt = $db->prepare($sql);

    header('Content-Type: application/json');

    if ($stmt->execute([$name, $email, $country, $message])) {
        echo json_encode(['success' => true, 'message' => 'Review berhasil ditambahkan']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menambahkan review']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
