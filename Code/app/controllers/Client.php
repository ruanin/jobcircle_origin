<?php

class Client extends Controller
{
    public function index(){
        echo "Test";
    }
    
    public function PersonalRequest(){
        
        $objEmployment = $this->model('value_employment');
        $arrEmployment = $objEmployment->get();
        
        $objLicense = $this->model('value_driver_license');
        $arrLicense = $objLicense->orderBy('driver_license_id', 'asc')->get();
        
        $objWorkload = $this->model('value_workload');
        $arrWorkload = $objWorkload->get();
        
        $objDepartment = $this->model('customer_department');
        $arrDepartment = $objDepartment->orderby('city', 'asc')->get();
        
        $objEducationWorkdemand = $this->model('value_education_workdemand');
        $arrEducationWorkdemand = $objEducationWorkdemand->get();
        
        $objEntering = $this->model('value_entering_workdemand');
        $arrEntering = $objEntering->get();
        
        $objExperience = $this->model('value_experience_workdemand');
        $arrExperience = $objExperience->orderby('experience_workdemand_id', 'asc')->get();
        //$test = Toolkit::getDepartmentFromZip(3014);

        $this->view('Personalrequest', array(
            'employment' => $arrEmployment,
            'license' => $arrLicense,
            'workload' => $arrWorkload,
            'department' => $arrDepartment,
            'education' => $arrEducationWorkdemand,
            'experience' => $arrExperience,
            'entering' => $arrEntering,
        ));
    }
    
    public function MitarbeiterPool($page=1){
        $limit = 15;
        $filter = array('occupation' => '', 'refkey'=> '', 'city' => '', 'occupationGroups' => '', 'employmentType' => '');
        $objCandPool =  $this->model('candpool_candidate');
        $occupation = Toolkit::getVar('occupation','');
        $refkey = Toolkit::getVar('refkey','');
        $city = Toolkit::getVar('city','');
        $regions = Toolkit::getVar('regions','');
        $occupationGroups = Toolkit::getVar('occupationGroups','');
        $employmentType = Toolkit::getVar('employmentType','');
        $query = $objCandPool->HasProfile();

        if(!empty($occupation)){
            $filter['occupation'] = $occupation;
            $query = $query->where('cand_profession','like', "%$occupation%");
        }

        if(!empty($city)){
            $filter['city'] = $city;
            $query = $query->where('cand_city','like',"%$city%");
        }
        
        if(!empty($regions)){
            $filter['regions'] = $regions;
            $query = $query->whereRaw('CONCAT(",", `cand_work_regions`, ",") REGEXP ",('.implode('|',$regions).'),"');
        }

        if(!empty($refkey) && is_numeric($refkey)){
            $filter['refkey'] = $refkey;
            $query = $query->where('hrc_cand_id','=',$refkey);
        }
        
        if(!empty($occupationGroups)){
            $filter['occupationGroups'] = $occupationGroups;
            $query = $query->whereRaw('CONCAT(",", `cand_work_regions`, ",") REGEXP ",('.implode('|',$occupationGroups).'),"');

        }
        
        if(!empty($employmentType)){
            $filter['employmentType'] = $employmentType;
            $tmpEmployment = count($employmentType) > 1 ? array(3,5,8): ($employmentType[0] == '5' ? array(3,5): array(8));
            $query = $query->whereRaw('CONCAT(",", `cand_req_employment_id`, ",") REGEXP ",('.implode('|',$tmpEmployment).'),"');
        }
        
        $skip = 0;
        if($page > 1){
            $skip = $page * $limit - $limit;
        }
        
        $totalCandidates = $query->count();
        if($totalCandidates > 220){
            $totalCandidates = 200;
        }
        $pages = $totalCandidates / $limit;
        $arrCandidates = $query->orderBy('hrc_cand_id', 'desc')->skip($skip)->take($limit)->get();
         
        $objRegion = $this->model('value_region');
        $arrRegion = $objRegion->where('dependency','<>', '0')
                                ->where('country_id', '1')
                                ->orderBy('title', 'asc')
                                ->get();
        
        $objProfession = $this->model('value_profession');
        $arrProfessionGroup = $objProfession->where('parent','0')
                                            ->orderBy('name', 'asc')
                                            ->get();
        
        $this->view('MitarbeiterPool', array('candidateList' => $arrCandidates,  
                                    'region' => $arrRegion,
                                    'filter' => $filter,
                                    'professiongroup' => $arrProfessionGroup,
                                    'activepage' => $page,
                                    'pages' => $pages));
    }
    
