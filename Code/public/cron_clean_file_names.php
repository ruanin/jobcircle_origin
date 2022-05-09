<?php
require_once '../app/init.php';
require_once '../app/core/Controller.php';

$dir = APPLICATION .'/database/FileDatabase/';
$controller = new Controller();
$candProfileObj = $controller->model('cand_profile');
if(is_dir($dir)){ 
    if($dirHandle = opendir($dir)){
        $candFolders = array_diff(scandir($dir), array('.', '..', '_gsdata_', '.htaccess'));
        foreach($candFolders as $candFolder){
            $candSubFolders = array_diff(scandir($dir.$candFolder), array('.', '..', '_gsdata_', '.htaccess'));
            foreach($candSubFolders as $candSubfolder){
                if($candSubfolder == 'Payroll'){ continue; }
                $candFiles = array_diff(scandir($dir.$candFolder.'/'.$candSubfolder), array('.', '..', '_gsdata_', '.htaccess'));
                foreach($candFiles as $candFile){
                    $pathInfo = pathinfo( $dir.$candFolder.'/'.$candSubfolder.'/'.$candFile);
                    $candFileName = $candProfileObj->cleanFileName($pathInfo['filename']).'.'.$pathInfo['extension'];
                    if($candFileName != $candFile){
                        rename($dir.$candFolder.'/'.$candSubfolder.'/'.$candFile,$dir.$candFolder.'/'.$candSubfolder.'/'.$candFileName);
                        echo $dir.$candFolder.'/'.$candSubfolder.'/'.$candFile.' => '.$candFileName.'<br/>';
                    }
                }
            }
        }
        closedir($dirHandle);
    }
}