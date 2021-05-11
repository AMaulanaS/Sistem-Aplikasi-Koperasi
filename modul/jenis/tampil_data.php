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
	function editRow(ID){
		var id = ID;
		var pilih = confirm('Data yang akan mengubah  = '+id+ '?');
		if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "modul/jenis/cari.php",
			data	: "id="+id,
			dataType : "json",				  
			success	: function(data){
				$("#id").val(ID);
				$("#jenis").val(data.jenis);
				$("#jml").val(data.jml);
				$('#form_input').dialog('open');
				return false;
			}
		});
		}
	}
	function deleteRow(ID) {
		var id	= ID;
	   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
		if (pilih==true) {
			$.ajax({
				type	: "POST",
				url		: "modul/jenis/hapus.php",
				data	: "id="+id,
				success	: function(data){
					$("#tampil_data").load("modul/jenis/tampil_data.php");
				}
			});
		}
	}
</script>
<?php
// www.contoh-ta.com
//author : asep setiawan & Team
include '../../inc/inc.koneksi.php';
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>ID</th>
			<th>Jenis</th>
			<th>Jumlah</th>
			<th width='10%'>Aksi</th>
		</tr>";
	$sql	= "SELECT * FROM jenis_simpan ORDER By id_jenis";
	$query	= mysql_query($sql);
	
	$no=1;
	while($rows=mysql_fetch_array($query)){
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[id_jenis]</td>
				<td>$rows[jenis_simpanan]</td>
				<td align='right'>".number_format($rows[jumlah])."</td>
				<td align='center'>
				<a href='javascript:editRow(\"{$rows[id_jenis]}\")'>Edit</a>
				<a href='javascript:deleteRow(\"{$rows[id_jenis]}\")'>Hapus</a>			
				</td>
			</tr>";
	$no++;
	}
echo "</table>";
?>