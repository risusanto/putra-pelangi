  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Armada Bus
        <small>Anda dapat mengelola bus yang tersedia</small>
      </h1>
      <?= $this->session->flashdata('msg') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Bus <button type="button" class="btn glyphicon glyphicon-plus" data-toggle="modal" data-target="#add"></button></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th style="width: 100px">No. Polisi</th>
                  <th>Nama</th>
                  <th>Kapasitas</th>
                  <th>Pembuat</th>
                  <th>Tahun Pembuatan</th>
                  <th>Opsi</th>
                </tr>
                <?php $i = 1; foreach ($bus as $row):?>
                <tr>
                  <td><?=$i?></td>
                  <td ><?=$row->no_polisi?></td>
                  <td><?=$row->nama?></td>
                  <td><?=$row->kapasitas?></td>
                  <td><?=$row->pembuat?></td>
                  <td><?=$row->tahun?></td>
                  <td>BUTTON HERE</td>
                </tr>
                <?php endforeach;?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
     </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

        <div class="modal fade" id="add" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Armada</h4>
                </div>
                <div class="modal-body">
                  <?=form_open('admin/armada-bus')?>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Nomor Polisi</label>
                          <input type="nama" name="no_polisi" class="form-control" placeholder="Contoh: BG 9999 ND">
                        </div>
                        <div class="form-group">
                          <label>Nama Bus</label>
                          <input type="nama" name="nama" class="form-control" placeholder="Nama Bus (Dapat diisi dengan tipe bus">
                        </div>
                        <div class="form-group">
                          <label>Kapasitas</label>
                          <input type="number" name="kapasitas" class="form-control" placeholder="Kapasitas kursi penumpang">
                        </div>
                        <div class="form-group">
                          <label>pembuat</label>
                          <input type="text" name="pembuat" class="form-control" placeholder="Pembuat">
                        </div>
                        <div class="form-group">
                          <label>Tahun Pembuatan</label>
                          <input type="number" name="tahun" class="form-control" placeholder="Tahun Pembuatan">
                        </div>
                      </div>
                      <!-- /.box-body -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                  <input type="submit" name ="add" class="btn btn-primary" value="Simpan">
                <?=form_close()?>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>