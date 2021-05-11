<?php
include "../../inc/inc.koneksi.php";
$table		="pinjaman_detail";
$no			=$_POST[no];
$cicilan	=$_POST[i];
$angsuran	=$_POST[angsuran];
$bunga		=$_POST[t_bunga];
$input = "INSERT INTO $table (id_pinjam,cicilan,angsuran,bunga)
			VALUES('$no','$cicilan','$angsuran','$bunga')";
mysql_query($input);
echo "<b>Data sukses disimpan</b>";
?>