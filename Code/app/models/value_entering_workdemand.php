<?php
/**
 * Description of value_entering_workdemand
 *
 * @author aschaerer
 */
class value_entering_workdemand extends BaseModel{
    protected $table = 'value_entering_workdemand';
    protected $primaryKey  = 'entering_workdemand_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function workdemand(){
        require_once 'workdemand.php';
        return $this->hasMany('workdemand');
    }
}