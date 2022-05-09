<?php

class contacts extends BaseModel{
    protected $table = 'contacts';
    protected $primaryKey  = 'contact_id';
    
    protected $fillable = ['name','mail','subject','message','contact_profile_id',
                            'contact_user_id','contact_department_id'];
    
    protected $checkFields = [
        'name' => ['required'],
        'mail' => ['required'],
        'subject' => ['required'],
        'message' => ['required']
    ];
    protected $checkFieldNames = [
    ];
    
    
    
}