<?php
include "../../inc/inc.koneksi.php";
$table	= 'anggota';
$id		= $_POST['id'];
$sql 	= mysql_query("SELECT * FROM $table WHERE noanggota= '$id'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table WHERE noanggota= '$id'";
	mysql_query($input);
}
?>