<?php
/**
 * Description of jobmail_searchtable
 *
 * @author aschaerer
 */
class jobmail_searchtable extends BaseModel{
    protected $table = 'jobmail_searchtable';
    protected $primaryKey  = 'jobmail_searchtable_id';
    
    protected $fillable = ['jobmail_id','profession_id','region_id'];
    
    protected $checkFields = [
        'jobmail_id' => ['required','numeric'],
        'profession_id' => ['required','numeric']
    ];
    protected $checkFieldNames = [
        'jobmail_id' => 'Jobmail Id',
        'profession_id' => 'Berufs Id'
    ];
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function jobmail(){
        require_once 'jobmail.php';
        return $this->belongsTo('jobmail','jobmail_id');
    }
    public function value_profession(){
        require_once 'value_profession.php';
        return $this->belongsTo('value_profession','profession_id');
    }
    public function value_region(){
        require_once 'value_region.php';
        return $this->belongsTo('value_region','region_id');
    }
}