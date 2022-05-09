<?php

class Pages extends Controller
{
    public function index(){
         echo "Wegen Wartungsarbeiten ist diese Seite vorübergehend nicht erreichbar.";
    }
    
    public function anmelden(){ 
        $location = WEB_URL.'/Candidate/login';
        header("Location: $location"); 
    }
    
    public function kontakt(){ 
        $arrInputForm = array();
        $error = $success = '';
        $title = "Direktkontakt zu unseren Filialen";
        $task = Toolkit::getPost('task',0);
        $arrInputForm['name'] = Toolkit::getPost('name','');
        $arrInputForm['email'] = Toolkit::getPost('email','');
        $arrInputForm['subject'] = Toolkit::getPost('subject','');
        $arrInputForm['message'] = Toolkit::getPost('message','');
        if($task === 'sendcontact'){
            $valmail = filter_var($arrInputForm['email'], FILTER_VALIDATE_EMAIL);
            if(!empty($arrInputForm['email'])){
                if ($valmail == false) { 
                    $arrInputForm['email'] =  '';
                    $error = 'Bitte Mail Adresse prüfen';
                } 
            }elseif(empty($arrInputForm['email'])){
                $error = 'Bitte tragen Sie Ihre E-Mail Adresse ein!';
            }
            
            if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
                // Build POST request:
                $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                $recaptcha_secret = RECAPTCHA_SECRET_KEY;
                $recaptcha_response = $_POST['recaptcha_response'];

                // Make and decode POST request:
                $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                $recaptcha = json_decode($recaptcha);

                // Take action based on the score returned:
                if ($recaptcha->score >= 0.7) {
                    // Verified - send email
                } else {
                    // Not verified - show form error
                    $error = 'Es ist ein Fehler aufgetreten. Bitte versuchen Sie es bitte nochmals.';
                }
            }
            
            if(!empty($arrInputForm['name']) && !empty($arrInputForm['email']) 
                    && !empty($arrInputForm['subject']) && !empty($arrInputForm['message']) && empty($error)){
                $objContact = $this->model('contacts');
                $objContact->name = $arrInputForm['name'];
                $objContact->mail = $arrInputForm['email'];
                $objContact->subject = $arrInputForm['subject'];
                $objContact->message = $arrInputForm['message'];
                if(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])){
                    $objContact->contact_profile_id = $_SESSION['cand_profile_id'];
                }
                if(isset($_SESSION['cand_user_id']) && !empty($_SESSION['cand_user_id'])){
                    $objContact->contact_user_id = $_SESSION['cand_user_id'];
                }
                $status = $objContact->save();
                
