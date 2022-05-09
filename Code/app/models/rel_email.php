<?php
/**
 * Description of rel_email
 *
 * @author aschaerer
 */
class rel_email extends BaseModel{
    protected $table = 'rel_email';
    protected $primaryKey  = 'rel_email_id';
    
    protected $fillable = ['cand_profile_id','workdemand_id','mail_id','contact_type_id','has_contact_request'];
    
    protected $checkFields = [
        'mail_id' => ['required'],
        'contact_type_id' => ['required']
    ];
    protected $checkFieldNames = [
        'mail_id' => 'E-Mail Adresse',
        'contact_type_id' => 'Kontakt Type'
    ];
    
    protected function beforeSave(){
        parent::beforeSave();
        if(!Toolkit::is_numeric($this->attributes['mail_id'])){
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
        }
        $beforeObj = null;
        if(isset($this->attributes[$this->primaryKey]) && !empty($this->attributes[$this->primaryKey])){
            $beforeObj = $this->find($this->attributes[$this->primaryKey]);
        }
        if((!isset($this->attributes[$this->primaryKey])) || (!empty($beforeObj) && $this->attributes['mail_id'] != $beforeObj->mail_id)){
            $fieldName = '';
            $fieldId = 0;
            if(isset($this->attributes['cand_profile_id']) && !empty($this->attributes['cand_profile_id'])){
                // exist one entry for the candidate (one candidate can only have one same email adresse)
                $fieldName = 'cand_profile_id';
                $fieldId = $this->attributes['cand_profile_id'];
            }else if(isset($this->attributes['workdemand_id']) && !empty($this->attributes['workdemand_id'])){
                // exist one entry for the workdemand (one workdemand can only have one same email adresse)
                $fieldName = 'workdemand_id';
                $fieldId = $this->attributes['workdemand_id'];
            }
            if(!empty($fieldName)){
                $existObj = $this->where($fieldName,'=', $fieldId)
                                 ->where('mail_id','=', $this->attributes['mail_id'])
                                 ->first();
                if(!empty($existObj)){
                    return ['error' => sprintf(ERROR_Exist,'So eine E-Mail Adresse')];
                }
            }
        }
    }
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function email(){
        require_once 'email.php';
        return $this->belongsTo('email','mail_id');
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