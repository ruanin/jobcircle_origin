<?php
/**
 * Description of value_employment
 *
 * @author aschaerer
 */
class value_employment extends BaseModel{
    protected $table = 'value_employment';
    protected $primaryKey  = 'employment_id';
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->belongsToMany('vac_info','rel_vac_employment','employment_id','vac_info_id');
    }
    public function workdemand(){
        require_once 'workdemand.php';
        return $this->belongsToMany('workdemand','rel_workdemand_employment','employment_id','workdemand_id');
    }
    
    public function getEmploymentNamesByCommaSeparatedIds($commaEmploymentIds){
        $arrEmployments = explode(',',$commaEmploymentIds);
        if(empty($arrEmployments)){ return false; }
        $arrEmployments = array();
        $arrEmploymentValues = $this->select('name')->whereRaw("find_in_set(employment_id,'".$commaEmploymentIds."')")->get();
        if(!empty($arrEmploymentValues)){
            foreach($arrEmploymentValues as $employmentKey => $employmentName){
                $arrEmployments[] = $employmentName['name'];
            }
        }
        return $arrEmployments;
    }
}