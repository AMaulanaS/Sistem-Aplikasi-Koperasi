// JavaScript Document
$(document).ready(function(){
	$(function(){
		$('button').hover(
			function() { $(this).addClass('ui-state-hover'); }, 
			function() { $(this).removeClass('ui-state-hover'); }
		);
	});
	$("#nomor").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$('#tabs').tabs();
	$("#tgl").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#tgl1").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#tgl2").datepicker({
			dateFormat:"dd-mm-yy"        
    });
	$("#jml").keypress(function (data)  { 
		if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
	          return false;
		}	
	});
	$("#bunga").keypress(function (data)  { 
		if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
	          return false;
		}	
	});
	$("#form_isian").hide();
	$("#tampil_data1").load('modul/pinjaman/tampil_data1.php');
	function buatNomor(){
		var no		= '0001';
		$.ajax({
			type	: "POST",
			url		: "modul/pinjaman/cari_nomor.php",
			data	: "no="+no,
			dataType : "json",
			success	: function(data){
				$("#no").val(data.no);
			}
		});
	}
	$("#tambah").click(function(){
		$("#form_isian").show();
		$("#menu-tombol1").hide();
		$("#nomor").focus();
		buatNomor();
		var no = $("#no").val();
		$("#tampil_data1").load('modul/pinjaman/tampil_data_cicilan.php?cari='+no);
	})
	$("#simpan").click(function(){
		simpanHeader();
	})
	function simpanHeader(){
		var no		= $("#no").val();
		var nomor	= $("#nomor").val();
		var tgl		= $("#tgl").val();
		var lama	= $("#lama").val();
		var jml		= $("#jml").val();
		var bunga	= $("#bunga").val();
		if(no.length==0){
			alert('Maaf, Nomor Anggota tidak boleh kosong');
			$("#no").focus();
			return false();
		}
		if(nomor.length==0){
			alert('Maaf, Nomor Anggota tidak boleh kosong');
			$("#nomor").focus();
			return false();
		}
		if(tgl.length==0){
			alert('Maaf, Tanggal tidak boleh kosong');
			$("#tgl").focus();
			return false();
		}
		if(lama.length==0){
			alert('Maaf, Lama Pinjaman tidak boleh kosong');
			$("#lama").focus();
			return false();
		}
		if(jml.length==0){
			alert('Maaf, Jumlah tidak boleh kosong');
			$("#jml").focus();
			return false();
		}
		if(bunga.length==0){
			alert('Maaf, Bunga tidak boleh kosong');
			$("#bunga").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/pinjaman/simpan_header.php",
			data	: "no="+no+
					"&nomor="+nomor+
					"&tgl="+tgl+
					"&lama="+lama+
					"&bunga="+bunga+
					"&jml="+jml,
			success	: function(data){
				simpanDetail();
				$("#tampil_data1").load('modul/pinjaman/tampil_data_cicilan.php?cari='+no);
			}
		});
	}
	function simpanDetail(){
		var no		= $("#no").val();
		var lama	= $("#lama").val();
		var jml		= $("#jml").val();
		var bunga	= $("#bunga").val();
		var angsuran = parseInt(jml)/parseInt(lama);
		var t_bunga = (parseInt(angsuran)*parseInt(bunga))/100;
		for (var i = 1; i <= lama ; ++i) {
		$.ajax({
			type	: "POST",
			url		: "modul/pinjaman/simpan_detail.php",
			data	: "no="+no+
					"&i="+i+
					"&angsuran="+angsuran+
					"&t_bunga="+t_bunga,
			success	: function(data){
			}
		});
		}
	}
	$("#tutup").click(function(){
		$(".input").val('');
		$("#form_isian").hide();
		$("#menu-tombol1").show();
		$("#tampil_data1").load('modul/pinjaman/tampil_data1.php');
	})
	$("#nomor").keyup(function(){
		var cari = $("#nomor").val();
		cariAnggota(cari);
	})
	function cariAnggota(e){
		var cari = e;
		$.ajax({
			type	: "POST",
			url		: "modul/pinjaman/cari_anggota.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#info_anggota").html(data);
			}
		});
	}
	function cariSimpananAnggota(e){
		var cari = e;
		$.ajax({
			type	: "GET",
			url		: "modul/pinjaman/tampil_data1.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#tampil_data1").html(data);
			}
		});
	}
	$("#jenis").change(function(){
		var cari = $("#jenis").val();
		cariJenis(cari);
	})	
	function cariJenis(e){
		var cari = e;
		$.ajax({
			type	: "POST",
			url		: "modul/pinjaman/cari_jenis.php",
			data	: "cari="+cari,
			dataType: "json",
			success	: function(data){
				$("#jml").val(data.jml);
			}
		});
	}
	$("#cari2").click(function(){
		var tgl1 = $("#tgl1").val();
		var tgl2 = $("#tgl2").val();	
		if(tgl1.length==0){
			alert('Maaf, Tanggal tidak boleh kosong');
			$("#tgl1").focus();
			return false();
		}
		if(tgl2.length==0){
			alert('Maaf, Tanggal tidak boleh kosong');
			$("#tgl2").focus();
			return false();
		}
		cariData2(tgl1,tgl2);
	});
	function cariData2(e1,e2){
		var tgl1 = e1;
		var tgl2 = e2;
		
		$.ajax({
			type	: "POST",
			url		: "modul/pinjaman/tampil_data2.php",
			data	: "tgl1="+tgl1+"&tgl2="+tgl2,
			success	: function(data){
				$("#tampil_data2").html(data);
			}
		});
	}
});