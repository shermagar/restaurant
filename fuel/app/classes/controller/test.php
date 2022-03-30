<?php
class Controller_test extends Controller_Base 
    {
    public $template = 'templates';


    public function action_test(){

     return View::forge('test'); 
    }
}