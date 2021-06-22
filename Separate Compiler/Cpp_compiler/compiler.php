<?php

	$language=$_POST["language"];
	
	switch($language){
		case "cpp":
			include("Compile/cpp.php");
			break;		
	}
	
?>

