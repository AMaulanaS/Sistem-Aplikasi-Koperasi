<?php
session_start();
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table	="pinjaman_header";
$tgl	=jin_date_sql($_POST[tgl]);
$no		=$_POST[no];
$nomor	=$_POST[nomor];
$lama	=$_POST[lama];
$jml	=$_POST[jml];
$bunga	=$_POST[bunga];
$userid	= $_SESSION[namauser];
$input = "INSERT INTO $table (id_pinjam,tgl,noanggota,jumlah,lama,bunga,user_id)
			VALUES('$no','$tgl','$nomor','$jml','$lama','$bunga','$userid')";
mysql_query($input);
echo "<b>Data sukses disimpan</b>";
?>