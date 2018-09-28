<?php
function minhasClasses($className) {
	require_once(__DIR__."/../classes/" . $className . ".class.php");
}
spl_autoload_register("minhasClasses");
?>
