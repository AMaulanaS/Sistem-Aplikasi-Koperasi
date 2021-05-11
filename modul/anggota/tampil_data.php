<script type="text/javascript">
$(function() {
	$("#theTable tr:even").addClass("stripe1");
	$("#theTable tr:odd").addClass("stripe2");
	$("#theTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
function editRow(ID){
	var id = ID;
	var pilih = confirm('Data yang akan mengubah  = '+id+ '?');
	if (pilih==true) {
	$.ajax({
		type	: "POST",
		url		: "modul/anggota/cari.php",
		data	: "id="+id,
		dataType : "json",				  
		success	: function(data){
			$("#nomor").val(ID);
			$("#identitas").val(data.id);
			$("#anggota").val(data.nama);
			$("#jk").val(data.jk);
			$("#tempat").val(data.tempat);
			$("#tgl").val(data.tgl);
			$("#alamat").val(data.alamat);
			$("#hp").val(data.hp);
			
			$("#nomor").attr("disabled",true);
			$('#form_input').dialog('open');
			return false;
		}
	});
	}
}
function deleteRow(ID) {
	var id	= ID;
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "modul/anggota/hapus.php",
			data	: "id="+id,
			success	: function(data){
				$("#tampil_data").load("modul/anggota/tampil_data.php");
			}
		});
	}
}
</script>
<?php
// www.contoh-ta.com
//author : asep setiawan & Team
include '../../inc/inc.koneksi.php';
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
$cari	= $_GET['cari'];

$where	= " WHERE noanggota LIKE '%$cari%' OR namaanggota LIKE '%$cari%'";

echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Nomor</th>
			<th>Nama</th>
			<th>L/P</th>
			<th>HP</th>
			<th width='10%'>Aksi</th>
		</tr>";
	$sql	= "SELECT * 
				FROM anggota
				$where
				ORDER BY noanggota";
	$query	= mysql_query($sql);
	
	$no=1;
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[noanggota]</td>
				<td>$rows[namaanggota]</td>
				<td align='center'>$rows[jk]</td>
				<td >$rows[hp]</td>
				<td align='center'>
				<a href='javascript:editRow(\"{$rows[noanggota]}\")'>Edit</a>
				<a href='javascript:deleteRow(\"{$rows[noanggota]}\")'>Hapus</a>			
				</td>
			</tr>";
	$no++;
	}
echo "</table>";
?>