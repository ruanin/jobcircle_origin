<?php

class candpool_candidate extends BaseModel {
    protected $table = 'candpool_candidate';
    protected $primaryKey  = 'hrc_cand_id';
    public $timestamps = false;
    
    public function candpool_candidate_shortprofile_skills(){
        require_once 'candpool_candidate_shortprofile_skills.php';
        return $this->hasMany('candpool_candidate_shortprofile_skills','hrc_cand_id');
    }
    
    public function scopeHasProfile($query){
        return $query->whereRaw('EXISTS (SELECT hrc_cand_id from cand_profile WHERE cand_profile.hrc_cand_id = candpool_candidate.hrc_cand_id)');
    }
}
