<?php
/**
 * Description of value_region
 *
 * @author aschaerer
 */
class value_region extends BaseModel{
    protected $table = 'value_region';
    protected $primaryKey  = 'region_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->hasMany('vac_info');
    }
    
    public function jobmail_searchtable(){
        require_once 'jobmail_searchtable.php';
        return $this->hasMany('jobmail_searchtable');
    }
    
    public function cand_address(){
        require_once 'cand_address.php';
        return $this->hasMany('cand_address');
    }
    
    public function getRegionNameByCommaSeparatedIds($commaRegionIds){
        $arrRegions = explode(',',$commaRegionIds);
        if(empty($arrRegions)){ return false; }
        $arrRegions = array();
        $arrRegionValues = $this->select("title")->whereRaw("find_in_set(region_id,'".$commaRegionIds."')")->get();
        if(!empty($arrRegionValues)){
            foreach($arrRegionValues as $regionKey => $regionName){
                $arrRegions[] = $regionName['title'];
            }
        }
        return $arrRegions;
    }
}