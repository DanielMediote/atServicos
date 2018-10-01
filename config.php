<?php
define(HOST, 'http://'.$_SERVER['HTTP_HOST']);
define(ROOT, __DIR__);
define(REQ_URL, $_SERVER['REQUEST_URI']);
require_once 'controller/autoload.php';
$sessao = new Sessao();
?>
