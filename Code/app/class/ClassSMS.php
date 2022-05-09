<?php

class SMS {

    protected $webserviceUrl = 'http://sms.horisen.info:12000/bulk/send'; 
    protected $provUser = '11481_Productive';
    protected $provPass = 'fASdECCY';
    protected $sender = 'SMSGateway';
    
    public function __construct($sender) {
        $this->sender = $sender;
    }

    public function sendSMS($sender, $receiver, $text) {
        $sender = urlencode($sender);
        $receiver = urlencode($receiver);
        $text = urlencode($text);
        // Get cURL resource
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "http://sms.horisen.info:12000/bulk/send?type=text&user={$this->provUser}&password={$this->provPass}&sender={$sender}&receiver={$receiver}&dcs=GSM&text={$text}&dlr-mask=19",
            CURLOPT_USERAGENT => 'SMS-WebServer'
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
    
    public function sendActivationCode($receiver){
        $randomKey = rand(100000,999999);
        $activationText = "Der SMS Code lautet: {$randomKey}     Der Code ist nur einmalig gültig.";
        $_SESSION['sms_code'] = $randomKey;
        $status = $this->sendSMS($this->sender, $receiver, $activationText);
        return $status;
    }
    
    public function sendPasswordResetCode($receiver,$key){
        $text = 'Passwort vergessen? Wir haben eine Aufforderung erhalten, das Passwort für das Konto zurückzusetzen, '
              . 'das mit '.$receiver.' verknüpft ist. Um Ihr Passwort zurückzusetzen, kopieren Sie den untenstehenden Link. '
              . 'Sie haben jetzt 24 Stunden Zeit, um das Passwort Ihres Kontos zu ändern. '
              . 'Wählen Sie zum Schutz Ihres Kontos ein starkes Passwort. '
              . 'Wenn Sie diese Anfrage nicht gestellt haben, ignorieren Sie dieses SMS bitte einfach. '
              . 'https://www.planova.ch/Candidate/passwortzuruecksetzen?token='.$key.'';
        $body2send = trim($text);
        $body2send = html_entity_decode($body2send);
        $body2send = str_replace('…', '', $body2send);
        $status = $this->sendSMS($this->sender, $receiver, $body2send);
        return $status;
    }

}
