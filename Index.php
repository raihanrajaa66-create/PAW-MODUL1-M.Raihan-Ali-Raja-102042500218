<?php
// 4. Seluruh data produk disimpan menggunakan array PHP
$produk = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "Perangkat Keras",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "Komputer",
        "harga" => 8500000,
        "stok" => 2
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "Aksesoris",
        "harga" => 250000,
        "stok" => 10
    ],
    [
        "nama" => "Keyboard Mechanical",
        "kategori" => "Aksesoris",
        "harga" => 750000,
        "stok" => 0
    ],
    [
        "nama" => "Headphone Noise Cancelling",
        "kategori" => "Audio",
        "harga" => 1500000,
        "stok" => 5
    ],
    [
        "nama" => "Flashdisk 64GB",
        "kategori" => "Penyimpanan",
        "harga" => 90000,
        "stok" => 15
    ]
];

// Menghitung total produk
$total_produk = count($produk);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
    <!-- Menghubungkan ke file CSS eksternal -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar -->
    <header>
        <nav>
            <h1>Cia Store</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <p>CIA STORE</p>
        <h2>Simple Tech Store.</h2>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <button>Lihat Produk</button>
    </section>

    <!-- Katalog Produk -->
    <main>
        <div class="katalog-header">
            <div>
                <p style="color: #666; font-weight: bold;">OUR PRODUCTS</p>
                <h2>Katalog Produk</h2>
            </div>
            <!-- 11. Tampilkan jumlah seluruh produk -->
            <p>Total Produk: <?= $total_produk ?></p>
        </div>

        <div class="product-grid">
            <?php 
            // 5. Perulangan PHP untuk menampilkan produk
            foreach ($produk as $item): 
                $harga_normal = $item['harga'];
                $diskon = 0;
                $harga_akhir = $harga_normal;
                $is_diskon = false;

                // Challenge: Diskon 10% jika harga >= Rp1.000.000
                if ($harga_normal >= 1000000) {
                    $diskon = 0.10; // 10%
                    $harga_akhir = $harga_normal - ($harga_normal * $diskon);
                    $is_diskon = true;
                }
            ?>
                <article class="product-card">
                    <p class="kategori"><?= $item['kategori'] ?></p>
                    <h3 class="nama-produk"><?= $item['nama'] ?></h3>
                    
                    <?php if ($is_diskon): ?>
                        <span class="harga-coret">Rp <?= number_format($harga_normal, 0, ',', '.') ?></span>
                        <span class="diskon-badge">DISKON 10%</span>
                        <p class="harga">Rp <?= number_format($harga_akhir, 0, ',', '.') ?></p>
                    <?php else: ?>
                        <p class="harga">Rp <?= number_format($harga_normal, 0, ',', '.') ?></p>
                    <?php endif; ?>

                    <div class="status-bar">
                        <span>Stok: <?= $item['stok'] ?></span>
                        <!-- 7. Percabangan status berdasarkan stok -->
                        <?php if ($item['stok'] > 0): ?>
                            <span class="tersedia">Tersedia</span>
                        <?php else: ?>
                            <span class="habis">Stok Habis</span>
                        <?php endif; ?>
                    </div>

                    <!-- 8 & 9. Penyesuaian tombol beli -->
                    <?php if ($item['stok'] > 0): ?>
                        <button class="buy-button">Beli Sekarang</button>
                    <?php else: ?>
                        <button class="buy-button disabled" disabled>Stok Habis</button>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>