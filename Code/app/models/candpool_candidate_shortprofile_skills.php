<?php

class candpool_candidate_shortprofile_skills extends BaseModel {
    protected $table = 'candpool_candidate_shortprofile_skills';
    protected $primaryKey  = 'id';
    public $timestamps = false;
    
    public function value_profession_skills(){
        require_once 'value_profession_skills.php';
        return $this->belongsTo('value_profession_skills','skill_id');
    }
    
    public function candpool_candidate(){
        require_once 'candpool_candidate.php';
        return $this->belongsTo('candpool_candidate','hrc_cand_id');
    }
}
