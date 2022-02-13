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
                <li class="active">Produk</li>
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
                        <div class="col-xs-12">
                            <h3 class="header smaller lighter blue">Produk</h3>


                            <div class="col-xs-12 col-sm-4 widget-container-col" id="widget-container-col-6">

                                <h4 class="blue" style="margin-bottom:15px;">Form Input Produk</h4>

                                <div class="widget-box widget-color-dark light-border" id="widget-box-6">
                                    <div class="widget-header">
                                        <h5 class="widget-title smaller">Data Produk</h5>

                                        <div class="widget-toolbar">
                                            <span class="badge badge-info">Tambah</span>
                                        </div>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main padding-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12">
                                                    <?= form_open('master/produk/simpan', 'class="form-horizontal" role="form" id="form-produk"'); ?>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="kode"> Kode Produk</label>
                                                        <div class="col-sm-9">
                                                            <input type="hidden" name="id">
                                                            <input type="text" name="kode" id="kode" placeholder="Kode Produk" class="col-xs-10 col-sm-5 input-sm" autocomplete="off" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="nama"> Nama</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="nama" placeholder="Nama Produk" class="col-xs-10 col-sm-10 input-sm" autocomplete="off" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="alias"> Nama alias </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="alias" placeholder="Nama alias" class="col-xs-10 col-sm-10 input-sm" autocomplete="off" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="banding">Isi / Banding </label>
                                                        <div class="col-sm-9">
                                                            <input type="number" name="banding" placeholder="Isi / Banding" class="col-xs-10 col-sm-10 input-sm" autocomplete="off" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" for="harga"> Harga </label>
                                                        <div class="col-sm-9">
                                                            <input type="number" name="harga" placeholder="Harga Perbungkus" class="col-xs-10 col-sm-10 input-sm" autocomplete="off" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-info btn-simpan">Simpan</button>
                                            </form>
                                            <button type="button" class="btn btn-sm btn-danger btn-reset">Reset</button>
                                        </div>




                                    </div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-md-8">
                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>
                                <div class="table-header">
                                    Daftar Produk
                                </div>
                                <!-- div.table-responsive -->

                                <!-- div.dataTables_borderWrap -->
                                <div>
                                    <table id="produk-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Kode</th>
                                                <th>Nama Produk</th>
                                                <th>Isi / Banding</th>
                                                <th>Harga per Bks</th>
                                                <th class="center">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($produk as $p) : ?>
                                                <tr>
                                                    <td class="center"><?= $no++; ?></td>
                                                    <td class="text-uppercase"><?= $p['kode']; ?></td>
                                                    <td class="text-uppercase"><?= $p['nama_produk']; ?></td>
                                                    <td class="text-uppercase"><?= $p['banding']; ?></td>
                                                    <td class="text-uppercase"><?= $p['harga']; ?></td>
                                                    <td class="center">
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <a class="blue" href="#">
                                                                <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                            </a>

                                                            <a class="green item-edit" href="javascript:;" data-id="<?= $p['id']; ?>" data-kode="<?= $p['kode']; ?>" data-nama="<?= $p['nama_produk']; ?>" data-alias="<?= $p['alias']; ?>" data-banding="<?= $p['banding']; ?>" data-harga="<?= $p['harga']; ?>">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>

                                                            <a class="red item-hapus" href="javascript:;" data-id="<?= $p['id']; ?>" data-nama="<?= $p['nama_produk']; ?>">
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
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>



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
<script src="<?= base_url(); ?>assets/js/app/produk.js"></script>
<script>
    $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
        _title: function(title) {
            var $title = this.options.title || '&nbsp;'
            if (("title_html" in this.options) && this.options.title_html == true)
                title.html($title);
            else title.text($title);
        }
    }));


    const flash = $('.flashdata').data('flashdata');
    console.log(flash);

    if (flash === 'simpan') {
        $.gritter.add({
            title: 'Sukses Simpan!',
            text: 'Data Produk berhasil di tambah.',
            image: base_url + 'assets/images/avatars/avatar.png',
            class_name: 'gritter-success'
        });
    } else if (flash === 'kode') {
        $.gritter.add({
            title: 'error!',
            text: 'Kode Produk Sudah Ada.',
            image: base_url + 'assets/images/avatars/avatar.png',
            class_name: 'gritter-error'
        });
    } else if (flash === 'ubah') {
        $.gritter.add({
            title: 'Sukses ubah!',
            text: 'Data Produk berhasil di ubah.',
            image: base_url + 'assets/images/avatars/avatar.png',
            class_name: 'gritter-success'
        });
    }


    $('#produk-table').on('click', '.item-edit', function() {
        const id = $(this).attr('data-id');
        const kode = $(this).attr('data-kode');
        const nama = $(this).attr('data-nama');
        const alias = $(this).attr('data-alias');
        const banding = $(this).attr('data-banding');
        const harga = $(this).attr('data-harga');
        $('[name="id"]').val(id);
        $('[name="kode"]').val(kode);
        document.getElementById("kode").disabled = true;
        $('[name="nama"]').val(nama);
        $('[name="alias"]').val(alias);
        $('[name="banding"]').val(banding);
        $('[name="harga"]').val(harga);
        $('.badge').removeClass('badge-info');
        $('.badge').addClass('badge-success');
        $('.badge').text('Edit');
        $('#form-produk').attr('action', base_url + 'master/produk/ubah')
    });

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