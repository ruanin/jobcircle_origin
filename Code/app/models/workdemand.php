<?php
/**
 * Description of workdemand
 *
 * @author aschaerer
 */
class workdemand extends BaseModel{
    // TODO: client_id und contact_id: diese sind noch nicht verbunden mit ihren Model Klassen, da diese noch nicht Existieren. Wenn diese erstellt wurden nicht vergessen in DB und im PHP verknüpfen.
    protected $table = 'workdemand';
    protected $primaryKey  = 'workdemand_id';

    protected $fillable = ['customer_department_id','workload_id','entering_workdemand_id','wish_workdemand_id','client_id','contact_id','country_id','zip','place','jobname','occupation','education_workdemand_id','experience_workdemand_id','description','additional_text','date_of_entry','req_vehicle','company_name','company_street','company_country_id','company_zip','company_place','contact_salutation','contact_firstname','contact_lastname','hrc_workdemand_id','not_pick_again'];
    
    protected $checkFields = [
        'customer_department_id' => ['required','numeric'],
        'workload_id' => ['required','numeric'],
        'entering_workdemand_id' => ['required','numeric'],
        'wish_workdemand_id' => ['numeric'],
        'client_id' => ['numeric'],
        'contact_id' => ['numeric'],
        'country_id' => ['required','numeric'],
        'zip' => ['required'],
        'place' => ['required'],
        'jobname' => ['required'],
        'occupation' => ['required'],
        'education_workdemand_id' => ['required','numeric'],
        'experience_workdemand_id' => ['required','numeric'],
        'company_name' => ['required'],
        'company_street' => ['required'],
        'company_country_id' => ['required'],
        'company_zip' => ['required'],
        'company_place' => ['required'],
        'contact_salutation' => ['required','numeric'],
        'contact_firstname' => ['required'],
        'contact_lastname' => ['required']
    ];
    protected $checkFieldNames = [
        'customer_department_id' => 'Abteilung',
        'workload_id' => 'Arbeitspensum',
        'entering_workdemand_id' => 'Stellenantritt',
        'wish_workdemand_id' => 'Wunsch ID',
        'client_id' => 'Kunde ID',
        'contact_id' => 'Kontakt ID',
        'country_id' => 'Land',
        'zip' => 'Plz',
        'place' => 'Einsatzort',
        'jobname' => 'Stellenbezeichnung',
        'occupation' => 'Beruf',
        'education_workdemand_id' => 'Ausbildung',
        'experience_workdemand_id' => 'Berufserfahrung',
        'company_name' => 'Firmen Name',
        'company_street' => 'Firmen Strasse',
        'company_country_id' => 'Firmen Land',
        'company_zip' => 'Firmen PLZ',
        'company_place' => 'Firmen Ort',
        'contact_salutation' => 'Kontakt Anrede',
        'contact_firstname' => 'Kontakt Vorname',
        'contact_lastname' => 'Kontakt Name'
    ];
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function rel_email(){
        require_once 'rel_email.php';
        return $this->hasMany('rel_email');
    }
    public function rel_phone_number(){
        require_once 'rel_phone_number.php';
        return $this->hasMany('rel_phone_number');
    }
    public function customer_department(){
        require_once 'customer_department.php';
        return $this->belongsTo('customer_department','customer_department_id');
    }
    public function value_workload(){
        require_once 'value_workload.php';
        return $this->belongsTo('value_workload','workload_id');
    }
    public function value_entering_workdemand(){
        require_once 'value_entering_workdemand.php';
        return $this->belongsTo('value_entering_workdemand','entering_workdemand_id');
    }
    public function value_wish_workdemand(){
        require_once 'value_wish_workdemand.php';
        return $this->belongsTo('value_wish_workdemand','wish_workdemand_id');
    }
    public function value_country(){
        require_once 'value_country.php';
        return $this->belongsTo('value_country','country_id');
    }
    public function value_company_country(){
        require_once 'value_country.php';
        return $this->belongsTo('value_country','company_country_id');
    }
    public function value_education_workdemand(){
        require_once 'value_education_workdemand.php';
        return $this->belongsTo('value_education_workdemand','education_workdemand_id');
    }
    public function value_experience_workdemand(){
        require_once 'value_experience_workdemand.php';
        return $this->belongsTo('value_experience_workdemand','experience_workdemand_id');
    }
    public function value_employment(){
        require_once 'value_employment.php';
        return $this->belongsToMany('value_employment','rel_workdemand_employment','workdemand_id','employment_id');
    }
    public function value_driver_license(){
        require_once 'value_driver_license.php';
        return $this->belongsToMany('value_driver_license','rel_workdemand_driver_license','workdemand_id','driver_license_id');
    }
}