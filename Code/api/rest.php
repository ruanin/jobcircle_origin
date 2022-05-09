<?php
//error_reporting(E_ALL); ini_set('display_errors', TRUE); restore_error_handler(); restore_exception_handler();
include '../app/config/config_nusoap.php';

require_once '../app/init.php';
require_once '../app/core/Controller.php';

if(isset($_POST['serialized']) && !empty($_POST['serialized'])){
    $tempPost = unserialize($_POST['serialized']);
    $_POST = $tempPost;
}   

$function = $_POST['f'];
$apiKey = $_POST['a'];

if((!empty($apiKey) && $apiKey == SECURE_AUTH_KEY) && !empty($function)){
    switch($function){
        case 'getAllNotSynchronizedCandidates':
            $result = [];
            $controller = new Controller();
            $candProfileObj = $controller->model('cand_profile');

            $result = $candProfileObj->select('cand_profile.cand_profile_id','cand_profile.f_name','cand_profile.l_name', 'cand_profile.birthday', 
                    'cand_profile.gender', 'cand_profile.ahv_number', 'cand_profile.phone', 'cand_profile.mobile', 'cand_profile.created_at',
                    'cand_profile.mail', 'cand_profile.hrc_cand_id','email.address as login_mail', 'phone_number.number as login_mobile','phone_number.country_id AS login_mobile_country_id')
                    ->join('cand_address', 'cand_profile.cand_profile_id', '=', 'cand_address.cand_profile_id')
                    ->join('cand_user', 'cand_user.cand_user_id', '=', 'cand_profile.cand_user_id')
                    ->leftJoin('email', 'email.mail_id', '=', 'cand_user.mail_id')
                    ->leftJoin('phone_number', 'phone_number.phone_number_id', '=', 'cand_user.phone_number_id')
                    ->whereNotNull('hrc_cand_id')
                    ->whereNull('hrc_cand_accounting_number')
                    ->groupBy('cand_profile.cand_profile_id')
                    ->orderBy('cand_profile.cand_profile_id', 'asc')->get();
            echo json_encode($result);
            break;
        case 'getMatchedCandProfiles':
            $result = [];
            $controller = new Controller();
            $candProfileObj = $controller->model('cand_profile');

            $result = $candProfileObj->select('cand_profile.cand_profile_id','cand_profile.f_name','cand_profile.l_name', 'cand_profile.birthday', 
                    'cand_profile.gender', 'cand_profile.ahv_number', 'cand_profile.phone', 'cand_profile.mobile', 
                    'cand_profile.mail', 'cand_profile.hrc_cand_id','email.address as login_mail', 'phone_number.number as login_mobile','phone_number.country_id AS login_mobile_country_id')
                    ->join('cand_address', 'cand_profile.cand_profile_id', '=', 'cand_address.cand_profile_id')
                    ->join('cand_user', 'cand_user.cand_user_id', '=', 'cand_profile.cand_user_id')
                    ->leftJoin('email', 'email.mail_id', '=', 'cand_user.mail_id')
                    ->leftJoin('phone_number', 'phone_number.phone_number_id', '=', 'cand_user.phone_number_id')
                    ->whereNotNull('hrc_cand_id')
                    ->groupBy('cand_profile.cand_profile_id')
                    ->orderBy('cand_profile.cand_profile_id', 'asc')->get();
            echo json_encode($result);
            break;
        case 'getNotMatchedCandProfiles':
            $result = [];
            $controller = new Controller();
            $candProfileObj = $controller->model('cand_profile');

            $result = $candProfileObj->select('cand_profile.*','cand_profile.created_at as createdDate','cand_address.cand_address_id','cand_address.country_id','cand_address.region_id',
                        'cand_address.type','cand_address.street','cand_address.postbox','cand_address.zip','cand_address.city','email.address as login_mail', 
                        'phone_number.number as login_mobile','phone_number.country_id AS login_mobile_country_id')
                        ->leftJoin('cand_address', 'cand_profile.cand_profile_id', '=', 'cand_address.cand_profile_id')
                        ->join('cand_user', 'cand_user.cand_user_id', '=', 'cand_profile.cand_user_id')
                        ->leftJoin('email', 'email.mail_id', '=', 'cand_user.mail_id')
                        ->leftJoin('phone_number', 'phone_number.phone_number_id', '=', 'cand_user.phone_number_id')
                        ->whereNull('hrc_cand_id')
                        ->orderBy('cand_profile.cand_profile_id', 'asc')->first();

            echo json_encode($result);
            break;
        case 'setHrcCandId2CandProfile':
            $result = [];
            $controller = new Controller();
            $candProfileObj = $controller->model('cand_profile');
            if(isset($_POST['hrc_cand_id']) && !empty($_POST['hrc_cand_id']) && 
                    isset($_POST['cand_profile_id']) && !empty($_POST['cand_profile_id'])){
                $candProfileSaveObj = $controller->model('cand_profile');
                $result = $candProfileSaveObj->where("cand_profile_id", $_POST['cand_profile_id'])->update(["hrc_cand_id" => $_POST['hrc_cand_id']]);
                if($result){
                    echo '1';
                }
            }
            echo '0';   
            break;
        case 'getJobApplications':
            $result = [];
            $controller = new Controller();
            $candProfileObj = $controller->model('vac_application');

            $result = $candProfileObj->select('vac_info.*','vac_application.*','vac_application.created_at as createdDate','cand_profile.*','email.address as login_mail', 'phone_number.number as login_mobile','phone_number.country_id AS login_mobile_country_id')
                    ->join('vac_info', 'vac_info.vac_info_id', '=', 'vac_application.vac_info_id')
                    ->join('cand_profile', 'cand_profile.cand_profile_id', '=', 'vac_application.cand_profile_id')
                    ->join('cand_user', 'cand_user.cand_user_id', '=', 'cand_profile.cand_user_id')
                    ->leftJoin('email', 'email.mail_id', '=', 'cand_user.mail_id')
                    ->leftJoin('phone_number', 'phone_number.phone_number_id', '=', 'cand_user.phone_number_id')
                    ->whereNotNull('cand_profile.hrc_cand_id')
                    ->whereNotNull('vac_info.unique_key')  // um zu verhindern, dass zyklus gestoppt wird
                    ->whereNull('vac_application.hrc_app_id')
                    ->orderBy('vac_application.application_id', 'asc')
                    ->first();

            echo json_encode($result);
            break;
        
        case 'setHrcAppId2VacApplication':
            $result = [];
            $controller = new Controller();
            $candProfileObj = $controller->model('vac_application');
            if(isset($_POST['hrc_app_id']) && !empty($_POST['hrc_app_id']) && 
                    isset($_POST['application_id']) && !empty($_POST['application_id'])){

                $candProfileObj = $candProfileObj->find($_POST['application_id']);
                $arrSaveData = ['hrc_app_id' => $_POST['hrc_app_id']];
                $result = $candProfileObj->fill($arrSaveData)->save();
                if($result){
                    echo '1';
                }
            }
            echo '0';
            break;
        case 'setHrcAccountingNumber':
            $result = [];
            $controller = new Controller();
            $candProfileObj = $controller->model('cand_profile');
            if(isset($_POST['hrc_cand_accounting_number']) && !empty($_POST['hrc_cand_accounting_number']) && 
                    isset($_POST['cand_profile_id']) && !empty($_POST['cand_profile_id'])){
                $candProfileObj = $candProfileObj->find($_POST['cand_profile_id']);
                $arrSaveData = ['hrc_cand_accounting_number' => $_POST['hrc_cand_accounting_number']];
                $result = $candProfileObj->fill($arrSaveData)->save();
                if($result){
                    echo '1';
                }
            }
            echo '0';  
            break;    
        case 'getCandFiles':
            $result = [];
            $hrcCandId = $_POST['hrc_cand_id'];
            if(!empty($hrcCandId)){
                $controller = new Controller(); 
                $candProfileObj = $controller->model('cand_profile');
                $result = $candProfileObj->getHrcCandCandidateFiles($hrcCandId);
                echo json_encode($result);
            }else{
                echo '';
            }
            break;
            
        case 'getCandFileContent':
            $result = [];
            $filePath = htmlspecialchars_decode($_POST['file_path']);
            if(!empty($filePath)){
                $controller = new Controller(); 
                $candProfileObj = $controller->model('cand_profile');
                $result = $candProfileObj->getFileContent($filePath);
                echo json_encode($result);
            }else{
                echo '';
            }
            
            break;
            
        case 'updateCandProfile':
            $result = [];
            unset($_POST['a']);
            unset($_POST['f']);
            $candProfileId = $_POST['cand_profile_id'];
            if(!empty($candProfileId)){
                $controller = new Controller(); 
                $objCandProfile = $controller->model('cand_profile');
                $candProfileObj = $objCandProfile::find($candProfileId);
                $candProfileObj->gender = $_POST['gender'];
                $candProfileObj->f_name = $_POST['f_name'];
                $candProfileObj->l_name = $_POST['l_name'];
                $candProfileObj->birthday = $_POST['birthday'];
                $candProfileObj->ahv_number = $_POST['ahv_number'];
                $result = $candProfileObj->save();
                if(is_array($result) && array_key_exists('error', $result)){
                    echo json_encode(array('error' => 'DB Fehler'));
                    exit();
                }
                if($_POST['plausibility'] == 1){
                    if($objCandProfile->cleanStringFromSpecialCharacter($_POST['cand_firstname'], true) == $objCandProfile->cleanStringFromSpecialCharacter($_POST['f_name'], true)
                    && $objCandProfile->cleanStringFromSpecialCharacter($_POST['cand_lastname'], true) == $objCandProfile->cleanStringFromSpecialCharacter($_POST['l_name'], true) 
                    && $objCandProfile->cleanStringFromSpecialCharacterAndWhiteSpace($_POST['cand_ahv_number']) == $objCandProfile->cleanStringFromSpecialCharacterAndWhiteSpace($_POST['ahv_number'])
                    && $_POST['cand_birthday'] == $_POST['birthday']){
                        echo json_encode(array('error' => ''));
                        exit();
                    }else{
                        if($objCandProfile->cleanStringFromSpecialCharacter($_POST['cand_firstname'], true) != $objCandProfile->cleanStringFromSpecialCharacter($_POST['f_name'], true)){
                            echo json_encode(array('error' => 'Vorname ist nicht gleich!'));
                        }elseif($objCandProfile->cleanStringFromSpecialCharacter($_POST['cand_lastname'], true) != $objCandProfile->cleanStringFromSpecialCharacter($_POST['l_name'], true)){
                            echo json_encode(array('error' => 'Name ist nicht gleich!'));
                        }elseif($_POST['cand_birthday'] != $_POST['birthday']){
                            echo json_encode(array('error' => 'Geburtsdatum ist nicht gleich!'));
                        }elseif($objCandProfile->cleanStringFromSpecialCharacterAndWhiteSpace($_POST['cand_ahv_number']) != $objCandProfile->cleanStringFromSpecialCharacterAndWhiteSpace($_POST['ahv_number'])){
                            echo json_encode(array('error' => 'AHV-Nummer ist nicht gleich!'));
                        }
                        exit();
                    }
                }

            }else{
                echo json_encode(array('error' => 'Web-Kandidat ID fehlt!'));
            }
            break;

        case 'addEmployee':
            unset($_POST['a']);
            unset($_POST['f']);
            $arrDepartmentId = array();
            if(isset($_POST['customer_department_id']) && !empty($_POST['customer_department_id'])){
                $arrDepartmentId = explode(',', $_POST['customer_department_id']);
            }
            unset($_POST['customer_department_id']);
            if(empty($_POST)){ echo json_encode('Keine Mitarbeiter Daten gefunden.'); break; }
            $controller = new Controller();

            $employeeObj = $controller->model('employee');

            if(isset($_POST['employee_id']) && !empty($_POST['employee_id'])){
                $employeeObj = $employeeObj->find($_POST['employee_id']);
                if(empty($employeeObj)){
                    echo json_encode('Der Mitarbeiter mit der ID: '.$_POST['employee_id'].' wurde nicht gefunden.');
                    break;
                }
                unset($_POST['employee_id']);
            }

            $result = $employeeObj->fill($_POST)->save();
            if(is_array($result) && array_key_exists('error', $result)){
                $errorMsg = '';
                foreach ($result['error'] as $value){
                    $errorMsg .= implode(',', $value).'. ';
                }
                echo json_encode($errorMsg);
                break;
            }else if($result){
                if(!empty($arrDepartmentId)){
                    $employeeObj->customer_department()->detach();  // delete all relation from many to many
                    $employeeObj->customer_department()->attach($arrDepartmentId);
                }
                echo json_encode($employeeObj->employee_id);
                break;
            }
            echo json_encode($result);
            break;
            
        case 'addVacancy':
            unset($_POST['a']);
            unset($_POST['f']);
            $controller = new Controller();
            $vacInfoObj = $controller->model('vac_info');

            if(isset($_POST['vac_info']['unique_key']) && !empty($_POST['vac_info']['unique_key'])){
                $vacInfoObj = $vacInfoObj->where('unique_key','=', $_POST['vac_info']['unique_key'])->first();
                if(empty($vacInfoObj)){
                    echo json_encode('Die Vakanz mit dem Unique Key: '.$_POST['vac_info']['unique_key'].' wurde nicht gefunden.');
                    break;
                }
            }

            $result = $vacInfoObj->fill($_POST['vac_info'])->save();
        
            if(is_array($result) && array_key_exists('error', $result)){
                $errorMsg = '';
                foreach ($result['error'] as $value){
                    $errorMsg .= implode(',', $value).'. ';
                }
                echo json_encode($errorMsg);
                break;
            }else if($result){ 
                // save the content
                if(!empty($_POST['vac_content'])){
                    $vacInfoObj->vac_content()->delete();  // delete relation 
                    $vacContentObj = $controller->model('vac_content');
                    $vacContentObj->fill($_POST['vac_content']);
                    $vacInfoObj->vac_content()->save($vacContentObj);
                }

                // save employment (Anstellungsart)
                if(!empty($_POST['employment_id'])){
                    $arrTemp = explode(',', $_POST['employment_id']);
                    $vacInfoObj->value_employment()->detach();  // delete all relation from many to many
                    $vacInfoObj->value_employment()->attach($arrTemp);
                }

                // save driver license (Führerschein)
                if(!empty($_POST['driver_license_id'])){
                    $arrTemp = explode(',', $_POST['driver_license_id']);
                    $vacInfoObj->value_driver_license()->detach();  // delete all relation from many to many
                    $vacInfoObj->value_driver_license()->attach($arrTemp);
                }

                // save required age (Benötigtes Alter)
                if(!empty($_POST['required_age_id'])){
                    $arrTemp = explode(',', $_POST['required_age_id']);
                    $vacInfoObj->value_required_age()->detach();  // delete all relation from many to many
                    $vacInfoObj->value_required_age()->attach($arrTemp);
                }

                // save occupation (Berufsgruppe)
                if(!empty($_POST['occupation_id']) && !empty($_POST['group_id'])){
                    $arrOccupationId = explode(',', $_POST['occupation_id']);
                    $arrGroupId = explode(',', $_POST['group_id']);
                    $vacInfoObj->value_occupation()->detach();
                    $count = 0;
                    foreach ($arrOccupationId as $valueId){
                        $vacInfoObj->value_occupation()->attach([$valueId => ['group_id' => $arrGroupId[$count]]]);
                        $count++;
                    }
                }

                // save position (Position)
                if(!empty($_POST['position_id'])){
                    $arrTemp = explode(',', $_POST['position_id']);
                    $vacInfoObj->value_position()->detach();  // delete all relation from many to many
                    $vacInfoObj->value_position()->attach($arrTemp);
                }
                // update the unique key
                if(empty($vacInfoObj->unique_key)){
                    $randomNumber = mt_rand(111, 999);
                    $uk = $vacInfoObj->vac_info_id.$randomNumber;
                    $vacInfoObj->unique_key = $uk;
                    $vacInfoObj->show_id = $uk;
                    $vacInfoObj->save();
                }

                echo json_encode($vacInfoObj->unique_key);
                break;
            }
            echo json_encode($result);
            break;
        case 'checkIfLoginExists':
            unset($_POST['a']);
            unset($_POST['f']);
            $hrcCandId = $_POST['cand_id'];
            if(!empty($_POST)){
                $controller = new Controller();
                $objCandProfile = $controller->model('cand_profile');
                $candProfileIdCount = 0;
                if(!empty($hrcCandId)){
                    $candProfileIdCount = $objCandProfile->where('hrc_cand_id',$hrcCandId)
                            ->count();
                }

                echo json_encode(array('result' => ($candProfileIdCount > 0 ? 'nok' : 'ok')));
            }
            break;
            
        case 'createAccount':
            unset($_POST['a']);
            unset($_POST['f']);
            $cand_id = $_POST['cand_id'];
            $salutation = $_POST['cand_salutation'];
            $firstname = $_POST['cand_firstname'];
            $lastname = $_POST['cand_lastname'];
            $birthday = $_POST['cand_birthday_date'];
            $street = $_POST['cand_street_and_no'];
            $zip = $_POST['cand_zip'];
            $city = $_POST['cand_city'];
            $accountingNumber = $_POST['cand_accounting_number'];
            $inputLoginPassword = $_POST['pwd'];
            $inputLoginMail = $_POST['email'];
            $inputCountry = $_POST['cand_mobile_country'];
            $inputLoginMobile = $_POST['mobile'];
            $ahvnumber = $_POST['cand_ahv_number'];
            $profession = $_POST['cand_profession'];
            $employment = $_POST['cand_salutation'];
            $nationality = $_POST['cand_nationality'];
            $country = $_POST['cand_country_id'];
            $candProfileId = '';
            $error = '';
            if(!empty($_POST)){
                $controller = new Controller();
                $objUser = $controller->model('cand_user');

                if(isset($inputLoginMail) && !empty($inputLoginMail)){
                    $objUser->mail_id = $inputLoginMail;
                    $objUser->mail_activation_code = md5($time.$inputLoginMail);
                }else{
                    require_once '../app/class/helper_phone_lib.php';
                    $libPhoneObj = new helper_phone_lib();
                    $arrIsPhoneNumberValid = $libPhoneObj->isPhoneNumberValidFromCountryId($inputLoginMobile, $inputCountry);
                    $cleanNumber = str_replace('+','',$arrIsPhoneNumberValid['e164Format']);
                    $objUser->phone_number_id = $cleanNumber;
                }
                $objUser->pw = $inputLoginPassword;
                $status = $objUser->save();

                $objCandProfile = $controller->model('cand_profile');
                $objCandProfile->cand_user_id = $objUser->cand_user_id;
                $objCandProfile->hrc_cand_id = $cand_id;
                $objCandProfile->gender = ($salutation  == 1 ? 'W' : 'M');
                $objCandProfile->f_name = $firstname;
                $objCandProfile->l_name = $lastname;
                $objCandProfile->birthday = date('Y-m-d', strtotime($birthday));
                $objCandProfile->ahv_number = $ahvnumber;
                if(!empty($accountingNumber)){
                    $objCandProfile->hrc_cand_accounting_number = $accountingNumber;
                }
                $objCandProfile->profession = $profession;
                $objCandProfile->mail = $inputLoginMail;
                $objCandProfile->mobile = $inputLoginMobile;
                $objCandProfile->nationality = $nationality;
                $status = $objCandProfile->save();

                if($status == true){
                    $objCandAdress = $controller->model('cand_address');
                    $candProfileId = $objCandProfile->cand_profile_id;
                    $objCandAdress->cand_profile_id = $objCandProfile->cand_profile_id;
                    $objCandAdress->type = 'private';
                    $objCandAdress->street = $street;
                    $objCandAdress->zip = $zip;
                    $objCandAdress->city = $city;
                    $objCandAdress->country_id = $country;
                    $status = $objCandAdress->save();
                }else{
                    $error = 'Daten konnten nicht gespeichert werden.';
                }
            }else{
                $error = 'Post-Daten sind leer.';
            }
            echo json_encode(array('error' => $error, 'cand_profile_id' => $candProfileId));
            break;
        
        case 'resetPassword':
            unset($_POST['a']);
            unset($_POST['f']);
            $error = '';
            if(!empty($_POST)){
                $candProfileId = $_POST['cand_profile_id'];
                $inputLoginPassword = $_POST['pwd'];
                if(!empty($candProfileId)){
                    $controller = new Controller();
                    $objCandProfile = $controller->model('cand_profile');
                    $candProfileObj = $objCandProfile::find($candProfileId);
                    $objCandUser = $controller->model('cand_user');
                    $status = $objCandUser::where('cand_user_id',$candProfileObj->cand_user_id)
                                   ->update(['pw' => $inputLoginPassword]);
                    if($status === false){
                        $error = 'Daten konnten nicht gespeichert werden.';
                    }
                }else{
                    $error = 'Profile-ID fehlt';
                }
            }
            echo json_encode(array('error' => $error, 'cand_profile_id' => $candProfileId));
            break;
    }
}else{
    echo 'ApiKey is wrong or is empty';
}

exit();