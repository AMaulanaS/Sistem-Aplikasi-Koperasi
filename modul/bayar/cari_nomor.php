<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$table	= 'pinjaman_header';
$text	= "SELECT max(id_pinjam) as noakhir
			FROM $table";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
	$r=mysql_fetch_array($sql);
	$noakhir	= (int) substr($r[noakhir], 2, 4);
	$noakhir++;
	$no = 'P'. sprintf("%04s",$noakhir);
	
	$data['no']		= $no;
	echo json_encode($data);
}else{
	$data['no']		= 'P0001';
	echo json_encode($data);
	
}

?>