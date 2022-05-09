<?php

class import_candidate extends BaseModel{
    protected $table = 'import_candidate';
    protected $primaryKey  = 'cand_id';
    
    protected $fillable = ['login_email','last_login','createdate','valid_status','lastname',
                            'firstname','birthday_date','street','zip', 'city','country_id','region_id',
                            'profession', 'email', 'phone', 'md5_key', 'sent_invitation','gender'];
    
    protected $checkFields = [
        'login_email' => ['required'],
    ];
    protected $checkFieldNames = [
    ];
    
    
    
}