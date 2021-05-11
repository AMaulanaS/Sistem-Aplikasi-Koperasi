<?php
// www.contoh-ta.com
//author : asep setiawan & Team
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table	= 'anggota';
$id		= $_POST['id'];
$text	= "SELECT * FROM $table WHERE noanggota= '$id'";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	$data['id']		= $r[noidentitas];
	$data['nama']	= $r[namaanggota];
	$data['jk']		= $r[jk];
	$data['tempat']	= $r[tempat_lahir];
	$data['tgl']	= jin_date_str($r[tgl_lahir]);
	$data['alamat']	= $r[alamat];
	$data['hp']		= $r[hp];
	echo json_encode($data);
}
}else{
	$data['id']		= '';
	$data['nama']	= '';
	$data['jk']		= '';
	$data['tempat']	= '';
	$data['tgl']	= '';
	$data['alamat']	= '';
	$data['hp']		= '';
	echo json_encode($data);
}
?>