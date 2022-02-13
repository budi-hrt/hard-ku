<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>

				<li>
					<a href="#">Listen</a>
				</li>
				<li class="active">List Stok Awal</li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">
    <!-- skin disini -->
	<?php $this->load->view('template/skin') ;?>

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->


					<div class="row">
						<div class="col-xs-12">
							<h3 class="header smaller lighter blue">List Stok Awal</h3>

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
											<th>Nomor Stok</th>
											<th>Tanggal</th>
											<th class="hidden-480">Nama Sales</th>
											<th class="center">Aksi</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$no = 1;
										foreach ($awl as $p) : ?>
											<tr>
												<td class="center"><?= $no++; ?></td>
												<td><?= $p['nomor_transaksi']; ?></td>
												<td><?= date('d F Y', strtotime($p['tanggal'])); ?></td>
												<td class="hidden-480"><?= $p['nama_sales']; ?></td>


												<td class="center">
													<div class="hidden-sm hidden-xs action-buttons">
														<a class="blue" href="#">
															<i class="ace-icon fa fa-search-plus bigger-130"></i>
														</a>

														<a class="green item-edit" href="javascript:;" data-nomor="<?= $p['nomor_transaksi']; ?>">
															<i class="ace-icon fa fa-pencil bigger-130"></i>
														</a>

														<a class="red item-hapus" href="javascript:;" data-nomor="<?= $p['nomor_transaksi']; ?>">
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
<script src="<?= base_url(); ?>assets/js/app/listAwal.js"></script>
<script>
	$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
		_title: function(title) {
			var $title = this.options.title || '&nbsp;'
			if (("title_html" in this.options) && this.options.title_html == true)
				title.html($title);
			else title.text($title);
		}
	}));




	$('#dynamic-table').on('click', '.item-edit', function() {
		const nomorTransaksi = $(this).attr('data-nomor');
		$('.nomorTransaksiHiden').val(nomorTransaksi);
		var dialog = $("#dialog-message").removeClass('hide').dialog({
			modal: true,
			title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> Konfirmasi</h4></div>",
			title_html: true,
			buttons: [{
					text: "Batal",
					"class": "btn btn-minier",
					click: function() {
						$(this).dialog("close");
					}
				},
				{
					text: "OK",
					"class": "btn btn-primary btn-minier",
					click: function() {
						handleOk();
						$(this).dialog("close");
					}
				}
			]
		});
	});

	const handleOk = () => {
		const nomorAwal = $('.nomorTransaksiHiden').val();
		window.location.href = base_url + 'transaksi/stokAwal/getFormUbah/' + nomorAwal;
	}


	$('#dynamic-table').on('click', '.item-hapus', function() {
		const nomorTransaksi = $(this).attr('data-nomor');
		$('.nomorAwalHiden').val(nomorTransaksi);
		$("#dialog-confirm").removeClass('hide').dialog({
			resizable: false,
			width: '320',
			modal: true,
			title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Yakin Akan Hapus?</h4></div>",
			title_html: true,
			buttons: [{
					html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Hapus",
					"class": "btn btn-danger btn-minier",
					click: function() {
						handleHapus();
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
	});

	const handleHapus = () => {
		const nomorTransaksi = $('.nomorAwalHiden').val();
		$.ajax({
			type: 'get',
			url: base_url + 'listen/awal/hapusStokAwal',
			data: {
				nomor: nomorTransaksi
			},
			success: function() {
				hapusDetil(nomorTransaksi);

			}
		})
	}

	const hapusDetil = (nomorTransaksi) => {
		$.ajax({
			type: 'get',
			url: base_url + 'listen/awal/hapusDetilAwal',
			data: {
				nomor: nomorTransaksi
			},
			success: function() {
				$.gritter.add({
					title: 'Sukses Simpan!',
					text: 'Stok Awal berhasil di hapus.',
					image: base_url + 'assets/images/avatars/avatar.png',
					class_name: 'gritter-success'
				});

				setTimeout(() => {
					window.location.href = base_url + 'listen/awal';
				}, 1000)
			}
		})
	}
</script>
<?php $this->load->view('template/foothtml');; ?>