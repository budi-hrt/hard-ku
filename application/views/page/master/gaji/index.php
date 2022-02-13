<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="#">Home</a>
        </li>

        <li>
          <a href="#">Master</a>
        </li>
        <li class="active">Upah</li>
      </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">
      <!-- skin disini -->
      <?php $this->load->view('template/skin'); ?>

      <div class="flashdata" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->


          <div class="row">
            <div class="col-3">
              <button class="btn btn-warning btn-sm" onclick="showTambah()">Tambah Data Upah</button>
            </div>
            <div class="col-xs-12">
              <h3 class="header smaller lighter blue">Upah Karyawan</h3>



              <div class="col-xs-12 col-md-12">
                <div class="clearfix">
                  <div class="pull-right tableTools-container"></div>
                </div>
                <div class="table-header">
                  Daftar Upah Karyawan
                </div>
                <!-- div.table-responsive -->

                <!-- div.dataTables_borderWrap -->
                <div>
                  <table id="gaji-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="center">#</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Gai Pokok</th>
                        <th>Tunjangan</th>
                        <th>Uang Makan</th>
                        <th>Total Upah</th>
                        <th class="center">Aksi</th>
                        <th class="center">Update</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($gaji as $p) : ?>
                        <?php $ttlUpah = $p['gaji_pokok'] + $p['tunjangan'] + $p['um']; ?>
                        <tr>
                          <td class="center"><?= $no++; ?></td>
                          <td class="text-uppercase"><?= $p['nama_karyawan']; ?></td>
                          <td class="text-uppercase"><?= $p['jabatan_karyawan']; ?></td>
                          <td class="text-uppercase"><?= number_format($p['gaji_pokok'], 0, ',', '.'); ?></td>
                          <td class="text-uppercase"><?= number_format($p['tunjangan'], 0, ',', '.'); ?></td>
                          <td class="text-uppercase"><?= number_format($p['um'], 0, ',', '.'); ?></td>
                          <td class="text-uppercase"><b><?= number_format($ttlUpah, 0, ',', '.'); ?> </b></td>
                          <td class="center">
                            <div class="hidden-sm hidden-xs action-buttons">
                              <a class="blue" href="#">
                                <i class="ace-icon fa fa-search-plus bigger-130"></i>
                              </a>

                              <a class="green item-edit" href="javascript:;" data-id="<?= $p['id_gaji']; ?>" data-idKry="<?= $p['id_kry']; ?>" data-nama="<?= $p['nama_karyawan']; ?>" data-gp="<?= $p['gaji_pokok']; ?>" data-tj="<?= $p['tunjangan']; ?>" data-um="<?= $p['um']; ?>">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                              </a>

                              <a class="red item-hapus" href="javascript:;" data-id="<?= $p['id_gaji']; ?>" data-nama="<?= $p['nama_karyawan']; ?>">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                              </a>
                            </div>

                            <div class="hidden-md hidden-lg">
                              <div class="inline pos-rel">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                  <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                  <li>
                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                      <span class="blue">
                                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                      </span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                      <span class="green">
                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                      </span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                      <span class="red">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                      </span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </td>
                          <td class="center"><?= $p['username']; ?>, <?= date('d-M-Y H:i:s', $p['date_update']); ?> </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>

              </div>

            </div>
          </div>



          <!-- Modal -->
          <div id="modal-gaji" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header no-padding">
                  <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <span class="white">&times;</span>
                    </button>
                    Form Input Gaji
                  </div>
                </div>

                <div class="modal-body ">
                  <div class="row">
                    <div class="col-xs-12">
                      <?= form_open('master/gaji/simpan', 'class="form-horizontal" role="form" id="form-gaji"'); ?>
                      <div class="form-group nama">
                        <label class="col-sm-3 control-label no-padding-right" for="nama"> Nama Karyawan </label>
                        <div class="col-sm-6">
                          <input type="hidden" name="id">
                          <input type="hidden" name="idKry">
                          <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">

                          <div>
                            <select class="form-control" name="nama" id="nama" required>
                              <option value="">=== PILIH ====</option>
                              <?php foreach ($karyawan as $k) : ?>
                                <option value="<?= $k['id_karyawan']; ?>"><?= $k['nama_karyawan']; ?></option>
                              <?php endforeach; ?>

                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group gp">
                        <label class="col-sm-3 control-label no-padding-right" for="gaji_pokok"> Gaji Pokok </label>
                        <div class="col-sm-6">
                          <input type="number" name="gaji_pokok" placeholder="Isikan Gaji Pokok" class="col-xs-10 col-sm-10" autocomplete="off" required />
                        </div>
                      </div>
                      <div class="form-group tj">
                        <label class="col-sm-3 control-label no-padding-right" for="tunjangan">Tunjangan </label>
                        <div class="col-sm-6">
                          <input type="number" name="tunjangan" placeholder="Isikan Tunjangan" class="col-xs-10 col-sm-10" autocomplete="off" required />
                        </div>
                      </div>
                      <div class="form-group um">
                        <label class="col-sm-3 control-label no-padding-right" for="uang_makan">Uang Makan </label>
                        <div class="col-sm-6">
                          <input type="number" name="um" placeholder="Isikan Uang Makan" class="col-xs-10 col-sm-10" autocomplete="off" required />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer no-margin-top">
                  <button type="submit" class="btn btn-sm btn-warning pull-left btn-aksi">
                    <i class="ace-icon fa fa-floppy-o"></i>
                    Simpan
                  </button>
                  <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal" aria-hidden="true">
                    <i class="ace-icon fa fa-times"></i>
                    Batal
                  </button>

                  </form>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
          <!-- end modal -->





          <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.page-content -->
  </div>
