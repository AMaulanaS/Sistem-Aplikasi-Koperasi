<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Informasi Koperasi Simpan Pinjam</title>
<link rel="stylesheet" href="css/style_content.css" type="text/css"/>
<link rel="stylesheet" href="css/style_table.css" type="text/css"/>
<link type="text/css" href="css/excite-bike/jquery-ui-1.8.21.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
<!-- untuk menu superfish -->
<link rel="stylesheet" href="css/superfish.css" type="text/css" />
<script type="text/javascript" src="js/superfish.js"></script>
<!-- untuk mask -->
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	   $('ul.sf-menu').superfish();
  });
</script>
</head>
<body>
<div class="box">
<div class="border">
<div class="style">
	<div class="header">
    	<span class="title">
        	<div align="center">
        		<img src="images/header.jpg" width="840" height="120" />
            </div>
        </span>
    </div>
	<div class="menu">
   	 	<?php include 'menu.php'; ?>
    </div>
	<!--awal content -->
    <div class="content">
    	    <?php include 'content.php'; ?>
    </div>
    <!--akhir content -->
    <div class="footer" align="center">
    	<p>Copyright &copy; Contoh TA 2013 </p>
    </div>
</div>
</div>
</div>
</body>
</html>