<?php
// edit.php
require_once "Database.php";
require_once "Produk.php";

$db = new Database();
$produk = new Produk($db->getConnection());

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

// Kalau form dikirim: simpan dengan ubah(), lalu kembali ke daftar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produk->ubah($id, $_POST['nama'], $_POST['harga'], $_POST['stok']);
    header("Location: index.php");
    exit;
}

// Ambil data lama dengan cari()
$p = $produk->cari($id);
if (!$p) {
    die("Produk tidak ditemukan.");
}
?>
<h2>Edit Produk</h2>
<form method="post">
Nama : <input type="text" name="nama" value="<?= htmlspecialchars($p['nama']) ?>" required><br>
Harga : <input type="number" name="harga" value="<?= $p['harga'] ?>" required><br>
Stok : <input type="number" name="stok" value="<?= $p['stok'] ?>" required><br>
<button type="submit">Simpan</button>
<a href="index.php">Batal</a>
</form>