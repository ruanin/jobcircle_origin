<?php
/**
 * Description of value_education_workdemand
 *
 * @author aschaerer
 */
class value_education_workdemand extends BaseModel{
    protected $table = 'value_education_workdemand';
    protected $primaryKey  = 'education_workdemand_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function workdemand(){
        require_once 'workdemand.php';
        return $this->hasMany('workdemand');
    }
}