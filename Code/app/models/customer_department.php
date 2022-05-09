<?php
/**
 * Description of customer_department
 *
 * @author aschaerer
 */
class customer_department extends BaseModel{
    protected $table = 'customer_department';
    protected $primaryKey  = 'customer_department_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function customer(){
        require_once 'customer.php';
        return $this->belongsTo('customer','customer_id');
    }
    
    public function employee(){
        require_once 'employee.php';
        return $this->belongsToMany('employee','rel_departmentToEmployee','customer_department_id','employee_id');
    }
    
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->hasMany('vac_info');
    }
    
    public function workdemand(){
        require_once 'workdemand.php';
        return $this->hasMany('workdemand');
    }
}