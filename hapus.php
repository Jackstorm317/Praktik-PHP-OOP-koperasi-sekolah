<?php
// hapus.php
require_once "Database.php";
require_once "Produk.php";

$id = $_GET['id'] ?? null;
if ($id) {
    $db = new Database();
    $produk = new Produk($db->getConnection());
    $produk->hapus($id);
}

header("Location: index.php");
exit;