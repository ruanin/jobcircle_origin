<?php
//error_reporting(E_ALL); ini_set('display_errors', TRUE); restore_error_handler(); restore_exception_handler();
include '../app/config/config_nusoap.php';
//if(!in_array(getRequestIp(),$TrustIps)) { exit(); }
include '../vendor/nuSOAP/nusoap-0.9.5/lib/nusoap.php';

require_once '../app/init.php';
require_once '../app/core/Controller.php';

// ****** Functions for the service

function getRequestIp(){
    $requestIp = 0;
    if (! isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $requestIp = $_SERVER['REMOTE_ADDR'];
    }else{
        $requestIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $requestIp; 
}

// ****** Service Functions ******

/**
 * add a employees from HRC to Website
 * @param array $arrData = array(
 *      'key' => string
 * );
 * @return string return the count number from Workdemand
 */
function getCountWorkdemand($arrData = array()){
    if(empty($arrData['key']) || $arrData['key'] != SECURE_AUTH_KEY) { return '0'; }  
    unset($arrData['key']);

    $controller = new Controller();
    $workdemandObj = $controller->model('workdemand');
    
    $count = $workdemandObj->whereNull('hrc_workdemand_id')
                ->where('not_pick_again', '=', 2)->count();
    if(empty($count)){ return 'keine Eintraege'; }
    return $count;
}

/**
 * add a employees from HRC to Website
 * @param array $arrData = array(
 *      'workdemand_id' => int,
 *      'key' => string
 * );
 * @return string return the count number from Workdemand
 */
function getWorkdemand($arrData = array()){
    if(empty($arrData['key']) || $arrData['key'] != SECURE_AUTH_KEY) { return '0'; }  
    unset($arrData['key']);
    
    $result = [];
    $controller = new Controller();
    $workdemandObj = $controller->model('workdemand');
    
    if(isset($arrData['workdemand_id']) && !empty($arrData['workdemand_id'])){
        $result = $workdemandObj->find($arrData['workdemand_id']);
    }else{
        $result = $workdemandObj->whereNull('hrc_workdemand_id')->where('not_pick_again', '=', 2)->first();
    }
    $result->value_employment;
    $result->value_driver_license;

    $emailObj= $controller->model('rel_email');
    $emailObj = $emailObj->where('workdemand_id','=',$result['workdemand_id']) 
            ->join('email','rel_email.mail_id','=','email.mail_id')->get()->toArray();
    $result['contact_email'] = $emailObj;

    $phoneObj= $controller->model('rel_phone_number');
    $phoneObj = $phoneObj->where('workdemand_id','=',$result['workdemand_id'])
            ->join('phone_number','rel_phone_number.phone_number_id','=','phone_number.phone_number_id')
            ->join('value_country','phone_number.country_id','=','value_country.country_id')->get()->toArray();
    $result['contact_phone'] = $phoneObj;
    return json_encode($result);
}
/**
 * gets not matched Cand Profiles
 * @param array $arrData = array(
 *      'key' => string
 * );
 * @return string return the cand profile
 */
function getNotMatchedCandProfiles($arrData = array()){
    if(empty($arrData['key']) || $arrData['key'] != SECURE_AUTH_KEY) { return '0'; }  
    unset($arrData['key']);
    
    $result = [];
    $controller = new Controller();
    $candProfileObj = $controller->model('cand_profile');

    $result = $candProfileObj->join('cand_address', 'cand_profile.cand_profile_id', '=', 'cand_address.cand_profile_id')->whereNull('hrc_cand_id')->orderBy('cand_profile.cand_profile_id', 'asc')->first();
    
    return json_encode($result);
}

/**
 * set the hrc_cand_id
 * @param array $arrData = array(
 *      'cand_profile_id' => int,
 *      'hrc_cand_id' => int,
 *      'key' => string
 * );
 * @return string return the count number from cand_profile
 */
function setHrcCandId2CandProfile($arrData = array()){
    if(empty($arrData['key']) || $arrData['key'] != SECURE_AUTH_KEY) { return '0'; }  
    unset($arrData['key']);
    
    $result = [];
    $controller = new Controller();
    $candProfileObj = $controller->model('cand_profile');
    if(isset($arrData['hrc_cand_id']) && !empty($arrData['hrc_cand_id']) && 
            isset($arrData['cand_profile_id']) && !empty($arrData['cand_profile_id'])){
        
        $candProfileObj = $candProfileObj->find($arrData['cand_profile_id']);
        $arrSaveData = ['hrc_cand_id' => $arrData['hrc_cand_id']];
        $result = $candProfileObj->fill($arrSaveData)->save();
        if($result){
            return '1';
        }
    }
    return '0';
}

/**
 * set the hrc_workdemand_id
 * @param array $arrData = array(
 *      'workdemand_id' => int,
 *      'hrc_workdemand_id' => int,
 *      'key' => string
 * );
 * @return string return the count number from Workdemand
 */
function setWorkdemandHrcWorkdemandId($arrData = array()){
    if(empty($arrData['key']) || $arrData['key'] != SECURE_AUTH_KEY) { return '0'; }  
    unset($arrData['key']);
    
    $controller = new Controller();
    $workdemandObj = $controller->model('workdemand');
    
    if(isset($arrData['workdemand_id']) && !empty($arrData['workdemand_id'])
            && isset($arrData['hrc_workdemand_id']) && !empty($arrData['hrc_workdemand_id'])){
        $workdemandObj = $workdemandObj->find($arrData['workdemand_id']);
        $arrSaveData = ['hrc_workdemand_id' => $arrData['hrc_workdemand_id']];
        $result = $workdemandObj->fill($arrSaveData)->save();
        if($result){
            return '1';
        }
    }
    return '0';
}

/**
 * add a employees from HRC to Website
 * @param array $arrData = array(
 *      'workdemand_id' => int,
 *      'key' => string
 * );
 */
function setWorkdemandNotPickAgain($arrData = array()){
    if(empty($arrData['key']) || $arrData['key'] != SECURE_AUTH_KEY) { return '0'; }  
    unset($arrData['key']);
    
    $controller = new Controller();
    $workdemandObj = $controller->model('workdemand');
    
    if(isset($arrData['workdemand_id']) && !empty($arrData['workdemand_id'])){
        $workdemandObj = $workdemandObj->find($arrData['workdemand_id']);
        $arrSaveData = ['not_pick_again' => 1];
        $result = $workdemandObj->fill($arrSaveData)->save();
        if($result){
            return '1';
        }
    }
    return '0';
}

/**
 * add a employees from HRC to Website
 * @param array $arrData = array(
 *      'employee_id' => int,
 *      'f_name' => string,
 *      'l_name' => string,
 *      'phone' => string,
 *      'fax' => string,
 *      'mail' => string,
 *      'employe_as_id' => int,
 *      'customer_department_id' => array(int,int,int,...),
 *      'key' => string
 * );
 */
function addEmployee($arrData = array()){
    if(empty($arrData['key']) || $arrData['key'] != SECURE_AUTH_KEY) { return '0'; }  
    unset($arrData['key']);
    $arrDepartmentId = array();
    if(isset($arrData['customer_department_id']) && !empty($arrData['customer_department_id'])){
        $arrDepartmentId = $arrData['customer_department_id'];
    }
    unset($arrData['customer_department_id']);
    if(empty($arrData)){ return 'Keine Mitarbeiter Daten gefunden.'; }
    $controller = new Controller();
    
    $employeeObj = $controller->model('employee');
    
    if(isset($arrData['employee_id']) && !empty($arrData['employee_id'])){
        $employeeObj = $employeeObj->find($arrData['employee_id']);
        if(empty($employeeObj)){
            return 'Der Mitarbeiter mit der ID: '.$arrData['employee_id'].' wurde nicht gefunden.';
        }
        unset($arrData['employee_id']);
    }
//    $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
//    $txt = implode(',', $arrData)."\n";
//    fwrite($myfile, $txt);
//    fclose($myfile);

    $result = $employeeObj->fill($arrData)->save();
     
    if(is_array($result) && array_key_exists('error', $result)){
        $errorMsg = '';
        foreach ($result['error'] as $value){
            $errorMsg .= implode(',', $value).'. ';
        }
        return $errorMsg;
    }else if($result){
        if(!empty($arrDepartmentId)){
            $employeeObj->customer_department()->detach();  // delete all relation from many to many
            $employeeObj->customer_department()->attach($arrDepartmentId);
        }
        return $employeeObj->employee_id; 
    }
    return $result;
}

/**
 * add a Vacancy from HRC to Website
 * @param array $arrData = array(
 *      'vac_info' => array( 
*              'vac_info_id' => int,
*              'jobtitle' => string,
 *             'from_date' => 'YYYY-mm-dd HH:ii:ss',
*              'to_date' => 'YYYY-mm-dd HH:ii:ss',
*              'customer_department_id' => int,
*              'workload_id' => int,
 *             'entering_id' => int,
 *             'creator_id' => int,
 *             'contact_id' => int,
 *             'main_branch_id' => int,
 *             'sub_branch_id' => int,
 *             'profession_id' => int,
 *             'country_id' => int,
 *             'region_id' => int,
 *             'featured_expiration_date' => 'YYYY-mm-dd HH:ii:ss',
 *             'status' => int,
 *             'street' => string,
 *             'zip' => string,
 *             'city' => string,
 *             'hrc_workdemand_id' => int,
 *             'req_driver_licence' => int,
 *             'req_vehicle' => int,
 *             'is_intern' => int,
 *             'hrc_client_id' => int
 *      ),
 *      'vac_content' => array(
 *             'header' => string,
 *             'description' => string,
 *             'requirements' => string,
 *             'footer' => string
 *      ),
 *      'employment_id' => array(int,int,int,...),
 *      'driver_license_id' => array(int,int,int,...),
 *      'required_age_id' => array(int,int,int,...),
 *      'occupation_id' => array(int,int,int,...),
 *      'group_id' => array(int,int,int,...),
 *      'position_id' => array(int,int,int,...),
 *      'key' => string
 * );
 */
function addVacancy($arrData = array()){
    if(empty($arrData)) { return '0'; }
    if(empty($arrData['key']) || $arrData['key'] != SECURE_AUTH_KEY) { return '0'; }
    unset($arrData['key']);
    if(!isset($arrData['vac_info'])){ return 'Keine Vakanz Daten gefunden'; }

    $controller = new Controller();
    $vacInfoObj = $controller->model('vac_info');
    
    if(isset($arrData['vac_info']['unique_key']) && !empty($arrData['vac_info']['unique_key'])){
        $vacInfoObj = $vacInfoObj->where('unique_key','=', $arrData['vac_info']['unique_key'])->first();
        if(empty($vacInfoObj)){
            return 'Die Vakanz mit dem Unique Key: '.$arrData['vac_info']['unique_key'].' wurde nicht gefunden.';
        }
    }
    
    $result = $vacInfoObj->fill($arrData['vac_info'])->save();

    if(is_array($result) && array_key_exists('error', $result)){
        $errorMsg = '';
        foreach ($result['error'] as $value){
            $errorMsg .= implode(',', $value).'. ';
        }
        return $errorMsg;
    }else if($result){ 
        // save the content
        if(!empty($arrData['vac_content'])){
            $vacInfoObj->vac_content()->delete();  // delete relation 
            $vacContentObj = $controller->model('vac_content');
            $vacContentObj->fill($arrData['vac_content']);
            $vacInfoObj->vac_content()->save($vacContentObj);
        }
        
        // save employment (Anstellungsart)
        if(!empty($arrData['employment_id'])){
            $vacInfoObj->value_employment()->detach();  // delete all relation from many to many
            $vacInfoObj->value_employment()->attach($arrData['employment_id']);
        }
        
        // save driver license (Führerschein)
        if(!empty($arrData['driver_license_id'])){
            $vacInfoObj->value_driver_license()->detach();  // delete all relation from many to many
            $vacInfoObj->value_driver_license()->attach($arrData['driver_license_id']);
        }
        
        // save required age (Benötigtes Alter)
        if(!empty($arrData['required_age_id'])){
            $vacInfoObj->value_required_age()->detach();  // delete all relation from many to many
            $vacInfoObj->value_required_age()->attach($arrData['required_age_id']);
        }
        
        // save occupation (Berufsgruppe)
        if(!empty($arrData['occupation_id']) && !empty($arrData['group_id'])){
            $vacInfoObj->value_occupation()->detach();
            $count = 0;
            foreach ($arrData['occupation_id'] as $valueId){
                $vacInfoObj->value_occupation()->attach([$valueId => ['group_id' => $arrData['group_id'][$count]]]);
                $count++;
            }
        }
        
        // save position (Position)
        if(!empty($arrData['position_id'])){
            $vacInfoObj->value_position()->detach();  // delete all relation from many to many
            $vacInfoObj->value_position()->attach($arrData['position_id']);
        }
        // update the unique key
        if(empty($vacInfoObj->unique_key)){
            $randomNumber = mt_rand(111, 999);
            $uk = $vacInfoObj->vac_info_id.$randomNumber;
            $vacInfoObj->unique_key = $uk;
            $vacInfoObj->save();
        }

        return $vacInfoObj->unique_key;
    }
    return $result;
}

//using soap_server to create server object 
$server = new soap_server(); 
$server->configureWSDL('API - Jobcircle', 'urn:demo');
//register the functions that works on server 

$server->register('getCountWorkdemand',
    array('arrData' => 'xsd:array(\'key\' => string);'),
    array('return' => 'xsd:string'), 'xsd:demo'); 

$server->register('setWorkdemandHrcWorkdemandId',
    array('arrData' => 'xsd:array( <br />
                                \'workdemand_id\' => int, <br />
                                \'hrc_workdemand_id\' => int, <br />
                                \'key\' => string);'),
    array('return' => 'xsd:string'),
    'xsd:demo'); 

$server->register('setHrcCandId2CandProfile',
    array('arrData' => 'xsd:array( <br />
                                \'cand_profile_id\' => int, <br />
                                \'hrc_cand_id\' => int, <br />
                                \'key\' => string);'),
    array('return' => 'xsd:string'),
    'xsd:demo'); 

$server->register('getWorkdemand',
    array('arrData' => 'xsd:array( <br />
                                \'workdemand_id\' => int, <br />
                                \'key\' => string);'),
    array('return' => 'xsd:string'),
    'xsd:demo'); 

$server->register('getNotMatchedCandProfiles',
    array('arrData' => 'xsd:array( <br />
                                \'key\' => string);'),
    array('return' => 'xsd:string'),
    'xsd:demo'); 

$server->register('setWorkdemandNotPickAgain',
    array('arrData' => 'xsd:array( <br />
                                \'workdemand_id\' => int, <br />
                                \'key\' => string);'),
    array('return' => 'xsd:string'),
    'xsd:demo'); 

$server->register('addEmployee',
    array('arrData' => 'xsd:array( <br />
                                \'employee_id\' => int, <br />
                                \'f_name\' => string, <br />
                                \'l_name\' => string, <br />
                                \'phone\' => string, <br />
                                \'fax\' => string, <br />
                                \'mail\' => string, <br />
                                \'employe_as_id\' => int, <br />
                                \'customer_department_id\' => array(int,int,int,...), <br />
                                \'key\' => string);'),
    array('return' => 'xsd:string'),
    'xsd:demo'); 

$server->register('addVacancy',
    array('arrData' => 'xsd:array( <br /> <br />
       \'vac_info\' => array( <br />
              \'vac_info_id\' => int, <br />
              \'jobtitle\' => string, <br />
              \'from_date\' => \'YYYY-mm-dd hh:ii:ss\', <br />
              \'to_date\' => \'YYYY-mm-dd hh:ii:ss\', <br />
              \'customer_department_id\' => int, <br />
              \'workload_id\' => int, <br />
              \'entering_id\' => int, <br />
              \'creator_id\' => int, <br />
              \'contact_id\' => int, <br />
              \'main_branch_id\' => int, <br />
              \'sub_branch_id\' => int, <br />
              \'profession_id\' => int, <br />
              \'country_id\' => int, <br />
              \'region_id\' => int, <br />
              \'featured_expiration_date\' => \'YYYY-mm-dd hh:ii:ss\', <br />
              \'status\' => int, <br />
              \'street\' => string, <br />
              \'zip\' => string, <br /> 
              \'city\' => string, <br />
              \'hrc_workdemand_id\' => int, <br />
              \'req_driver_licence\' => int, <br />
              \'req_vehicle\' => int, <br />
              \'is_intern\' => int, <br />
              \'hrc_client_id\' => int <br />
       ), <br /> <br />
       \'vac_content\' => array( <br />
              \'header\' => string, <br />
              \'description\' => string, <br />
              \'requirements\' => string, <br />
              \'footer\' => string <br />
       ), <br /> <br />
       \'employment_id\' => array(int,int,int,...), <br /> 
       \'driver_license_id\' => array(int,int,int,...), <br />
       \'required_age_id\' => array(int,int,int,...), <br />
       \'occupation_id\' => array(int,int,int,...), <br />
       \'group_id\' => array(int,int,int,...), <br />
       \'position_id\' => array(int,int,int,...), <br />
       \'key\' => string);'),
    array('return' => 'xsd:string'),
    'xsd:demo'); 

// create HTTP listener 
if (!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = file_get_contents('php://input');
$server->service($HTTP_RAW_POST_DATA);
exit();