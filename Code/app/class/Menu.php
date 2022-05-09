<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author tsiva
 */
class Menu {
    public static function getMenu(){

        $URI = $_SERVER['REQUEST_URI'];
        $arrParams = array_filter(explode('/', $URI));
        if(!empty($arrParams)){
            if(count($arrParams) == 2){
                $controller = $arrParams[2];
            }else{
                $controller = $arrParams[1];
            }
        }
        
        $menu = require_once '../app/config/navigation.php';
        
        if(isset($controller) && !empty($controller)){
            if(isset($menu['items'][$controller])){
                $menu['items'][$controller]['class'] = 'active';
            }
        }

        return $menu['items'];
    }
}
