<?php
/**
 * Description of cand_user
 *
 * @author aschaerer
 */
class cand_user extends BaseModel{
    protected $table = 'cand_user';
    protected $primaryKey  = 'cand_user_id';
    
    protected $fillable = ['mail_id','pw','phone_number_id','sms_activation_code',
                            'sms_activation_date', 'mail_activation_code', 'mail_activation_date'];
    
    protected $checkFields = [
        'pw' => ['required']
    ];
    protected $checkFieldNames = [
        'pw' => 'Passwort'
    ];
    
    protected function beforeSave(){
        $this->attributes['pw'] = $this->getMd5KeyFromString($this->attributes['pw']);
        
    }
    
    public function checkLogin($username, $password){
        if(strlen($username) > 6 && strlen($password) > 3){
            $md5Key = $this->getMd5KeyFromString($password);
            if((!empty($username) && filter_var($username, FILTER_VALIDATE_EMAIL))){
                $arrUser = $this->where('address',$username)
                                ->where('pw', $md5Key)
                                ->join('email', 'cand_user.mail_id', '=', 'email.mail_id')
                                ->first();
            }elseif(!empty($username)){
                require_once 'phone_number.php';
                require_once '../app/class/helper_phone_lib.php';
                $libPhoneObj = new helper_phone_lib();
                $arrIsPhoneNumberValid = $libPhoneObj->isPhoneNumberValidFromCountryId($username, 1);
                $arrUser = $this->where('number',$arrIsPhoneNumberValid['nationalNumber'])
                                ->where('country_id', $arrIsPhoneNumberValid['countryId'])
                                ->where('pw', $md5Key)
                                ->join('phone_number', 'cand_user.phone_number_id', '=', 'phone_number.phone_number_id')
                                ->first();
            }
            if(isset($arrUser->cand_user_id) && !empty($arrUser->cand_user_id) && is_numeric($arrUser->cand_user_id)){
                $_SESSION['cand_user_id'] = $arrUser->cand_user_id;
                $arrProfile = $this->where('cand_user.cand_user_id',$arrUser->cand_user_id)
                                   ->join('cand_profile', 'cand_user.cand_user_id', '=', 'cand_profile.cand_user_id')
                                   ->first();
                
                if(isset($arrProfile->cand_profile_id) && !empty($arrProfile->cand_profile_id) && is_numeric($arrProfile->cand_profile_id)){
                    $_SESSION['cand_profile_id'] = $arrProfile->cand_profile_id;
                    $_SESSION['create_Profile'] = false;
                }else{
                    $_SESSION['create_Profile'] = true;
                }
                $_SESSION['logged'] = true;
                return true;
            }
           return false;
        }
    }
    
    public function save(array $options = []){
        $checkResult = $this->checkFields($this->attributes);
        if($checkResult !== true){ return $checkResult; }
        
        if(!empty($this->attributes['mail_id']) && !Toolkit::is_numeric($this->attributes['mail_id'])){
            require_once 'email.php';
            $emailObj = new email();
            $resultObj = $emailObj->where('address','=', $this->attributes['mail_id'])->first();
            if(!empty($resultObj)){
                $this->attributes['mail_id'] = $resultObj->mail_id;
            }else{
                // save the new email
                $emailObj->address = $this->attributes['mail_id'];
                $resultEmail = $emailObj->save();
                if(is_array($resultEmail) && array_key_exists('error', $resultEmail)){
                    return $resultEmail;
                }
                $this->attributes['mail_id'] = $emailObj->mail_id;
            }
            
            $obj = $this->where('mail_id','=', $this->attributes['mail_id'])->first();
            if(!empty($obj)){
                if(!isset($this->attributes['cand_user_id']) || $obj->cand_user_id != $this->attributes['cand_user_id']){
                    return ['error' => ERROR_multiProfile];
                }
                unset($this->attributes['mail_id']);
            }
        }else if(!empty($this->attributes['phone_number_id']) && Toolkit::is_numeric($this->attributes['phone_number_id'])){
            require_once 'phone_number.php';
            require_once '../app/class/helper_phone_lib.php';
            $libPhoneObj = new helper_phone_lib();
            $arrIsPhoneNumberValid = $libPhoneObj->isPhoneNumberValidFromCountryId($this->attributes['phone_number_id'], 1);
            $phoneObj = new phone_number();
            $resultObj = $phoneObj->where('number','=', $arrIsPhoneNumberValid['nationalNumber'])->where('country_id',$arrIsPhoneNumberValid['countryId'])->first();
            
            if(!empty($resultObj)){
                $this->attributes['phone_number_id'] = $resultObj->phone_number_id;
            }else{
                
                
                
                if($arrIsPhoneNumberValid['isValidFromCountry'] != 1){
                    return ['error' => 'Die Telefonnummer ist nicht gültig für die ausgewählte Vorwahl: '.$this->attributes['phone_number_id']];
                }
                if($arrIsPhoneNumberValid['isValidNumber'] != 1){
                    return ['error' => 'Keine gültige Telefonnummer: '.$this->attributes['phone_number_id']];
                }
                
                $zero = '';
                $phoneNumber = $arrIsPhoneNumberValid['nationalNumber'];
                if($arrIsPhoneNumberValid['isZero'] == 1){
                    $zero = str_replace($phoneNumber, '', $arrIsPhoneNumberValid['nationalFormat']);
                }
                // save the new phone number
                $phoneObj->number = $arrIsPhoneNumberValid['nationalNumber'];
                $phoneObj->country_id = $arrIsPhoneNumberValid['countryId'];
                $phoneObj->zero = $zero;
                $resultPhone = $phoneObj->save();
                $this->attributes['phone_number_id'] = $phoneObj->phone_number_id;
            }
        }

        $resultBefore = $this->beforeSave();
        if(is_array($resultBefore) && array_key_exists('error', $resultBefore)){
            return $resultBefore;
        }
        
        $result = parent::save($options);
        $this->afterSave();

        return $result;
    }

    private function getMd5KeyFromString($string){
//        return md5($string.'+FAp5Q}!l&hpTOn`fjj>)8]?{D+4e-9Tpf!tTLHI%UdmB~&/<vh5a)K2d(D{q1=');
        return $string;
    }
    
    function generatePassword($_len) {

        $_alphaSmall = 'abcdefghijklmnopqrstuvwxyz';            // small letters
        $_alphaCaps  = strtoupper($_alphaSmall);                // CAPITAL LETTERS
        $_numerics   = '1234567890';                            // numerics

        $_container = $_alphaSmall.$_alphaCaps.$_numerics;   // Contains all characters
        $password = '';         // will contain the desired pass

        for($i = 0; $i < $_len; $i++) {                                 // Loop till the length mentioned
            $_rand = rand(0, strlen($_container) - 1);                  // Get Randomized Length
            $password .= substr($_container, $_rand, 1);                // returns part of the string [ high tensile strength ;) ] 
        }

        return $password;       // Returns the generated Pass
    }
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function cand_profile(){
        require_once 'cand_profile.php';
        return $this->hasOne('cand_profile');
    }
    public function email(){
        require_once 'email.php';
        return $this->belongsTo('email','mail_id');
    }
    
    public function phone_number(){
        require_once 'phone_number.php';
        return $this->belongsTo('phone_number','phone_number_id');
    }
}