<?php

class cand_password_reset extends BaseModel {
    protected $table = 'cand_password_reset';
    protected $primaryKey  = 'cand_profile_id';
    
    protected $fillable = ['cand_profile_id','key', 'key_expiredate' ];
    
    protected $checkFields = [
        'cand_profile_id' => ['required'], 
        'key' => ['required'],
        'key_expiredate' => ['required','datetime']
    ];
    
}