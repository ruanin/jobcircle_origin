<?php

class Controller 
{
    protected $theme = DEFAULT_TEMPLATE_NAME; 
    protected $view = 'home';
 
    public function model($model){  

        require_once '../app/models/' . $model .'.php';
        return new $model();
    }

    public function view($view, $data = []){
        $objVac = $this->model('vac_info');
        $query = $objVac->Online()->orderBy('featured_expiration_date', 'desc');
        $arrFooterTopJobs = $query->limit(6)->get();

        $arrNewJobs = $objVac->Online()->orderBy('vac_info_id', 'desc')->limit(6)->get();
        require_once '../app/template/' . $this->theme . '/' . $view . '.php';
    }
}
