<?php
/**
 * Description of mail
 *
 * @author aschaerer
 */
class email extends BaseModel{
    protected $table = 'email';
    protected $primaryKey  = 'mail_id';
    public $timestamps = false;
    
    protected $fillable = ['address'];
    
    protected $checkFields = [
        'address' => ['required','email']
    ];
    protected $checkFieldNames = [
        'address' => 'E-Mail Adresse'
    ];
    
    public function save(array $options = []){
        $checkResult = $this->checkFields($this->attributes);
        if($checkResult !== true){ return $checkResult; }
        $mailObj = $this->where('address','=', $this->attributes['address'])->first();
        if(!empty($mailObj)){
            $this->attributes[$this->primaryKey] = $mailObj->mail_id;
            return true;
        }
        $resultBefore = $this->beforeSave();
        if(is_array($resultBefore) && array_key_exists('error', $resultBefore)){
            return $resultBefore;
        }
        $result = parent::save($options);
        $this->afterSave();
        return $result;
    }
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function cand_user(){
        require_once 'cand_user.php';
        return $this->hasOne('cand_user');
    }
    
    public function vac_newsletter(){
        require_once 'vac_newsletter.php';
        return $this->hasOne('vac_newsletter');
    }
    
    public function rel_email(){
        require_once 'rel_email.php';
        return $this->hasMany('rel_email');
    }
}