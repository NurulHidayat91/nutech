<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>

                <div class="card-tools">
                  <a href="<?=base_url('barang/add')?>" button type="button" class="btn btn-primary btn-xm"><i class="fas fa-plus"></i>
                  Add</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                  if ($this->session->flashdata('pesan')) {
                    echo ' <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                  }
                ?>
                <table class="table table-bordered"  id="example1">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>stok</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                         foreach ($barang as $key => $value) {?>
                        <tr class="text-center">
                            <td style="width: 5%;"><?= $no++; ?></td>
                            <td>
                              <?= $value->nama_barang?><br>
                            </td>
                            <td><?= $value->nama_kategori?></td>
                            <td>Rp. <?= number_format($value->harga, 0) ?></td>
                            <td>Rp. <?= number_format($value->harga_beli, 0)?></td>
                            <td><?= $value->stok?></td>
                            <td><img src = "<?=base_url('assets/gambar/'. $value->gambar) ?>" style="width: 120px;"></td>
                            
                            <td class="text-center">
                                <a href="<?=base_url('barang/edit/' . $value->id_barang)?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_barang?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>

<!-- Modal Delete -->
<?php 
      foreach ($barang as $key => $value)
 {?>
<div class="modal fade" id="delete<?= $value->id_barang?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete <?=$value->nama_barang?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h5>Apakah anda yakin ingin menghapus data ini..??</h5>
            </div>

            <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   <a href="<?=base_url('barang/delete/' . $value->id_barang)?>" type="submit" class="btn btn-primary">Delete</a>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
      <!-- /.modal -->
      <?php }?>