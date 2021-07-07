<!-- Begin page content -->
<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <div class="list-group">
        <a class="list-groupitem"><strong>KATEGORI</strong></a>
        <a href="<?php echo base_url() ?>shopping/index/" class="list-group-item">Semua</a>
        <?php foreach ($kategori as $row) { ?>
          <a href="<?php echo base_url() ?>shopping/index/<?php echo $row['id']; ?>" class="list-group-item"><?php echo $row['nama_kategori']; ?></a>
        <?php } ?>
      </div>
      <br>
      <div class="list-group">
        <a href="<?php echo base_url() ?>shopping/tampil_cart" class="list-group-item"><strong><i class="glyphicon glyphiconshopping-cart"></i> KERANJANG BELANJA</strong></a>
        <?php $cart = $this->cart->contents();
        // If cart is empty, this will show below message.
        if (empty($cart)) { ?>
          <a class="list-group-item">Keranjang Belanja Kosong</a>
          <?php
        } else {
          $grand_total = 0;
          foreach ($cart as $item) {
            $grand_total += $item['subtotal']; ?>
            <a class="list-group-item"><?php echo $item['name']; ?> (<?php echo $item['qty']; ?> x <?php echo number_format($item['price'], 0, ",", "."); ?>)=<?php echo number_format($item['subtotal'], 0, ",", "."); ?></a>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
    <!-- /.col-lg-3 -->
    <div class="col-lg-9">
      <div class="row">
        <h2>Cara Pesan & Bayar </h2>
        <p>"Untuk pemesanan anda tinggal memasukkan alamat, nomer telepon / wa yang dapat dihubungi,
          dan tentukan tanggal kapan anda ingin melakukan service terhadap mesin industri yang digunakan."</p>
        <p>"Untuk proses pembayaran bisa dialkukan secara langsung(COD) maupun transefer bank."</p>