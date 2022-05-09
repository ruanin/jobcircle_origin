<?php
/**
 * Description of value_occupation
 *
 * @author aschaerer
 */
class value_occupation extends BaseModel{
    protected $table = 'value_occupation';
    protected $primaryKey  = 'occupation_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->belongsToMany('vac_info','rel_vac_occupation','occupation_id','vac_info_id');
    }
}