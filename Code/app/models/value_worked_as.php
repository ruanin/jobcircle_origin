<?php
/**
 * Description of value_worked_as
 *
 * @author aschaerer
 */
class value_worked_as extends BaseModel{
    protected $table = 'value_worked_as';
    protected $primaryKey  = 'worked_as_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function employee(){
        require_once 'employee.php';
        return $this->hasMany('employee');
    }
}