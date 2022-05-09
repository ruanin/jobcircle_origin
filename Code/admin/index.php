<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();
if (!isset($_SESSION['org_referer'])) {
    $_SESSION['org_referer'] = $_SERVER['HTTP_REFERER'];
}
require_once '../app/init.php';
$app = new App();
