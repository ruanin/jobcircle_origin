<?php

class Home extends Controller 
{
    public function index(){
        $objGavNews = $this->model('gav_rss_news');
        $arrGavNews = $objGavNews->limit(10)->orderBy('id', 'desc')->get();
        $objRegion = $this->model('value_region');
        $arrRegion = $objRegion->where('dependency','<>', '0')
                                ->where('country_id', '1')
                                ->orderBy('title', 'asc')
                                ->get();
        $objProfession = $this->model('value_profession');
        $arrProfessionGroup = $objProfession->where('parent','0')
                                            ->orderBy('name', 'asc')
                                            ->get();
        $this->view('Home',array('gavnews' => $arrGavNews,
                                 'region' => $arrRegion,
                                 'professiongroup' => $arrProfessionGroup));
    }
}