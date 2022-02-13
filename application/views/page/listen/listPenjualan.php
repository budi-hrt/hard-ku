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
				<li class="active">List Penjualan</li>
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
							<h3 class="header smaller lighter blue">List Penjualan</h3>

							<div class="clearfix">
								<div class="pull-right tableTools-container"></div>
							</div>
							<div class="table-header">
								Table list Penjulan Kanvas
							</div>

							<!-- div.table-responsive -->

							<!-- div.dataTables_borderWrap -->
							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Tanggal</th>
											<th>Nomor Stok</th>
											<th>Nama Sales</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
										<?php
										$no = 1;
										$tanggalSekarang = date('Y-m-d');
										foreach ($penjualan as $p) : ?>
											<tr>
												<td class="center"><?= $no++; ?></td>
												<td><?= date('d-m-Y', strtotime($p['tanggal'])); ?></td>
												<td><?= $p['nomor_transaksi']; ?></td>
												<td><?= $p['nama_sales']; ?></td>
												<td><?= number_format($p['jumlah'], 0, ',', '.'); ?></td>
												<td class="center">
													<div class="hidden-sm hidden-xs action-buttons">
														<a class="blue" href="#">
															<i class="ace-icon fa fa-search-plus bigger-130"></i>
														</a>
														<?php if ($p['tanggal'] == $tanggalSekarang) : ?>
															<a class="green item-edit" href="javascript:;" data-nomor="<?= $p['nomor_transaksi']; ?>">
																<i class="ace-icon fa fa-pencil bigger-130"></i>
															</a>
														<?php else : ?>
															<a class="grey" href="#">
																<i class="ace-icon fa fa-pencil bigger-130"></i>
															</a>
														<?php endif; ?>
														<a class="grey" href="<?= base_url('transaksi/penjualan/pdfPenjualanKanvas/'); ?><?= $p['nomor_transaksi']; ?>" target="blank">
															<i class="ace-icon fa fa-print bigger-130"></i>
														</a>
													</div>


												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
								<!-- <input type="text" value="<?= $tanggalSekarang; ?>"> -->
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
	<table id="simple-table" class="table  table-bordered table-hover">
		<thead>
			<tr>
				<th class="center" width="50">#</th>
				<th class="center" width="300">Produk</th>
				<th class="center">Harga / Bks</th>
				<th class="center">Dos</th>
				<th class="center">Bks</th>
				<th class="center">Aksi</th>
			</tr>
		</thead>
		<tbody id="detil">
		</tbody>
	</table>

	<div class="hr hr-12 hr-double"></div>
	<input type="hidden" class="nomorHiden">
</div><!-- #dialog-message -->
<!-- end Dialog -->



<?php $this->load->view('template/footer');; ?>
<script src="<?= base_url(); ?>assets/js/app/listPenjualan.js"></script>

<script>
	$(document).ready(function() {
		$.ui.dialog.prototype._focusTabbable = $.noop;
	});

	//override dialog's title function to allow for HTML titles
	$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
		_title: function(title) {
			var $title = this.options.title || '&nbsp;'
			if (("title_html" in this.options) && this.options.title_html == true)
				title.html($title);
			else title.text($title);
		}
	}));



	$('.item-edit').on('click', function() {
		const nomorTransaksi = $(this).attr('data-nomor');
		$('.nomorHiden').val(nomorTransaksi);
		return tampilStokAwal();

	});
	const tampilStokAwal = () => {
		const nomorTransaksi = $('.nomorHiden').val();
		$.ajax({
			type: 'get',
			url: base_url + 'transaksi/stokAwal/tampil_stok',
			data: {
				nomor: nomorTransaksi
			},
			success: function(html) {
				$('#detil').html(html);
				openDialog();
			}
		});

	}


	const openDialog = () => {
		var dialog = $("#dialog-message").removeClass('hide').dialog({
			modal: true,
			resizable: false,
			width: '620',
			title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> Ubah Stok Awal</h4></div>",
			title_html: true,
			effect: 'fade',
			buttons: [{
					text: "Batal",
					"class": "btn btn-minier",
					click: function() {
						$(this).dialog("close");
					}
				},
				{
					text: "Simpan",
					"class": "btn btn-primary btn-minier",
					click: function() {
						updateTbPenjualan();
						$(this).dialog("close");
					}
				}
			]
		});

	}

	// ======= EDITABLE ====//
	// edit harga
	$('#detil').editable({
		container: 'body',
		selector: 'td.harga',
		url: base_url + "transaksi/stokAwal/editHarga",
		title: 'Harga ',
		// type: "POST",
		success: function() {
			tampilStokAwal();
		}
	});

	// edit dus
	$('#detil').editable({
		container: 'body',
		selector: 'td.dus',
		url: base_url + "transaksi/stokAwal/editDus",
		title: 'Dos ',
		// mode: 'inline',
		success: function() {
			tampilStokAwal();
		}
	});

	$('#detil').editable({
		container: 'body',
		selector: 'td.bks',
		url: base_url + 'transaksi/stokAwal/editBks',
		title: 'Bungkus ',
		// mode: 'inline',
		success: function() {
			tampilStokAwal();
		}
	})

	const updateTbPenjualan = () => {
		const nomorTransaksi = $('.nomorHiden').val();
		const subTotal = $('[name="subtotal"]').val();
		$.ajax({
			type: 'get',
			url: base_url + 'transaksi/penjualan/updatePenjualan',
			data: {
				nomor: nomorTransaksi,
				subTotal: subTotal,
				idUser: id_user
			},
			success: function() {
				$.gritter.add({
					title: 'Sukses Simpan!',
					text: 'Stok berhasil ubah.',
					image: base_url + 'assets/images/avatars/avatar.png',
					class_name: 'gritter-success'
				});

				setTimeout(() => {
					window.location.href = base_url + 'listen/penjualan';
				}, 2000)
			}
		})
	}
</script>
<?php $this->load->view('template/foothtml');; ?>