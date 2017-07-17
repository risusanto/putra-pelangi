<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Update Profil
    </h1>
    <?= $this->session->flashdata('msg') ?>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Profil</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?=form_open('dashboard/profile')?>
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="nama" value="<?=$profile->nama?>" class="form-control" id="exampleInputEmail1" placeholder="Nama Anda">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Telepon</label>
                <input type="number" name="telepon" value="<?=$profile->telepon?>" class="form-control" placeholder="Telepon">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <textarea name="alamat" class="form-control" id="exampleInputEmail1" rows="8" cols="80"><?=$profile->alamat?></textarea>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <input type="submit" class="btn btn-primary" name="edit_profil" value="SIMPAN">
            </div>
          <?=form_close()?>
        </div>
        <!-- /.box -->

      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Ganti Password</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?=form_open('dashboard/profile', array('class' => 'form-horizontal'))?>
            <div class="box-body">
              <div class="form-group">

                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password Lama">
                </div>
              </div>
              <div class="form-group">

                <div class="col-sm-10">
                  <input type="password" name="new_password" class="form-control" id="inputPassword3" placeholder="Password Baru">
                </div>
              </div>
              <div class="form-group">

                <div class="col-sm-10">
                  <input type="password" name="confirm" class="form-control" id="inputPassword3" placeholder="Ketik ulang password baru">
                </div>
              </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
              <input type="submit" class="btn btn-info pull-right" name="pass_baru" value="SIMPAN">
            <?=form_close()?>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
