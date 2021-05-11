<?php
include "../../inc/inc.koneksi.php";
$table	= 'simpanan';
$id		= $_POST['id'];
$sql 	= mysql_query("SELECT * FROM $table WHERE id_simpanan= '$id'");
$row	= mysql_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table WHERE id_simpanan= '$id'";
	mysql_query($input);
}
?>