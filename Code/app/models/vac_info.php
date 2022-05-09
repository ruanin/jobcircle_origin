<?php

class vac_info extends BaseModel{
    protected $table = 'vac_info';
    protected $primaryKey  = 'vac_info_id';
    
    protected $fillable = ['customer_department_id','workload_id','entering_id','creator_id','contact_id','main_branch_id','sub_branch_id','profession_id','country_id','region_id','hrc_workdemand_id','featured_expiration_date','from_date','to_date','status','jobtitle','street','zip','zip_md5','city','req_driver_licence','req_vehicle','hrc_client_id','is_intern','show_id'];
    
    protected $checkFields = [
        'customer_department_id' => ['required','numeric'],
        'workload_id' => ['required','numeric'],
        'entering_id' => ['required','numeric'],
        'creator_id' => ['numeric'],
        'contact_id' => ['required','numeric'],
        'main_branch_id' => ['numeric'],
        'sub_branch_id' => ['numeric'],
        'profession_id' => ['required','numeric'],
        'country_id' => ['numeric'],
        'region_id' => ['numeric'],
        'from_date' => ['required'],
        'to_date' => ['required'],
        'status' => ['required'],
        'jobtitle' => ['required'],
        'zip' => ['required']
    ];
    protected $checkFieldNames = [
        'customer_department_id' => 'Abteilung',
        'workload_id' => 'Arbeitspensum',
        'entering_id' => 'Arbeitsbeginn',
        'creator_id' => 'Erfasser',
        'contact_id' => 'Kontakt',
        'main_branch_id' => 'Haupt Branche',
        'sub_branch_id' => 'Sub Branche',
        'profession_id' => 'Beruf',
        'country_id' => 'Land',
        'region_id' => 'Region',
        'from_date' => 'von Datum',
        'to_date' => 'bis Datum',
        'status' => 'Status',
        'jobtitle' => 'Vakanze Titel',
        'zip' => 'PLZ'
    ];
      
    public function scopeOnline($query){
        return $query->where('status','=', 1)->whereRaw('from_date < DATE_FORMAT(NOW(),\'%Y-%m-%d %H:%i:%s\')')->whereRaw('to_date > DATE_FORMAT(NOW(),\'%Y-%m-%d %H:%i:%s\')');
    }
    
    public function scopeOffline($query){
        return $query->where('status','=', 2);
    }
    
    public function scopeInternal($query){
        return $query->where('is_intern','=','1');
    }
    
    public function scopeHold($query){
        return $query->where('status','=', 3);
    }

    public function scopeTop($query){
        return $query->whereNotNull('featured_expiration_date');
    }
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function value_workload(){
        require_once 'value_workload.php';
        return $this->belongsTo('value_workload','workload_id');
    }
    public function value_region(){
        require_once 'value_region.php';
        return $this->belongsTo('value_region','region_id');
    }
    public function value_country(){
        require_once 'value_country.php';
        return $this->belongsTo('value_country','country_id');
    }
    public function value_profession(){
        require_once 'value_profession.php';
        return $this->belongsTo('value_profession','profession_id');
    }
    public function value_entering(){
        require_once 'value_entering.php';
        return $this->belongsTo('value_entering','entering_id');
    }
    public function value_sub_branch(){
        require_once 'value_branch_of_industry.php';
        return $this->belongsTo('value_branch_of_industry','sub_branch_id');
    }
    public function value_main_branch(){
        require_once 'value_branch_of_industry.php';
        return $this->belongsTo('value_branch_of_industry','main_branch_id');
    }
    public function value_zip(){
        require_once 'value_zip.php';
        return $this->belongsTo('value_zip','zip_md5');
    }
    public function value_contact(){
        require_once 'employee.php';
        return $this->belongsTo('employee','contact_id');
    }
    public function value_creator(){
        require_once 'employee.php';
        return $this->belongsTo('employee','creator_id');
    }
    public function value_customer_department(){
        require_once 'customer_department.php';
        return $this->belongsTo('customer_department','customer_department_id');
    }
    
    // one to one
    public function vac_content(){
        require_once 'vac_content.php';
        return $this->hasOne('vac_content', 'vac_info_id');
    }
    
    // many to many
    public function value_driver_license(){
        require_once 'value_driver_license.php';
        return $this->belongsToMany('value_driver_license','rel_vac_driver_license','vac_info_id','driver_license_id');
    }
    public function value_required_age(){
        require_once 'value_required_age.php';
        return $this->belongsToMany('value_required_age','rel_vac_required_age','vac_info_id','required_age_id');
    }
    public function value_position(){
        require_once 'value_position.php';
        return $this->belongsToMany('value_position','rel_vac_position','vac_info_id','position_id');
    }
    public function value_occupation(){
        require_once 'value_occupation.php';
        return $this->belongsToMany('value_occupation','rel_vac_occupation','vac_info_id','occupation_id');
    }
    public function value_employment(){
        require_once 'value_employment.php';
        return $this->belongsToMany('value_employment','rel_vac_employment','vac_info_id','employment_id');
    }
    
    // one to many
    public function vac_application(){
        require_once 'vac_application.php';
        return $this->hasMany('vac_application');
    }
}