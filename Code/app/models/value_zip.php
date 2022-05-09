<?php
/**
 * Description of value_zip
 *
 * @author aschaerer
 */
class value_zip extends BaseModel{
    protected $table = 'value_zip';
    protected $primaryKey  = 'geozip_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->hasMany('vac_info');
    }
}