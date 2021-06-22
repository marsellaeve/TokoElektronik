<h2>Proses Order sukses</h2>
<div class="kotak2">
<?php
        foreach ($invoice as $row)
            {
?>
<p>Terima kasih sudah berbelanja di Toko Elektronik EveAmel. Order anda sudah masuk ke database kami, silahkan bayar melalui metode-metode pembayaran yang ada di halaman Cara Bayar dengan menambahkan kode <b> <?php echo $row->invoice; ?> </b>pada deskripsi pembayaran. Maksimal dalam 3 x 24 Jam setelah pembayaran, barang akan sampai di tempat anda.<br>
Jangan segan mengontak kami jika ada permasalahan!</p>
<?php
            }
?>
</div>