<?php

class Department extends Controller 
{
    public function index(){
        
        $objVacancy = $this->model('vac_info');
        $arrVacanyList = $objVacancy::Online()->Top()->get();
        
        $this->view('Home');
    }
    
    public function detail($departmentID=0){
        if(isset($departmentID) && !empty($departmentID) && is_numeric($departmentID)){
        $objDepartment = $this->model('customer_department');
        $arrDepartment = $objDepartment->find($departmentID);
        $arrInputForm = array();
        $error = $success = '';
        $objVac = $this->model('vac_info');
        $query = $objVac->Online();
        $arrVacancy = $query->where('customer_department_id',$departmentID)->orderBy('unique_key', 'desc')->limit(14)->get();

        if(Toolkit::getPost('task',0) == 'sendcontact'){
            $arrInputForm['name'] = Toolkit::getPost('name','');
            $arrInputForm['email'] = Toolkit::getPost('email','');
            $arrInputForm['subject'] = Toolkit::getPost('subject','');
            $arrInputForm['message'] = Toolkit::getPost('message','');
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
                if ($recaptcha->score >= 0.5) {
                    // Verified - send email
                } else {
                    // Not verified - show form error
                    $error = 'Es ist ein Fehler aufgetreten. Bitte versuchen Sie es bitte nochmals.';
                }
            }
            
            if(!empty($arrInputForm['name']) && !empty($arrInputForm['email']) 
                    && !empty($arrInputForm['subject']) && !empty($arrInputForm['message'])){
                $objContact = $this->model('contacts');
                $objContact->name = $arrInputForm['name'];
                $objContact->mail = $arrInputForm['email'];
                $objContact->subject = $arrInputForm['subject'];
                $objContact->message = $arrInputForm['message'];
                $objContact->contact_department_id = $departmentID;
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
        $this->view('DepartmentDetail',array('department' => $arrDepartment,
                                             'vacancy' => $arrVacancy,
                                             'input' => $arrInputForm,
                                                'error' => $error,      
                                                'success' => $success));
        }
    }
}