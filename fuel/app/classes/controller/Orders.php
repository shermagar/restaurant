<?php 

class Controller_Orders extends Controller 
{
	

	public function action_index()
	{
	 $header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);
		return Response::forge(View::forge('orders/index',$data));
	}

	public function action_create()
	{
	$header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);
		return Response::forge(View::forge('orders/create',$data));
        }	

		
	

	public function action_edit()
	{

	 $header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);

				return Response::forge(View::forge('orders/edit',$data));
	   }


}