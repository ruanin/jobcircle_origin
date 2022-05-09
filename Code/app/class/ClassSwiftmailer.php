 <?php

class Swiftmailer {
    
    protected $from = null;
    protected $transport = null;
    
    public function __construct() {
        $application_env =  getenv('APPLICATION_ENV');
        // Bitte Application Env festlegen...
        if(empty($application_env)){
            echo "Unser System ist zur Zeit wegen Wartungsarbeiten nicht erreichbar. ";
            exit();
        }
        $filename = 'smtp_'.$application_env.'.php'; 
        
        $config = require_once APPLICATION .'/config/'.$filename;
        $this->from = $config['from'];
        $this->transport = Swift_SmtpTransport::newInstance($config['host'], $config['port'],$config['ssl'])
                                                        ->setUsername($config['username'])
                                                        ->setPassword($config['password']);
    }
    
    public function sendMail($arrMail){
         $message = Swift_Message::newInstance();
         if(isset($arrMail['subject']) && isset($arrMail['to']) && isset($arrMail['body']) && isset($arrMail['message'])){
            //Give the message a subject
            $message->setSubject($arrMail['subject'])
              ->setFrom($this->from)
              ->setTo($arrMail['to'])
              ->setBody($arrMail['body'])
              ->addPart($arrMail['message']);

            $mailer = Swift_Mailer::newInstance($this->transport);
            $result = $mailer->send($message);

            if ($result) {
              return true;
            }
            else
            {
             return false;
            }
         }else{
             return false;
         }
    }
    
    public function sendHtmlMail($arrMail){
        $message = Swift_Message::newInstance();
        if(isset($arrMail['subject']) && isset($arrMail['to']) && isset($arrMail['body']) && isset($arrMail['message'])){
            //Give the message a subject
            $message->setSubject($arrMail['subject'])
              ->setFrom($this->from)
              ->setTo($arrMail['to'])
              ->setBody($arrMail['body'], 'text/html')
              ->addPart($arrMail['message'], 'text/plain');

            $mailer = Swift_Mailer::newInstance($this->transport);
            $result = $mailer->send($message);

            if ($result) {
              return true;
            } else {
             return false;
            }
        }else{
             return false;
        }
    }
    
    public function sendPasswortResetLink($to,$tokenkey){
        if(empty($to) || empty($tokenkey)){
            return false;
        }
        $arrMail['subject'] = 'Sie haben die Zurücksetzung Ihres Passwortes angefordert';
        $arrMail['to']= $to;
        $arrMail['body']= '<html><body style="font-family: Calibri, Arial, Helvetica, sans-serif;">
                           <div style="color:#000;font-family:Calibri, Arial, Helvetica, sans-serif;font-size:42px;line-height:48px;text-align:center;font-weight:bold">Passwort vergessen?</div>
                          <div style="color:#000;font-family:Calibri, Arial, Helvetica, sans-serif;font-size:19px;line-height:24px;text-align:center;font-weight:normal">
                        Wir haben eine Aufforderung erhalten, das Passwort für das Konto zurückzusetzen, das mit <a href="mailto:'.$to.'" target="_blank">'.$to.'</a> verknüpft ist. Um Ihr Passwort zurückzusetzen, klicken Sie einfach unten.<br/>
                        Sie haben jetzt 24 Stunden Zeit, um das Passwort Ihres Kontos zu ändern. Wählen Sie zum Schutz Ihres Kontos ein starkes Passwort.<br/> <br/>
                        Wenn Sie diese Anfrage nicht gestellt haben, ignorieren Sie diese E-Mail bitte einfach.</div> 
                        <div style="margin-top:30px;text-align:center;"><a href="https://www.planova.ch/Candidate/passwortzuruecksetzen?token='.$tokenkey.'" style="text-decoration: none;display: block; width: 100%;border: 1px solid #c3141b !important; background: #c3141b;font-size: 24px;height: auto !important;overflow: hidden;letter-spacing: 0;margin-bottom: 25px;color: #fff;border-radius: 0;">Passwort zurücksetzen</a></div>
                        '. '</body></html>';
        $arrMail['message']= 'Passwort vergessen?
                Wir haben eine Aufforderung erhalten, das Passwort für das Konto zurückzusetzen, das mit '.$to.' verknüpft ist. Um Ihr Passwort zurückzusetzen, klicken Sie einfach unten.
                Sie haben jetzt 24 Stunden Zeit, um das Passwort Ihres Kontos zu ändern. Wählen Sie zum Schutz Ihres Kontos ein starkes Passwort. 
                Wenn Sie diese Anfrage nicht gestellt haben, ignorieren Sie diese E-Mail bitte einfach.
                https://www.planova.ch/Candidate/passwortzuruecksetzen?token='.$tokenkey.'';
        $status = $this->sendHtmlMail($arrMail);
        
        return $status;
    }
}