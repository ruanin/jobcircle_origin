<?php
/**
 * Description of customer
 *
 * @author aschaerer
 */
class customer extends BaseModel{
    protected $table = 'customer';
    protected $primaryKey  = 'customer_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function value_country(){
        require_once 'value_country.php';
        return $this->belongsTo('value_country','country_id');
    }
    
    public function customer_department(){
        require_once 'customer_department.php';
        return $this->hasMany('customer_department');
    }
}