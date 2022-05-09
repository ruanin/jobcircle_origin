<?php
/**
 * Description of value_country
 *
 * @author aschaerer
 */
class value_country extends BaseModel{
    protected $table = 'value_country';
    protected $primaryKey  = 'country_id';
    
    public function getCountryIdFromCountryCode($countryCode){
        $resultObj = $this->where('code','=', $countryCode)->first();
        return $resultObj->country_id;
    }
    public function getCountryCode($countryId){
        $resultObj = $this->find($countryId);
        return $resultObj->code;
    }
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->hasMany('vac_info');
    }
    public function customer(){
        require_once 'customer.php';
        return $this->hasMany('customer');
    }
    public function workdemand(){
        require_once 'workdemand.php';
        return $this->hasMany('workdemand');
    }
    public function cand_address(){
        require_once 'cand_address.php';
        return $this->hasMany('cand_address');
    }
}