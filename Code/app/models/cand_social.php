<?php
/**
 * Description of cand_social
 *
 * @author aschaerer
 */
class cand_social extends BaseModel{
    protected $table = 'cand_social';
    protected $primaryKey  = 'cand_social_id';
    
    protected $fillable = ['cand_profile_id','type','value','validate_md5key'];
    
    protected $checkFields = [
        'cand_profile_id' => ['required','numeric'],
        'type' => ['required',['values', 'web,skype']],
        'value' => ['required']
    ];
    protected $checkFieldNames = [
        'cand_profile_id' => 'Kandidat Profil',
        'type' => 'Social Typ',
        'value' => 'Wert'
    ];
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function cand_profile(){
        require_once 'cand_profile.php';
        return $this->belongsTo('cand_profile','cand_profile_id');
    }
}