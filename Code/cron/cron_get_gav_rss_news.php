<?php

require_once '../app/init.php';
require_once '../app/core/Controller.php';

$controller = new Controller();
$gavRssNewsObj = $controller->model('gav_rss_news');
$gavRssNewsObj->getGavRssNewsFromTempService();
exit();