<?php
define(HOST, 'http://'.$_SERVER['HTTP_HOST']); /*http://localhost:8080 on Container*/
define(ROOT, __DIR__); /* /var/www/html on Container*/
define(REQ_URL, $_SERVER['REQUEST_URI']);
require_once ROOT.'/controller/autoload.php';
?>
