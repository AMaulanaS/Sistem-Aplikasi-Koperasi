<?php
include "../../inc/inc.koneksi.php";
$table	= 'jenis_simpan';
$id	= $_POST['id'];
$text	= "SELECT *
			FROM $table WHERE id_jenis= '$id'";
$sql 	= mysql_query($text);
$row	= mysql_num_rows($sql);
if ($row>0){
while ($r=mysql_fetch_array($sql)){	
	
	$data['jenis']		= $r[jenis_simpanan];
	$data['jml']		= $r[jumlah];
	
	echo json_encode($data);
}
}else{
	$data['jenis']		= $r[jenis_simpanan];
	$data['jml']		= $r[jumlah];

	echo json_encode($data);
	
}
?>