<?php
/**
 * Description of value_required_age
 *
 * @author aschaerer
 */
class value_required_age extends BaseModel{
    protected $table = 'value_required_age';
    protected $primaryKey  = 'required_age_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->belongsToMany('vac_info','rel_vac_required_age','required_age_id','vac_info_id');
    }
}