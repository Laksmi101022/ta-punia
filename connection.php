<?php

include_once 'config.php';

if (!isset($db)) {
    try {
        // Pastikan variabel $db_host, $db_name, $db_user, $db_password sudah didefinisikan
        $dsn = "mysql:host={$db_host};dbname={$db_name}";
        $db = new PDO($dsn, $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Simpan koneksi database dalam $GLOBALS agar bisa diakses global
        $GLOBALS['db'] = $db;
    } catch (PDOException $e) {
        // Tangani error dengan mencatatnya atau menampilkan pesan ke pengguna
        $errorMsg = 'DB Connection Error: ' . $e->getMessage();
        error_log($errorMsg); // Catat ke log server
        die($errorMsg );
    }
}
