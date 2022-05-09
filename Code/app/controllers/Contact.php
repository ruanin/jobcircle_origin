<?php

class Contact extends Controller
{
    public function index(){
        $arrInputForm['name'] = Toolkit::getPost('name','');
        $arrInputForm['email'] = Toolkit::getPost('email','');
        $arrInputForm['subject'] = Toolkit::getPost('subject','');
        $arrInputForm['message'] = Toolkit::getPost('message','');
        
        $error = $success = '';
        $objDepartment = $this->model('customer_department');
        $arrDepartment = $objDepartment->where('active', 1)->orderBy('city', 'ASC')->get();
       
        $this->view('Contact',array('departmentlist' => $arrDepartment,
                                    'input' => $arrInputForm,
                                    'error' => $error,      
                                    'success' => $success));
        
       
    }
    
    public function Send(){
        $arrInputForm = array();
        $error = $success = '';
        $objDepartment = $this->model('customer_department');
        $arrDepartment = $objDepartment->where('active', 1)->get();
        
        if(Toolkit::getPost('task',0) == 'sendcontact'){
            $arrInputForm['name'] = Toolkit::getPost('name',0);
            $arrInputForm['email'] = Toolkit::getPost('email',0);
            $arrInputForm['subject'] = Toolkit::getPost('subject',0);
            $arrInputForm['message'] = Toolkit::getPost('message',0);
            $valmail = filter_var($arrInputForm['email'], FILTER_VALIDATE_EMAIL);
            if(!empty($arrInputForm['email'])){
                if ($valmail == false) { 
                    $arrInputForm['email'] =  '';
                    $error = 'Bitte Mail Adresse prüfen';
                } 
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
        
        $this->view('Contact',array('departmentlist' => $arrDepartment,
                                    'input' => $arrInputForm,
                                    'error' => $error,      
                                    'success' => $success));
    }
}