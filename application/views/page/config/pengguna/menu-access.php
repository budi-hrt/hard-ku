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
                <li class="active">User Access</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
                <!-- skin disini -->
        <?php $this->load->view('template/skin') ;?>

            <div class="page-header">
                <h1> Role Access : <?= $pengguna['nama_user']; ?></h1>
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

                                <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($submenu as $sm) : ?>
                                    <tr>
                                        <td class="center"><?= $i; ?></td>

                                        <td class="center"><?= $sm['title']; ?></td>
                                        <td class="center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?= check_subaccess($pengguna['id_user'], $sm['id'], $sm['menu_id']); ?> data-user="<?= $pengguna['id_user']; ?>" data-submenu="<?= $sm['id']; ?>" data-menuid="<?= $sm['menu_id']; ?>">
                                        </div>

                                           
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                        <?php endforeach; ?>
                                   
                                </tbody>
                            </table>
                        </div><!-- /.span -->
                    </div><!-- /.row -->

                    <div class="hr hr-18 dotted hr-double"></div>

                    <h4 class="pink">
                        <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                        <a href="#modal-table" role="button" class="green" data-toggle="modal">Tambah Data Role </a>
                    </h4>

                

                    

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<?php $this->load->view('template/footer'); ;?>

<script>
   $('.form-check-input').on('click', function () {
	const menuId = $(this).data('menuid');
	const submenuId = $(this).data('submenu');
	const userId = $(this).data('user');

	$.ajax({
		url: base_url + 'config/pengguna/userchangeaccess',
		type: 'post',
		data: {
			menuId: menuId,
			submenuId: submenuId,
			userId: userId
		},
		success: function () {
			document.location.href = base_url + 'config/pengguna/access/' + userId;

		}
	});

});
</script>
<?php $this->load->view('template/foothtml'); ;?>

