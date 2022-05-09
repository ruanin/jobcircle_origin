<?php
/**
 * Description of cand_social
 *
 * @author aschaerer
 */
class vac_newsletter extends BaseModel{
    protected $table = 'vac_newsletter';
    protected $primaryKey  = 'vac_newsletter_id';
    
    protected $fillable = ['title','profession_branche_id','search','region_id',
                            'frequency','f_name','l_name', 'status', 'mail_id'];
    
    protected $checkFields = [
        'title' => ['required'],
        'frequency' => ['required', 'numeric'],
        'f_name' => ['required'],
        'l_name' => ['required'],
        'mail_id' => ['required', 'numeric'],
    ];
    protected $checkFieldNames = [
        'vac_newsletter_id' => 'Newsletter ID',
        'created_at' => 'Erstellungsdatum',
        'updated_at' => 'Aktualisierungsdatum',
        'title' => 'Bezeichnung',
        'profession_branche_id' => 'Fachbereich',
        'search' => 'Suchbegriff',
        'region_id' => 'Kanton',
        'frequency' => 'Frequenz',
        'f_name' => 'Vorname',
        'f_name' => 'Nachname',
        'status' => 'Status'
    ];
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function email(){
        require_once 'email.php';
        return $this->belongsTo('email','mail_id');
    }
}