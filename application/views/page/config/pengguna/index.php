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
                <li class="active">Data Pengguna</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">
            <!-- skin disini -->
            <?php $this->load->view('template/skin'); ?>

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->


                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="header smaller lighter blue">List Data Pengguna</h3>

                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header">
                                Results for "Latest Registered Domains"
                            </div>

                            <!-- div.table-responsive -->

                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th class="hidden-480">Role</th>
                                            <th class="center">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pengguna as $p) : ?>
                                            <tr>
                                                <td class="center"><?= $no++; ?></td>
                                                <td><?= $p['nama_user']; ?></td>
                                                <td><?= $p['username']; ?></td>
                                                <td class="hidden-480"><?= $p['role']; ?></td>


                                                <td class="center">
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="blue" href="<?= base_url('config/pengguna/access/').$p['u_id'];?>">
                                                            <i class="ace-icon fa fa-key bigger-130"></i>
                                                        </a>

                                                        <a class="green item-edit" href="javascript:;" >
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red item-hapus" href="javascript:;">
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



                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!-- Dialog -->
<div id="dialog-message" class="hide">
    <p>
        Yakin mau ubah data ini ?
    </p>
    <input type="hidden" class="nomorTransaksiHiden" />
</div><!-- #dialog-message -->


<div id="dialog-confirm" class="hide">
    <p class="bigger-110 bolder center grey">
        <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
        Anda yakin?
    </p>
    <input type="hidden" class="nomorAwalHiden" />
</div><!-- #dialog-confirm -->

<!-- End Dialog -->


<?php $this->load->view('template/footer');; ?>
<script src="<?= base_url(); ?>assets/js/app/pengguna.js"></script>

<?php $this->load->view('template/foothtml');; ?>