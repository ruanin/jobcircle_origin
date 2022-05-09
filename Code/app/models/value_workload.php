<?php
/**
 * Description of value_workload
 *
 * @author aschaerer
 */
class value_workload extends BaseModel{
    protected $table = 'value_workload';
    protected $primaryKey  = 'workload_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->hasMany('vac_info');
    }
    
    public function workdemand(){
        require_once 'workdemand.php';
        return $this->hasMany('workdemand');
    }
}