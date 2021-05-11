<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$table		="pinjaman_detail";

$no			=$_POST[no];
$cicilan	=$_POST[i];
$tgl		=jin_date_sql($_POST[tgl]);
$jml		=$_POST[jml];

$sql = mysql_query("SELECT *
				   FROM $table 
				   WHERE id_pinjam= '$no' AND cicilan='$cicilan'
				   ORDER BY id_pinjam,cicilan");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input	= "UPDATE $table SET tgl_bayar	='$tgl',
								jumlah_bayar='$jml'
					WHERE id_pinjam= '$no' AND cicilan='$cicilan'";
	mysql_query($input);								
	echo "<b>Data Sukses disimpan</b>";
}

//echo $input."<br/>";
?>