    public function MitarbeiterProfil($profileId){
        $arrPersonalSkills = array();
        $arrProfessionSkills = array();
        if(isset($profileId) && !empty($profileId) && is_numeric($profileId)){
            $objCandPool = $this->model('candpool_candidate');
            $arrProfileInfo = $objCandPool->find($profileId);
            
            $objEmployment = $this->model('value_employment');
            $objDriversLicense = $this->model('value_driver_license');
            $objProfessionSkills = $this->model('value_profession_skills');
            $objPersonalSkills = $this->model('value_personal_skills');
            $objRegions = $this->model('value_region');
            if(!empty($arrProfileInfo)){
                if(!empty($arrProfileInfo['cand_salutation'])){
                    $arrProfileInfo['cand_salutation'] = $arrProfileInfo['cand_salutation'] == 1 ? 'Weiblich' : 'Männlich';
                }
                
                if(!empty($arrProfileInfo['cand_req_available_from_date'])){
                    $arrProfileInfo['cand_req_available_from_date'] = $arrProfileInfo['cand_req_available_from_date'] > time() ? date('d.m.Y',$arrProfileInfo['cand_req_available_from_date']) : 'ab sofort';
                }else{
                    $arrProfileInfo['cand_req_available_from_date'] = 'nach Vereinbarung';
                }
                
                if(!empty($arrProfileInfo['cand_work_regions'])){
                    $arrWorkRegions = $objRegions->getRegionNameByCommaSeparatedIds($arrProfileInfo['cand_work_regions']);
                    $arrProfileInfo['cand_work_regions'] = count($arrWorkRegions) == 26 ? 'ganze Schweiz' : implode(', ',$arrWorkRegions);
                }else{
                    $arrProfileInfo['cand_work_regions'] = 'ganze Schweiz';
                }
                
                if(!empty($arrProfileInfo['cand_shortprofile_softskills'])){
                    $arrPersonalSkills = $objPersonalSkills->getSkillNameByCommaSeparatedIds($arrProfileInfo['cand_shortprofile_softskills']);
                }
                
                if(!empty($arrProfileInfo['cand_driver_license'])){
                    $arrDriverLicense = $objDriversLicense->getDriverLicenseByCommaSeparatedIds($arrProfileInfo['cand_driver_license']);
                    $arrProfileInfo['cand_driver_license'] = $arrDriverLicense;
                }
                
                if(!empty($arrProfileInfo['cand_req_employment_id'])){
                    $arrEmployment = $objEmployment->getEmploymentNamesByCommaSeparatedIds($arrProfileInfo['cand_req_employment_id']); 
                    $arrProfileInfo['cand_req_employment_id'] = $arrEmployment;
                }
                
                $arrProfileInfo->candpool_candidate_shortprofile_skills;
                $arrSkills = array();
                if(!empty($arrProfileInfo->candpool_candidate_shortprofile_skills)){
                    foreach($arrProfileInfo->candpool_candidate_shortprofile_skills as $skillKey => $skillData){
                        $duration = '';

                        if($skillData->years == 1)     $duration .= $skillData->years.' Jahr';
                        elseif($skillData->years > 1)  $duration .= $skillData->years.' Jahre';

                        if(!empty($skillData->years) && !empty($skillValues['sp_months'])) $duration .= ', ';

                        if($skillData->months == 1)     $duration .= $skillData->months.' Monat';
                        elseif($skillData->months > 1)  $duration .= $skillData->months.' Monate';
                        $arrSkillValues = $objProfessionSkills->getSkillNameByCommaSeparatedIds($skillData->skills);
                        $arrSkills[] = array('profession' => $skillData->profession, 'skills' => $arrSkillValues,
                                             'years' => $skillData->years, 'months' => $skillData->months, 'duration' => $duration);
                    }
                } 
            }
            $this->view('MitarbeiterProfil', array('profile_data' => $arrProfileInfo, 
                                                'professionSkills' => $arrSkills,
                                                'personalSkills' => $arrPersonalSkills));
        }
    }
    
    public function Stellenmeldepflicht(){
        $letter = Toolkit::getVar('letter','');
        $kanton = Toolkit::getVar('kanton','');
        $fullSearch = Toolkit::getVar('fullSearch','');
        
        $objAvamProfession = $this->model('seco_avam_profession');
        if(empty($letter) && empty($fullSearch)){
            $arrProfessionList = $objAvamProfession->orderBy('seco_bezeichnung_male_de', 'asc')->get()->all();
        }elseif(!empty($letter)){
            $arrProfessionList = $objAvamProfession->orWhere('seco_bezeichnung_male_de','like',$letter.'%')->orderBy('seco_bezeichnung_male_de', 'asc')->get()->all();
        }else{
            $arrProfessionList = $objAvamProfession->where('seco_bezeichnung_male_de','like','%'.$fullSearch.'%')->orWhere('seco_bezeichnung_female_de','like','%'.$fullSearch.'%')->orderBy('seco_bezeichnung_male_de', 'asc')->get()->all();
        }
        $objRegion = $this->model('value_region');
        $arrRegion = $objRegion->where('dependency','<>', '0')
                                ->where('country_id', '1')
                                ->orderBy('title', 'asc')
                                ->get();
        $this->view('Stellenmeldepflicht', array('professionList' => $arrProfessionList,
                                                 'region' => $arrRegion, 
                                                 'kanton' => $kanton, 
                                                 'search' => $fullSearch));
    }
}