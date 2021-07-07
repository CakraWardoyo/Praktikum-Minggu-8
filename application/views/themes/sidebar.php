<div class="list-group">
          <a class="list-groupitem"><strong>KATEGORI</strong></a>
          <a href="<?php echo base_url() ?>shopping/index/" class="list-group-item">Semua</a>
          <?php foreach ($kategori as $row) { ?>
            <a href="<?php echo base_url() ?>shopping/index/<?php echo $row['id']; ?>" class="list-group-item"><?php echo $row['nama_kategori']; ?></a>
          <?php } ?>
        </div>