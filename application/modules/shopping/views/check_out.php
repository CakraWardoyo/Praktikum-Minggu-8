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
                <h2>Konfirmasi Check Out</h2>
                <div class="kotak2">
                    <?php
                    $grand_total = 0;
                    if ($cart = $this->cart->contents()) {
                        foreach ($cart as $item) {
                            $grand_total = $grand_total + $item['subtotal'];
                        }
                        echo "<h4>Total Belanja: Rp." . number_format($grand_total, 0, ",", ".") . "</h4>";
                    ?>
                        <form class="form-horizontal" id="form" action="<?php echo base_url() ?>shopping/proses_order" method="post" name="frmCO" id="frmCO">
                            <div class="form-group  has-success has-feedback">
                                <label class="control-label col-xs-3" for="inputEmail">Email:</label>
                                <div class="col-xs-9">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group  has-success has-feedback">
                                <label class="control-label col-xs-3" for="firstName">Nama :</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group  has-success has-feedback">
                                <label class="control-label col-xs-3" for="lastName">Alamat:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="form-group  has-success has-feedback">
                                <label class="control-label col-xs-3" for="phoneNumber">Telp:</label>
                                <div class="col-xs-9">
                                    <input type="tel" class="form-control" name="telp" id="telp" placeholder="No Telp">
                                </div>
                            </div>
                            <div class="form-group  has-success has-feedback">
                                <label class="control-label col-xs-3" for="phoneNumber">Tanggal Service:</label>
                                <div class="col-xs-9">
                                    <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal">
                                </div>
                            </div>


                            <div class="form-group  has-success has-feedback">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <button type="submit" class="btn btn-primary">Proses Order</button>
                                </div>
                                <hr>
                                <div class="col-xs-offset-3 col-xs-9">
                                    <button id="batal_order" class="btn btn-primary">Batal Order</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    } else {
                        echo "<h5>Shopping Cart masih kosong</h5>";
                    }
                    ?>
                </div>

<script>
document.getElementById('form').onsubmit=e=>{
    e.preventDefault()
}
document.getElementById('batal_order').onclick=()=>{
    location.href="http://localhost/ecom1/shopping/tampil_cart";
}
</script>