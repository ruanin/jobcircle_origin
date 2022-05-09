<?php
/**
 * Description of value_available_from
 *
 * @author aschaerer
 */
class value_available_from extends BaseModel{
    protected $table = 'value_available_from';
    protected $primaryKey  = 'available_from_id';
    
    public function cand_profile(){
        require_once 'cand_profile.php';
        return $this->hasMany('cand_profile');
    }
    
    public function vac_application(){
        require_once 'vac_application.php';
        return $this->hasMany('vac_application');
    }
}