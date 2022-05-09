<?php
/**
 * Description of cand_address
 *
 * @author aschaerer
 */
class cand_address extends BaseModel{
    protected $table = 'cand_address';
    protected $primaryKey  = 'cand_address_id';
    
    protected $fillable = ['cand_profile_id','country_id','region_id','type','street','postbox','zip','city'];
    
    protected $checkFields = [
        'cand_profile_id' => ['required','numeric'],
        'country_id' => ['required','numeric'],
        'region_id' => ['numeric'],
        'street' => ['required'],
        'zip' => ['required'],
        'city' => ['required'],
        'type' => ['required',['values', 'private,accommodation,business']]
    ];
    protected $checkFieldNames = [
        'cand_profile_id' => 'Kandidat Profil',
        'country_id' => 'Land',
        'region_id' => 'Region',
        'street' => 'Strasse',
        'zip' => 'Plz',
        'city' => 'Ort',
        'type' => 'Adresse Typ'
    ];
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function cand_profile(){
        require_once 'cand_profile.php';
        return $this->belongsTo('cand_profile','cand_profile_id');
    }
    
    public function value_region(){
        require_once 'value_region.php';
        return $this->belongsTo('value_region','region_id');
    }
    
    public function value_country(){
        require_once 'value_country.php';
        return $this->belongsTo('value_country','country_id');
    }
}