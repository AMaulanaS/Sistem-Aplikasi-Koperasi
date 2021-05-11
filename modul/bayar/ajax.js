// JavaScript Document
$(document).ready(function(){
	$(function(){
		$('button').hover(
			function() { $(this).addClass('ui-state-hover'); }, 
			function() { $(this).removeClass('ui-state-hover'); }
		);
	});
	$("#no").keyup(function(e){
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
	
	$("#tampil_data1").load('modul/bayar/tampil_data1.php');
	
	
	$("#tambah").click(function(){
		$("#form_isian").show();
		$("#menu-tombol1").hide();
		$("#no").focus();
		var no = $("#no").val();
		$("#tampil_data1").load('modul/bayar/tampil_data_cicilan.php?cari='+no);
		$("#info").val('');
	})
	
	
	$("#tutup").click(function(){
		$(".input").val('');
		$("#form_isian").hide();
		$("#menu-tombol1").show();
		$("#tampil_data1").load('modul/bayar/tampil_data1.php');
	})
	
	function cariAnggota(e){
		var cari = e;
		$.ajax({
			type	: "POST",
			url		: "modul/bayar/cari_anggota.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#info_anggota").html(data);
			}
		});
	}
	
	
	$("#cari_no").click(function(){
		var cari = $("#no").val();
		cariPinjaman(cari);
	})
	
	function cariPinjaman(e){
		var cari = e;
		$.ajax({
			type	: "POST",
			url		: "modul/bayar/cari.php",
			data	: "cari="+cari,
			dataType: "json",
			success	: function(data){
				$("#nomor").val(data.nomor);
				$("#tgl").val(data.tgl);
				$("#lama").val(data.lama);
				$("#jml").val(data.jml);
				$("#bunga").val(data.bunga);
				var nomor = data.nomor;
				cariAnggota(nomor);
				$("#tampil_data1").load('modul/bayar/tampil_data_cicilan.php?cari='+cari);
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
			url		: "modul/bayar/tampil_data2.php",
			data	: "tgl1="+tgl1+"&tgl2="+tgl2,
			success	: function(data){
				$("#tampil_data2").html(data);
			}
		});
	}
	$("#cari3").click(function(){
		var cari = $("#txt_cari").val();
		cariData3(cari);
	});
	
	function cariData3(e){
		var cari = e;
		$.ajax({
			type	: "POST",
			url		: "modul/bayar/tampil_data3.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#tampil_data3").html(data);
			}
		});
	}
});