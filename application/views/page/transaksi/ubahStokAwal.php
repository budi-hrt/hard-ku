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
				<li class="active">Ubah Stok Awal</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<!-- skin disini -->
			<?php $this->load->view('template/skin'); ?>
			<div class="page-header">
				<h1>Ubah Stok Awal</h1>
			</div><!-- /.page-header -->
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-xs-12 col-sm-3">
							<div class="search-area well well-sm">
								<div class="search-filter-header bg-primary">
									<h5 class="smaller no-margin-bottom nomor">
										<i class="ace-icon fa fa-sliders light-green bigger-130"><?= $data['nomor_transaksi']; ?></i>
									</h5>
									<input type="hidden" id="nomor" value="<?= $data['nomor_transaksi']; ?>">
									<input type="hidden" id="idAwal" value="<?= $data['idAwal']; ?>">
								</div>

								<div class="space-10"></div>

								<form>
									<div class="row">
										<div class="col-xs-12 col-sm-11 col-md-10">
											<div class="input-group">
												<input type="text" class="form-control" name="sales" id="sales" placeholder="Sales" />
												<div class="input-group-btn">
													<button type="button" class="btn btn-default no-border btn-sm">
														<i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
													</button>
												</div>
											</div>
										</div>
									</div>
								</form>

								<div class="hr hr-dotted"></div>

								<h4 class="blue smaller">
									<i class="fa fa-calendar"></i>
									Tanggal
								</h4>


								<div class="p-1">
									<input type="text" class="form-control" name="tanggal" value="<?= date('d F Y', strtotime($data['tanggal'])); ?>" readonly>
								</div>


								<div class="hr hr-dotted"></div>

								<h4 class="blue smaller">
									<i class="fa fa-map-marker light-orange bigger-110"></i>
									Info
								</h4>

								<div>
									<h6 class="sales ">Sales : <?= $data['nama_sales']; ?></h6>
									<h6 class="area ">Area : <?= $data['nama_area']; ?></h6>
									<input type="hidden" name="idSales" id="idSales" value="<?= $data['id_sales']; ?>">
								</div>




								<div class="hr hr-dotted hr-24"></div>

								<div class="text-center">
									<button type="button" class="btn btn-default btn-round btn-sm btn-white">
										<i class="ace-icon fa fa-remove red2"></i>
										Reset
									</button>

									<button type="button" onclick="cekProses()" class="btn btn-default btn-round btn-white">
										<i class="ace-icon fa fa-refresh green"></i>
										Proses
									</button>
								</div>

								<div class="space-4"></div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-9">
							<div class="search-area well well-sm">
								<form>
									<div class="row">
										<div class="col-xs-12 col-sm-11 col-md-10">
											<div class="input-group">
												<input type="text" class="form-control" name="item" id="item" placeholder="Cari / Pilih Item..." autocomplete="off" />
												<div class="input-group-btn">
													<button type="button" class="btn btn-default no-border btn-sm" disabled>
														<i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
													</button>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-11 col-md-2 item text-right " style="display: none;">
											<h5>
												Item
												<span class="badge badge-pink totalItem">11</span>

												</h6>
										</div>
									</div>
								</form>
							</div>
							<table id="simple-table" class="table  table-bordered table-hover">
								<thead>
									<tr>
										<th class="center" width="50">#</th>
										<th class="center" width="400">Produk</th>
										<th class="center">Harga / Bks</th>
										<th class="center">Dos</th>
										<th class="center">Bks</th>
										<th class="center">Aksi</th>
									</tr>
								</thead>
								<tbody id="detil">
								</tbody>
							</table>
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
		tampilDetil();

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

	const tampilItem = () => {
		let item = $('[name="itemHidden"]').val();
		if (item !== '') {
			$('.item').show();
			$('.totalItem').text(item);
		} else {
			$('.item').hide();
		}


	}


	$("#item").autocomplete({
		source: "<?= site_url('master/produk/getAutoComplete'); ?>",
		select: function(event, ui) {
			const kodeProduk = ui.item.description;
			getProduk(kodeProduk);
		}
	});

	const getProduk = (kodeProduk) => {
		const nomor = $('#nomor').val();
		$.ajax({
			type: 'get',
			url: base_url + 'master/produk/get',
			data: {
				kodeProduk: kodeProduk,
				nomor: nomor
			},
			dataType: 'json',
			success: function(data) {
				console.log(data);
				if (data.type === 'err') {
					$.gritter.add({
						title: 'Ops...!',
						text: 'Data Produk sudah ada di table.',
						class_name: 'gritter-error'
					});
					$('#item').val('');
					return false;
				} else {
					const dataDetil = {
						kode: data.kode,
						harga: data.harga,
						nomorStok: nomor,
						id_user: id_user
					}
					simpanDetil(dataDetil);
				}
			}
		})
	}


	const simpanDetil = (data) => {
		$.ajax({
			type: 'post',
			url: base_url + 'transaksi/stokAwal/simpanDetil',
			data: data,
			dataType: 'json',
			success: function(response) {
				if (response.success) {
					if (response.type === 'ok') {
						tampilDetil();
						$('#item').val('');
					} else {
						console.log(response.type);

					}
				}
			}
		})
	}


	const tampilDetil = () => {
		const nomor = $('#nomor').val();
		$.ajax({
			type: 'get',
			url: base_url + 'transaksi/stokAwal/tampil_stok',
			data: {
				nomor: nomor
			},
			success: function(html) {
				$('#detil').html(html);
				tampilItem();
			}
		});
	}


	// Sales
	$('#sales').autocomplete({
		source: "<?= site_url('master/sales/getAutoComplete'); ?>",
		select: function(event, ui) {
			const idSales = ui.item.description;
			getSales(idSales);
		}
	})

	const getSales = (idSales) => {
		$.ajax({
			type: 'get',
			url: base_url + 'Master/sales/getStokAwal',
			data: {
				idSales: idSales
			},
			dataType: 'json',
			success: function(data) {
				if (data === 'err') {
					$.gritter.add({
						title: 'Ops...!',
						text: 'Data Produk sudah ada di table.',
						class_name: 'gritter-error'
					});
					$('.sales').text(`Sales : `)
					$('.area').text(`Area : `)
					$('[name="idSales"]').val('');
					$('#sales').val('');
					return false;
				} else {
					$('.sales').text(`Sales : ${data.nama_sales}`)
					$('.area').text(`Area : ${data.daerah}`)
					$('[name="idSales"]').val(data.id);
					$('#sales').val('');
				}
			}
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
			tampilDetil();
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
			tampilDetil();
		}
	});

	$('#detil').editable({
		container: 'body',
		selector: 'td.bks',
		url: base_url + 'transaksi/stokAwal/editBks',
		title: 'Bungkus ',
		// mode: 'inline',
		success: function() {
			tampilDetil();
		}
	})

	const cekProses = () => {
		const idSales = $('[name="idSales"]').val();
		let item = $('[name="itemHidden"]').val();
		if (item === '') {
			$.gritter.add({
				title: 'Ops...!',
				text: 'Belum Ada Data untuk di proses.',
				class_name: 'gritter-error'
			});
			return false;
		} else if (idSales === '') {
			$.gritter.add({
				title: 'Ops...!',
				text: 'Belum Ada Data Sales.',
				class_name: 'gritter-error'
			});
			$('#sales').val('');
			return false;
		} else {
			proses(idSales);
		}
	}

	const proses = (idSales) => {
		// const idSales = $('[name="idSales"]').val();
		const idDetil = [];
		$('.idDetil').each(function() {
			idDetil.push($(this).val());
		});
		$.ajax({
			type: 'post',
			url: base_url + 'transaksi/stokAwal/updateDetil',
			data: {
				idSales: idSales,
				idDetil: idDetil
			},
			success: function() {
				updateAwal();
			}
		});
	}

	const updateAwal = () => {
		const idSales = $('[name="idSales"]').val();
		const idAwal = $('#idAwal').val();
		const idUser = id_user;
		$.ajax({
			type: 'post',
			url: base_url + 'transaksi/stokAwal/ubahAwal',
			data: {
				idSales: idSales,
				idAwal: idAwal,
				idUser: idUser
			},
			success: function() {
				nomorStokAwal();
				$.gritter.add({
					title: 'Sukses Simpan!',
					text: 'Stok berhasil ubah.',
					image: base_url + 'assets/images/avatars/avatar.png',
					class_name: 'gritter-success'
				});

				setTimeout(() => {
					window.location.href = base_url + 'listen/awal';
				}, 2000)
			}
		});
	}

	const bersihkan = () => {
		$('.sales').text(`Sales : `)
		$('.area').text(`Area : `)
		$('[name="idSales"]').val('');
		$('#item').focus();
		$.gritter.add({
			title: 'Sukses Simpan!',
			text: 'Stok berhasil dibuat.',
			image: base_url + 'assets/images/avatars/avatar.png',
			class_name: 'gritter-success'
		});

		return false;
	}


	//Hapus
	$('#detil').on('click', '.item-hapus', function() {
		const id = $(this).attr('data-id');
		const nama = $(this).attr('data-nama');
		$('.idHapusItem').val(id);
		$('.keterangan').html(`<h5><b>${nama}</b></h5> akan dihapus dari table.`);
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
						hapusItemDetil();
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

	const hapusItemDetil = () => {
		const id = $('.idHapusItem').val();
		$.ajax({
			type: 'get',
			url: base_url + 'transaksi/stokAwal/hapusItemDetil',
			data: {
				id: id
			},
			success: function() {
				tampilDetil()
			}
		});
	}
</script>
<?php $this->load->view('template/foothtml'); ?>