<?php
/**
 * Description of value_branch_of_industry
 *
 * @author aschaerer
 */
class value_branch_of_industry extends BaseModel{
    protected $table = 'value_branch_of_industry';
    protected $primaryKey  = 'branch_of_industry_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->hasMany('vac_info');
    }
}