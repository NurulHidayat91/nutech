<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Add Barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php 
            //notifikasi form barang
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>', '</h5> </div>');
            
            //notifikasi gagal upload
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i>' .$error_upload. '</h5> </div>'; 
            }
            echo form_open_multipart('barang/add')?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?=set_value('nama_barang')?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" placeholder="Stok Barang" value="<?=set_value('stok')?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control">
                                <option value="">--Pilih Kategori--</option>
                                <?php foreach ($kategori as $key => $value) { ?>
                                    <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori?></option>
                                <?php }?>
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga" value="<?=set_value('harga')?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="number" min="0" name="harga_beli" class="form-control" placeholder="harga_beli" value="<?=set_value('harga_beli')?>">
                        </div>
                    </div>
                 </div>
                 
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" cols="60" rows="10"><?= set_value('deskripsi')?></textarea>
                        </div>
                 </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" placeholder="Gambar" id="preview_gambar" class="form-control" require>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <img src="<?=base_url('assets/gambar/no_foto.jpg')?>" id="gambar_load" style="width: 40%;">
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="<?= base_url('barang')?>" class="btn btn-success btn-sm">Kembali</a>
                        </div>

            <?= form_close()?>
        </div>
    </div>
</div>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0])
        }
    }

    $('#preview_gambar').change(function(){
        bacaGambar(this);

    });
</script>