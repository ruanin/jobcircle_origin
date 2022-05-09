<?php

class Candidate extends Controller
{
    public function index(){
        $success = true;
        $error = array();
        $email = $pwd = '';
        $this->view('Register',array('error' => $error,
                                     'success' => $success,
                                     'email' => $email));
    }
    
    public function Dashboard(){
        $success = true;
        $error = array();
        if(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])){
            $objProfile = $this->model('cand_profile');
            $arrProfile = $objProfile->where('cand_profile_id',$_SESSION['cand_profile_id'])
                                    ->where('cand_user_id',$_SESSION['cand_user_id'])
                                    ->first();
            $arrCVFiles = $objProfile->getCVFilesList($_SESSION['cand_profile_id']);
            $progress = $objProfile->getProfileProgress();
           
            $objVacApplication = $this->model('vac_info');
            $arrApplication = $objVacApplication->where('cand_profile_id',$_SESSION['cand_profile_id'])
                                                ->join('vac_application', 'vac_info.vac_info_id', '=', 'vac_application.vac_info_id')
                                                ->take(30)->get();
        }else{
            $location = WEB_URL.'/Candidate/profile';
            header("Location: $location"); 
        }
        $this->view('Dashboard',array('error' => $error,
                                      'success' => $success,
                                      'progress' => $progress,
                                      'application' => $arrApplication,
                                      'profile'=> $arrProfile,
                                      'cvfiles' => $arrCVFiles));
    }
    
    public function passwortVergessen(){
        $success = '';
        $error = array();
        $inputLogin = Toolkit::getPost('inputLogin', '');
        $task = Toolkit::getPost('task', '');
        if(!empty($inputLogin) && !empty($task)){
            $objUser = $this->model('cand_user');
            $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
            $expDate = date("Y-m-d H:i:s",$expFormat);
            $key = md5(2418*2+$inputLogin);
            $addKey = substr(md5(uniqid(rand(),1)),3,10);
            $key = $key . $addKey;
            if(filter_var($inputLogin, FILTER_VALIDATE_EMAIL)) {
                $mailAddress = $objUser->where('address',$inputLogin)
                                       ->join('email', 'cand_user.mail_id', '=', 'email.mail_id')
                                       ->join('cand_profile', 'cand_user.cand_user_id', '=', 'cand_profile.cand_user_id')->first();
                if(!empty($mailAddress) && !empty($mailAddress->cand_profile_id)){
                    $objToken = $this->model('cand_password_reset');
                    $existsToken = $objToken->find($mailAddress->cand_profile_id);
                    if(empty($existsToken)){                       
                        $objSwiftMailer = new Swiftmailer();
                        $result = $objSwiftMailer->sendPasswortResetLink($inputLogin, $key);
                        if($result){
                            $objCandReset = $this->model('cand_password_reset');
                            $objCandReset->cand_profile_id = $mailAddress->cand_profile_id;
                            $objCandReset->key = $key;
                            $objCandReset->key_expiredate = $expDate;
                            $result = $objCandReset->save();
                        }                           
                    }
                }
                $success = 'In Kürze erhalten Sie eine E-Mail mit einem Link, wo Sie ein neues Passwort festlegen können.'; 
            }else{
                require_once APPLICATION.'/class/ClassSMS.php';
                $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

                try{
                    $arrPhoneNumber = $phoneUtil->parse($inputLogin, 'CH');
                    $isValid = $phoneUtil->isValidNumber($arrPhoneNumber);
                } catch (\libphonenumber\NumberParseException $e) {
                    $error = $e;
                }
                
                if ($isValid) {                
                    require_once '../app/models/phone_number.php';
                    require_once '../app/class/helper_phone_lib.php';
                    $libPhoneObj = new helper_phone_lib();
                    $arrIsPhoneNumberValid = $libPhoneObj->isPhoneNumberValidFromCountryId($inputLogin, 1);
                    $phoneNumber = $objUser->where('number',$arrIsPhoneNumberValid['nationalNumber'])
                                    ->where('country_id', $arrIsPhoneNumberValid['countryId'])
                                    ->join('phone_number', 'cand_user.phone_number_id', '=', 'phone_number.phone_number_id')
                                    ->join('cand_profile', 'cand_user.cand_user_id', '=', 'cand_profile.cand_user_id')
                                    ->first();
                    if(!empty($phoneNumber) && !empty($phoneNumber->cand_profile_id)){
                        $objToken = $this->model('cand_password_reset');
                        $existsToken = $objToken->find($phoneNumber->cand_profile_id);
                        if(empty($existsToken)){
                            $mobileNumberFormat = $phoneUtil->format($arrPhoneNumber, \libphonenumber\PhoneNumberFormat::E164);
                            $objSMS = new SMS(SMS_SHORT_NAME);
                            $objSMS->sendPasswordResetCode($mobileNumberFormat,$key);

                            $objCandReset = $this->model('cand_password_reset');
                            $objCandReset->cand_profile_id = $phoneNumber->cand_profile_id;
                            $objCandReset->key = $key;
                            $objCandReset->key_expiredate = $expDate;
                            $result = $objCandReset->save();
                        }
                    }
                    $success = 'In Kürze erhalten Sie eine SMS mit einem Link, wo Sie ein neues Passwort festlegen können.';
                    
                }else{
                    $error = 'Sie haben keine gültige E-Mail Adresse bzw. Telefonnummer eingegeben. <br/>'
                           . 'Bitte geben Sie eine gültige E-Mail Adresse oder Telefonnummer ein.';
                }
            }
        }
        $this->view('ResetPasswordRequest',array('error' => $error,
                                                 'success' => $success,
                                                 'login' => $inputLogin));
    }
    
    public function passwortZuruecksetzen(){
        $success = '';
        $error = array();
        $token = Toolkit::getVar('token', '');
        $password = Toolkit::getPost('password', '');
        $passwordConfirm = Toolkit::getPost('passwordConfirm', '');
        $tokenerror = false;
        if(!empty($token)){
            $task = Toolkit::getPost('task', '');
            $objToken = $this->model('cand_password_reset');
            $tokenData = $objToken->where('key',$token)->first();
            if(!empty($tokenData['cand_profile_id'])){
                $curDate = date("Y-m-d H:i:s");
                if($tokenData['key_expiredate']>= $curDate){
                    if(!empty($task) && $task == 'changePassword'){
                        $objCandProfile = $this->model('cand_profile');
                        $profileData = $objCandProfile->where('cand_profile_id',$tokenData['cand_profile_id'])->first();
                        $newPassword  = Toolkit::getPost('newPassword','');
                        $newPassword2 = Toolkit::getPost('newPasswordConfirm','');

                        if($newPassword == $newPassword2){
                            $success = 'Passwort wurde erfolgreich gespeichert. <br/>Jetzt können Sie sich mit dem neuen Passwort einloggen.';
                            $objCandUser = $this->model('cand_user');
                            $candUserObj = $objCandUser::find($profileData['cand_user_id']);
                            $arrSaveData = ['pw' => $newPassword];
                            $result = $candUserObj->fill($arrSaveData)->save();
                            if($result){
                                $objToken->where('key',$token)->delete();
                            }
                        }elseif($newPassword != $newPassword2){
                            $error = 'Die Passwörter stimmen nicht überein. Erneut versuchen?';
                        }
                    }
                }else{
                    $error = 'Der eingegeben Link ist abgelaufen. <br/>'
                            . 'Entweder haben Sie nicht den richtigen Link aus der E-Mail kopiert oder Sie haben den Schlüssel bereits verwendet, in welchem Fall es ist deaktiviert.<br/>'
                            . '<a href="https://www.planova.ch/Candidate/passwortvergessen"/>Klicken Sie hier</a>, um einen neuen Link anzufordern.';
                    $tokenerror = true;
                }
            }else{
                $error = 'Der eingegeben Link existiert nicht.';
                $tokenerror = true;
            }
        }else{
            $error = 'Der eingegeben Link existiert nicht.';
            $tokenerror = true;
        }
        $this->view('ResetPassword',array('token' => $token,
                                          'tokenerror' => $tokenerror,
                                          'error' => $error,
                                          'success' => $success));
    }
    
    public function registerWizard(){
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
            $location = WEB_URL.'/Candidate/Dashboard';
            header("Location: $location");
        }

        $logger = new Katzgrau\KLogger\Logger(APPLICATION.'/database/log/registerWizard.log');
        $success = '';
        $error = array();
        $inputTask = Toolkit::getPost('task', '');
        $secretInput = Toolkit::getPost('secretInput', '');
        $inputLoginMobile = Toolkit::getPost('login_telefon', '');
        $inputLoginMail = Toolkit::getPost('login_email', '');
        $inputSalutation = Toolkit::getPost('salutation', '');
        $inputFirstname = Toolkit::getPost('firstname', '');
        $inputLastname = Toolkit::getPost('lastname', '');
        $inputarrBirthday = Toolkit::getPost('birthdayPicker_birth', '');
        if(empty($inputarrBirthday)){
            $inputBirthday = Toolkit::getPost('birthday', '');
        }else{
            $inputBirthday = $inputarrBirthday['day'].'.'.$inputarrBirthday['month'].'.'.$inputarrBirthday['year'];
        }
        $inputNationality = Toolkit::getPost('nationality', '');
        $inputAHVNumber = Toolkit::getPost('ahv-number', '');
        $inputStreet = Toolkit::getPost('street', '');
        $inputZip = Toolkit::getPost('zip', '');
        $inputCity = Toolkit::getPost('city', '');
        $inputCountry = Toolkit::getPost('country', '1');
        $inputPhone = Toolkit::getPost('phone', '');
        $inputMobile = Toolkit::getPost('mobile', '');
        $inputEmail = Toolkit::getPost('email', '');
        $inputProfession = Toolkit::getPost('profession', '');
        $inputEmployment = Toolkit::getPost('employment', '9');
        $inputAvailable = Toolkit::getPost('available', '1');
        $inputCVFile = Toolkit::getPost('cvfile', '');
        $inputLoginPassword = Toolkit::getPost('login_password', '');
        $inputLoginPasswordConfirm = Toolkit::getPost('login_password_confirm', '');      
        $time = time();

        if(!empty($inputTask)){
            $error = Toolkit::checkCandFields(array('inputFirstname' => $inputFirstname, 'inputLastname' => $inputLastname, 
                'inputBirthday' => $inputBirthday, 'inputPhone' => $inputPhone, 'inputMobile' => $inputMobile, 
                'inputLoginMobile' => $inputLoginMobile, 'inputEmail' => $inputEmail, 'inputLoginMail' => $inputLoginMail, 
                'inputAHVnumber' => $inputAHVNumber, 'inputCountry' => $inputCountry, 'inputNationality' => $inputNationality));
            if((!empty($inputLoginMobile) || !empty($inputLoginMail)) && empty($error)){
                $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
                $objShortCountry = $this->model('value_country');
                $arrCountry = $objShortCountry->find($inputCountry);

                if((!empty($inputLoginPassword) && !empty($inputLoginPasswordConfirm)) && (!empty($secretInput) && $secretInput == SECRET_KEY)){
                    if($inputLoginPassword == $inputLoginPasswordConfirm){
                    }else{
                        $error = "Die Passwörter stimmen nicht überein.";
                    }

                    if(((!empty($inputLoginMail) && filter_var($inputLoginMail, FILTER_VALIDATE_EMAIL)) || (isset($inputLoginMobile)))){
                        $objUser = $this->model('cand_user');
                        $mailCount = $phoneCount = 0;
                        if(!empty($inputLoginMail)){
                            $mailCount = $objUser->where('address',$inputLoginMail)
                                    ->join('email', 'cand_user.mail_id', '=', 'email.mail_id')
                                    ->count();
                        }

                        if(!empty($inputLoginMobile)){
                            require_once '../app/class/helper_phone_lib.php';
                            $libPhoneObj = new helper_phone_lib();
                            $arrIsPhoneNumberValid = $libPhoneObj->isPhoneNumberValidFromCountryId($inputLoginMobile, $inputCountry);

                            if($arrIsPhoneNumberValid['isValidFromCountry'] != 1){
                                    $error[] = 'Die Telefonnummer ist nicht gültig für die ausgewählte Vorwahl: '.$inputLoginMobile;
                            }else{
                                $phoneCount = $objUser->where('number',$arrIsPhoneNumberValid['nationalNumber'])
                                        ->where('country_id',$arrIsPhoneNumberValid['countryId'])
                                        ->join('phone_number', 'cand_user.phone_number_id', '=', 'phone_number.phone_number_id')
                                        ->count();
                            }
                        }

                        if($phoneCount > 0){ 
                             $error[] = "Es existiert bereits ein Konto mit dieser Mobile-Nummber";
                        }else{

                            if(isset($inputLoginMail) && !empty($inputLoginMail)){
                                $objUser->mail_id = $inputLoginMail;
                                $objUser->mail_activation_code = md5($time.$inputLoginMail);
                            }else{
                                $cleanNumber = str_replace('+','',$arrIsPhoneNumberValid['e164Format']);
                                $objUser->phone_number_id = $cleanNumber;
                                if(isset($_SESSION['sms_code']) && !empty($_SESSION['sms_code'])){
                                    $objUser->sms_activation_code = $_SESSION['sms_code'];
                                }
                            }

                            $objUser->pw = $inputLoginPassword;
                            try{
                                $status = $objUser->save();
                            } catch (Exception $ex) {
                                $logger->error('Beim User speichern ist ein Fehler aufgetreten.');
                                $logger->debug('User-Save Exception:', $ex->getMessage());
                                $logger->debug('User-Save Error:', $status);
                            }

                            if($status != true || is_array($status)){
                                $error[] = 'Bitte versuchen sie es später noch einmal.';
                                $logger->error('Beim User speichern ist ein Fehler aufgetreten.');
                                $logger->debug('User-Save Error: ',$status);
                            }else{                  
                                if(isset($inputPhone) || isset($inputMobile) || isset($inputLoginMobile)){
                                    if(isset($inputPhone) && !empty($inputPhone)){
                                        $arrPhoneNumber = $phoneUtil->parse($inputPhone, $arrCountry->code);
                                        $isValid = $phoneUtil->isValidNumber($arrPhoneNumber);

                                        if($isValid){
                                           $inputPhone = $phoneUtil->format($arrPhoneNumber, \libphonenumber\PhoneNumberFormat::E164);
                                        }
                                    }

                                    if(isset($inputMobile) && !empty($inputMobile)){

                                        $arrPhoneNumber = $phoneUtil->parse($inputMobile, $arrCountry->code);

                                        $isValid = $phoneUtil->isValidNumber($arrPhoneNumber);

                                        if($isValid){
                                           $inputMobile = $phoneUtil->format($arrPhoneNumber, \libphonenumber\PhoneNumberFormat::E164);
                                        }
                                    }else{
                                        if(isset($inputLoginMobile) && !empty($inputLoginMobile)){
                                            $arrPhoneNumber = $phoneUtil->parse($inputLoginMobile, $arrCountry->code);
                                            $isValid = $phoneUtil->isValidNumber($arrPhoneNumber);

                                            if($isValid){
                                               $inputMobile = $phoneUtil->format($arrPhoneNumber, \libphonenumber\PhoneNumberFormat::E164);
                                            }
                                        }
                                    }
                                }
                                $_SESSION['cand_user_id'] = $objUser->cand_user_id;
                                $_SESSION['logged'] = 'true';
                                $objCandProfile = $this->model('cand_profile');
                                $objCandProfile->cand_user_id = $_SESSION['cand_user_id'];
                                $objCandProfile->source_url =  $_SESSION['org_referer'];

                                $objCandProfile->esrc =  $_SESSION['esrc'];
                                $objCandProfile->gender = $inputSalutation;
                                $objCandProfile->f_name = Toolkit::cleanName($inputFirstname);
                                $objCandProfile->l_name = Toolkit::cleanName($inputLastname);
                                $objCandProfile->birthday = date('Y-m-d', strtotime($inputBirthday));
                                $objCandProfile->ahv_number = $inputAHVNumber;
                                $objCandProfile->profession = $inputProfession;
                                $objCandProfile->mail = $inputEmail;
                                $objCandProfile->phone = $inputPhone;
                                $objCandProfile->mobile = $inputMobile;
                                $objCandProfile->employment = $inputEmployment;
                                $objCandProfile->available_from_id = $inputAvailable;
                                $objCandProfile->nationality = $inputNationality;
                                try {
                                    $status = $objCandProfile->save();
                                } catch (Exception $ex) {
                                    $logger->error('Beim speichern des User-Profils ist ein Fehler aufgetreten.');
                                    $logger->debug('User-Profil Exception: ',$ex->getMessage());
                                    $logger->debug('Profil-Save: ',$status);
                                }

                                if($status == true){
                                    $_SESSION['cand_profile_id'] = $objCandProfile->cand_profile_id;
                                    $objCandAdress = $this->model('cand_address');
                                    $objCandAdress->cand_profile_id = $_SESSION['cand_profile_id'];
                                    $objCandAdress->type = 'private';
                                    $objCandAdress->street = $inputStreet;
                                    $objCandAdress->zip = $inputZip;
                                    $objCandAdress->city = $inputCity;
                                    $objCandAdress->country_id = $inputCountry;
                                    $status = $objCandAdress->save();
                                    try {
                                        $status = $objCandAdress->save();
                                    } catch (Exception $ex) {
                                        $logger->error('Beim speichern der User Adresse ist ein Fehler aufgetreten.');
                                        $logger->debug('User Adresse Exception: ',$ex->getMessage());
                                        $logger->debug('Adresse-Save: ',$status);
                                    }
                                    $success = 'Ihre Daten wurden erfolgreich gespeichert.';
                                    $_SESSION['cand_address_id'] = $objCandAdress->cand_address_id;

                                    $objCandProfileFile = $this->model('cand_profile');
                                    if(isset($_FILES['cvfile']['tmp_name'])){
                                        $status = $objCandProfileFile->uploadCV($_SESSION['cand_profile_id'], $_FILES['cvfile']['name'], $_FILES['cvfile']['tmp_name']);
                                    }

                                    if(isset($_FILES['userfile1']['tmp_name'])){
                                        $status = $objCandProfileFile->uploadAttachement($_SESSION['cand_profile_id'], $_FILES['userfile1']['name'], $_FILES['userfile1']['tmp_name']);
                                    }
                                    if(isset($_FILES['userfile2']['tmp_name'])){
                                        $status = $objCandProfileFile->uploadAttachement($_SESSION['cand_profile_id'], $_FILES['userfile2']['name'], $_FILES['userfile2']['tmp_name']);
                                    }
                                    if(isset($_FILES['userfile3']['tmp_name'])){
                                        $status = $objCandProfileFile->uploadAttachement($_SESSION['cand_profile_id'], $_FILES['userfile3']['name'], $_FILES['userfile3']['tmp_name']);
                                    }
                                }else{
                                    $error[] = 'Daten konnten nicht gespeichert werden.';
                                    $logger->error('Beim speichern des User-Profils ist ein Fehler aufgetreten.');
                                    $logger->debug('Profil-Save: ',$status);
                                } 
                            }
                        }
                    }else{
                        $error[] = 'Daten konnten nicht gespeichert werden.';
                    }
                }else{
                    $error[] = 'Daten konnten nicht gespeichert werden.';
                    $logger->error('Das Profil konnte nicht gespeichert werden. Verdacht auf SPAM.');
                    $logger->error('SPAM IP Adresse: '.$_SERVER['REMOTE_ADDR']);
                }
            }
        }

        if($success == true){
            $location = WEB_URL.'/Candidate/Dashboard';
            header("Location: $location");
        }
        $objAvailable = $this->model('value_available_from');
        $arrAvailable = $objAvailable->get();
        
        $objEmployment = $this->model('value_employment');
        $arrEmplyment = $objEmployment->get();
        
        $objCountry = $this->model('value_country');
        $arrCountry = $objCountry->get();

        $this->view('RegisterNew',array('value_available' => $arrAvailable,
                                        'value_employment' => $arrEmplyment,
                                        'value_country' => $arrCountry,
                                        'error' => $error));
    }
    
    public function register(){
        
        $success = true;
        $error = array();
        $email = $pwd = '';
        if(isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2'])){
            $email = $_POST['mail'];
            
            if($_POST['password'] == $_POST['password']){
                $pwd = $_POST['password'];
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
                    $objUser = $this->model('cand_user');
                    $mailCount = $objUser->where('address',$email)
                            ->join('email', 'cand_user.mail_id', '=', 'email.mail_id')
                            ->count();
                    
                  
                        
                        $success = true;
                        
                        $objUser->mail_id = $email;
                        $objUser->pw = $pwd;
                        $status = $objUser->save();
                        if($status != true){
                            $error[] = 'bitte versuchen sie es später noch einmal.';
                        }else{
                            $_SESSION['create_Profile'] = 'true';
                            $_SESSION['cand_user_id'] = $objUser->cand_user_id;
                            $_SESSION['logged'] = 'true';
                            
                            $md5Key = Toolkit::getVar('akey', 0);
                            if(!empty($md5Key) && strlen($md5Key) == '32'){
                                $objMigProfile = $this->model('import_candidate');
                                $arrMigProfile = $objMigProfile->where('md5_key',$md5Key)
                                                                ->first();

                                $objCandProfile = $this->model('cand_profile');
                                $objCandProfile->cand_user_id = $_SESSION['cand_user_id'];
                                $objCandProfile->gender = $arrMigProfile->gender;
                                $objCandProfile->f_name = $arrMigProfile->firstname;
                                $objCandProfile->l_name = $arrMigProfile->lastname;
                                $objCandProfile->birthday = $arrMigProfile->birthday_date;
                                $objCandProfile->profession = $arrMigProfile->profession;
                                $objCandProfile->mail = $arrMigProfile->email;
                                $objCandProfile->phone = $arrMigProfile->phone;
                                $status = $objCandProfile->save();
                                
                                if($status == true){
                                    $_SESSION['cand_profile_id'] = $objCandProfile->cand_profile_id;
                                    $objCandAdress = $this->model('cand_address');
                                    $objCandAdress->cand_profile_id = $_SESSION['cand_profile_id'];
                                    $objCandAdress->type = 'private';
                                    $objCandAdress->street = $arrMigProfile->street;
                                    $objCandAdress->zip = $arrMigProfile->zip;
                                    $objCandAdress->city = $arrMigProfile->city;
                                    $objCandAdress->country_id = $arrMigProfile->country_id;
                                    $status = $objCandAdress->save();
                                    $_SESSION['create_Profile'] = false;
                                    $objMigProfile->where('md5_key',$md5Key)
                                                    ->update(array('valid_status' => 3, 'md5_key' => 'NULL'));
                                    $success = 'Ihre Daten wurden erfolgreich gespeichert.';
                                }else{
                                    $error[] = 'Daten konnten nicht gespeichert werden.';
                                } 
                                
                            }
                        }
                    
                }else{
                    $error[] = "Bitte gib eine gültige E-Mail Adresse ein.";
                }
            }else{
                $error[] = "Die Passwörter stimmen nicht überein. Erneut versuchen?";
            }
        }
        
        //Falls er sich bereits registriert hatk
        if(isset($_SESSION['create_Profile']) && $_SESSION['create_Profile'] == true){
            $location = WEB_URL.'/Candidate/profile';
            header("Location: $location");
        }elseif(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
            $location = WEB_URL.'/Candidate/Dashboard';
            header("Location: $location");
        }
        $regClass = 'active';
        $this->view('Register',array('error' => $error,
                                     'success' => $success,
                                     'email' => $email,
                                     'registerClass' => $regClass));
    }
    
    public function profile(){
        if(!isset($_SESSION['logged'])){
            $location = WEB_URL.'/Candidate/login';
            header("Location: $location");
        }
        $success = '';
        $error = '';
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $objCountry = $this->model('value_country');
        $arrCountry = $objCountry->get();
        
        $objAvailable = $this->model('value_available_from');
        $arrAvailable = $objAvailable->get();
        
        $objEmployment = $this->model('value_employment');
        $arrEmplyment = $objEmployment->get();
        
        $arrInputForm = array();
        $arrInputForm['salutation'] = Toolkit::getPost('salutation',0);
        $arrInputForm['f_name'] = Toolkit::getPost('firstname','');
        $arrInputForm['l_name'] = Toolkit::getPost('lastname','');
        $arrInputForm['birthday'] = Toolkit::getPost('birthday','');
        $arrInputForm['ahv-number'] = Toolkit::getPost('ahv-number','');
        $arrInputForm['street'] = Toolkit::getPost('street','');
        $arrInputForm['zip'] = Toolkit::getPost('zip','');
        $arrInputForm['city'] = Toolkit::getPost('city','');
        $arrInputForm['nationality'] = Toolkit::getPost('nationality',0);
        $arrInputForm['country'] = Toolkit::getPost('country',0);
        $task = Toolkit::getPost('task','');
        $arrInputForm['phone'] = $arrInputForm['profession'] = $arrInputForm['mobile'] = $arrInputForm['mail']= '';

        $arrCVFiles= $arrAttachements ='';

        if(isset($_SESSION['create_Profile']) && $_SESSION['create_Profile'] == true){
            if(Toolkit::getPost('form') == 'profile'){
                $validation = $this->validateProfileData($arrInputForm);
                $error = Toolkit::checkCandFields(array('inputFirstname' => $arrInputForm['f_name'], 'inputLastname' => $arrInputForm['l_name'], 
                'inputBirthday' => $arrInputForm['birthday'], 'inputAHVnumber' => $arrInputForm['ahv-number'], 
                'inputCountry' => $arrInputForm['country'], 'inputNationality' => $arrInputForm['nationality']));
                if(empty($error)){
                    $objCandProfile = $this->model('cand_profile');
                    $objCandProfile->cand_user_id = $_SESSION['cand_user_id'];
                    $objCandProfile->gender = $arrInputForm['salutation'];
                    $objCandProfile->f_name = $arrInputForm['f_name'];
                    $objCandProfile->l_name = $arrInputForm['l_name'];
                    $objCandProfile->birthday = date('Y-m-d', strtotime($arrInputForm['birthday']));
                    $objCandProfile->ahv_number =  $arrInputForm['ahv-number'];
                    $objCandProfile->nationality =  $arrInputForm['nationality'];
		    $objCandProfile->source_url =  $_SESSION['org_referer'];
                    $objCandProfile->esrc =  $_SESSION['esrc'];
                    $status = $objCandProfile->save();
                    if($status == true){
                        $_SESSION['cand_profile_id'] = $objCandProfile->cand_profile_id;
                        $objCandAdress = $this->model('cand_address');
                        $objCandAdress->cand_profile_id = $_SESSION['cand_profile_id'];
                        $objCandAdress->type = 'private';
                        $objCandAdress->street = $arrInputForm['street'];
                        $objCandAdress->zip = $arrInputForm['zip'];
                        $objCandAdress->city = $arrInputForm['city'];
                        $objCandAdress->country_id = $arrInputForm['country'];
                        $status = $objCandAdress->save();
                        $_SESSION['create_Profile'] = false;
                        $success = 'Ihre Daten wurden erfolgreich gespeichert.';
                    }else{
                        $error[] = 'Daten konnten nicht gespeichert werden.';
                    }                    
                }else{
                    $error[]= $validation;
                }
            }          
        }else{
            
            if(Toolkit::getPost('form') == 'contact'){
                
                $objCandAdress = $this->model('cand_address');
                $arrCandAdress = $objCandAdress->where('cand_profile_id',$_SESSION['cand_profile_id'])
                                ->where('TYPE', 'private')
                                ->join('value_country', 'cand_address.country_id', '=', 'value_country.country_id')->get();
                if(!isset($arrCandAdress[0]['code'])){
                    $arrCandAdress[0]['code'] = 'CH';
                }
                
                $arrPhone['phone'] = Toolkit::getPost('phone', '');
                $arrPhone['mobile'] = Toolkit::getPost('mobile', '');
                $arrPhone['mail'] = Toolkit::getPost('mail', '');
                
                 if(!empty($arrPhone['phone']) or $arrPhone['mobile'] or $arrPhone['mail']){
                    $objCandProfile = $this->model('cand_profile');
                    $phoneProfile = $objCandProfile::find($_SESSION['cand_profile_id']);
                 }
                if(!empty($arrPhone['phone'])){
                     $arrPhoneNumber = $phoneUtil->parse($arrPhone['phone'], $arrCandAdress[0]['code']);
                     $isValid = $phoneUtil->isValidNumber($arrPhoneNumber);
                     
                     if($isValid){
                        $phoneProfile->phone = $phoneUtil->format($arrPhoneNumber, \libphonenumber\PhoneNumberFormat::E164);
                     }else{
                         $error = "Bitte Telefonnummer korrekt eingeben.";
                     }
                }

                if(!empty($arrPhone['mobile'])){
                    $arrMobileNumber = $phoneUtil->parse($arrPhone['mobile'], $arrCandAdress[0]['code']);
                    $isValid = $phoneUtil->isValidNumber($arrMobileNumber);

                    if($isValid){
                        $phoneProfile->mobile = $phoneUtil->format($arrMobileNumber, \libphonenumber\PhoneNumberFormat::E164);
                    }else{
                        $error = "Bitte Mobile korrekt eingeben.";
                    }
                }
                
                if(!empty($arrPhone['mail'])){
                    if (filter_var($arrPhone['mail'], FILTER_VALIDATE_EMAIL)) { 
                        $phoneProfile->mail =  $arrPhone['mail'];
                    }
                }
                
                
                if(!isset($error) && empty($error)){
                    if(!empty($arrPhone['phone']) or $arrPhone['mobile'] or $arrPhone['mail']){
                        $status = $phoneProfile->save();
                        $success = "Daten wurden erfolgreich gespeichert.";
                    }
                    
                }
            }
            
            if(Toolkit::getPost('form') == 'extra'){
                $arrExtra['profession'] = Toolkit::getPost('profession', '');
                $arrExtra['employment'] = Toolkit::getPost('employment', '');
                $arrExtra['available']  = Toolkit::getPost('available', '');
                $objExtraProfile = $this->model('cand_profile');
                $extraProfile = $objExtraProfile::find($_SESSION['cand_profile_id']);
                
                if(!empty($arrExtra['profession'])){
                    $extraProfile->profession = $arrExtra['profession'];
                }
                
                if(!empty( $arrExtra['employment']) && is_numeric( $arrExtra['employment'])){
                    $extraProfile->employment = $arrExtra['employment'];
                }
                
                if(!empty( $arrExtra['available']) && is_numeric( $arrExtra['available'])){
                    $extraProfile->available_from_id = $arrExtra['available'];
                }
                
                $status = $extraProfile->save();
                if($status){
                    $success = "Daten wurden erfolgreich gespeichert.";
                }
            }
            
            if(Toolkit::getPost('form') == 'cvupload'){
                $objCandProfileFile = $this->model('cand_profile');
                $status = $objCandProfileFile->uploadCV($_SESSION['cand_profile_id'], $_FILES['userfile']['name'], $_FILES['userfile']['tmp_name']);
                if($status){
                    $success = "Datei wurde erfolgreich hochgeladen.";
                }else{
                    $error = "Datei konnte nicht gespeichert werden. Mögliche Formate: PDF, JPEG, JPG, PNG, DOC, RTF (maximal 10MB)";
                }
            }
            
            if(Toolkit::getPost('form') == 'attachementupload'){
                $objCandProfileFile = $this->model('cand_profile');
                
                $status = $objCandProfileFile->uploadAttachement($_SESSION['cand_profile_id'], $_FILES['userfile']['name'], $_FILES['userfile']['tmp_name']);
                if($status){
                    $success = "Datei wurde erfolgreich hochgeladen.";
                }else{
                    $error = "Datei konnte nicht gespeichert werden. Mögliche Formate: PDF, JPEG, JPG, PNG, DOC, RTF (maximal 10MB)";
                }
            }

            if ($task == 'edit') {
                $objCandProfile = $this->model('cand_profile');
                $profile = $objCandProfile::find($_SESSION['cand_profile_id']);
                $profile->cand_user_id = $_SESSION['cand_user_id'];
                $error = Toolkit::checkCandFields(array('inputFirstname' => $arrInputForm['f_name'], 'inputLastname' => $arrInputForm['l_name'], 
                'inputBirthday' => $arrInputForm['birthday'], 'inputAHVnumber' => $arrInputForm['ahv-number']));
                if(empty($error)){
                    if(empty($profile->hrc_cand_accounting_number)){
                        $profile->gender = $arrInputForm['salutation'];
                        $profile->f_name = $arrInputForm['f_name'];
                        $profile->l_name = $arrInputForm['l_name'];
                        $profile->birthday = date('Y-m-d', strtotime($arrInputForm['birthday']));
                    }
                    if(empty($profile->hrc_cand_accounting_number) || (!empty($profile->hrc_cand_accounting_number) && empty($profile->ahv-number))){
                        $profile->ahv_number = $arrInputForm['ahv-number'];
                    }
                    $profile->nationality = $arrInputForm['nationality'];
                    $status = $profile->save();
                    if ($status == true) {
                        if(isset($_SESSION['cand_address_id']) && !empty($_SESSION['cand_address_id'])){
                            $objCandAddress = $this->model('cand_address');
                            $address = $objCandAddress->find($_SESSION['cand_address_id']);
                        }else{
                            $address = $this->model('cand_address');
                            $address->type = 'private';
                            $address->cand_profile_id = $_SESSION['cand_profile_id'];
                        }                   

                        $address->street = $arrInputForm['street'];
                        $address->zip = $arrInputForm['zip'];
                        $address->city = $arrInputForm['city'];
                        $address->country_id = $arrInputForm['country'];
                        $status = $address->save();

                        $success = 'Ihre Daten wurden erfolgreich gespeichert.';
                    }
                }
            }
            
            if(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])){
                $objProfile = $this->model('cand_profile');
                $arrProfile = $objProfile->where('cand_profile_id',$_SESSION['cand_profile_id'])
                                         ->where('cand_user_id',$_SESSION['cand_user_id'])
                                         ->first();
                $objCandAdress = $this->model('cand_address');
                $arrAddress = $objCandAdress->where('cand_profile_id',$_SESSION['cand_profile_id'])
                                            ->where('type','private')
                                            ->get();
                $_SESSION['cand_address_id'] = $arrAddress[0]->cand_address_id;
                $arrInputForm = array();
                $arrInputForm['salutation'] = $arrProfile->gender;
                $arrInputForm['f_name'] = $arrProfile->f_name;
                $arrInputForm['l_name'] = $arrProfile->l_name;
                $arrInputForm['birthday'] = $arrProfile->birthday;
                $arrInputForm['ahv-number'] = $arrProfile->ahv_number;
                if(!empty($arrProfile->phone)){
                    $arrInputForm['phone'] = $phoneUtil->format($phoneUtil->parse($arrProfile->phone, 'CH'), \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
                }else{
                    $arrInputForm['phone'] = '';
                }
                
                if(!empty($arrProfile->mobile)){
                    $arrInputForm['mobile'] = $phoneUtil->format($phoneUtil->parse($arrProfile->mobile, 'CH'), \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
                }else{
                    $arrInputForm['mobile'] = '';
                }
                $arrInputForm['profession'] = $arrProfile->profession;
                $arrInputForm['employment'] = $arrProfile->employment;
                $arrInputForm['available'] = $arrProfile->available_from_id;
                $arrInputForm['mail'] = $arrProfile->mail;
                $arrInputForm['street'] = $arrAddress[0]->street;
                $arrInputForm['zip'] = $arrAddress[0]->zip;
                $arrInputForm['city'] = $arrAddress[0]->city;
                $arrInputForm['nationality'] = $arrProfile->nationality;
                $arrInputForm['country'] = $arrAddress[0]->country_id;
                $arrInputForm['hrc_cand_accounting_number'] = $arrProfile->hrc_cand_accounting_number;
                $arrInputForm['hrc_cand_id'] = $arrProfile->hrc_cand_id;
                
                $arrCVFiles = $objProfile->getCVFilesList($_SESSION['cand_profile_id']);
                $arrAttachements = $objProfile->getAttachementFilesList($_SESSION['cand_profile_id']);
            }
            
        } 
        $this->view('Profile', array('value_country' => $arrCountry,
                                            'value_available' => $arrAvailable,
                                            'value_employment' => $arrEmplyment,
                                            'profile_form' => $arrInputForm,
                                            'cvfiles' => $arrCVFiles,
                                            'attachements' => $arrAttachements,
                                            'success' => $success,
                                            'error' => $error));
    }
    
   
    
    public function affiliateForm(){
        $title = "Formular";

        $logger = new Katzgrau\KLogger\Logger(APPLICATION.'/database/log/affiliateFormular');


        $success = '';
        $error = array();
        $inputFirstname = Toolkit::getPost('firstname', '');
        $inputLastname = Toolkit::getPost('lastname', '');
        $inputAddress = Toolkit::getPost('address', '');
        $inputPLZ = Toolkit::getPost('plz', '');
        $inputLocation = Toolkit::getPost('location', '');
        $inputPhone = Toolkit::getPost('phone', '');
        $inputPrivacy = Toolkit::getPost('privacy', '');
       
        
        
      //  var_dump($inputAddress);
      //  var_dump($inputInsurance); 
      //  var_dump($inputPrivacy);
      //  var_dump($_SESSION['cand_profile_id']); //User ID, sprich Werbe ID für candidates
      //  end();
        
       
        
        
        
            $error = Toolkit::checkCandFieldsForm(array('inputFirstname' => $inputFirstname, 'inputLastname' => $inputLastname, 
               'inputAddress' => $inputAddress, 'inputPLZ' => $inputPLZ, 'inputLocation' => $inputLocation, 'inputPhone' => $inputPhone,
                'inputPhone' => $inputPhone, 'inputPrivacy' => $inputPrivacy));
            
                
                
                    $objUser = $this->model('cand_recruit');
                    
                    
                    //var_dump($objUser); end();
                   
                        
                    
                        
//                        if(isset($inputPhone) && !empty($inputPhone)){
//                            $time = time();
//                            $objUser->phone_id = $inputPhone;
//                            $objUser->phone_activation_code = md5($time.$inputPhone);
//                            $inputLoginPassword = $objUser->generatePassword(12);
//                            var_dump($objUser->phone_activation_code);
//                            
//                        }
                       
                     //   var_dump($status);
                       
                        try{       
                            $status = $objUser->save();
                           // var_dump($status);
                        } catch (Exception $ex) {
                            $logger->error('Beim User speichern ist ein Fehler aufgetreten.');
                            $logger->debug('User-Save Exception:', $ex->getMessage());
                            $logger->debug('User-Save Error:', $status);
                        }
                                
                       
                            if(isset($inputPhone)){
                                if(isset($inputPhone) && !empty($inputMobile)){                        
                                    $arrPhoneNumber = $phoneUtil->parse($inputPhone, $arrCountry->code);
                                    $isValid = $phoneUtil->isValidNumber($arrPhoneNumber);
                                    if($isValid){
                                    }
                                }
                            }
                            
                            
                          $controller = new Controller(); 
                          $objCandRecruit = $controller->model('cand_recruit');
                          $_SESSION['cand_recruit_id'] = $objCandRecruit->cand_recruit_id;
                          
                          
                          //  var_dump($objCandRecruit);
                            
                            $objCandRecruit = $this->model('cand_recruit');
                         // $objCandRecruit->cand_recruit_id = $_SESSION['cand_recruit_id'];
                            $objCandRecruit->esrc =  $_SESSION['cand_profile_id'];
                            $objCandRecruit->f_name = $inputFirstname;
                            $objCandRecruit->l_name = $inputLastname;   
                            $objCandRecruit->address = $inputAddress;
                            $objCandRecruit->plz    = $inputPLZ;
                            $objCandRecruit->location = $inputLocation;
                            $objCandRecruit->phone = $inputPhone;
                            $objCandRecruit->privacy = $inputPrivacy;
                            
                            if($error == true){
                                // var_dump($error[]);
                            }
               
                            try {
                                $status = $objCandRecruit->save();
                      
                            } catch (Exception $ex) {
                                $logger->error('Beim speichern des User-Profils ist ein Fehler aufgetreten.');
                                $logger->debug('User-Profil Exception: ',$ex->getMessage());
                                $logger->debug('Profil-Save: ',$status);
                             
                                
                            }
                            
                            
                               
                            if($status == true){
                         //       $_SESSION['cand_profile_id'] = $objCandProfile->cand_profile_id;
                                $objCandProfileFile = $this->model('cand_profile');
                                if(isset($_FILES['cvFiles']['tmp_name'])){
                                    foreach($_FILES['cvFiles']['tmp_name'] as $fileIndex => $fileTmp){
                                        $status = $objCandProfileFile->uploadCV($objCandProfile->cand_profile_id, $_FILES['cvFiles']['name'][$fileIndex], $_FILES['cvFiles']['tmp_name'][$fileIndex]);
                                    }
                                }
                                $objSwiftMailer = new Swiftmailer();
                                $arrMail['subject'] = 'Ihre planova Zugangsdaten';
                                $arrMail['to']= $inputEmail;
                                $arrMail['body']= '<html><body style="font-family: Calibri, Arial, Helvetica, sans-serif; font-size: 12pt;">
                                                  <p>Sehr geehrte Damen und Herren<br/><br/>
                                                  Sie wurden von  angeworben.
                                                  <br/><br/>
                                                  Melden Sie sich bitte telefonisch bei uns! Unsere Kontaktdaten finden Sie hier: <a href="https://www.planova.ch">https://www.planova.ch</a><br/>
                                                  Unsere Allgemeinen Geschäftsbedingungen finden Sie unter <a href="https://www.planova.ch/agb">https://www.planova.ch/agb</a><br/><br/>
                                                  Mit freundlichen Grüssen<br/>
                                                  Ihr planova Team</p>
                                                '. '</body></html>';
                                $arrMail['message']= 'Sehr geehrte Damen und Herren

                                                    Ihre planova-Benutzerdaten:
                                                    Benutzername: '.$inputEmail.'
                                                    Passworts: '.$inputLoginPassword.'

                                                    Sie können sich ab sofort unter https://www.planova.ch einloggen! Unsere
                                                    Allgemeinen Geschäftsbedingungen finden Sie unter
                                                    https://www.planova.ch/agb

                                                    Mit freundlichen Grüssen
                                                    Ihr planova Team';
                                $objSwiftMailer->sendHtmlMail($arrMail);

                                $success = "Vielen Dank für die Weitervermittlung.";
                                
                              
                                
                            }else{
                                $error[] = 'Daten konnten nicht gespeichert werden.';
                                $logger->debug('Profil-Save Error: ',$status);
                            } 
                        
                    
               
            
        
        
        $this->view('Affiliate',array('title' => $title,'error' => $error, 'success' => $success));
    }
    
    public function affiliate(){
        
        if(!isset($_SESSION['logged'])){
            $location = WEB_URL.'/Candidate/affiliate';
            header("Location: $location");
        }
        $cand_profile_id = $_SESSION['cand_profile_id'];
        $success = '';
        $error = '';
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $objCountry = $this->model('value_country');
        $arrCountry = $objCountry->get();
        
        $objAvailable = $this->model('value_available_from');
        $arrAvailable = $objAvailable->get();
        
        $objEmployment = $this->model('value_employment');
        $arrEmplyment = $objEmployment->get();
        
        $arrInputForm = array();
        $arrInputForm['cand_profile_id'] = $_SESSION['cand_profile_id'];
        $arrInputForm['salutation'] = Toolkit::getPost('salutation',0);
        $arrInputForm['f_name'] = Toolkit::getPost('firstname','');
        $arrInputForm['l_name'] = Toolkit::getPost('lastname','');
        $arrInputForm['birthday'] = Toolkit::getPost('birthday','');
        $arrInputForm['ahv-number'] = Toolkit::getPost('ahv-number','');
        $arrInputForm['street'] = Toolkit::getPost('street','');
        $arrInputForm['zip'] = Toolkit::getPost('zip','');
        $arrInputForm['city'] = Toolkit::getPost('city','');
        $arrInputForm['nationality'] = Toolkit::getPost('nationality',0);
        $arrInputForm['country'] = Toolkit::getPost('country',0);
        $task = Toolkit::getPost('task','');
        $arrInputForm['phone'] = $arrInputForm['profession'] = $arrInputForm['mobile'] = $arrInputForm['mail']= '';

        $arrCVFiles= $arrAttachements ='';

        if(isset($_SESSION['create_Profile']) && $_SESSION['create_Profile'] == true){
            if(Toolkit::getPost('form') == 'affiliate'){
                $validation = $this->validateProfileData($arrInputForm);
                $error = Toolkit::checkCandFields(array('inputFirstname' => $arrInputForm['f_name'], 'inputLastname' => $arrInputForm['l_name'], 
                'inputBirthday' => $arrInputForm['birthday'], 'inputAHVnumber' => $arrInputForm['ahv-number'], 
                'inputCountry' => $arrInputForm['country'], 'inputNationality' => $arrInputForm['nationality']));
                if(empty($error)){
                    $objCandProfile = $this->model('cand_profile');
                    $objCandProfile->cand_user_id = $_SESSION['cand_user_id'];
                    $objCandProfile->gender = $arrInputForm['salutation'];
                    $objCandProfile->f_name = $arrInputForm['f_name'];
                    $objCandProfile->l_name = $arrInputForm['l_name'];
                    $objCandProfile->birthday = date('Y-m-d', strtotime($arrInputForm['birthday']));
                    $objCandProfile->ahv_number =  $arrInputForm['ahv-number'];
                    $objCandProfile->nationality =  $arrInputForm['nationality'];
		    $objCandProfile->source_url =  $_SESSION['org_referer'];
                    $objCandProfile->esrc =  $_SESSION['esrc'];
                    $status = $objCandProfile->save();
                    if($status == true){
                        $_SESSION['cand_profile_id'] = $objCandProfile->cand_profile_id;
                        $objCandAdress = $this->model('cand_address');
                        $objCandAdress->cand_profile_id = $_SESSION['cand_profile_id'];
                        $objCandAdress->type = 'private';
                        $objCandAdress->street = $arrInputForm['street'];
                        $objCandAdress->zip = $arrInputForm['zip'];
                        $objCandAdress->city = $arrInputForm['city'];
                        $objCandAdress->country_id = $arrInputForm['country'];
                        $status = $objCandAdress->save();
                        $_SESSION['create_Profile'] = false;
                        $success = 'Ihre Daten wurden erfolgreich gespeichert.';
                    }else{
                        $error[] = 'Daten konnten nicht gespeichert werden.';
                    }                    
                }else{
                    $error[]= $validation;
                }
            }          
        }else{
            
            if(Toolkit::getPost('form') == 'contact'){
                
                $objCandAdress = $this->model('cand_address');
                $arrCandAdress = $objCandAdress->where('cand_profile_id',$_SESSION['cand_profile_id'])
                                ->where('TYPE', 'private')
                                ->join('value_country', 'cand_address.country_id', '=', 'value_country.country_id')->get();
                if(!isset($arrCandAdress[0]['code'])){
                    $arrCandAdress[0]['code'] = 'CH';
                }
                
                $arrPhone['phone'] = Toolkit::getPost('phone', '');
                $arrPhone['mobile'] = Toolkit::getPost('mobile', '');
                $arrPhone['mail'] = Toolkit::getPost('mail', '');
                
                 if(!empty($arrPhone['phone']) or $arrPhone['mobile'] or $arrPhone['mail']){
                    $objCandProfile = $this->model('cand_profile');
                    $phoneProfile = $objCandProfile::find($_SESSION['cand_profile_id']);
                 }
                if(!empty($arrPhone['phone'])){
                     $arrPhoneNumber = $phoneUtil->parse($arrPhone['phone'], $arrCandAdress[0]['code']);
                     $isValid = $phoneUtil->isValidNumber($arrPhoneNumber);
                     
                     if($isValid){
                        $phoneProfile->phone = $phoneUtil->format($arrPhoneNumber, \libphonenumber\PhoneNumberFormat::E164);
                     }else{
                         $error = "Bitte Telefonnummer korrekt eingeben.";
                     }
                }

                if(!empty($arrPhone['mobile'])){
                    $arrMobileNumber = $phoneUtil->parse($arrPhone['mobile'], $arrCandAdress[0]['code']);
                    $isValid = $phoneUtil->isValidNumber($arrMobileNumber);

                    if($isValid){
                        $phoneProfile->mobile = $phoneUtil->format($arrMobileNumber, \libphonenumber\PhoneNumberFormat::E164);
                    }else{
                        $error = "Bitte Mobile korrekt eingeben.";
                    }
                }
                
                if(!empty($arrPhone['mail'])){
                    if (filter_var($arrPhone['mail'], FILTER_VALIDATE_EMAIL)) { 
                        $phoneProfile->mail =  $arrPhone['mail'];
                    }
                }
                
                
                if(!isset($error) && empty($error)){
                    if(!empty($arrPhone['phone']) or $arrPhone['mobile'] or $arrPhone['mail']){
                        $status = $phoneProfile->save();
                        $success = "Daten wurden erfolgreich gespeichert.";
                    }
                    
                }
            }
            
            /*
               $phoneObj = $phoneObj->where('workdemand_id','=',$result['workdemand_id'])
            ->join('phone_number','rel_phone_number.phone_number_id','=','phone_number.phone_number_id')
            ->join('value_country','phone_number.country_id','=','value_country.country_id')->get()->toArray();
              
             
            
            
                $ObjCandProfile = $this->model('cand_profile');
                
                $countPoints = $ObjCandProfile->where('esrc', $_SESSION['cand_profile_id'])
                                              ->count();
                
                var_dump("test");
                var_dump($countPoints);
                end();
            */
            
            if(Toolkit::getPost('form') == 'extra'){
                $arrExtra['profession'] = Toolkit::getPost('profession', '');
                $arrExtra['employment'] = Toolkit::getPost('employment', '');
                $arrExtra['available']  = Toolkit::getPost('available', '');
                $objExtraProfile = $this->model('cand_profile');
                $extraProfile = $objExtraProfile::find($_SESSION['cand_profile_id']);
                
                if(!empty($arrExtra['profession'])){
                    $extraProfile->profession = $arrExtra['profession'];
                }
                
                if(!empty( $arrExtra['employment']) && is_numeric( $arrExtra['employment'])){
                    $extraProfile->employment = $arrExtra['employment'];
                }
                
                if(!empty( $arrExtra['available']) && is_numeric( $arrExtra['available'])){
                    $extraProfile->available_from_id = $arrExtra['available'];
                }
                
                $status = $extraProfile->save();
                if($status){
                    $success = "Daten wurden erfolgreich gespeichert.";
                }
            }
            
            if(Toolkit::getPost('form') == 'cvupload'){
                $objCandProfileFile = $this->model('cand_profile');
                $status = $objCandProfileFile->uploadCV($_SESSION['cand_profile_id'], $_FILES['userfile']['name'], $_FILES['userfile']['tmp_name']);
                if($status){
                    $success = "Datei wurde erfolgreich hochgeladen.";
                }else{
                    $error = "Datei konnte nicht gespeichert werden. Mögliche Formate: PDF, JPEG, JPG, PNG, DOC, RTF (maximal 10MB)";
                }
            }
            
            if(Toolkit::getPost('form') == 'attachementupload'){
                $objCandProfileFile = $this->model('cand_profile');
                
                $status = $objCandProfileFile->uploadAttachement($_SESSION['cand_profile_id'], $_FILES['userfile']['name'], $_FILES['userfile']['tmp_name']);
                if($status){
                    $success = "Datei wurde erfolgreich hochgeladen.";
                }else{
                    $error = "Datei konnte nicht gespeichert werden. Mögliche Formate: PDF, JPEG, JPG, PNG, DOC, RTF (maximal 10MB)";
                }
            }

            if ($task == 'edit') {
                $objCandProfile = $this->model('cand_profile');
                $profile = $objCandProfile::find($_SESSION['cand_profile_id']);
                $profile->cand_user_id = $_SESSION['cand_user_id'];
                $error = Toolkit::checkCandFields(array('inputFirstname' => $arrInputForm['f_name'], 'inputLastname' => $arrInputForm['l_name'], 
                'inputBirthday' => $arrInputForm['birthday'], 'inputAHVnumber' => $arrInputForm['ahv-number']));
                if(empty($error)){
                    if(empty($profile->hrc_cand_accounting_number)){
                        $profile->gender = $arrInputForm['salutation'];
                        $profile->f_name = $arrInputForm['f_name'];
                        $profile->l_name = $arrInputForm['l_name'];
                        $profile->birthday = date('Y-m-d', strtotime($arrInputForm['birthday']));
                    }
                    if(empty($profile->hrc_cand_accounting_number) || (!empty($profile->hrc_cand_accounting_number) && empty($profile->ahv-number))){
                        $profile->ahv_number = $arrInputForm['ahv-number'];
                    }
                    $profile->nationality = $arrInputForm['nationality'];
                    $status = $profile->save();
                    if ($status == true) {
                        if(isset($_SESSION['cand_address_id']) && !empty($_SESSION['cand_address_id'])){
                            $objCandAddress = $this->model('cand_address');
                            $address = $objCandAddress->find($_SESSION['cand_address_id']);
                        }else{
                            $address = $this->model('cand_address');
                            $address->type = 'private';
                            $address->cand_profile_id = $_SESSION['cand_profile_id'];
                        }                   

                        $address->street = $arrInputForm['street'];
                        $address->zip = $arrInputForm['zip'];
                        $address->city = $arrInputForm['city'];
                        $address->country_id = $arrInputForm['country'];
                        $status = $address->save();

                        $success = 'Ihre Daten wurden erfolgreich gespeichert.';
                    }
                }
            }
            
            if(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])){
                
                $objProfile = $this->model('cand_profile');
                $arrProfile = $objProfile->where('cand_profile_id',$_SESSION['cand_profile_id'])
                                         ->where('cand_user_id',$_SESSION['cand_user_id'])
                                         ->first();
                $objCandAdress = $this->model('cand_address');
                $arrAddress = $objCandAdress->where('cand_profile_id',$_SESSION['cand_profile_id'])
                                            ->where('type','private')
                                            ->get();
                $_SESSION['cand_address_id'] = $arrAddress[0]->cand_address_id;
                $arrInputForm = array();
                $arrInputForm['salutation'] = $arrProfile->gender;
                $arrInputForm['f_name'] = $arrProfile->f_name;
                $arrInputForm['l_name'] = $arrProfile->l_name;
                $arrInputForm['birthday'] = $arrProfile->birthday;
                $arrInputForm['ahv-number'] = $arrProfile->ahv_number;
                if(!empty($arrProfile->phone)){
                    $arrInputForm['phone'] = $phoneUtil->format($phoneUtil->parse($arrProfile->phone, 'CH'), \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
                }else{
                    $arrInputForm['phone'] = '';
                }
                
                if(!empty($arrProfile->mobile)){
                    $arrInputForm['mobile'] = $phoneUtil->format($phoneUtil->parse($arrProfile->mobile, 'CH'), \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
                }else{
                    $arrInputForm['mobile'] = '';
                }
                $arrInputForm['profession'] = $arrProfile->profession;
                $arrInputForm['employment'] = $arrProfile->employment;
                $arrInputForm['available'] = $arrProfile->available_from_id;
                $arrInputForm['mail'] = $arrProfile->mail;
                $arrInputForm['street'] = $arrAddress[0]->street;
                $arrInputForm['zip'] = $arrAddress[0]->zip;
                $arrInputForm['city'] = $arrAddress[0]->city;
                $arrInputForm['nationality'] = $arrProfile->nationality;
                $arrInputForm['country'] = $arrAddress[0]->country_id;
                $arrInputForm['hrc_cand_accounting_number'] = $arrProfile->hrc_cand_accounting_number;
                $arrInputForm['hrc_cand_id'] = $arrProfile->hrc_cand_id;
                
                
                
                $arrCVFiles = $objProfile->getCVFilesList($_SESSION['cand_profile_id']);
                $arrAttachements = $objProfile->getAttachementFilesList($_SESSION['cand_profile_id']);
            }
            
        } 
        
                $candProfile = $this->model('cand_profile');
                
                $objCandRecruit = $this->model('cand_recruit');
                
                $candInputForm = array();
                $candInputForm['cand_profile_id'] = $_SESSION['cand_profile_id']; 
                $candInputForm['f_name'] = $arrInputForm['street'];
                
                $ObjCandProfile = $this->model('cand_profile');
                $pointsMultiplier = 5;
                
                $invitationLinkPoints = $pointsMultiplier * $ObjCandProfile->where('esrc', $_SESSION['cand_profile_id'])
                                                                            ->count(); 
                
                $invitationFormPoints = $pointsMultiplier * $ObjCandProfile->where('esrc', $_SESSION['cand_profile_id'])
                                                                            ->count(); 
            
                
                
                          
                          
                
                            
                
                
                $arrInputForm['invitation_link'] = $invitationLinkPoints;
                $arrInputForm['invitation_form'] = $invitationFormPoints;
                
                
        
        $this->view('Affiliate', array('value_country' => $arrCountry,
                                            'value_available' => $arrAvailable,
                                            'value_employment' => $arrEmplyment,
                                            'profile_form' => $arrInputForm,
                                            'cvfiles' => $arrCVFiles,
                                            'attachements' => $arrAttachements,
                                            'success' => $success,
                                            'error' => $error,
                                            'cand_form' => $candInputForm));
    }
    
    public function viewPayRollFile(){
        $fileName = Toolkit::getVar('fileName',0);
        $fileDownload = Toolkit::getVar('fileDownload',2);
        if(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id']) && !empty($fileName)){
            $filePath = APPLICATION .'/database/FileDatabase/'.$_SESSION['cand_profile_id']. '/Payroll/'.$fileName;
            if($fileDownload == 1){
                header("Cache-Control: no-cache, must-revalidate");
                header("Expires: Fri, 26 Jun 1988 15:06:00 GMT");        
                header("Content-type: application/pdf; charset=utf-8");
                header("Content-Disposition: attachment; filename=\"{$fileName}\"");
                echo file_get_contents($filePath);
            }else{
                if(preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false)){
                    header("Cache-Control: no-cache, must-revalidate");
                    header("Expires: Fri, 26 Jun 1988 15:06:00 GMT");        
                    header("Content-type: application/pdf; charset=utf-8"); 
                    header("Content-Length: " . strlen(file_get_contents($filePath)));
                    header("Content-Disposition: inline; filename=\"{$fileName}\"");
                    echo file_get_contents($filePath);
                }else{
                    echo '<html><body style="width:100%; height:100%;"><object data="data:application/pdf;base64,'.base64_encode(file_get_contents($filePath)).'" style="overflow:hidden; width:100%; height:100%;"></object></body></html>';
                }
            }
        }        
    }

    public function viewCandidateFiles(){
        $fileName = Toolkit::getVar('fileName',0);
        $fileDownload = Toolkit::getVar('fileDownload',2);
        $fileType = Toolkit::getVar('t',1);
        $objCandProfile = $this->model('cand_profile');
        if(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id']) && !empty($fileName) && !empty($fileType)){
            $fileTypeName = $fileType == 1 ? 'CV' : 'Attachements';
            $filePath = APPLICATION .'/database/FileDatabase/'.$_SESSION['cand_profile_id']. '/'.$fileTypeName.'/'.$fileName;
            $fileInfo = pathinfo($filePath);
            $fileMime = $objCandProfile->getSingleMimeType($fileInfo['extension']);   
            if($fileDownload == 1){
                header("Cache-Control: no-cache, must-revalidate");
                header("Expires: Fri, 26 Jun 1988 15:06:00 GMT");        
                header("Content-type: ".$fileMime."; charset=utf-8");
                header("Content-Disposition: attachment; filename=\"{$fileInfo['basename']}\"");
                echo file_get_contents($filePath);
            }else{
                header("Cache-Control: no-cache, must-revalidate");
                header("Expires: Fri, 26 Jun 1988 15:06:00 GMT");      
                header("Content-type: ".$fileMime."; charset=utf-8"); 
                header("Content-Disposition: inline; filename=\"{$fileInfo['basename']}\"");
                echo file_get_contents($filePath); 
            }
        }
    }
    
    private function validateProfileData($arrInput) {
        $error = '';
        if (!is_numeric($arrInput['country'])) {
            $error[] = 'Bitte Land auswählen.';
        }

        if (!is_numeric($arrInput['nationality'])) {
            $error[] = 'Bitte Nationalität auswählen.';
        }
        
        if(empty($error)){
            return true;
        }
        
        return $error;
    }

    public function login($status='login'){
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
            $location = WEB_URL.'/Candidate/Dashboard';
            header("Location: $location");
        }        
        $loginClass = $lostpwClass = $regClass  =  null;
        switch ($status){
            case 'login':
                $loginClass = 'active';
                break;
            case 'lostpw':
                $lostpwClass = 'active';
                break;
            default :
                $regClass = 'active';
        }
        
        $success = true;
        $error = array();
        $email = Toolkit::getPost('email','');
        $pw = Toolkit::getPost('password','');
        
        if(!empty($email) && !empty($pw)){
            $objUser = $this->model('cand_user');
            $status = $objUser->checkLogin($email, $pw);
            if($status == true){
                if(isset($_SESSION['create_Profile']) && $_SESSION['create_Profile'] == true){
                    $location = WEB_URL.'/Candidate/profile';
                    header("Location: $location");
                }elseif(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
                    $location = WEB_URL.'/Candidate/Dashboard';
                    header("Location: $location");
                }
            }else{
                $error[] = 'Es tut uns leid, wir konnten dich nicht anmelden.';
            }
        }
        
         $this->view('Register',array('error' => $error,
                                     'success' => $success,
                                     'email' => $email,
                                     'loginClass' => $loginClass,
                                     'lostpwClass' => $lostpwClass,
                                     'registerClass' => $regClass));
    }
    
    public function activateAccount(){
        $md5Key = Toolkit::getVar('akey', 0);
        if(!empty($md5Key) && strlen($md5Key) == '32'){
            $objMigProfile = $this->model('import_candidate');
            $arrMigProfile = $objMigProfile->where('md5_key',$md5Key)
                                            ->first();
            $regClass = 'active';
            $this->view('Register',array('error' => $error,
                                     'success' => $success,
                                     'email' => strtolower($arrMigProfile->login_email),
                                     'akey' => $md5Key,
                                     'registerClass' => $regClass));
        }else{
            // Key Ungültig
            echo "Error";
        }
    }
    
    public function loggout(){
        $location = WEB_URL.'/';
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
            session_destroy ();
        }
        header("Location: $location");
    }
    
    public function apply(){
        $this->view('Apply');
    }
    
    public function getMonthNumbers($month){
        if(empty($month)){ return ''; }

        switch($month){
            case 'Januar':
                return 1;
            case 'Februar':
                return 2;
            case 'März':
                return 3;
            case 'April':
                return 4;
            case 'Mai':
                return 5;
            case 'Juni':
                return 6;
            case 'Juli':
                return 7;
            case 'August':
                return 8;
            case 'September':
                return 9;
            case 'Oktober':
                return 10;
            case 'November':
                return 11;
            case 'Dezember':
                return 12;  
            default:
                return '';
        }
    }
    
    public function Payroll(){
        $arrTempFiles = array();
        $arrFiles = array();
        if(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])){
            $payRollPath = APPLICATION .'/database/FileDatabase/'.$_SESSION['cand_profile_id']. '/Payroll/';
            foreach (glob($payRollPath."*.pdf") as $filename) {
                $pathInfo = pathinfo($payRollPath.$filename);
                $arrTempFiles[] = $pathInfo;
            }
        } 

        if(!empty($arrTempFiles)){ 
            foreach($arrTempFiles as $fileKey => $fileData){
                $arrFileName = explode('_',$fileData['filename']);
                $monthNumber = $this->getMonthNumbers($arrFileName[5]);
                $arrFiles[$arrFileName[6]][$monthNumber][] = $fileData;

            }
            krsort($arrFiles);
        }
        $this->view('Payroll',array('payrollFiles' => $arrFiles));
    }
    
    public function ActivateMobile() {
        $mobile = Toolkit::getVar('tel', 0);
        $error = '';
        if (!empty($mobile)) {
            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            if (!empty($mobile)) {
                try{
                    $arrPhoneNumber = $phoneUtil->parse($mobile, 'CH');
                    $isValid = $phoneUtil->isValidNumber($arrPhoneNumber);
                } catch (\libphonenumber\NumberParseException $e) {
                    $error = $e;
                }

                if ($isValid) {
                    $mobileNumberFormat = $phoneUtil->format($arrPhoneNumber, \libphonenumber\PhoneNumberFormat::E164);
                    require_once APPLICATION.'/class/ClassSMS.php';
                    $objSMS = new SMS(SMS_SHORT_NAME);
                    $objSMS->sendActivationCode($mobileNumberFormat);
                } else {
                    $error = "Bitte Mobiltelefonnummer korrekt mit vorwahl eingeben.";
                }
            }else{
                $error = "Bitte Mobiltelefonnummer korrekt mit vorwahl eingeben.";
            }
        }else{
            $error ='Bitte Mobiltelefonnummer korrekt mit vorwahl eingeben. ERR 613';
        }
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Pragma: no-cache"); // HTTP/1.0
        header("Content-Type: application/json");
        
        echo json_encode(array('error' => $error));
    }
	
	public function Game(){
		if(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])){
			$objWMCoupons = $this->model('temp_wm_coupon');
			$arrCoupons = $objWMCoupons->where('wm_coupon_cand_profile_id',$_SESSION['cand_profile_id'])->get();

			$this->view('Game', ['coupons' => $arrCoupons]);
		}
			
	}

	public function changePassword(){

        if(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])){
            $task  = Toolkit::getPost('task','');
            $error = '';
            $success = '';
            if(!empty($task) && $task == 'changePassword'){
                $objCandUser = $this->model('cand_user');
                $userData = $objCandUser::find($_SESSION['cand_user_id']);
                $oldPassword  = Toolkit::getPost('oldpassword','');
                $newPassword  = Toolkit::getPost('newpassword','');
                $newPassword2 = Toolkit::getPost('newpassword2','');

                if($userData['pw'] == $oldPassword && $newPassword == $newPassword2){
                    $success = 'Passwort wurde erfolgreich gespeichert.';
                    $candUserObj = $objCandUser::find($_SESSION['cand_user_id']);
                    $arrSaveData = ['pw' => $newPassword];
                    $result = $candUserObj->fill($arrSaveData)->save();
                }elseif($userData['pw'] != $oldPassword){
                    $error = 'Aktueller Passwort ist falsch.';
                }elseif($newPassword != $newPassword2){
                    $error = 'Die Passwörter stimmen nicht überein. Erneut versuchen?';
                }
            }
            
            $this->view('ChangePassword', ['success' => $success, 'error' => $error]);
        }else{
            $location = WEB_URL.'/Candidate/login';
            header("Location: $location");
        }
    }
    
}