</div><!-- /.main-content -->

<!-- Dialog -->
<!-- Dialog -->
<div id="dialog-confirm" class="hide">
  <div class="alert alert-info bigger-110 keterangan">
    These items will be permanently deleted and cannot be recovered.

  </div>
  <input type="hidden" class="idHapusItem" value="" />


</div><!-- #dialog-confirm -->


<?php $this->load->view('template/footer');; ?>
<script src="<?= base_url(); ?>assets/js/app/gaji.js"></script>
<script>
  $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
    _title: function(title) {
      var $title = this.options.title || '&nbsp;'
      if (("title_html" in this.options) && this.options.title_html == true)
        title.html($title);
      else title.text($title);
    }
  }));


  // Gaji

  const showTambah = () => {
    $('#form-gaji')[0].reset();
    $('#form-gaji').attr('action', base_url + 'master/gaji/simpan');
    $('#modal-gaji').find('.table-header').text('Tambah Data Upah');
    $('.btn-aksi').removeClass('btn-success');
    $('.btn-aksi').addClass('btn-warning');
    $('#modal-gaji').modal('show');


  }

  $('#gaji-table').on('click', '.item-edit', function() {
    $('#form-gaji')[0].reset();
    $('#form-gaji').attr('action', base_url + 'master/gaji/ubah');
    $('#modal-gaji').find('.table-header').text('Edit Data Upah');
    $('.btn-aksi').removeClass('btn-warning');
    $('.btn-aksi').addClass('btn-success');
    const id = $(this).attr('data-id');
    const idKry = $(this).attr('data-idKry');
    const nama = $(this).attr('data-nama');
    const gp = $(this).attr('data-gp');
    const tj = $(this).attr('data-tj');
    const um = $(this).attr('data-um');
    $('[name="id"]').val(id);
    $('[name="nama"]').val(idKry);
    $('[name="idKry"]').val(idKry);
    console.log(idKry);
    document.getElementById("nama").disabled = true;
    $('[name="gaji_pokok"]').val(gp);
    $('[name="tunjangan"]').val(tj);
    $('[name="um"]').val(um);

    $('.badge').removeClass('badge-info');
    $('.badge').addClass('badge-success');
    $('.badge').text('Edit');
    $('#modal-gaji').modal('show');
  });


  // End Gaji







  const flash = $('.flashdata').data('flashdata');
  console.log(flash);

  if (flash === 'simpan') {
    $.gritter.add({
      title: 'Sukses Simpan!',
      text: 'Data Upah berhasil di tambah.',
      image: base_url + 'assets/images/avatars/avatar.png',
      class_name: 'gritter-success'
    });
  } else if (flash === 'kode') {
    $.gritter.add({
      title: 'error!',
      text: 'Data Upah Karyawan Sudah Ada.',
      image: base_url + 'assets/images/avatars/avatar.png',
      class_name: 'gritter-error'
    });
  } else if (flash === 'ubah') {
    $.gritter.add({
      title: 'Sukses ubah!',
      text: 'Data Upah berhasil di ubah.',
      image: base_url + 'assets/images/avatars/avatar.png',
      class_name: 'gritter-success'
    });
  }




  $('.btn-reset').on('click', function() {
    $('[name="id"]').val('');
    $('[name="kode"]').val('');
    document.getElementById("kode").disabled = false;
    $('[name="nama"]').val('');
    $('[name="alias"]').val('');
    $('[name="banding"]').val('');
    $('[name="harga"]').val('');
    $('.badge').removeClass('badge-success');
    $('.badge').addClass('badge-info');
    $('.badge').text('Tambah');
    $('#form-produk').attr('action', base_url + 'master/produk/simpan')
  });

  $('#produk-table').on('click', '.item-hapus', function() {
    const id = $(this).attr('data-id');
    const nama = $(this).attr('data-nama');
    $('.idHapusItem').val(id);
    $('.keterangan').html(`<h5><b>${nama}</b></h5> akan dihapus dari produk.`);
    // Dialog
    $("#dialog-confirm").removeClass('hide').dialog({
      resizable: false,
      width: '320',
      modal: true,
      title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Yakin Hapus ?</h4></div>",
      title_html: true,
      buttons: [{
          html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Hapus",
          "class": "btn btn-danger btn-minier",
          click: function() {
            hapus();
            $(this).dialog("close");
            $.gritter.add({
              title: 'Sukses hapus!',
              text: 'Data produk berhasil di hapus.',
              image: base_url + 'assets/images/avatars/avatar.png',
              class_name: 'gritter-success'
            });

            setTimeout(() => {
              window.location.href = base_url + 'master/produk';
            }, 1000);
          }
        },
        {
          html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Batal",
          "class": "btn btn-minier",
          click: function() {
            $(this).dialog("close");
          }
        }
      ]
    });
    // end Dialog
  });
  const hapus = () => {
    const id = $('.idHapusItem').val();
    $.ajax({
      type: 'get',
      url: base_url + 'master/produk/hapus',
      data: {
        id: id
      }
    });
  }
</script>
<?php $this->load->view('template/foothtml');; ?>