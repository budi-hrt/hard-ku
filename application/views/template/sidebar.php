<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
	<script type="text/javascript">
		try {
			ace.settings.loadState('sidebar')
		} catch (e) {}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="ace-icon fa fa-signal"></i>
			</button>

			<button class="btn btn-info">
				<i class="ace-icon fa fa-pencil"></i>
			</button>

			<button class="btn btn-warning">
				<i class="ace-icon fa fa-user"></i>
			</button>

			<button class="btn btn-danger">
				<i class="ace-icon fa fa-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li class="active">
			<a href="<?= base_url('home'); ?>">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li>



		<!-- QUERY MENU -->
		<?php
		$role_id = $this->session->userdata('role_id');
		$queryMenu = "SELECT `user_menu`.`id`, `menu`,`icon`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
		$menu = $this->db->query($queryMenu)->result_array();
		?>

		<!-- LOOPING MENU -->
		<?php foreach ($menu as $m) : ?>
			<?php if ($mn == $m['menu']) : ?>
				<li class="active open">
				<?php else : ?>
				<li class="">
				<?php endif; ?>
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa <?= $m['icon']; ?>"></i>
					<span class="menu-text">
						<?= $m['menu']; ?>
					</span>

					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>


				<!-- SIAPKAN SUB-MENU SESUAI MENU -->
				<?php
				$menuId = $m['id'];
				$querySubMenu = "SELECT `user_sub_menu`.`id` as `smid`
                               FROM `user_sub_menu` JOIN `user_menu` 
                                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                              WHERE `user_sub_menu`.`menu_id` = $menuId
                                AND `user_sub_menu`.`is_active` = 1
                        ";
				$subMenu = $this->db->query($querySubMenu)->result_array();
				?>

				<?php foreach ($subMenu as $sm) : ?>


					<?php
					$smId = $sm['smid'];
					$userId = $user['id_user'];

					$queryUserSubMenu = "SELECT *
						FROM `user_access_sub_menu`
						JOIN `user_sub_menu`
						ON `user_access_sub_menu`.`submenu_id`=`user_sub_menu`.`id`
						JOIN `user_menu`
						ON `user_access_sub_menu`.`menu_id`=`user_menu`.`id`
						WHERE `user_access_sub_menu`.`submenu_id`=$smId
						AND `user_access_sub_menu`.`menu_id`=$menuId
						AND `user_access_sub_menu`.`user_id`=$userId
						";
					$accessSubMenu = $this->db->query($queryUserSubMenu)->result_array();
					?>
					<?php foreach ($accessSubMenu as $asm) : ?>
						<ul class="submenu">




							<?php if ($title == $asm['title']) : ?>
								<li class="active">
								<?php else : ?>
								<li class="">
								<?php endif; ?>
								<a href="<?= base_url($asm['url']); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<?= $asm['title']; ?>
								</a>

								<b class="arrow"></b>
								</li>
						</ul>
					<?php endforeach; ?>


				<?php endforeach; ?>
				</li>

			<?php endforeach; ?>
			<li class="">
				<a href="<?= base_url('backup'); ?>">
					<i class="menu-icon fa fa-database"></i>
					<span class="menu-text"> Backup data </span>
				</a>

				<b class="arrow"></b>
			</li>
	</ul><!-- /.nav-list -->

	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>