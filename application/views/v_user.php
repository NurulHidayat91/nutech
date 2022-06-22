<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data User</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-xm" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i>
                  Add</button>
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
                            <th>Nama User</th>
                            <th>username</th>
                            <th>password</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                         foreach ($user as $key => $value) {?>
                        
                        
                        <tr class="text-center">
                            <td><?= $no++; ?></td>
                            <td><?= $value->nama_user?></td>
                            <td><?= $value->username?></td>
                            <td><?= $value->password?></td>
                            <td><?php
                            if ($value->level_user == 1) {
                                echo '<span class="badge-danger">Admin</span>';
                            }else {
                                echo '<span class="badge-warning">user</span>';
                            }
                            ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_user?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_user?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <?php
                    echo form_open('user/add');
                ?>
                  <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" name="nama_user" placeholder="Nama User" required>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label>Level</label>
                    <select name="level_user" class="form-control">
                            <option value="1" selected>Admin</option>
                            <option value="2">User</option>
                    </select>
                  </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php 
                    echo form_close();
            ?>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      
      <!-- Modal Edit -->
      <?php 
      foreach ($user as $key => $value) {?>
<div class="modal fade" id="edit<?= $value->id_user?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <?php
                    echo form_open('user/edit/'.$value->id_user);
                ?>
                  <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" value="<?=$value->nama_user?>" name="nama_user" placeholder="Nama User" required>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" value="<?=$value->username?>" name="username" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" value="<?=$value->password?>" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label>Level</label>
                    <select name="level_user" class="form-control">
                            <option value="1" <?php if ($value->level_user ==1) {
                              echo 'selected';
                            } ?> selected>Admin</option>
                            <option value="2" <?php if ($value->level_user ==2) {
                              echo 'selected';
                            } ?>>User</option>
                    </select>
                  </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php 
                    echo form_close();
            ?>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php }?>

<!-- Modal Delete -->
<?php 
      foreach ($user as $key => $value)
 {?>
<div class="modal fade" id="delete<?= $value->id_user?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete <?=$value->nama_user?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h5>Apakah anda yakin ingin menghapus data ini..??</h5>
            </div>

            <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   <a href="<?=base_url('user/delete/' . $value->id_user)?>" type="submit" class="btn btn-primary">Delete</a>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php }?>