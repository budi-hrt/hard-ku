<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="#">Transaksi</a>
                </li>
                <li class="active">Stok Awal</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <!-- skin disini -->
            <?php $this->load->view('template/skin'); ?>
            <div class="page-header">
                <h1>Koreksi Stok Awal</h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="search-area well well-sm">
                                <div class="search-filter-header bg-primary">
                                    <h5 class="smaller no-margin-bottom">
                                        <i class="ace-icon fa fa-file light-green bigger-130"></i>
                                        Masukan nomor stok untuk koreksi
                                    </h5>

                                </div>

                                <div class="space-10"></div>

                                <form>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-11 col-md-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="nomorStok" id="nomorStok" placeholder="Pilih /Cari" />
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default no-border btn-sm" id="cari_stok">
                                                        <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="hr hr-dotted"></div>

                                <h4 class="blue smaller">
                                    <i class="fa fa-file"></i>
                                    Nomor : <span class="nomor"></span>
                                    <input type="hidden" name="nomor" id="nomor">
                                    <input type="hidden" name="idStok" id="idStok">
                                </h4>
                                <h4 class="blue smaller">
                                    <i class="fa fa-calendar"></i>
                                    Tanggal : <span class="tanggal"></span>
                                </h4>
                                <h4 class="blue smaller">
                                    <i class="fa fa-user"></i>
                                    Sales : <span class="sales"></span>
                                </h4>
                                <h4 class="blue smaller">
                                    <i class="fa fa-map-marker"></i>
                                    Area : <span class="area"></span>
                                </h4>


                                <div class="hr hr-dotted hr-24"></div>

                                <div class="text-center tombol-proses" style="display: none;">
                                    <button type="button" class="btn btn-default btn-round btn-sm btn-white">
                                        <i class="ace-icon fa fa-remove red2"></i>
                                        Reset
                                    </button>

                                    <button type="button" onclick="proses()" class="btn btn-default btn-round btn-white">
                                        <i class="ace-icon fa fa-refresh green"></i>
                                        Proses
                                    </button>
                                </div>

                                <div class="space-4"></div>
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
<div id="dialog-confirm" class="hide">
    <div class="alert alert-info bigger-110 keterangan">
        These items will be permanently deleted and cannot be recovered.

    </div>
    <input type="hidden" class="idHapusItem" value="" />
    <div class="space-6"></div>

    <p class="bigger-110 bolder center grey">
        <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
        Are you sure?
    </p>
</div><!-- #dialog-confirm -->


<?php $this->load->view('template/footer'); ?>

<script>
    $(document).ready(function() {

        // Dialog
        $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
            _title: function(title) {
                var $title = this.options.title || '&nbsp;'
                if (("title_html" in this.options) && this.options.title_html == true)
                    title.html($title);
                else title.text($title);
            }
        }));
        //end Dialog

    });



    const nomorStokAwal = () => {
        $.ajax({
            url: base_url + 'transaksi/stokAwal/nomor',
            dataType: 'json',
            success: function(data) {
                $('.nomor').html(`Nomor : ${data.nomor}`);
                $('#nomor').val(data.nomor)
                tampilDetil();
            }
        });
    }

    $('#cari_stok').on('click', function() {
        getNomor();
    });



    const getNomor = () => {
        const nomor = $('#nomorStok').val();


        $.ajax({
            type: 'get',
            url: base_url + 'transaksi/korawal/getnomor',
            data: {
                nomor: nomor
            },
            dataType: 'json',
            success: function(data) {

                if (data.type === 'err') {
                    $.gritter.add({
                        title: 'Ops...!',
                        text: 'Data stok tidak ada di table.',
                        class_name: 'gritter-error'
                    });

                    return false;
                } else {
                    console.log(data);
                    $('input[name="nomor"]').val(data.nomor_transaksi);
                    $('.nomor').text(data.nomor_transaksi);
                    $('.tanggal').text(data.tanggal);
                    $('.sales').text(data.nama_sales);
                    $('.area').text(data.nama_area);
                    $('input[name="idStok"]').val(data.idAwal);
                    tampilTombolProses();
                }
            }
        })
    }
    const tampilTombolProses = () => {
        let idStok = $('[name="idStok"]').val();
        if (idStok !== '') {
            $('.tombol-proses').show();
        } else {
            $('.tombol-proses').hide();
        }


    }

    const proses = () => {
        const nomorStok = $('input[name="nomor"]').val();
        window.location.href = base_url + 'transaksi/korawal/formkoreksi/' + nomorStok;
    }
</script>
<?php $this->load->view('template/foothtml'); ?>