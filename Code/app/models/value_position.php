<?php
/**
 * Description of value_position
 *
 * @author aschaerer
 */
class value_position extends BaseModel{
    protected $table = 'value_position';
    protected $primaryKey  = 'position_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->belongsToMany('vac_info','rel_vac_position','position_id','vac_info_id');
    }
}