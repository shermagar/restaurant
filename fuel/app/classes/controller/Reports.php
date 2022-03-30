<?php 

class Controller_Reports extends Controller 
{
    

    public function action_index()
    {
     $header=$this->header = View::forge('templates/header');
    $header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);
        return Response::forge(View::forge('reports/index',$data));
    }

    public function action_storewise()
    {
    $header=$this->header = View::forge('templates/header');
    $header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);
        return Response::forge(View::forge('reports/storewise',$data));
        } 

}