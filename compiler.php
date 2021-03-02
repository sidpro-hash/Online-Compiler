<?php

	$language=$_POST["language"];
	
	switch($language){
		case "c":
			include("Compile/c.php");
			break;
		case "cpp":
			include("Compile/cpp.php");
			break;
		case "javascript":
			include("Compile/javascript.php");
			break;
		case "java":
			include("Compile/java.php");
			break;
		case "python3":
			include("Compile/python.php");
			break;
	}
	
?>

