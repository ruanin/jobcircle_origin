<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $arrParams = [];
    
    public function __construct() {
        $url = $this->parseUrl();
        
        if(file_exists('../app/controllers/' . $url['0'] .'.php')){
            $this->controller = $url['0'];
            unset($url['0']);
        }
       
        require_once '../app/controllers/' . $this->controller .'.php';
        $this->controller = new $this->controller;
        
        if(isset($url['1'])){
            if(method_exists($this->controller, $url['1'])){
                $this->method = $url['1'];
                unset($url['1']);
            }
        }
        
        $this->arrParams = $url ? array_values($url) : [];
        
        call_user_func_array([$this->controller, $this->method], $this->arrParams);
        
    }
    
    public function parseUrl(){
         
        if(isset($_GET['url'])){
            
            $tmpURL = trim($_GET['url'], '/');
//            $tmpURL = substr($_GET['url'], 1);
            $url = explode('/', filter_var(rtrim($tmpURL, '/'), FILTER_SANITIZE_URL));
            return $url;
        }
    }
}
