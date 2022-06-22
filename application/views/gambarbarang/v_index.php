<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Gambar Barang</h3>

                <div class="card-tools">
                  
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
                            <th>Cover</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      foreach ($gambarbarang as $key => $value) {?>
                        <tr class="text-center">
                            <td><?= $no++?></td>
                            <td><?= $value->nama_barang?></td>
                            <td><img src="<?=base_url('assets/gambar/'. $value->gambar)?>" width="100px"></td>
                            <td><?=$value->total_gambar?></td>
                            <td>
                              <a href="<?=base_url('gambarbarang/add/'. $value->id_barang)?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Tambah</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>
