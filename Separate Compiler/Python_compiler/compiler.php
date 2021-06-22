<?php

	$language=$_POST["language"];
	
	switch($language){
		case "python3":
			include("Compile/python.php");
			break;
	}
	
?>

