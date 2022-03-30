<?php 

class Controller_Groups extends Controller 
{
	

	public function action_index()
	{
		$gro=Model_Groups::group();
	 $header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar,'groupss'=>$gro);
		return Response::forge(View::forge('groups/index',$data));
	}

	public function action_create()
	{
		 if(Input::method()=='POST'){
    
    $post=Model_Groups::forge();
    $post->group_name=Input::post('group_name');
    $post->permission=Input::post('permission');
    

    
    $post->save();
}
	$header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);
		return Response::forge(View::forge('groups/create',$data));
        }	

		
	

	public function action_edit($id)
	{

		 if(Input::method()=='POST'){
    
    $post=Model_Groups::find($id);
    $post->group_name=Input::post('group_name');
    $post->permission=Input::post('permission');
    

    
    $post->save();
  }
     
	 $header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);

				return Response::forge(View::forge('groups/edit',$data));
	        }	
		

		
	

	public function action_delete($id)
	{

 if(Input::method()=='POST'){
    $id=Input::post('id');
    $post=Model_Groups::find($id); 
    $post->save();
    $post->delete();
  }
$gro=Model_Groups::group();
		$header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar,'groupss'=>$gro);

return Response::forge(View::forge('groups/delete',$data));				
		
	}


}