<script language="javascript" src="modul/jenis/ajax.js"></script>
<style type="text/css">
button {
	margin: 2px; 
	position: relative; 
	padding: 4px 8px 4px 4px; 
	cursor: pointer;   
	list-style: none;
}
button span.ui-icon {
	float: left; 
	margin: 0 4px;
}
</style>
<?php
echo "<div id='dalam_content'>
<h2>DAFTAR JENIS SIMPANAN</h2>
<div id='menu-tombol'>
<button class='ui-state-default ui-corner-all' id='tambah'>
<span class='ui-icon ui-icon-circle-plus'></span>Tambah
</button>
</div>
<div id='tampil_data'></div>
</div>";
echo "<div id='form_input' title='Tambah/Edit Data'>
<table width='100%'>
<tr>
<td>ID</td>
<td width='2%'>:</td>
<td><input type='text' name='id' id='id' size='5' maxlength='5' class='input'></td>
</tr>
<tr>
<td>Jenis</td>
<td width='2%'>:</td>
<td><input type='text' name='jenis' id='jenis' size='35' maxlength='35' class='input'></td>
</tr>
<tr>
<td>Jumlah</td>
<td width='2%'>:</td>
<td><input type='text' name='jml' id='jml' size='15' maxlength='15' class='input'></td>
</tr>
</table>
</div>";
?>