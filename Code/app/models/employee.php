<?php
/**
 * Description of employee
 *
 * @author aschaerer
 */
class employee extends BaseModel{
    protected $table = 'employee';
    protected $primaryKey  = 'employee_id';
    
    protected $fillable = ['worked_as_id','f_name','l_name','phone','fax','mail'];
    
    protected $checkFields = [
        'worked_as_id' => ['required','numeric'],
        'f_name' => ['required'],
        'l_name' => ['required'],
        'mail' => ['required','email']
    ];
    protected $checkFieldNames = [
        'worked_as_id' => 'Angestellt als',
        'f_name' => 'Vorname',
        'l_name' => 'Name',
        'mail' => 'E-Mail Adresse'
    ];
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function value_worked_as(){
        require_once 'value_worked_as.php';
        return $this->belongsTo('value_worked_as','worked_as_id');
    }
    
    public function customer_department(){
        require_once 'customer_department.php';
        return $this->belongsToMany('customer_department','rel_departmentToEmployee','employee_id','customer_department_id');
    }
    
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->hasMany('vac_info');
    }
}