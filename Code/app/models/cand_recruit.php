<?php
/**
 * Description of cand_recruit
 *
 * @author aschaerer
 */




class cand_recruit extends BaseModel{
    protected $table = 'cand_recruit';
    protected $primaryKey  = 'cand_recruit_id';
    public $regex = '/[^A-Za-z0-9_,\-]/';
    
    protected $fillable = ['cand_recruit_id', 'esrc','f_name','l_name','address',
                            'plz', 'location', 'phone', 'insurance', 'privacy'];
    
    protected $checkFields = [
        'cand_user_id' => ['numeric'],
        'esrc' => ['numeric'],
        'f_name' => ['required'],
        'l_name' => ['required'],
        'address' => ['required'],
        'plz' => ['required'],
        'location' => ['required'],
        'phone' => ['required'],
        'privacy' => ['required'],
    ];
        protected $checkFieldNames = [
    
    ];
  
    
    public function save(array $options = []){
       
        $checkResult = $this->checkFields($this->attributes);
        if($checkResult !== true){ return $checkResult; }
        $resultBefore = $this->beforeSave();
        if(is_array($resultBefore) && array_key_exists('error', $resultBefore)){
            return $resultBefore;
        }
        $result = parent::save($options);
        $this->afterSave();
        return $result;
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