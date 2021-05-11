<?php
function jmlBayar($no) {
	$sql	= "SELECT sum(angsuran+bunga) as total 
				FROM pinjaman_detail
				WHERE id_pinjam='$no'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
function sisa($no) {
	$sql	= "SELECT sum(jumlah_bayar) as total 
				FROM pinjaman_detail
				WHERE id_pinjam='$no'";
	$data	= mysql_fetch_array(mysql_query($sql));
	$row		= mysql_num_rows(mysql_query($sql));
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
?>