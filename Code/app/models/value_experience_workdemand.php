<?php
/**
 * Description of value_experience_workdemand
 *
 * @author aschaerer
 */
class value_experience_workdemand extends BaseModel{
    protected $table = 'value_experience_workdemand';
    protected $primaryKey  = 'experience_workdemand_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function workdemand(){
        require_once 'workdemand.php';
        return $this->hasMany('workdemand');
    }
}