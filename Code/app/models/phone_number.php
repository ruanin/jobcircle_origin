<?php
/**
 * Description of phone_number
 *
 * @author aschaerer
 */
class phone_number extends BaseModel{
    protected $table = 'phone_number';
    protected $primaryKey  = 'phone_number_id';
    public $timestamps = false;
    
    protected $fillable = ['country_id','number','zero'];
    
    protected $checkFields = [
        'country_id' => ['required'],
        'number' => ['required']
    ];
    protected $checkFieldNames = [
        'country_id' => 'Telefon Ländercode',
        'number' => 'Telefonnummer'
    ];
    
    public function save(array $options = []){
        $checkResult = $this->checkFields($this->attributes);
        if($checkResult !== true){ return $checkResult; }
        $phoneObj = $this->where('country_id','=', $this->attributes['country_id'])
                ->where('number','=', $this->attributes['number'])
                ->where('zero','=', $this->attributes['zero'])
                ->first();
        if(!empty($phoneObj)){
            $this->attributes[$this->primaryKey] = $phoneObj->phone_number_id;
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
    
    public function cand_user(){
        require_once 'cand_user.php';
        return $this->hasOne('cand_user');
    }
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function rel_phone_number(){
        require_once 'rel_phone_number.php';
        return $this->hasMany('rel_phone_number');
    }
}