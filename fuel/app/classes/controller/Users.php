<?php 

class Controller_Users extends Controller 
{
	

	public function action_index()
	{
	 $header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);
		return Response::forge(View::forge('users/index',$data));
	}

	public function action_create()
	{
		    if(Input::method()=='POST')
    	{
    		$post=Model_User::forge();
    		$post->username=Input::post('username');
    		$post->group=Input::post('groups');
    		$post->full_name=Input::post('fname');
    		$post->password=Input::post('password');
    		$post->phone=Input::post('phone');
            $post->email=Input::post('email');
            $post->address=Input::post('address');
            $post->save();
    
    	}
	$header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);
		return Response::forge(View::forge('users/create',$data));
        }	

		
	

	public function action_edit()
	{

	 $header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);

				return Response::forge(View::forge('users/edit',$data));
	        }	
		

		
	

	public function action_delete()
	{
		$header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);

return Response::forge(View::forge('users/delete',$data));				
		
	}
public function action_profile()
	{
		$header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);

return Response::forge(View::forge('users/profile',$data));				
		
	}
	public function action_setting()
	{
		$header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);

return Response::forge(View::forge('users/setting',$data));				
		
	}

}