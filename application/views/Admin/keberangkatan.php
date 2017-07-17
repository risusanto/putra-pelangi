  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jadwal Keberangkatan
        <small>Anda dapat mengelola jadwal keberangkatan bus</small>
      </h1>
      <?= $this->session->flashdata('msg') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Jadwal Keberangkatan <button type="button" class="btn glyphicon glyphicon-plus" data-toggle="modal" data-target="#add"></button></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th style="width: 80px">ID</th>
                  <th>Rute</th>
                  <th>Waktu</th>
                  <th>Tanggal</th>
                  <th>Pengemudi</th>
                  <th>Telepon Pengemudi</th>
                  <th>No. Polisi Bus</th>
                  <th>Penumpang</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
                <?php $i = 1; foreach ($keberangkatan as $row):?>
                <tr>
                  <td><?=$i?></td>
                  <td >KB<?=$row->id_rute?></td>
                  <td><?=$row->asal?> - <?=$row->tujuan?> </td>
                  <td><span class="label label-success"><?=$row->waktu?></span></td>
                  <td><?=$row->tanggal?></td>
                  <td><?=$row->nama?></td>
                  <td><?=$row->telepon?></td>
                  <td><?=$row->no_polisi?></td>
                  <td><?=$this->log_tiket_m->countTicket(['id_keberangkatan'=>$row->id_keberangkatan])?> / <?=$row->kapasitas?></td>
                  <?php if ($row->status == 1):?>
                  <td><span class="label label-success">siap</span></td>
                  <?php elseif ($row->status == 2):?>
                  <td><span class="label label-warning">ditunda</span></td>
                  <?php elseif($row->status == 3):?>
                  <td><span class="label label-danger">berangkat</span></td>
                  <?php else:?>
                  <td>tidak diketahui</td>
                  <?php endif;?>
                  <td>
                    <button type="button" class="btn btn-primary fa fa-edit" data-toggle="modal" data-target="#edit" onclick="get(<?=$row->id_keberangkatan?>)"></button>
                    <button type="button" class="btn btn-danger fa fa-trash" onclick="deleteData(<?=$row->id_keberangkatan?>)"></button>
                    <?php if ($row->status != 3): ?>
                      <button type="button" class="btn btn-success" onclick="berangkat(<?=$row->id_keberangkatan?>)">Berangkat</button>
                    <?php endif; ?>
                  </td>
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
                  <h4 class="modal-title">Tambah Jadwal Keberangkatan</h4>
                </div>
                <div class="modal-body">
                  <?=form_open('admin/jadwal-keberangkatan')?>
                      <div class="box-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Rute Perjalanan</label>
                                <select name="rute" class="form-control select2" style="width: 100%;">
                                <option value="">- Pilih Rute -</option>
                                <?php foreach ($rute as $row):?>
                                <option value="<?=$row->id_rute?>"><?=$row->asal?> - <?=$row->tujuan?></option>
                                <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                                <label>Pengemudi</label>
                                <select name="bus" class="form-control select2" style="width: 100%;">
                                <option value="">- Pilih Pengemudi -</option>
                                <?php foreach ($bus as $row):?>
                                <option value="<?=$row->id_bus?>"><?=$row->nama?></option>
                                <?php endforeach;?>
                                </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tanggal Keberangkatan</label>
                          <input type="date" name="tanggal" class="form-control" placeholder="Masukan Tanggal">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Waktu Keberangkatan</label>
                          <select name="waktu" class="form-control">
                            <option value="">- Pilih Waktu -</option>
                            <option value="10.00 WIB (Pagi)">10.00 WIB (Pagi)</option>
                            <option value="14.00 WIB (Siang)">14.00 WIB (Siang)</option>
                          </select>
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

        <div class="modal fade" id="edit" tabindex="-1" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Jadwal Keberangkatan</h4>
                </div>
                <div class="modal-body">
                  <?=form_open('admin/jadwal-keberangkatan')?>
                      <div class="box-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Rute Perjalanan (Biarkan jika tidak diubah)</label>
                                <select name="rute" class="form-control select2" style="width: 100%;">
                                <option value="">- Pilih Rute -</option>
                                <?php foreach ($rute as $row):?>
                                <option value="<?=$row->id_rute?>"><?=$row->asal?> - <?=$row->tujuan?></option>
                                <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                                <label>Pengemudi (Biarkan jika tidak diubah)</label>
                                <select name="bus" class="form-control select2" style="width: 100%;">
                                <option value="">- Pilih Pengemudi -</option>
                                <?php foreach ($bus as $row):?>
                                <option value="<?=$row->id_bus?>"><?=$row->nama?></option>
                                <?php endforeach;?>
                                </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tanggal Keberangkatan</label>
                          <input type="date" name="edit_tanggal" id="edit_tanggal" class="form-control" placeholder="Masukan Tanggal">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Waktu Keberangkatan</label>
                          <input type="text" name="edit_waktu" id="edit_waktu" class="form-control">
                        </div>
                        <input type="hidden" name="edit_keberangkatan" id="edit_keberangkatan" class="form-control" placeholder="Contoh: 12.00 WIB">
                      </div>
                      <!-- /.box-body -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                  <input type="submit" name ="edit" class="btn btn-primary" value="Simpan">
                <?=form_close()?>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

<!-- Page script -->

    <script type="text/javascript">

        function get(id_keberangkatan) {
            $.ajax({
                url: '<?= base_url('admin/jadwal-keberangkatan') ?>',
                type: 'POST',
                data: {
                    id_keberangkatan: id_keberangkatan,
                    get: true
                },
                success: function(response) {
                    response = JSON.parse(response);
                    $('#edit_waktu').val(response.waktu);
                    $('#edit_tanggal').val(response.tanggal);
                    $('#edit_keberangkatan').val(response.id_keberangkatan);
                }
            });
        }

        function deleteData(id) {
            swal({
            title: "Hapus?",
            text: " ",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: true,
            closeOnCancel: true
            },
            function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url: '<?= base_url('admin/jadwal-keberangkatan') ?>',
                    type: 'POST',
                    data: {
                        delete: true,
                        id: id
                    },
                    success: function() {
                        window.location = '<?= base_url('admin/jadwal-keberangkatan') ?>';
                    }
                });
            }
            });
        }

        function berangkat(id) {
            swal({
            title: "Bis Telah Berangkat?",
            text: " ",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            closeOnConfirm: true,
            closeOnCancel: true
            },
            function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url: '<?= base_url('admin/jadwal-keberangkatan') ?>',
                    type: 'POST',
                    data: {
                        berangkat: true,
                        id: id
                    },
                    success: function() {
                        window.location = '<?= base_url('admin/jadwal-keberangkatan') ?>';
                    }
                });
            }
            });
        }

    </script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
