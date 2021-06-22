<?php

	$language=$_POST["language"];
	
	switch($language){
		case "c":
			include("Compile/c.php");
			break;
	}
	
?>

