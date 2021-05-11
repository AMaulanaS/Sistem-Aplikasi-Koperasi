

<script type="text/javascript">
    $(function() {
        $("#theTable tr:even").addClass("stripe1");
        $("#theTable tr:odd").addClass("stripe2");

        $("#theTable tr").hover(
            function() {
                $(this).toggleClass("highlight");
            },
            function() {
                $(this).toggleClass("highlight");
            }
        );
    });
	$(".jml").keypress(function (data)  { 
		if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
	          return false;
		}	
	});
	$(".tgl").mask('99-99-9999');
	
	$("#simpan").click(function(){
		simpanDetail();
	})
	
	function simpanDetail(){
		var no		= $("#no").val();
		var nomor	= $("#nomor").val();
		var lama	= $("#lama").val();
		
		if(no.length==0){
			alert('Maaf, Nomor Anggota tidak boleh kosong');
			$("#no").focus();
			return false();
		}
		if(nomor.length==0){
			alert('Maaf, Nomor Anggota tidak boleh kosong');
			$("#nomor").focus();
			return false();
		}
		
		for (var i = 1; i <= lama ; ++i) {
		var tgl	= $("#tanggal"+i).val();
		var jml	= $("#jml"+i).val();
		$.ajax({
			type	: "POST",
			url		: "modul/bayar/simpan_detail.php",
			data	: "no="+no+
					"&i="+i+
					"&tgl="+tgl+
					"&jml="+jml,
			success	: function(data){
				$("#info").html(data);
			}
		});
		}
	}
</script>
<?php
// www.contoh-ta.com
//author : asep setiawan & Team
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
$cari	= $_GET['cari'];


$where	= " WHERE id_pinjam='$cari'";

echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Cicilan Ke</th>
			<th>Angsuran</th>
			<th>Bunga</th>			
			<th>Total</th>
			<th>Tangal Bayar</th>
			<th>Jumlah Bayar</th>
		</tr>";
	$sql	= "SELECT *
				FROM pinjaman_detail 
				$where
				ORDER BY id_pinjam,cicilan";
	$query	= mysql_query($sql);
	
	//echo $sql;
	$no=1;
	while($rows=mysql_fetch_array($query)){
		$tanggal = jin_date_str($rows[tgl_bayar]);
		$jml = $rows[jumlah_bayar];
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[cicilan]</td>
				<td align='right'>".number_format($rows[angsuran])."</td>
				<td align='right'>".number_format($rows[bunga])."</td>
				<td align='right'>".number_format($jumlah)."</td>
				<td align='center'><input type='text' id='tanggal$no' value='$tanggal' class='tgl' size='10'></td>
				<td align='center'><input type='text' id='jml$no' value='$jml' class='jml' size='11'></td>
			</tr>";
	$no++;
	$gtotal = $gtotal+$jumlah;
	}
echo "
	<tr>
		<td colspan='4' align='center'>Total</td>
		<td align='right'><b>".number_format($gtotal)."</b></td>
	</table>";
?>