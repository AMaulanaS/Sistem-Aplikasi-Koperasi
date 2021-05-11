<?php
include "../../inc/inc.koneksi.php";
$table	= 'jenis_simpan';
$id		= $_POST['id'];
$sql 	= mysql_query("SELECT * FROM $table WHERE id_jenis= '$id'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table WHERE id_jenis= '$id'";
	mysql_query($input);
}
?>