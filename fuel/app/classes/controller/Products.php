<?php 

class Controller_Products extends Controller 
{
    

    public function action_index()
    {
     $pro=Model_Product::products();
     $header=$this->header = View::forge('templates/header');
    $header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar,'products'=>$pro);
        return Response::forge(View::forge('products/index',$data,false));
    }

    // public function action_create()
    // {
    // $header=$this->header = View::forge('templates/header');
    // $header_menu=$this->header_menu = View::forge('templates/header_menu');
    // $footer=$this->footer = View::forge('templates/footer');
    // $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    // $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar);
    //     return Response::forge(View::forge('products/create',$data));
       // }   

        
    

    public function action_create()
    {
    if(Input::method()=='POST'){
    // debug::dump(Input::post());
    // exit();
    $type=Input::post('type');  
    $post=Model_Product::forge();
    $post->name=Input::post('name');
    $post->description=Input::post('description');
    $post->price=Input::post('price');
    $post->category_id=Input::post('category_id');
    // $post->store_id=Input::post('store_id');
    $post->type=$type;
    $post->status=Input::post('active');
    $post->image=$_FILES["image"]["name"];  

    
    $post->save();
    $tempname=$_FILES["image"]["tmp_name"];
    $folder="assets/img/".$_FILES["image"]["name"];

    move_uploaded_file($tempname,$folder);



       }
     $cat=Model_Category::category();
    $header=$this->header = View::forge('templates/header');
    $header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar,'categorys'=>$cat);
  return Response::forge(View::forge('products/create',$data));


  }

    public function action_editindex()
  {
     $id=Input::post('pro1id');
  debug::dump($id);
  exit();
Response::redirect('products/index');
  }

   public function action_edit($id)
    {

    if(Input::method()=='POST'){
    $id=Input::post('id');
    debug::dump($id);
    die();
    $name=Input::post('name');
    $description=Input::post('description');
    $price=Input::post('price');
    $category_id=Input::post('category_id');
    $type=Input::post('type');
    $active=Input::post('active');
    $p0st=Model_Product::find($id);
    $post->name=$name;
    $post->description=$description;
    $post->price=$price;
    $post->category_id=$category_id;
    $post->store_id=$store_id;
    $post->image=$_FILES["image"]["name"];  
    // debug::dump($_FILES);
    // exit();

    
    $post->save();
    $tempname=$_FILES["image"]["tmp_name"];
    $folder="assets/img/".$_FILES["image"]["name"];

    move_uploaded_file($tempname,$folder);



       }
        $pro=Model_Product::products();
    $header=$this->header = View::forge('templates/header');
    $header_menu=$this->header_menu = View::forge('templates/header_menu');
    $footer=$this->footer = View::forge('templates/footer');
    $side_menubar=$this->side_menubar= View::forge('templates/side_menubar');
    
    $data=array('header'=>$header,'header_menu'=>$header_menu,'footer'=>$footer,'side_menubar'=>$side_menubar, 'products'=>$pro);
  return Response::forge(View::forge('products/edit',$data));

  }
  public function action_remove($id)
  {
     $id=Input::post('id');
     $post=Model_Product::find($id);

     $post->save();
     $post->delete();
Response::redirect('products/index');
  }
}
   
    

 