<?php
define(HOST, 'http://'.$_SERVER['HTTP_HOST']);
define(ROOT, __DIR__);
define(LINKS, ROOT.'/_slicesHTML/links.php');
define(REQ_URL, $_SERVER['REQUEST_URI']);
require_once ROOT.'/controller/autoload.php';
Sessao::open();
?>
