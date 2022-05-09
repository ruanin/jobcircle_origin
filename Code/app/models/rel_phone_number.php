<?php
/**
 * Description of rel_phone_number
 *
 * @author aschaerer
 */
class rel_phone_number extends BaseModel{
    protected $table = 'rel_phone_number';
    protected $primaryKey  = 'rel_phone_number_id';
    
    protected $fillable = ['cand_profile_id','workdemand_id','phone_number_id','contact_type_id','has_contact_request','country_id'];
    
    protected $checkFields = [
        'phone_number_id' => ['required'],
        'contact_type_id' => ['required']
    ];
    protected $checkFieldNames = [
        'phone_number_id' => 'Telefonnummer',
        'contact_type_id' => 'Kontakt Type'
    ];
    
    protected function beforeSave(){
        parent::beforeSave();
        require_once 'phone_number.php';
        $phoneNumberObj = new phone_number();
        $resultFoundNumber = $phoneNumberObj->find($this->attributes['phone_number_id']);        
        if(empty($resultFoundNumber)){
            $resultObj = $phoneNumberObj->where('country_id','=', $this->attributes['country_id'])
                ->where('number','=', $this->attributes['phone_number_id'])
                ->first();
            if(!empty($resultObj)){
                $this->attributes['phone_number_id'] = $resultObj->phone_number_id;
            }else{
                require_once '../app/class/helper_phone_lib.php';
                $libPhoneObj = new helper_phone_lib();
                $arrIsPhoneNumberValid = $libPhoneObj->isPhoneNumberValidFromCountryId($this->attributes['phone_number_id'], $this->attributes['country_id']);
                if(is_array($arrIsPhoneNumberValid) && !empty($arrIsPhoneNumberValid['error'])){
                    return $arrIsPhoneNumberValid;
                }
                if($arrIsPhoneNumberValid['isValidFromCountry'] != 1){
                    return ['error' => 'Die Telefonnummer ist nicht gültig für die ausgewählte Vorwahl: '.$this->attributes['phone_number_id']];
                }
                if($arrIsPhoneNumberValid['isValidNumber'] != 1){
                    return ['error' => 'Keine gültige Telefonnummer: '.$this->attributes['phone_number_id']];
                }
                $this->attributes['country_id'] = $arrIsPhoneNumberValid['countryId'];
                if($arrIsPhoneNumberValid['isMobile'] == 1 && $this->attributes['contact_type_id'] != 8){
                    $this->attributes['contact_type_id'] = 8;   // Mobile
                }else if($this->attributes['contact_type_id'] == 8 && $arrIsPhoneNumberValid['isMobile'] != 1){
                    if(isset($this->attributes['cand_profile_id']) && !empty($this->attributes['cand_profile_id'])){
                        $this->attributes['contact_type_id'] = 10; // Privat for candidate
                    }else if(isset($this->attributes['workdemand_id']) && !empty($this->attributes['workdemand_id'])){
                        $this->attributes['contact_type_id'] = 9; // Geschäftl. for Kontakt Personalbedarf
                    }
                }
                $zero = '';
                $phoneNumber = $arrIsPhoneNumberValid['nationalNumber'];
                if($arrIsPhoneNumberValid['isZero'] == 1){
                    $zero = str_replace($phoneNumber, '', $arrIsPhoneNumberValid['nationalFormat']);
                }
                // save the new phone number
                $phoneNumberObj->number = $phoneNumber;
                $phoneNumberObj->country_id = $this->attributes['country_id'];
                $phoneNumberObj->zero = $zero;
                $resultPhone = $phoneNumberObj->save();
                if(is_array($resultPhone) && array_key_exists('error', $resultPhone)){
                    return $resultPhone;
                }
                $this->attributes['phone_number_id'] = $phoneNumberObj->phone_number_id;
            }
        }
        unset($this->attributes['country_id']);
        $beforeObj = null;
        if(isset($this->attributes[$this->primaryKey]) && !empty($this->attributes[$this->primaryKey])){
            $beforeObj = $this->find($this->attributes[$this->primaryKey]);
        }
        if((!isset($this->attributes[$this->primaryKey])) || (!empty($beforeObj) && $this->attributes['phone_number_id'] != $beforeObj->phone_number_id)){
            $fieldName = '';
            $fieldId = 0;
            if(isset($this->attributes['cand_profile_id']) && !empty($this->attributes['cand_profile_id'])){
                // exist one entry for the candidate (one candidate can only have one same telefonnumber)
                $fieldName = 'cand_profile_id';
                $fieldId = $this->attributes['cand_profile_id'];
            }else if(isset($this->attributes['workdemand_id']) && !empty($this->attributes['workdemand_id'])){
                // exist one entry for the workdemand (one workdemand can only have one same etelefonnumber)
                $fieldName = 'workdemand_id';
                $fieldId = $this->attributes['workdemand_id'];
            }
            if(!empty($fieldName)){
                $existObj = $this->where($fieldName,'=', $fieldId)
                        ->where('phone_number_id','=', $this->attributes['phone_number_id'])
                        ->first();
                if(!empty($existObj)){
                    return ['error' => sprintf(ERROR_Exist,'So eine Telefonnummer')];
                }
            }
        }
    }
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function phone_number(){
        require_once 'phone_number.php';
        return $this->belongsTo('phone_number','phone_number_id');
    }
    public function value_contact_type(){
        require_once 'value_contact_type.php';
        return $this->belongsTo('value_contact_type','contact_type_id');
    }
    public function cand_profile(){
        require_once 'cand_profile.php';
        return $this->belongsTo('cand_profile','cand_profile_id');
    }
    public function workdemand(){
        require_once 'workdemand.php';
        return $this->belongsTo('workdemand','workdemand_id');
    }
}