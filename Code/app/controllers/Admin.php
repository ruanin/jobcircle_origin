<?php

class Admin extends Controller
{
    public function index(){
        if(isset($_SESSION['isLoggedAdmin'])){
            echo "Yes";
        }else{
           
            $this->view('Login');
        }
    }
}