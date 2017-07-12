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
                  <th>Armada</th>
                  <th>Penumpang</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
                <?php $i = 1; foreach ($keberangkatan as $row):?>
                <tr>
                  <td><?=$i?></td>
                  <td >KB<?=$row->id_rute?></td>
                  <td><?=$row->rute?></td>
                  <td><span class="label label-success"><?=$row->waktu?></span></td>
                  <td><?=$row->tanggal?></td>
                  <td><?=$row->nama?></td>
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
                                <option value="<?=$row->id_rute?>"><?=$row->rute?></option>
                                <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                                <label>Armada</label>
                                <select name="bus" class="form-control select2" style="width: 100%;">
                                <option value="">- Pilih Bus -</option>
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
                          <input type="text" name="waktu" class="form-control" placeholder="Contoh: 12.00 WIB">
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

<!-- Page script -->
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
