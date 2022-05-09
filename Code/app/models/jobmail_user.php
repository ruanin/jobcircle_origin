<?php
/**
 * Description of jobmail_user
 *
 * @author aschaerer
 */
class jobmail_user extends BaseModel{
    protected $table = 'jobmail_user';
    protected $primaryKey  = 'jobmail_user_id';
    
    protected $fillable = ['mail_id','cand_user_id','l_name','f_name'];
    
    protected $checkFields = [
        'f_name' => ['required'],
        'l_name' => ['required'],
        'cand_user_id' => ['numeric']
    ];
    protected $checkFieldNames = [
        'f_name' => 'Vorname',
        'l_name' => 'Name',
        'cand_user_id' => 'Kandidat User Id'
    ];
    
    /**
     * save from jobmail_user
     * @param array $options
     * @return boolean|jobmail_user object if save successful return true else false, if the email exist return the object (jobmail_user) and then we must update
     */
    public function save(array $options = []){
        $checkResult = $this->checkFields($this->attributes);
        if($checkResult !== true){ return $checkResult; }
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
        $resultBefore = $this->beforeSave();
        if(is_array($resultBefore) && array_key_exists('error', $resultBefore)){
            return $resultBefore;
        }
        $result = parent::save($options);
        $this->afterSave();
        return $result;
    }
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function email(){
        require_once 'email.php';
        return $this->belongsTo('email','mail_id');
    }
    
    public function cand_user(){
        require_once 'cand_user.php';
        return $this->belongsTo('cand_user','cand_user_id');
    }
}