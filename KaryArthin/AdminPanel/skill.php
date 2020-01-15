<?php
	if(isset($_POST['submit']))
	{       
		$checkbox1 = $_POST['skill'];
		$chk="";  
		foreach($checkbox1 as $chk1)  
		{  
			$chk.= $chk1.",";  
		}  
        $myfile = fopen("Selected.txt", "w") or die("Unable to open file!");
		$txt = $chk;
		fwrite($myfile, $txt);
		fclose($myfile);
		header("location:Karya_Arthin_Requirement.php");
	}
								
								
?>							
