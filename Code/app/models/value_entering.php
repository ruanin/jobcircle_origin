<?php
/**
 * Description of value_entering
 *
 * @author aschaerer
 */
class value_entering extends BaseModel{
    protected $table = 'value_entering';
    protected $primaryKey  = 'entering_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->hasMany('vac_info');
    }
}