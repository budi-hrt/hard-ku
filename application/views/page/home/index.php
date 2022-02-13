<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">Dashboard</li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">
			<div class="ace-settings-container" id="ace-settings-container">
				<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
					<i class="ace-icon fa fa-cog bigger-130"></i>
				</div>

				<div class="ace-settings-box clearfix" id="ace-settings-box">
					<div class="pull-left width-50">
						<div class="ace-settings-item">
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="no-skin" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
						</div>
					</div><!-- /.pull-left -->

					<div class="pull-left width-50">
						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
							<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
							<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
							<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
						</div>
					</div><!-- /.pull-left -->
				</div><!-- /.ace-settings-box -->
			</div><!-- /.ace-settings-container -->

			<div class="page-header">
				<h1>
					Dashboard

				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">
							<i class="ace-icon fa fa-times"></i>
						</button>

						<i class="ace-icon fa fa-check green"></i>

						Welcome to
						<strong class="green">
							Kanvas App
							<small>(v1.0)</small>
						</strong>,

					</div>

					<div class="row">
						<div class="space-6"></div>

						<div class="col-sm-7 infobox-container">
							<div class="infobox infobox-green">
								<div class="infobox-icon">
									<i class="ace-icon fa fa-user"></i>
								</div>

								<div class="infobox-data">
									<span class="infobox-data-number"><?= $sales; ?></span>
									<div class="infobox-content">JUmlah Sales</div>
								</div>
							</div>

							<div class="infobox infobox-blue">
								<div class="infobox-icon">
									<i class="ace-icon fa fa-bookmark"></i>
								</div>

								<div class="infobox-data">
									<span class="infobox-data-number"><?= $produk; ?></span>
									<div class="infobox-content">Produk</div>
								</div>
							</div>

							<div class="infobox infobox-pink">
								<div class="infobox-icon">
									<i class="ace-icon fa fa-shopping-cart"></i>
								</div>

								<div class="infobox-data">
									<span class="infobox-data-number"><?= $penjualan; ?></span>
									<div class="infobox-content">Transaksi Penjualan</div>
								</div>
							</div>

							<div class="infobox infobox-red">
								<div class="infobox-icon">
									<i class="ace-icon fa fa-flask"></i>
								</div>

								<div class="infobox-data">
									<span class="infobox-data-number"><?= $pending; ?></span>
									<div class="infobox-content">Transaksi Pending</div>
								</div>
							</div>

							<div class="infobox infobox-orange2">
								<div class="infobox-icon">
									<i class="ace-icon fa fa-users"></i>
								</div>

								<div class="infobox-data">
									<span class="infobox-data-number"><?= $admin; ?></span>
									<div class="infobox-content">Jumlah User</div>
								</div>
							</div>

							<div class="infobox infobox-blue2">
								<div class="infobox-progress">
									<div class="easy-pie-chart percentage" data-percent="42" data-size="46">
										<span class="percent">42</span>%
									</div>
								</div>

								<div class="infobox-data">
									<span class="infobox-text">traffic used</span>

									<div class="infobox-content">
										<span class="bigger-110">~</span>
										58GB remaining
									</div>
								</div>
							</div>

							<div class="space-6"></div>

						</div>

						<div class="vspace-12-sm"></div>

						<div class="col-sm-5">
							<div class="widget-box">
								<div class="widget-header widget-header-flat widget-header-small">
									<h5 class="widget-title">
										<i class="ace-icon fa fa-signal"></i>
										Traffic Sources
									</h5>

									<div class="widget-toolbar no-border">
										<div class="inline dropdown-hover">
											<button class="btn btn-minier btn-primary">
												This Week
												<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
											</button>

											<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
												<li class="active">
													<a href="#" class="blue">
														<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
														This Week
													</a>
												</li>

												<li>
													<a href="#">
														<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
														Last Week
													</a>
												</li>

												<li>
													<a href="#">
														<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
														This Month
													</a>
												</li>

												<li>
													<a href="#">
														<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
														Last Month
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<div id="piechart-placeholder"></div>
									</div><!-- /.widget-main -->
								</div><!-- /.widget-body -->
							</div><!-- /.widget-box -->
						</div><!-- /.col -->
					</div><!-- /.row -->



					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->




<?php $this->load->view('template/footer');; ?>
<script src="<?= base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.easypiechart.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.sparkline.index.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.flot.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.flot.pie.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.flot.resize.min.js"></script>
<script src="<?= base_url(); ?>assets/js/app/home.js"></script>
<?php $this->load->view('template/foothtml');; ?>