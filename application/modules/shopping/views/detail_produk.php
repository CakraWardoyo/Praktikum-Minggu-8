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
                <h2><?php echo $detail['nama_produk']; ?></h2>
                <form method="post" action="<?php echo base_url(); ?>shopping/tambah" method="post" accept-charset="utf-8">
                    <div class="kotak2">
                        <img class="img-responsive" src="<?php echo base_url() . 'assets/images2/' . $detail['gambar']; ?>" />
                        <h5>Harga: Rp. <?php echo number_format($detail['harga'], 0, ",", "."); ?></h5>
                        <p class="card-text">
                            <strong> <u>Deskripsi</u></strong><br>
                            <?php echo $detail['deskripsi']; ?>
                        </p>
                        <input type="hidden" name="id" value="<?php echo $detail['id_produk']; ?>" />
                        <input type="hidden" name="nama" value="<?php echo $detail['nama_produk']; ?>" />
                        <input type="hidden" name="harga" value="<?php echo $detail['harga']; ?>" />
                        <input type="hidden" name="gambar" value="<?php echo $detail['gambar']; ?>" />
                        <input type="hidden" name="qty" value="1" />
                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-shopping-cart"></i> Beli Produk Ini</button>
                    </div>
                </form>