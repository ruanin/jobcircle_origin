<?php
/**
 * Description of vac_application
 *
 * @author aschaerer
 */
class vac_application extends BaseModel{
    protected $table = 'vac_application';
    protected $primaryKey  = 'application_id';
    
    protected $fillable = ['cand_profile_id','vac_info_id','available_from_id','title','jobmotivation','cvtext','source_url','hrc_app_id','esrc'];
    
    protected $checkFields = [
        'cand_profile_id' => ['required','numeric'],
        'vac_info_id' => ['numeric'],
        'title' => ['required']
    ];
    protected $checkFieldNames = [
        'cand_profile_id' => 'Kandidat Profil',
        'vac_info_id' => 'Vakanz',
        'title' => 'Vakanz Titel',
        'source_url' => 'URL Quelle'
    ];
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->belongsTo('vac_info','vac_info_id');
    }
    public function cand_profile(){
        require_once 'cand_profile.php';
        return $this->belongsTo('cand_profile','cand_profile_id');
    }
    public function value_available_from(){
        require_once 'value_available_from.php';
        return $this->belongsTo('value_available_from','available_from_id');
    }
}