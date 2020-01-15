

<?php
	$to = "mishil.dobariya@gmail.com";
	$s = "Helllooo";
	$m = "hru";
	$h = "abc";
	
	$r = mail($to,$s,$m,$h);
	if($r == true){
		echo "successss";
	}
	else{
		echo "fail";
	}
?>