<?php
session_start();
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table		="simpanan";
$tgl		=jin_date_sql($_POST[tgl]);
$no			=$_POST[no];
$jenis		=$_POST[jenis];
$jml		=$_POST[jml];
$userid		= $_SESSION[namauser];
$input = "INSERT INTO $table (tgl,noanggota,id_jenis,jumlah,user_id)
			VALUES('$tgl','$no','$jenis','$jml','$userid')";
mysql_query($input);
echo "<b>Data sukses disimpan</b>";
?>