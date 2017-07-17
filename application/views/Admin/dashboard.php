  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Laman awal</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Selamat datang, Admin!</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <?=form_open('admin/index')?>
          <div class="form-group">
              <div class="form-group">
                <label for="exampleInputPassword1">Rekening Pembayaran</label>
                <input type="text" name="no_rekening" class="form-control" value="<?=$bayar->rekening?>" placeholder="Contoh: 8763547595 a.n Bambang (BNI)">
              </div>
          </div>
          <div class="form-group">
              <div class="form-group">
                <input type="submit" class="btn btn-primary" name="rekening" value="SIMPAN">
              </div>
          </div>
        <?=form_close()?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
