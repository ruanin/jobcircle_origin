<?php
/**
 * Description of Vacancyboard
 *
 * @author aschaerer
 */
class Vacancyboard extends Controller{
    public function index($page=1){
        $limit = 15;
        $objVac = $this->model('vac_info');
        $showDetailFilter = false;
        $filter = array('occupation' => '', 'place'=> '0', 'refkey'=> '','occupationGroup'=> '0','city' => '', 'occupationGroups' => '', 'employmentType' => '');
        
        $occupation = Toolkit::getVar('jobtitle','');//(isset($_POST['jobtitle'])) ? $_POST['jobtitle'] : '';
        $occupationGroup = Toolkit::getVar('occupationGroup','');//(isset($_POST['occupationGroup'])) ? $_POST['occupationGroup'] : ''; // $arrInputForm['salutation'] = Toolkit::getVar('salutation',0);
        $refkey = Toolkit::getVar('refkey','');//(isset($_POST['refkey'])) ? $_POST['refkey'] : '';
        $place = Toolkit::getVar('place','');//(isset($_POST['place'])) ? $_POST['place'] : '';
        $city = Toolkit::getVar('city','');//(isset($_POST['place'])) ? $_POST['place'] : '';
        $regions = Toolkit::getVar('regions','');//(isset($_POST['place'])) ? $_POST['place'] : '';
        $occupationGroups = Toolkit::getVar('occupationGroups','');
        $employmentType = Toolkit::getVar('employmentType','');
        $query = $objVac->Online();

        $showDetailFilter = true;
        if(!empty($occupation)){
            $filter['occupation'] = $occupation;
            $query = $query->where('jobtitle','like', "%$occupation%");
        }

        if(!empty($place) && is_numeric($place)){
            $filter['place'] = $place;
            $query = $query->where('region_id','=',$place);
        }

        if(!empty($city)){
            $filter['city'] = $city;
            $query = $query->where('city','like',"%$city%");
        }
        
        if(!empty($regions)){
            $filter['regions'] = $regions;
            $query = $query->where('region_id', $regions);
        }

        if(!empty($refkey) && is_numeric($refkey)){
            $filter['refkey'] = $refkey;
            $query = $query->where('unique_key','=',$refkey);
        }
        
        if(!empty($occupationGroup) && is_numeric($occupationGroup)){
            $filter['occupationGroup'] = $occupationGroup;
            $query = $query->where('main.parent','=',$occupationGroup)
                           ->leftJoin('value_profession as child', 'vac_info.profession_id', '=', 'child.profession_id')
                           ->leftJoin('value_profession as main', 'child.parent', '=', 'main.profession_id');

        }
        
        if(!empty($occupationGroups)){
            $filter['occupationGroups'] = $occupationGroups;
            $query = $query->where('main.parent', $occupationGroups)
                           ->leftJoin('value_profession as child', 'vac_info.profession_id', '=', 'child.profession_id')
                           ->leftJoin('value_profession as main', 'child.parent', '=', 'main.profession_id');

        }
        
        if(!empty($employmentType)){
            $filter['employmentType'] = $employmentType;
            if(count($employmentType) == 1){
                $tmpEmployment = ($employmentType[0] == 5) ? array(3,5): array(8);
                $query = $query->where('emp.employment_id', $tmpEmployment)
                               ->leftJoin('rel_vac_employment as emp', 'vac_info.vac_info_id', '=', 'emp.vac_info_id');
            }
        }
        
        $skip = 0;
        if($page > 1){
            $skip = $page * $limit - $limit;
        }
        
        $totalVac = $query->count();
        if($totalVac > 220){
            $totalVac = 200;
        }
        $pages = $totalVac / $limit;
        $arrVac = $query->orderBy('unique_key', 'desc')->skip($skip)->take($limit)->get();
        
        
       // var_dump($query->orderBy('unique_key', 'desc')->skip($skip)->take($limit)->lastQu); // Laravel hat eine toSql() Funktion, mit var_dump printet es die exakte SQL Abfrage aus.
        
        //var_dump($query->toSql());
        //var_dump($arrVac);
        //var_dump($arrVac); //array(0), keine verbindung.
       
        // var_dump($query->orderBy('unique_key', 'desc')->skip($skip)->take($limit)->get()); /* Bis hier hin funktionierts. */
      
        //var_dump($query->where('jobtitle','like',$occupation));
        
        $objRegion = $this->model('value_region');
        $arrRegion = $objRegion->where('dependency','<>', '0')
                                ->where('country_id', '1')
                                ->orderBy('title', 'asc')
                                ->get();
        
       
        
        $objProfession = $this->model('value_profession');
        $arrProfessionGroup = $objProfession->where('parent','0')
                                            ->orderBy('name', 'asc')
                                            ->get();
        
        
        $this->view('Vacancy',array('vacancylist' => $arrVac,  
                                    'region' => $arrRegion,
                                    'filter' => $filter,
                                    'professiongroup' => $arrProfessionGroup,
                                    'activepage' => $page,
                                    'pages' => $pages,
                                    'showFilter' => $showDetailFilter));
    }
    
