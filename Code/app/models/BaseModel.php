<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
/**
 * Description of BaseModel
 *
 * @author aschaerer
 */
class BaseModel extends Eloquent{
    
    protected $checkFields = [];
    protected $checkFieldNames = [];

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
    
    protected function checkFields(array $attributes = []){
        if(empty($this->checkFields)){ return true; }
        $request = new Request($attributes);
        $request->checkVars($this->checkFields, $errorResults, $this->checkFieldNames);
        if(is_array($errorResults) && count($errorResults) > 0){
             // The form did no validate
             return array('error' => $errorResults);
        }
        return true;
    }
    
    protected function beforeSave(){}
    protected function afterSave(){}
}