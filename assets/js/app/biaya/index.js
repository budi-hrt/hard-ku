$(document).ready(function () {
	tampilInformasiBiaya();

	$(".date-picker").datepicker({
		format: "dd-mm-yyyy",
		autoclose: true,
		todayHighlight: true,
	});

	$("#nomorStok").autocomplete({
		source: base_url + "biaya/getnomorstok",
		// source: "<?= site_url('biaya/getnomorstok'); ?>",
		select: function (event, ui) {
			const nomorStok = ui.item.label;
			$('input[name="id_stok"]').val(ui.item.description);
			getStok(nomorStok);
		},
	});

	const getStok = (nomorStok) => {
		const nomor = nomorStok;
		const nomorBy = $('input[name="nomorBiaya"]').val();
		console.log(nomor);
		$.ajax({
			type: "get",
			url: base_url + "listen/awal/getstok",
			data: {
				nomor: nomor,
			},
			dataType: "json",
			success: function (data) {
				// console.log(data);
				if (data.type === "error") {
					$.gritter.add({
						title: "Ops...!",
						text: "Data Produk sudah ada di table.",
						class_name: "gritter-error",
					});
					$("#nomorStok").val("");
					return false;
				} else {
					$('input[name="area"]').val(data.nama_area);
					$('input[name="id_area"]').val(data.id_area);
					$('input[name="id_sales"]').val(data.id_sales);
					$('input[name="sales"]').val(data.nama_sales);
					$("#start").focus();
					document.getElementById("nomorStok").disabled = true;
					document.getElementById("area").disabled = true;
					document.getElementById("sales").disabled = true;
					const dataBiaya = {
						nomor_biaya: nomorBy,
						nomor_stok: nomor,
						id_area: data.id_area,
						id_sales: data.id_sales,
					};
					updateBiaya(dataBiaya);
				}
			},
		});
	};

	const updateBiaya = (data) => {
		$.ajax({
			type: "post",
			url: base_url + "biaya/updatebiaya1",
			data: data,
		});
	};

	// function bersihkan
	// Btn Reset nomor
	$(".reset-nomor").on("click", function () {
		$('input[name="nomorStok"]').val("");
		$('input[name="id_stok"]').val("");
		$('input[name="area"]').val("");
		$('input[name="id_area"]').val("");
		$('input[name="id_sales"]').val("");
		$('input[name="sales"]').val("");
		document.getElementById("nomorStok").disabled = false;
		document.getElementById("area").disabled = false;
		document.getElementById("sales").disabled = false;
		$("#nomorStok").focus();
	});
	// Keydown
	$("#nomorStok").keydown(function () {
		$('input[name="id_stok"]').val("");
		$('input[name="area"]').val("");
		$('input[name="id_area"]').val("");
		$('input[name="id_sales"]').val("");
		$('input[name="sales"]').val("");
		document.getElementById("area").disabled = false;
		document.getElementById("sales").disabled = false;
	});

	$("#plat").autocomplete({
		source: base_url + "master/kendaraan/getautocomplete",
		select: function (event, ui) {
			const idKendaraan = ui.item.description;
			$('input[name="id_kendaraan"]').val(idKendaraan);
			document.getElementById("plat").disabled = true;
			let idArea = $('input[name="id_area"]');
			if (idArea.val() === "") {
				$("#area").focus();
			} else {
				$("#driver").focus();
			}
			getKmAkhir(idKendaraan);
		},
	});

	const getKmAkhir = (idKendaraan) => {
		const id = idKendaraan;
		const nomorBy = $('input[name="nomorBiaya"]').val();
		$.ajax({
			type: "get",
			url: base_url + "biaya/getkmawal",
			data: {
				id: id,
			},
			dataType: "json",
			success: function (data) {
				$('input[name="kmAwal"]').val(data.km_akhir);
				const dataKendaraan = {
					nomor_biaya: nomorBy,
					idKendaraan: id,
					kmAkhir: data.km_akhir,
				};
				updateBiaya2(dataKendaraan);
			},
		});
	};

	$(".reset-plat").on("click", function () {
		$('input[name="plat"]').val("");
		$('input[name="id_kendaraan"]').val("");
		$('input[name="kmAwal"]').val("");
		document.getElementById("plat").disabled = false;
		$("#plat").focus();
	});

	$("#area").autocomplete({
		source: base_url + "master/area/getautocomplete",
		select: function (event, ui) {
			const idArea = ui.item.description;
			$('input[name="id_area"]').val(idArea);
			const nomorBy = $('input[name="nomorBiaya"]').val();
			const dataArea = {
				nomor_biaya: nomorBy,
				id_area: idArea,
			};
			updateBiaya3(dataArea);
			$("#driver").focus();
		},
	});

	$("#driver").autocomplete({
		source: base_url + "master/sales/getautocomplete",
		select: function (event, ui) {
			const idDriver = ui.item.description;
			$('input[name="driver"]').val(ui.item.label);
			$('input[name="id_driver"]').val(idDriver);
			const nomorBy = $('input[name="nomorBiaya"]').val();
			const dataDriver = {
				nomor_biaya: nomorBy,
				id_driver: idDriver,
			};
			updateBiaya4(dataDriver);
			let idArea = $('input[name="id_area"]');
			if (idArea.val() === "") {
				$("#sales").focus();
			} else {
				$("#kmAwal").focus();
			}
		},
	});

	$("#sales").autocomplete({
		source: base_url + "master/sales/getautocomplete",
		select: function (event, ui) {
			const idSales = ui.item.description;
			$('input[name="sales"]').val(ui.item.label);
			$('input[name="id_sales"]').val(idSales);
			const nomorBy = $('input[name="nomorBiaya"]').val();
			const dataSales = {
				nomor_biaya: nomorBy,
				id_sales: idSales,
			};
			updateBiaya5(dataSales);
		},
	});
});

const tampilInformasiBiaya = () => {
	let nomorBiaya = $('input[name="nomorBiaya"]').val();
	$.ajax({
		type: "get",
		url: base_url + "biaya/get",
		data: {
			nomorBiaya: nomorBiaya,
		},
		dataType: "json",
		success: function (data) {
			console.log(data);
			$('input[name="nomorStok"').val(data.nomor_stok);
			$('input[name="plat"').val(data.no_polisi);
			$('input[name="id_kendaraan"').val(data.id_kendaraan);
			$('input[name="id_area"').val(data.id_area);
			$('input[name="area"').val(data.nama_area);
			$('input[name="driver"').val(data.nama_driver);
			$('input[name="id_driver"').val(data.id_driver);
			$('input[name="id_sales"').val(data.id_sales);
			$('input[name="sales"').val(data.nama_sales);
			$('input[name="kmAwal"').val(data.km_awal);
			$('input[name="kmAkhir"').val(data.km_akhir);
		},
	});
};

const updateBiaya2 = (data) => {
	$.ajax({
		type: "post",
		url: base_url + "biaya/updatebiaya2",
		data: data,
	});
};

const updateBiaya3 = (data) => {
	$.ajax({
		type: "post",
		url: base_url + "biaya/updatebiaya3",
		data: data,
	});
};

const updateBiaya4 = (data) => {
	$.ajax({
		type: "post",
		url: base_url + "biaya/updatebiaya4",
		data: data,
	});
};
const updateBiaya5 = (data) => {
	$.ajax({
		type: "post",
		url: base_url + "biaya/updatebiaya5",
		data: data,
	});
};

const tampilNomorBiaya = () => {
	$.ajax({
		url: base_url + "biaya/nomor",
		dataType: "json",
		success: function (data) {
			console.log(`nomorBiaya : ${data}`);
		},
	});
};
