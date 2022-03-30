<?php 

class Controller_Tables extends Controller 
{
    

    public function action_index()
    {
    	$result=Model_Tables::tables();
     $header=$this->header = View::forge('templates/header');
    $header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar, 'tables'=>$result);
        return Response::forge(View::forge('tables/index',$data));
    }
    public function action_create()
    {
    if(Input::method()=='POST')
    	{
    		$post=Model_Tables::forge();
    		$post->table_num=Input::post('table_num');
            $post->save();
    
    	}
     Response::redirect('tables/index');
    }

}