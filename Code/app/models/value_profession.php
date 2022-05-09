<?php
/**
 * Description of value_profession
 *
 * @author aschaerer
 */
class value_profession extends BaseModel{
    protected $table = 'value_profession';
    protected $primaryKey  = 'profession_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->hasMany('vac_info');
    }
    
    public function jobmail_searchtable(){
        require_once 'jobmail_searchtable.php';
        return $this->hasMany('jobmail_searchtable');
    }
}