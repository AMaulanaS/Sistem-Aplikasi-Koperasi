<script type="text/javascript">
$(function() {
	$("#theTable.dua tr:even").addClass("stripe1");
	$("#theTable.dua tr:odd").addClass("stripe2");

	$("#theTable.dua tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>
<?php
// www.contoh-ta.com
//author : asep setiawan & Team
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';
$tgl1	= jin_date_sql($_POST['tgl1']);
$tgl2	= jin_date_sql($_POST['tgl2']);
$where	= " WHERE tgl BETWEEN '$tgl1' AND '$tgl2'";
echo "<table id='theTable' class='dua' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Tanggal</th>
			<th>No Anggota</th>
			<th>Anggota</th>
			<th>L/P</th>
			<th>Simpanan</th>
			<th>Jumlah</th>
		</tr>";
	$sql	= "SELECT a.*,b.jenis_simpanan,c.namaanggota,c.jk
				FROM simpanan as a
				JOIN jenis_simpan as b
				JOIN anggota as c
				ON a.id_jenis=b.id_jenis AND a.noanggota=c.noanggota
				$where
				ORDER BY a.id_simpanan DESC";
	$query	= mysql_query($sql);
	$no=1;
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>".jin_date_str($rows[tgl])."</td>
				<td align='center'>$rows[noanggota]</td>
				<td>$rows[namaanggota]</td>
				<td align='center'>$rows[jk]</td>
				<td>$rows[jenis_simpanan]</td>
				<td align='right'>".number_format($rows[jumlah])."</td>
			</tr>";
	$no++;
	}
echo "</table>";
?>