<?php
// error_reporting(E_ALL); ini_set('display_errors', TRUE); restore_error_handler(); restore_exception_handler();
require_once '../app/init.php';
require_once '../app/core/Controller.php';

$days = 14; // all vacancies where older then today - $days
$tempTimestamp = strtotime('-'.$days.' day');
$tempDate = date('Y-m-d H:i:s', $tempTimestamp);

$controller = new Controller();
$vacInfoObj = $controller->model('vac_info');
$result = $vacInfoObj
        ->where('updated_at','<', $tempDate)
        ->where('status','=', '1')
        ->orWhereNull('show_id')
        ->take(200)
        ->get();

foreach ($result as $value){
    $randomNumber = mt_rand(111, 999);
    $uk = $value->vac_info_id.$randomNumber;
    $value->show_id = $uk;
    $value->save();
}
//$sql = 'UPDATE vac_info SET show_id = CONCAT(vac_info_id,FLOOR(111 + RAND() * 800)),updated_at = NOW()
//WHERE (updated_at < DATE_ADD(NOW(),INTERVAL -'.$days.' DAY) OR show_id IS NULL)
//AND `status` = 1 LIMIT 1';
exit();