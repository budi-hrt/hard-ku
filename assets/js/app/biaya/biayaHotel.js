$(document).ready(function () {
	tampilDetilHotel();

});

// tampil
const tampilDetilHotel = () => {
	const nomorBiaya = $('input[name="nomorBiaya"]').val();
	$.ajax({
		type: "get",
		url: base_url + "biaya/tampildetilhotel",
		data: {
			nomorBiaya: nomorBiaya,
		},
		success: function (html) {
			$("#detilHotel").html(html);
		},
	});
};


$("#tambahHotel").on("click", function () {
	$("#form-hotel ")[0].reset();
	$("#form-hotel").attr("action", base_url + "biaya/simpanHotel");
	$("#modalHotel").modal("show");
});


const totalHargaHotel = () => {
	let hari = $("#jumlah_hari").val();
	let jumlahHari = parseInt(hari);
	let hr = $("#hargaHotel").val().replace(".", "");
	let hrg = parseInt(hr);
	let Stotal = Math.round((jumlahHari * hrg));
	let t = Stotal.toFixed(0);
	let St = t.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
	$("#totalHargaHotel").val(St);
};

$("#jumlah_hari").keyup(function () {
	totalHargaHotel();
});
$("#hargaHotel").keyup(function () {
	totalHargaHotel();
});


$("#btnsimpanHotel").on("click", function () {
	let nomorBiaya = $('input[name="nomorBiaya"]').val();
	let idDetilHotel = $('input[name="idDetilHotel"]').val();
	let hari = $('input[name="jumlah_hari"]').val();
	let hargaHotel = $('input[name="hargaHotel"]').val();
	let ttlHrgHotel = $('input[name="totalHargaHotel"]').val();
	let url = $("#form-hotel").attr("action");
	$.ajax({
		type: "post",
		url: url,
		data: {
			nomorBiaya: nomorBiaya,
			idDetilHotel: idDetilHotel,
			hari: hari,
			hargaHotel: hargaHotel,
			ttlHrgHotel: ttlHrgHotel,
			id_user: id_user,
		},
		success: function () {
			$("#modal-konfirmasi").modal("show");
			$("#batal-konfirmasi").addClass("batal-hotel");
			$("#ya-konfirmasi").addClass("ya-hotel");
		},
	});
});


$("#modal-konfirmasi").on("click", ".batal-hotel", function () {
	$("#modal-konfirmasi").modal("hide");
	$("#modalHotel").modal("hide");
	$("#form-hotel")[0].reset();
	tampilDetilHotel();
});
$("#modal-konfirmasi").on("click", ".ya-hotel", function () {
	$("#modal-konfirmasi").modal("hide");
	$("#jumlah_hari").val("");
	$("#hargaHotel").val("");
	$("#jumlah_hari").focus();
	totalHargaHotel();
	tampilDetilHotel();
});


// edit
$("#table-hotel").on("click", ".item-edit", function () {
	let id = $(this).attr("data-id");
	getDataHotel(id);
});


const getDataHotel = (id) => {
	$.ajax({
		type: "get",
		url: base_url + "biaya/getdetilhotel",
		data: {
			id: id
		},
		dataType: "json",
		success: function (data) {
			$("#form-hotel")[0].reset();
			$('input[name="idDetilHotel"]').val(data.id);
			$('input[name="jumlah_hari"]').val(data.jumlah_hari);
			$('input[name="hargaHotel"]').val(data.harga_hotel);
			let t = data.total_biaya_hotel;
			let St = t.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
			$('input[name="totalHargaHotel"]').val(St);
			$("#form-hotel").attr("action", base_url + "biaya/ubahbiayahotel");
			$("#modalHotel").modal("show");
		},
	});
};


$("#table-hotel").on("click", ".item-hapus", function () {
	let id = $(this).attr("data-id");
	$("#modalHapusBiaya").modal("show");
	$("#btnhapusBiaya").addClass("hapus-hotel");
	$("#modalHapusBiaya").unbind().click(".hapus-hotel", function () {
		$.ajax({
			type: "get",
			url: base_url + "biaya/hapusdetilhotel",
			data: {
				id: id
			},
			success: function () {
				$("#modalHapusBiaya").modal("hide");
				tampilDetilHotel();
			},
		});
	});
});