                if($status == true){
                    $success = 'Danke! Ihre Nachricht ist bei uns angekommen.';
                    $objSwiftMailer = new Swiftmailer();
                    $arrMail['subject'] = $arrInputForm['subject'].' - Absender:'.$arrInputForm['email'];
                    $arrMail['to']= DEFAULT_MAIL_RECEIVER;
                    $arrMail['body']= $arrInputForm['message'];
                    $arrMail['message']= $arrInputForm['message'];
                    $objSwiftMailer->sendMail($arrMail);
                }else{
                    $error = 'Ihre Nachricht konnte nicht übermittelt werden.';
                }
            }
        } 
        $this->view('kontakt', array('title' => $title,
                                    'input' => $arrInputForm,
                                    'error' => $error,      
                                    'success' => $success));
    }
    
    public function jobs_schweiz(){ 
        $title = "Arbeiten in der Schweiz (Info für EU Bürger)";
        $this->view('jobs-schweiz', array('title' => $title));
    }
    
    public function jobs_interview(){
        $title = "Das Interview (Vorstellung)";
        $this->view('JobsInterview', array('title' => $title));
    }
    
    public function jobs_bewerben(){
        $title = "Wie bewerbe ich mich richtig?";
        $this->view('JobsBewerben', array('title' => $title));
    }
    
    public function arbeit_suchen(){
        $title = "Wie finde ich den passenden Job?";
        $this->view('ArbeitSuchen', array('title' => $title));
    }
    
    public function weiterbildung(){
        $title = "Weiterbildung";
        $this->view('Weiterbildung', array('title' => $title));
    }
   
    public function qualitaet(){
        $title = "Fachbereiche";
        $this->view('Qualitaet', array('title' => $title));
    }
    
    public function fachbereiche(){
        $title = "Fachbereiche";
        $this->view('Fachbereiche', array('title' => $title));
    }
    
    public function ueber_planova(){
        $title = "Über Planova";
        $this->view('UeberPlanova', array('title' => $title));
    }
    
    public function mitarbeiter_finden(){
        $title = "Für Bewerber";
        $arrInputForm = array();
        $error = $success = '';
        $arrInputForm['name'] = Toolkit::getPost('name','');
        $arrInputForm['email'] = Toolkit::getPost('email','');
        $arrInputForm['subject'] = Toolkit::getPost('subject','');
        $arrInputForm['message'] = Toolkit::getPost('message','');       
        if(Toolkit::getPost('task',0) == 'sendcontact'){

            $valmail = filter_var($arrInputForm['email'], FILTER_VALIDATE_EMAIL);
            if(!empty($arrInputForm['email'])){
                if ($valmail == false) { 
                    $arrInputForm['email'] =  '';
                    $error = 'Bitte Mail Adresse prüfen';
                } 
            }
            
            if(!empty($arrInputForm['name']) && !empty($arrInputForm['email']) 
                    && !empty($arrInputForm['subject']) && !empty($arrInputForm['message']) && empty($error)){
                $objContact = $this->model('contacts');
                $objContact->name = $arrInputForm['name'];
                $objContact->mail = $arrInputForm['email'];
                $objContact->subject = $arrInputForm['subject'];
                $objContact->message = $arrInputForm['message'];
                if(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])){
                    $objContact->contact_profile_id = $_SESSION['cand_profile_id'];
                }
                if(isset($_SESSION['cand_user_id']) && !empty($_SESSION['cand_user_id'])){
                    $objContact->contact_user_id = $_SESSION['cand_user_id'];
                }
                $status = $objContact->save();
                
                if($status == true){
                    $success = 'Vielen Dank für Ihre Nachricht! <br />Wir melden uns so schnell wie möglich bei Ihnen.';
                    $objSwiftMailer = new Swiftmailer();
                    $arrMail['subject'] = $arrInputForm['subject'].' - Absender:'.$arrInputForm['email'];
                    $arrMail['to']= DEFAULT_MAIL_RECEIVER;
                    $arrMail['body']= $arrInputForm['message'];
                    $arrMail['message']= $arrInputForm['message'];
                    $objSwiftMailer->sendMail($arrMail);
                }else{
                    $error = 'Ihre Nachricht konnte nicht übermittelt werden.';
                }
            }
        }
        $this->view('MitarbeiterFinden', array('title' => $title,
                                    'input' => $arrInputForm,
                                    'error' => $error,      
                                    'success' => $success));
    }
    
    public function candidate(){
        $title = "Für Bewerber";
        $this->view('Candidate', array('title' => $title));
    }
    
    public function swissstaffing(){
        $title = "Qualitätsanspruch";
        $this->view('SwissStaffing', array('title' => $title));
    }
    
    public function datenschutz(){
        $title = "Datenschutz";
        $this->view('Datenschutz', array('title' => $title));
    }
    
    public function aboutPlanova(){
        $title = "Über planova";
        $this->view('AboutPlanova', array('title' => $title));
    }
    
    public function aboutBrefis(){
        $title = "Über brefis";
        $this->view('AboutBrefis', array('title' => $title));
    }
    
    public function aboutAha(){
        $title = "Über aha";
        $this->view('AboutAha', array('title' => $title));
    }
    
    public function citizeninfo(){
        $title = "EU-Bürger Info";
        $this->view('CitizenInfo', array('title' => $title));
    }
    
    public function company(){
        $title = "Für Unternehmen";
        $this->view('ForCompany', array('title' => $title));
    }
    
    public function companyService(){
        $title = "Dienstleistungen";
        $this->view('CompanyService', array('title' => $title));
    }
    
    public function companydivisions(){
        $title = "Fachbereiche";
        $this->view('CompanyDivisions', array('title' => $title));
    }
    
    public function career(){
        $objVac = $this->model('vac_info');
        $query = $objVac->Online();
        $arrInternalVac = $query->Internal()->get();
        $title = "Karriere bei Planova";
        $this->view('CompanyCareer',array('title' => $title,
                                            'internalVac' => $arrInternalVac));
    }
    
    public function SpontanApply(){
        $title = "Spontanbewerbung";

        $logger = new Katzgrau\KLogger\Logger(APPLICATION.'/database/log/spontanApply');
        
        
        
        
        

        $success = '';
        $error = array();
        $inputTask = Toolkit::getPost('task', '');
        $inputFirstname = Toolkit::getPost('firstname', '');
        $inputLastname = Toolkit::getPost('lastname', '');
        $inputarrBirthday = Toolkit::getPost('birthdayPicker_birth', '');
        $inputProfession = Toolkit::getPost('profession', '');
        if(empty($inputarrBirthday)){
            $inputBirthday = Toolkit::getPost('birthday', '');
        }else{
            $inputBirthday = $inputarrBirthday['day'].'.'.$inputarrBirthday['month'].'.'.$inputarrBirthday['year'];
        }
        $inputCountry = Toolkit::getPost('country', '1');
        $inputMobile = Toolkit::getPost('phone', '');
        $inputEmail = Toolkit::getPost('email', '');
        $inputCVFile = Toolkit::getPost('cvFiles', '');
        
        //Einladungslink-Variablen
        $inputAffiliateSpontanApply = Toolkit::getPost('affiliate-spontan', '');
        
        if(!empty($inputTask) && empty($_SESSION['cand_profile_id'])){
            $error = Toolkit::checkCandFields(array('inputFirstname' => $inputFirstname, 'inputLastname' => $inputLastname, 
               'inputBirthday' => $inputBirthday, 'inputMobile' => $inputMobile, 'inputEmail' => $inputEmail));
            if((!empty($inputEmail)) && empty($error)){
                $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
                $objShortCountry = $this->model('value_country');
                $arrCountry = $objShortCountry->find($inputCountry);
                
                if((!empty($inputEmail) && filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) && !empty($inputMobile)){
                    $objUser = $this->model('cand_user');
                    $mailCount = $phoneCount = 0;
                    if(!empty($inputEmail)){
                        $mailCount = $objUser->where('address',$inputEmail)
                                ->join('email', 'cand_user.mail_id', '=', 'email.mail_id')
                                ->count();                      //Es zählt wie viele Mails vom angegeben Input bereits in der DB verfasst sind.
                    }
                     
                    if($mailCount > 0){ 
                        $error[] = "Es existiert bereits ein Konto mit dieser E-Mail Adresse.";
                    }else{
                        
                        if(isset($inputEmail) && !empty($inputEmail)){
                            $time = time();
                            $objUser->mail_id = $inputEmail;
                            $objUser->mail_activation_code = md5($time.$inputEmail);
                            $inputLoginPassword = $objUser->generatePassword(12);
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
                            if(isset($inputMobile)){
                                if(isset($inputMobile) && !empty($inputMobile)){                        
                                    $arrPhoneNumber = $phoneUtil->parse($inputMobile, $arrCountry->code);
                                    $isValid = $phoneUtil->isValidNumber($arrPhoneNumber);
                                    if($isValid){
                                       $inputMobile = $phoneUtil->format($arrPhoneNumber, \libphonenumber\PhoneNumberFormat::E164);
                                    }
                                }
                            }
                            
                            $_SESSION['cand_user_id'] = $objUser->cand_user_id;
                            
                            $objCandProfile = $this->model('cand_profile');
                            $objCandProfile->cand_user_id = $_SESSION['cand_user_id'];
                            $objCandProfile->source_url =  $_SESSION['org_referer'];
                
                            $objCandProfile->esrc =  $_SESSION['esrc'];
                            
                     
                            $objCandProfile->f_name = Toolkit::cleanName($inputFirstname);
                            $objCandProfile->l_name = Toolkit::cleanName($inputLastname);
                            $objCandProfile->birthday = date('Y-m-d', strtotime($inputBirthday));
                            $objCandProfile->profession = $inputProfession;
                            $objCandProfile->mail = $inputEmail;
                            $objCandProfile->mobile = $inputMobile;
                            $objCandProfile->spontanly = 1;
                            
                        //    var_dump($objCandProfile);

                            
                            
                            
                            //   var_dump($status);
                            //   var_dump($objCandProfile->f_name);
                            //   var_dump($objCandProfile);
                              
                            try {
                                $status = $objCandProfile->save();

                            } catch (Exception $ex) {
                                $logger->error('Beim speichern des User-Profils ist ein Fehler aufgetreten.');
                                $logger->debug('User-Profil Exception: ',$ex->getMessage());
                                $logger->debug('Profil-Save: ',$status);
                                
                            }
                            
                            
                               
                            if($status == true){
                                $_SESSION['cand_profile_id'] = $objCandProfile->cand_profile_id;
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
                                                  Ihre planova-Benutzerdaten:<br/>
                                                  Benutzername:  '.$inputEmail.'<br/>
                                                  Passwort:  '.$inputLoginPassword.'<br/><br/>
                                                  Sie können sich ab sofort unter <a href="https://www.planova.ch">https://www.planova.ch</a> einloggen!<br/>
                                                  Unsere Allgemeinen Geschäftsbedingungen finden Sie unter <a href="https://www.planova.ch/agb">https://www.planova.ch/agb</a><br/><br/>
                                                  Mit freundlichen Grüssen<br/>
                                                  Ihr planova Team</p>
                                                '. '</body></html>';
                                $arrMail['message']= 'Sehr Damen und Herren

                                                    Ihre planova-Benutzerdaten:
                                                    Benutzername: '.$inputEmail.'
                                                    Passworts: '.$inputLoginPassword.'

                                                    Sie können sich ab sofort unter https://www.planova.ch einloggen! Unsere
                                                    Allgemeinen Geschäftsbedingungen finden Sie unter
                                                    https://www.planova.ch/agb

                                                    Mit freundlichen Grüssen
                                                    Ihr planova Team';
                                $objSwiftMailer->sendHtmlMail($arrMail);

                                $success = "Vielen Dank für die Übermittlung Ihrer Spontanbewerbung.";
                               
                            }else{
                                $error[] = 'Daten konnten nicht gespeichert werden.';
                                $logger->debug('Profil-Save Error: ',$status);
                            } 
                        }
                    }
                }else{
                    $error[] = 'Bitte geben Sie eine E-Mail Adresse und eine Telefonnummer ein.';
                    $logger->error('Entweder E-Mail Adresse oder Telefonnummer fehlt.');
                    $logger->debug('Eingegebene E-Mail Adresse: ',$inputEmail);
                    $logger->debug('Eingegebene Telefonnummer: ',$inputMobile);
                }
            }
        }elseif(isset($_SESSION['cand_profile_id']) && !empty($_SESSION['cand_profile_id'])){
            
            $error[] = 'Sie haben sich bereits beworben.';          // Falls man sich schon eingeloggt hat und versucht eine Spontanbewerbung abzuschicken.
            
        }
        $this->view('SpontanApply',array('title' => $title,'error' => $error, 'success' => $success));
    }
}
