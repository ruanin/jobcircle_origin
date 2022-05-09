<?php
/**
 * Description of value_wish_workdemand
 *
 * @author aschaerer
 */
class value_wish_workdemand  extends BaseModel{
    protected $table = 'value_wish_workdemand';
    protected $primaryKey  = 'wish_workdemand_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function workdemand(){
        require_once 'workdemand.php';
        return $this->hasMany('workdemand');
    }
}