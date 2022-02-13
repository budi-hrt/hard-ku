<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="#">Config</a>
                </li>
                <li class="active">Role</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <!-- skin disini -->
            <?php $this->load->view('template/skin'); ?>

            <div class="page-header">
                <h1> Role</h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-6">
                            <table id="simple-table" class="table  table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center" width="50">#</th>
                                        <th class="center" width="400">Role</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="showRole">
                                    <!-- <?php $i = 1; ?>
                                    <?php foreach ($role as $r) : ?>
                                        <tr>
                                            <td class="center"><?= $i; ?></td>

                                            <td class="center"><?= $r['role']; ?></td>
                                            <td class="center">
                                                <div class="hidden-sm hidden-xs btn-group">
                                                    <a href="<?= base_url('config/role/roleaccess/') . $r['id']; ?>" class="btn btn-xs btn-success">
                                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                                    </a>
                                                    <a class="btn btn-xs btn-info">
                                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                    </a>
                                                    <a class="btn btn-xs btn-danger">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </a>
                                                </div>


                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?> -->

                                </tbody>
                            </table>
                        </div><!-- /.span -->
                    </div><!-- /.row -->

                    <div class="hr hr-18 dotted hr-double"></div>

                    <h4 class="pink">
                        <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                        <a href="javascript:;" role="button" class="green" onclick="showTambah()">Tambah Data Role </a>
                    </h4>

                    <!-- Modal -->
                    <div id="modal-role" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header no-padding">
                                    <div class="table-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            <span class="white">&times;</span>
                                        </button>
                                        Form Input Role
                                    </div>
                                </div>

                                <div class="modal-body ">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <form id="form-role" action="" class="form-horizontal" role="form">
                                                <div class="form-group role">
                                                    <label class="col-sm-3 control-label no-padding-right" for="role"> Nama Role </label>
                                                    <div class="col-sm-9">
                                                        <input type="hidden" name="id">
                                                        <input type="text" name="role" placeholder="Isikan Nama Role" class="col-xs-10 col-sm-10" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer no-margin-top">
                                    <button class="btn btn-sm btn-primary pull-left" onclick="handleSimpan()">
                                        <i class="ace-icon fa fa-floppy-o"></i>
                                        Simpan
                                    </button>
                                    <button class="btn btn-sm btn-grey pull-left" data-dismiss="modal" aria-hidden="true">
                                        <i class="ace-icon fa fa-times"></i>
                                        Batal
                                    </button>

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
<div id="dialog-confirm" class="hide">
    <div class="alert alert-info bigger-110 keterangan">
        These items will be permanently deleted and cannot be recovered.
    </div>
    <input type="hidden" class="idHapusItem" value="" />
    <div class="space-6"></div>
</div><!-- #dialog-confirm -->




<?php $this->load->view('template/footer'); ?>
<script>
    $(document).ready(function() {
        tampilRole();

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

    const tampilRole = () => {

        $.ajax({
            url: base_url + 'config/role/getAll',
            dataType: 'json',
            success: (result) => {
                const html = document.getElementById('showRole');
                let no = 1;
                result.forEach(data => {

                    return html.innerHTML += `<tr>
                        <td>${no++}</td>
                        <td>${data.role}</td>
                        <td class="center">
                                <div class="hidden-sm hidden-xs btn-group">
                                    <a href="#" onClick="akses(${data.id})" class="btn btn-xs btn-success">
                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                    </a>
                                    <a class="btn btn-xs btn-info item-ubah" data-id="${data.id}" data-role="${data.role}">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </a>
                                    <a class="btn btn-xs btn-danger item-hapus" data-id="${data.id}">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>  `;


                });
            }
        })
    }

    const showTambah = () => {
        $('#form-role')[0].reset();
        $('#form-role').attr('action', base_url + 'config/role/tambah');
        $('#modal-role').find('.table-header').text('Tambah Role');
        $('#modal-role').modal('show');
    }

    $('#showRole').on('click', '.item-ubah', function() {
        const id = $(this).attr('data-id');
        const nameRole = $(this).attr('data-role');
        $('#form-role')[0].reset();
        $('#form-role').attr('action', base_url + 'config/role/ubah');
        $('#modal-role').find('.table-header').text('Ubah Role');
        $('[name="id"]').val(id);
        $('[name="role"]').val(nameRole);
        $('#modal-role').modal('show');
    });


    $('#showRole').on('click', '.item-hapus', function() {
        const id = $(this).attr('data-id');
        $('.idHapusItem').val(id);
        // Dialog
        $("#dialog-confirm").removeClass('hide').dialog({
            resizable: false,
            width: '320',
            modal: true,
            title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Yakin Hapus ?</h4></div>",
            title_html: true,
            buttons: [{
                    html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Hapus items",
                    "class": "btn btn-danger btn-minier",
                    click: function() {
                        hapus();
                        $(this).dialog("close");
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
            url: base_url + 'config/role/hapus',
            data: {
                id: id
            },
            success: function() {
                $('#showRole').empty();
                tampilRole();
            }
        })
    }

    const akses = (id) => {
        window.location.href = base_url + 'config/role/roleaccess/' + id;

    }



    const handleSimpan = () => {
        const url = $('#form-role').attr('action');
        let data = $('#form-role').serialize();
        let role = $('[name="role"]');
        let result = '';
        if (role.val() === '') {
            $('.role').addClass('has-error');
        } else {
            $('.role').removeClass('has-error');
            result += 1;
        }
        if (result == '1') {
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        if (response.type === 'add') {
                            let type = 'Tambah';
                            $.gritter.add({
                                title: 'Sukses !',
                                text: `User Role berhasil di ${type}.`,
                                image: base_url + 'assets/images/avatars/avatar.png',
                                class_name: 'gritter-success'
                            });
                        } else if (response.type === 'update') {
                            let type = 'Ubah';
                            $.gritter.add({
                                title: 'Sukses !',
                                text: `User Role berhasil di ${type}.`,
                                image: base_url + 'assets/images/avatars/avatar.png',
                                class_name: 'gritter-success'
                            });
                        }
                        $('#showRole').empty();
                        $('#modal-role').modal('hide');
                        tampilRole();


                    } else {
                        alert('data tidak berhasil disimpan');
                    }
                },
                error: function() {
                    console.log('error');

                }
            });
        }

    }
</script>

<?php $this->load->view('template/foothtml'); ?>