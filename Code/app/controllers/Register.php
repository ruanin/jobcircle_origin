<?php

class Register extends Controller 
{
    public function index(){
        $this->view('RegisterNew');
    }
     
    public function apply(){
        $task = Toolkit::getVar('task',0);
        if(!empty($task)){
            $this->view('ApplyConfirmation',$_POST);
        }else{
            $this->view('ApplyNew');
        }
    }
}