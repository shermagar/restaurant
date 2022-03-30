<?php 

class Controller_Category extends Controller 
{
	public function action_index()
	{

$cat=Model_Category::category();

    $header=$this->header = View::forge('templates/header');
	$header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar, 'categorys'=>$cat);
    return Response::forge(View::forge('pages/category',$data,false));

   
  }
 public function action_create()
{

if(Input::method()=='POST'){       
  $post = Model_Category::forge();
  $post->name=Input::post('name');
  $post->active=Input::post('active');
  $post->image=$_FILES["image"]["name"];  

    
  $post->save();
  $tempname=$_FILES["image"]["tmp_name"];
  $folder="assets/img/".$_FILES["image"]["name"];

  move_uploaded_file($tempname,$folder);
 
  Response::redirect('category/index');
}
}


 public function action_edit($id)
{
 
if(Input::method()=='POST'){  
    $id=Input::post('id');    
    $name=Input::post('name');
    $active=Input::post('active');
   $post=Model_Category::find($id);
   $post->name=$name;
   $post->active=$active;
 
   $post->save();

  }

  Response::redirect('category/index');
}


public function action_remove($id)
{
$id=Input::post('id');
$post=Model_Category::find($id);
$post->save();
$post->delete();

  

  Response::redirect('category/index');
}

}

?>