<?php
require_once '../app/init.php';
require_once '../app/core/Controller.php';
$controller = new Controller();
$objSwiftMailer = new Swiftmailer();
$limit = 50;
phpinfo();exit();
for($i=0;$i < $limit;$i++){
	$objMigProfile = $controller->model('import_candidate');
    $arrMigProfile = $objMigProfile->where('md5_key', '<>', 'NULL')
                                   ->where('valid_status', 1)
                                                ->first();
    
    $objProfile = $controller->model('cand_user');
    $arrUser = $objProfile->where('address',$arrMigProfile->login_email)
                            ->join('email', 'cand_user.mail_id', '=', 'email.mail_id')
                            ->first();
    if(!empty($arrUser)){
        $objMigProfile->where('md5_key',$arrMigProfile->md5_key)
                    ->update(array('valid_status' => 3, 'md5_key' => NULL));
    }else{
        
        $message = 'Haben Sie es schon bemerkt?'."  \n"."  \n".'Unsere Webseite mit neuer Gestaltung und vielen wichtigen Informationen ist für Sie da.'."  \n";
        $message .= "  \n".'Um Ihr bestehendes Konto zu reaktivieren, bitten wir Sie, Ihr Kennwort unter nachfolgendem Link zu erneuern'."  \n".'https://planova.ch/Candidate/activateAccount?akey='.$arrMigProfile->md5_key."  \n";
        $message .= "  \n".'Wir danken Ihnen für die Aktualisierung Ihres Kontos und freuen uns weiterhin auf eine gute und erfolgreiche Zusammenarbeit.'."  \n"."  \n".'Freundliche Grüsse'."  \n".'planova human capital ag';
        $arrMail['subject'] = 'planova.ch - mit frischem Design';
        $arrMail['to']= $arrMigProfile->login_email;
        $arrMail['body']= $message;
        $arrMail['message']= $message;
	$datum = date('Y-m-d H:i:s', time());
        $objSwiftMailer->sendMail($arrMail);
        $status = $objMigProfile->where('md5_key',$arrMigProfile->md5_key)
                        ->update(array('valid_status' => 2, 'sent_invitation' => $datum));
						
    }
}
