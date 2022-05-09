<?php

require_once '../app/init.php';
require_once '../app/core/Controller.php';

$controller = new Controller();
$candObj = $controller->model('candpool_candidate');
$candSkillsObj = $controller->model('candpool_candidate_shortprofile_skills');
$importFolder = APPLICATION . '/database/import';
$importedFolder = APPLICATION . '/database/import/imported';
$candObj::truncate();
$candSkillsObj::truncate();
$dateien = scandir($importFolder, "0");
if(!empty($dateien)){
    foreach ($dateien as $datei) {
        $fileinfos = pathinfo($importFolder . "/" . $datei);
        if ($datei != "." && $datei != ".." && $datei != "imported" && $fileinfos['basename']) {
            $fileContent = file_get_contents($importFolder . "/" . $datei);
            $arrCandidates = json_decode($fileContent, true);
            if (!empty($arrCandidates)) {
                foreach ($arrCandidates as $key => $candData) {
                    $objCandPool = $controller->model('candpool_candidate');
                    $objCandPool->hrc_cand_id = $candData['cand_id'];
                    $objCandPool->cand_salutation = $candData['cand_salutation'];
                    $objCandPool->cand_firstname = $candData['cand_lastname'];
                    $objCandPool->cand_lastname = $candData['cand_firstname'];
                    $objCandPool->cand_birthday_date = $candData['cand_birthday_date'];
                    $objCandPool->cand_city = $candData['cand_city'];
                    $objCandPool->cand_profession = $candData['cand_profession'];
                    $objCandPool->cand_nationality = $candData['cand_nationality'];
                    $objCandPool->cand_driver_license = $candData['cand_driver_license'];
                    $objCandPool->cand_has_car = $candData['cand_has_car'];
                    $objCandPool->cand_shortprofile_tarif = $candData['cand_shortprofile_tarif'];
                    $objCandPool->cand_shortprofile_tarif_per = $candData['cand_shortprofile_tarif_per'];
                    $objCandPool->cand_shortprofile_tarif_currency = $candData['cand_shortprofile_tarif_currency'];
                    $objCandPool->cand_shortprofile_softskills = $candData['cand_shortprofile_softskills'];
                    $objCandPool->cand_req_available_from_date = $candData['cand_req_available_from_date'];
                    $objCandPool->cand_req_employment_id = $candData['cand_req_employment_id'];
                    $objCandPool->cand_assign_user_id = $candData['cand_assign_user_id'];
                    $objCandPool->cand_work_regions = $candData['cand_work_regions'];
                    $status = $objCandPool->save();

                    if ($status === true && !empty($candData['skills'])) {
                        foreach ($candData['skills'] as $key => $skillData) {
                            $objCandSkills = $controller->model('candpool_candidate_shortprofile_skills');
                            $objCandSkills->id = $skillData['sp_id'];
                            $objCandSkills->hrc_cand_id = $skillData['sp_cand_id'];
                            $objCandSkills->profession = $skillData['sp_profession'];
                            $objCandSkills->skills = $skillData['sp_skills'];
                            $objCandSkills->years = $skillData['sp_years'];
                            $objCandSkills->months = $skillData['sp_months'];
                            $objCandSkills->save();
                        }
                    }
                }
                //Check if the directory already exists.
                if (!is_dir($importedFolder)) {
                    //Directory does not exist, so lets create it.
                    mkdir($importedFolder, 0755, true);
                }
                rename($importFolder . "/" . $datei, $importedFolder . "/" . $datei);
            }
        }
    }
}

$importierteDateien = scandir($importedFolder, "0");
if(!empty($importierteDateien)){
    foreach ($importierteDateien as $importierteDatei) {
        //check for files only.
        if ($importierteDatei != "." && $importierteDatei != ".." ) {
            //unlink file 
            if (time() - filemtime($importedFolder . "/" . $importierteDatei) >= 60 * 60 * 24 * 14) { // 14 days
                unlink($importedFolder . "/" . $importierteDatei);
            }
        }
    }
}