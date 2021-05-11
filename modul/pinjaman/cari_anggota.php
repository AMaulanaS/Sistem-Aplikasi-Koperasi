<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table	= 'anggota';
$id		= $_POST['cari'];
$text	= "SELECT *
			FROM $table WHERE noanggota= '$id'";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
	$r=mysql_fetch_array($sql);
	if ($r[jk]=='L'){
		$sex = 'Laki-laki';
	}else{
		$sex = 'Perempuan';
	}
	echo "<table>
		<tr>
			<td>No Identitas</td>
			<td>: $r[noidentitas]</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>: $r[namaanggota]</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>: $sex</td>
		</tr>
		<tr>
			<td>Tempat, Tgl Lahir</td>
			<td>: $r[tempat_lahir], ".jin_date_str($r[tgl_lahir])."</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: $r[alamat]</td>
		</tr>
	</table>";
}
?>