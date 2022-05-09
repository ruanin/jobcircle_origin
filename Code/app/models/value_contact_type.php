<?php
/**
 * Description of value_contact_type
 *
 * @author aschaerer
 */
class value_contact_type extends BaseModel{
    protected $table = 'value_contact_type';
    protected $primaryKey  = 'contact_type_id';
    
    public function rel_email(){
        require_once 'rel_email.php';
        return $this->hasMany('rel_email');
    }
    
    public function rel_phone_number(){
        require_once 'rel_phone_number.php';
        return $this->hasMany('rel_phone_number');
    }
}