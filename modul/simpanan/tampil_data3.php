<script type="text/javascript">
$(function() {
  $("#theTable.tiga tr:even").addClass("stripe1");
  $("#theTable.tiga tr:odd").addClass("stripe2");

  $("#theTable.tiga tr").hover(
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
$cari	= $_POST['cari'];
$where	= " WHERE noanggota LIKE '%$cari%' OR namaanggota LIKE '%$cari%'";
echo "<table id='theTable' class='tiga' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Nomor</th>
			<th>Nama</th>
			<th>L/P</th>
			<th>Total</th>
		</tr>";
	$sql	= "SELECT a.noanggota,a.namaanggota,a.jk,
				(SELECT sum(jumlah) FROM simpanan WHERE noanggota=a.noanggota) as total
				FROM anggota as a
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
				<td align='right'>".number_format($rows[total])."</td>
			</tr>";
	$no++;
	}
echo "</table>";
?>