    public function Detail($vac_id=0){
        
        if(isset($_GET['esrc'])){
            $vac_id = substr($vac_id,0, -3);
        }
        if(isset($vac_id) && !empty($vac_id) && is_numeric($vac_id)){
            $objVacInfo = $this->model('vac_info');
            $arrVacInfo = $objVacInfo->find($vac_id);
            $arrOtherVacancy = array();
            if(!empty($arrVacInfo)){
                $arrVacInfo->vac_content;
                $arrVacInfo->value_occupation;
                $arrVacInfo->value_driver_license;
                $arrVacInfo->value_workload;
                $arrVacInfo->value_country;
                $arrVacInfo->value_sub_branch;
                $arrVacInfo->value_region;
                $arrVacInfo->value_employment;
                if(isset($arrVacInfo->req_vehicle) && $arrVacInfo->req_vehicle == 1){
                    $arrVacInfo->req_vehicle = 'Ja';
                }
                $arrVacInfo->value_driver_license;
                $arrVacInfo->value_contact;
                $arrVacInfo->value_customer_department;
                $arrVacInfo->value_profession;
                
                $otherVacQuery = $objVacInfo->Online();
                $otherVacQuery = $otherVacQuery->where('vac_info.vac_info_id','<>',$vac_id);
                $otherVacQuery = $otherVacQuery->where('main.profession_id', '=', $arrVacInfo->value_profession->parent)
                                               ->leftJoin('value_profession as child', 'vac_info.profession_id', '=', 'child.profession_id')
                                               ->leftJoin('value_profession as main', 'child.parent', '=', 'main.profession_id');
                $arrOtherVacancy = $otherVacQuery->orderBy('vac_info.from_date', 'desc')->take(4)->get();
                $arrEmployment = array();
                
                //Einladungslink-Variablen
                $inputAffiliateVacancyboard = Toolkit::getPost('affiliate-vacancy', '');

                foreach($arrVacInfo->value_employment as $employment) { 
                    if(in_array($employment->employment_id,array("3","5"))){
                        $arrEmployment[] = 'FULL_TIME'; 
                    }elseif(in_array($employment->employment_id,array("8"))){
                        $arrEmployment[] = 'TEMPORARY'; 
                    }elseif(in_array($employment->employment_id,array("1","2","6","7","9","10","11"))){
                        $arrEmployment[] = 'OTHER'; 
                    }
                }
                $todayDate = date("Y-m-d");
                $toDate = date("Y-m-d",strtotime($arrVacInfo->to_date));
                $vacancyExpired = 2;
                if($arrVacInfo->status != 1 || $toDate < $todayDate){
                    $vacancyExpired = 1;
                }
                $this->view('VacancyDetail',array('vac_data' => $arrVacInfo,
                                                   'employment' => $arrEmployment, 
                                                   'expired' => $vacancyExpired,
                                                   'otherVacancy' => $arrOtherVacancy));
            }else{
                echo "Vakanzen ID nicht vorhanden";
            }
            
            
        }else{
            //echo "ID ist ungültig";
        } 
    }
    
    public function Apply($vac_id=0){
        
        
        //Einladungslink-Variablen
        if(isset($_GET['track'])){
        $inputAffiliateVacancyboard = $_GET['track'];
        var_dump("it worked"); end();
        }
        
        //Wenn kein affiliate Nummer angegeben war, ist $inputAffiliateVacancyboard = null;

        
        if(!empty($vac_id) && !empty($_SESSION['cand_profile_id'])){
            $error = '';
            $objVacInfo = $this->model('vac_info');
            $arrVacInfo = $objVacInfo->find($vac_id);
            if(empty($arrVacInfo)){
                $error = 'Diese Stelle ist leider nicht mehr verfügbar.'; 
            }else{
                $objVacApplication = $this->model('vac_application');
                $countAppInfo = $objVacApplication->where('vac_info_id', $vac_id)
                                                ->where('cand_profile_id', $_SESSION['cand_profile_id'])->count();
                if(empty($countAppInfo)){
                    $objProfile = $this->model('cand_profile');
                    $arrProfile = $objProfile->find($_SESSION['cand_profile_id']);
                    $objVacApplication->cand_profile_id = $_SESSION['cand_profile_id'];
                    $objVacApplication->vac_info_id = $vac_id;
                    $objVacApplication->available_from_id = $arrProfile['available_from_id'];
                    $objVacApplication->title = $arrVacInfo['jobtitle'];
                    $objVacApplication->source_url = $_SESSION['org_referer'];
                    $objVacApplication->esrc = $_SESSION['esrc'];
                    $objVacApplication->affiliate_id = $inputAffiliateVacancyboard;
                    $status = $objVacApplication->save();
                    if(!$status){
                        $error = 'Daten konnten nicht gespeichert werden';
                    }
                }else{
                    $error = 'Sie haben sich bereits für diese Stelle beworben';
                    var_dump($inputAffiliateVacancyboard);
                }
            }
            $this->view('VacancyApply',array('vac_data' => $arrVacInfo, 'error' => $error));
        }else{
            $location = WEB_URL.'/Candidate/registerWizard';
            header("Location: $location");
        }
        
    }
}
