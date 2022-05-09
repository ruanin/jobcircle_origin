<?php
/**
 * Description of value_profession_skills
 *
 * @author fselmani
 */
class value_personal_skills extends BaseModel{
    protected $table = 'value_personal_skills';
    protected $primaryKey  = 'skill_id';

    public function getSkillNameByCommaSeparatedIds($commaSkillsIds){
        $arrSkills = explode(',',$commaSkillsIds);
        if(empty($arrSkills)){ return false; }
        $arrSkills = array();
        $arrSkillValues = $this->select("skill_name")->whereRaw("find_in_set(skill_id,'".$commaSkillsIds."')")->get();
        if(!empty($arrSkillValues)){
            foreach($arrSkillValues as $skillKey => $skillName){
                $arrSkills[] = $skillName['skill_name'];
            }
        }
        return $arrSkills;
    }
}
