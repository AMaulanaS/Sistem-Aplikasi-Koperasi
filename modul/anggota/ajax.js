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
	$("#hp").keypress(function (data)  { 
		if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
	          alert('harus angka');
			  return false;
		}
	});
	$('#form_input').dialog({
		  autoOpen: false,
		  show: "blind",
		  hide: "blind",
		  width: 550,
		  modal	: true,
		  resizable:false,
		  buttons: {
			  "Simpan": function() { 
				  //$(this).dialog("close"); 
				  simpan();
			  }, 
			  "Batal": function() { 
				  $(this).dialog("close"); 
			  } 
		  }
	});
	$("#tgl").datepicker({
			dateFormat:"dd-mm-yy",
			changeYear : true,
			changeMonth:true,
    });
	$("#tampil_data").load('modul/anggota/tampil_data.php');
	$('#tambah').click(function(){										
		$(".input").val('');		
		$("#nomor").attr("disabled",false);
		$("#nomor").focus();
		$('#form_input').dialog('open');
		return false;
	});
	
	function simpan(){
		var no		= $("#nomor").val();
		var id		= $("#identitas").val();
		var nama	= $("#anggota").val();
		var jk		= $("#jk").val();
		var tempat	= $("#tempat").val();
		var tgl		= $("#tgl").val();
		var alamat	= $("#alamat").val();
		var hp		= $("#hp").val();

		if(no.length==0){
			alert('Maaf, Nomor Anggota tidak boleh kosong');
			$("#nomor").focus();
			return false();
		}
		if(id.length==0){
			alert('Maaf, Nomor Identitas tidak boleh kosong');
			$("#identitas").focus();
			return false();
		}
		if(nama.length==0){
			alert('Maaf, Nama Anggota tidak boleh kosong');
			$("#anggota").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/anggota/simpan.php",
			data	: "no="+no+
					"&id="+id+
					"&nama="+nama+
					"&jk="+jk+
					"&tempat="+tempat+
					"&tgl="+tgl+
					"&alamat="+alamat+
					"&hp="+hp,
			success	: function(data){
				$("#tampil_data").load('modul/anggota/tampil_data.php');
				$("#form_input").dialog("close"); 
			}
		});
	}
	$("#cari").click(function(){
		var cari = $("#txt_cari").val();
		cariData(cari);
	});
	
	function cariData(e){
		var cari = e;
		$.ajax({
			type	: "GET",
			url		: "modul/anggota/tampil_data.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
});