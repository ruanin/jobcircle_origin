<?php
/**
 * Description of value_driver_license
 *
 * @author aschaerer
 */
class value_driver_license extends BaseModel{
    protected $table = 'value_driver_license';
    protected $primaryKey  = 'driver_license_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->belongsToMany('vac_info','rel_vac_driver_license','driver_license_id','vac_info_id');
    }
    
    public function workdemand(){
        require_once 'workdemand.php';
        return $this->belongsToMany('workdemand','rel_workdemand_driver_license','driver_license_id','workdemand_id');
    }
    
    public function getDriverLicenseByCommaSeparatedIds($commaDriverLicenseIds){
        $arrDriverLicense = explode(',',$commaDriverLicenseIds);
        if(empty($arrDriverLicense)){ return false; }
        $arrDriverLicense = array();
        $arrDriverLicenseValues = $this->select('name')->whereRaw("find_in_set(driver_license_id,'".$commaDriverLicenseIds."')")->get();
        if(!empty($arrDriverLicenseValues)){
            foreach($arrDriverLicenseValues as $licenseKey => $licenseName){
                $arrDriverLicense[] = $licenseName['name'];
            }
        }
        return $arrDriverLicense;
    }
}