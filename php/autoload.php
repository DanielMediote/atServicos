<?php 
function minhasClasses($className) {
		require(__DIR__."/../classes/" . $className . ".class.php");
	}
	spl_autoload_register("minhasClasses");
	?>