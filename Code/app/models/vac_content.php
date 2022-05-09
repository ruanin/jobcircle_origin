<?php
/**
 * Description of vac_content
 *
 * @author aschaerer 
 */
class vac_content extends BaseModel{
    protected $table = 'vac_content';
    protected $primaryKey  = 'vac_info_id';
    public $timestamps = false;
    
    protected $fillable = ['header','description','requirements','footer'];
    
    protected $checkFields = [
        'header' => ['required'],
        'description' => ['required'],
        'requirements' => ['required']
    ];
    protected $checkFieldNames = [
        'header' => 'Einleitungstext',
        'description' => 'Stellenbeschreibung',
        'requirements' => 'Bewerberprofil'
    ];
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function vac_info(){
        require_once 'vac_info.php';
        return $this->belongsTo('vac_info','vac_info_id');
    }
}