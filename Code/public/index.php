<?php


$application_env =  getenv('APPLICATION_ENV');



if($application_env == 'dev'){
    error_reporting(0);
}else{
    error_reporting(0);
}

// Bitte Application Env festlegen...
if(empty($application_env)){
    echo "Unser System ist zur Zeit wegen Wartungsarbeiten nicht erreichbar. ";
    exit();
}

$http = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";;

$url = $http . $_SERVER['SERVER_NAME'];
define('WEB_URL', $url);

session_start();
if (!isset($_SESSION['org_referer'])) {
    if (isset($_SERVER["HTTP_REFERER"])) {
        $_SESSION['org_referer'] = $_SERVER["HTTP_REFERER"];
    } else {
        $_SESSION['org_referer'] = 'NoRef';
    }
}

if (isset($_GET['esrc']) && !empty($_GET)) {
    $_SESSION['esrc'] = $_GET['esrc'];

} else { 
    if(!empty($_SESSION['org_referer']) && empty($_SESSION['esrc'])){
        $re1 = '.*?';
        $re2 = '(google)';
        $facebook = '(facebook)';
        $instagram = '(instagram)';
        if ($c = preg_match_all("/" . $re1 . $re2 . "/is", $_SESSION['org_referer'], $matches)) {
            $_SESSION['esrc'] = $matches[1][0];
        }elseif($c = preg_match_all("/" . $re1 . $facebook . "/is", $_SESSION['org_referer'], $matches)) {
            $_SESSION['esrc'] = $matches[1][0];
        }elseif($c = preg_match_all("/" . $re1 . $instagram . "/is", $_SESSION['org_referer'], $matches)) {
            $_SESSION['esrc'] = $matches[1][0];
        }
    }
}

if (isset($_GET['track']) && !empty($_GET['track'])) {
    $_SESSION['esrc'] = $_GET['track'];
}


require_once '../app/init.php';

$app = new App();


