<?php 
	function minhasClasses($className) {
      require(__DIR__ . "/../../modal/classes/" . $className . ".class.php");
    }
    spl_autoload_register("minhasClasses");
?>