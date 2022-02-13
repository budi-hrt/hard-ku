$(document).ready(function () {
	tampilDetilBbm();
});

// tampil
const tampilDetilBbm = () => {
	const nomorBiaya = $('input[name="nomorBiaya"]').val();
	$.ajax({
		type: "get",
		url: base_url + "biaya/tampildetilbbm",
		data: {
			nomorBiaya: nomorBiaya,
		},
		success: function (html) {
			$("#detil").html(html);
		},
	});
};

const showHidebtnSimpanBbm = () => {
	let totalHargaBbm = $('input[name="totalHargaBbm"]');
	if (totalHargaBbm.val() === "") {
		$(".btnBbm").hide();
	} else {
		$(".btnBbm").show();
	}
};

$("#tambahBbm").on("click", function () {
	$("#form-bbm ")[0].reset();
	$("#form-bbm").attr("action", base_url + "biaya/simpanBbm");
	$("#myModal").modal("show");
	showHidebtnSimpanBbm();
});

$("#nama_bbm").on("change", function () {
	let idBbm = this.value;
	getBbm(idBbm);
});

const getBbm = (idBbm) => {
	$.ajax({
		type: "get",
		url: base_url + "master/bbm/get",
		data: {
			idBbm: idBbm,
		},
		dataType: "json",
		success: function (data) {
			$('input[name="id_bbm"]').val(data.id);
			$('input[name="harga_bbm"]').val(data.harga_bbm);
			totalHargaBBM();
			$('input[name="liter"]').focus();
			showHidebtnSimpanBbm();
		},
	});
};

$("#liter").keyup(function () {
	totalHargaBBM();
});
$("#harga_bbm").keyup(function () {
	totalHargaBBM();
});

const totalHargaBBM = () => {
	let ltr = $("#liter").val();
	let liter = parseInt(ltr);
	let hr = $("#harga_bbm").val().replace(".", "");
	let hrg = parseInt(hr);
	let Stotal = Math.round((ltr * hrg) / 1000) * 1000;
	let t = Stotal.toFixed(0);
	let St = t.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
	$("#totalHargaBbm").val(St);
};

// Simpan BBM
$("#btnsimpanBbm").on("click", function () {
	let nomorBiaya = $('input[name="nomorBiaya"]').val();
	let idDetilBbm = $('input[name="idDetilBbm"]').val();
	let tglIsi = $('input[name="tgl_isi"]').val();
	let idBbm = $("#nama_bbm option:selected").attr("value");
	let liter = $('input[name="liter"]').val();
	let hargaBbm = $('input[name="harga_bbm"]').val();
	let ttlHrgBbm = $('input[name="totalHargaBbm"]').val();
	let url = $("#form-bbm").attr("action");
	$.ajax({
		type: "post",
		url: url,
		data: {
			nomorBiaya: nomorBiaya,
			idDetilBbm: idDetilBbm,
			tglIsi: tglIsi,
			idBbm: idBbm,
			liter: liter,
			hargaBbm: hargaBbm,
			ttlHrgBbm: ttlHrgBbm,
			id_user: id_user,
		},
		success: function () {
			$("#modal-konfirmasi").modal("show");
			$("#batal-konfirmasi").addClass("batal-bbm");
			$("#ya-konfirmasi").addClass("ya-bbm");
		},
	});
});

$("#modal-konfirmasi").on("click", ".batal-bbm", function () {
	$("#modal-konfirmasi").modal("hide");
	$("#myModal").modal("hide");
	$("#form-bbm")[0].reset();
	tampilDetilBbm();
	console.log("batal");
});
$("#modal-konfirmasi").on("click", ".ya-bbm", function () {
	$("#modal-konfirmasi").modal("hide");
	$("#liter").val("");
	$("#liter").focus();
	totalHargaBBM();
	tampilDetilBbm();
	console.log("ya");
});

// edit
$("#table-bbm").on("click", ".item-edit", function () {
	let id = $(this).attr("data-id");
	getDataBbm(id);
});

const getDataBbm = (id) => {
	$.ajax({
		type: "get",
		url: base_url + "biaya/getdetilbbm",
		data: {
			id: id
		},
		dataType: "json",
		success: function (data) {
			console.log(data);
			$("#form-bbm ")[0].reset();
			$('input[name="idDetilBbm"]').val(data.id);
			$('input[name="tgl_isi"]').val(data.tanggal_isi);
			$('select[name="nama_bbm"]').val(data.id_bbm);
			$('input[name="liter"]').val(data.jumlah_liter);
			$('input[name="harga_bbm"]').val(data.harga_bbm);
			let t = data.total_hargabbm;
			let St = t.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
			$('input[name="totalHargaBbm"]').val(St);
			$("#form-bbm").attr("action", base_url + "biaya/ubahBbm");
			$("#myModal").modal("show");
			showHidebtnSimpanBbm();
		},
	});
};

// hapus
$("#table-bbm").on("click", ".item-hapus", function () {
	let id = $(this).attr("data-id");
	$("#modalHapusBiaya").modal("show");
	$("#btnhapusBiaya").addClass("hapus-bbm");
	$("#btnhapusBiaya")
		.unbind()
		.click(".hapus-bbm", function () {
			$.ajax({
				type: "get",
				url: base_url + "biaya/hapusdetilbbm",
				data: {
					id: id
				},
				success: function () {
					$("#modalHapusBiaya").modal("hide");
					tampilDetilBbm();
				},
			});
		});
});
