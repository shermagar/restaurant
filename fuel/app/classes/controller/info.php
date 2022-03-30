<?php 

class Controller_Info extends Controller 
{
    public function action_index()
    {
    $srv=Model_Restinfo::info();
    $header=$this->header = View::forge('templates/header');
    $header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar, 'services'=>$srv);
    return Response::forge(View::forge('pages/restaurantInfo',$data,false));
  }

  public function action_create()
  {
 if(Input::method()=='POST'){       
 $post = Model_Restinfo::forge();
 $post->service=Input::post('service');
 $post->vat=Input::post('vat');
 $post->discount=Input::post('discount');

 $post->save();
  } 
  Response::redirect('info/index');
  }
  
  public function action_remove($id)
{
$id=Input::post('id');
$post=Model_Restinfo::find($id);
$post->save();
$post->delete();

  

  Response::redirect('info/index');
}


}
?>