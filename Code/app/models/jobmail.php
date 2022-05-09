<?php
/**
 * Description of jobmail
 *
 * @author aschaerer
 */
class jobmail extends BaseModel{
    protected $table = 'jobmail';
    protected $primaryKey  = 'jobmail_id';
    
    protected $fillable = ['jobmail_user_id','name','md5_key','activ','lastsend_date','frequency'];
    
    protected $checkFields = [
        'jobmail_user_id' => ['required','numeric'],
        'name' => ['required'],
        'frequency' => ['required']
    ];
    protected $checkFieldNames = [
        'jobmail_user_id' => 'Jobmail User Id',
        'name' => 'Name',
        'frequency' => 'Häufigkeit'
    ];
    
    protected function beforeSave(){
        parent::beforeSave();
        $tempString = $this->attributes['jobmail_user_id'].'_-_'.$this->attributes['name'].'-_-'.time();
        $this->attributes['md5_key'] = $this->getMd5KeyFromString($tempString);
    }
    
    private function getMd5KeyFromString($string){
        return md5($string.'p$6Q_n;MhN:ub0x*SEv!Z398dE*<M]U.4tw==5Mm65{Eh5pP(Dd139:JA!3q0q4');
    }
    
    // DEFINE RELATIONSHIPS ----------------------------------------------------
    public function jobmail_user(){
        require_once 'jobmail_user.php';
        return $this->belongsTo('jobmail_user','jobmail_user_id');
    }
    
    public function jobmail_searchtable(){
        require_once 'jobmail_searchtable.php';
        return $this->hasMany('jobmail_searchtable');
    }
}