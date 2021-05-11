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
function deleteRow(ID) {
	var id	= ID;
	var cari = $("#nomor").val();
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "modul/simpanan/hapus.php",
			data	: "id="+id,
			success	: function(data){
				$("#tampil_data1").load("modul/simpanan/tampil_data1.php?cari="+cari);
			}
		});
	}
}
</script>
<?php
// www.contoh-ta.com
//author : asep setiawan & Team
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';
$cari	= $_GET['cari'];
$where	= " WHERE noanggota='$cari'";
echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Tanggal</th>
			<th>Simpanan</th>
			<th>Jumlah</th>
			<th>Hapus</th>
		</tr>";
	$sql	= "SELECT a.*,b.jenis_simpanan
				FROM simpanan as a
				JOIN jenis_simpan as b
				ON a.id_jenis=b.id_jenis
				$where
				ORDER BY a.id_simpanan DESC";
	$query	= mysql_query($sql);
	$no=1;
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>".jin_date_str($rows[tgl])."</td>
				<td>$rows[jenis_simpanan]</td>
				<td align='right'>".number_format($rows[jumlah])."</td>
				<td align='center'>
				<a href='javascript:deleteRow(\"{$rows[id_simpanan]}\")'>Hapus</a>			
				</td>
			</tr>";
	$no++;
	$gtotal = $gtotal+$rows[jumlah];
	}
echo "
	<tr>
		<td colspan='3' align='center'>Total</td>
		<td align='right'><b>".number_format($gtotal)."</b></td>
	</table>";
?>