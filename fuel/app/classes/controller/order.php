<?php 

class Controller_Order extends Controller 
{

public function action_index()
	{
		return Response::forge(View::forge('order/take_order'));
	}

// public function action_table() 
// 	{
//   $data['tables']=Model_Tables::tables();
// 	return Response::forge(View::forge('order/tb',$data));
// 	}


// public function action_tbl()
// {

//     if(Input::method()=='POST'){
//     $table_id=Input::post('checkname');
//     foreach($table_id as $id){
//     $post=Model_Order::forge();
//     $post->table_id=$id;

//     $post->save();
//     }
//   }
// Response::redirect('order/btn');

// }
     

    
    

public function action_btn()
	{
	return Response::forge(View::forge('order/choose_item'));
	} 
		
public function action_kitchenitem()
	{
    $info=Model_Restinfo::info();
    // $info = Model_Orderipad::orderipad();
    $pro=Model_Orderitem::join();
    $data=array('orderitems'=>$pro,'restaurants'=>$info); 
	return Response::forge(View::forge('order/kitchenitem',$data));
  
} 
    

public function action_baritem()
	{
    $inf=Model_Restinfo::info();
    $pro=Model_Orderitem::join();
    $data=array('orderitems'=>$pro,'restaurants'=>$inf); 
  return Response::forge(View::forge('order/baritem',$data,false));
}
public function action_knsearch()
	{
   if(Input::method()=='POST'){
  $name=Input::post('name');
    $pro=Model_Product::search();
    $ord=Model_Order::orderr();
    $tbl=MOdel_Tables::tables();
    $data=array('products'=>$pro,'orders'=>$ord,'tables'=>$tbl);
 
   return response::forge(view::forge('order/knsearch',$data));
    
    }
   }

public function action_barsearch()
	{
   if(Input::method()=='POST'){
   $name=Input::post('name');
  
 $data['products']=Model_Product::barsearch();

   return response::forge(view::forge('order/barsearch',$data));
    
    }
   }

// public function action_order()
// 	{
//  if(Input::method()=='POST'){
//     $order_id=Input::post('checkname');
//    foreach($order_id as $id){
//    $post=Model_Orderitem::forge();
//    $post->order_id=$id;
//    $post->save();


//     }
//    }
//  } 
   

   public function action_orderitem()
  {

   if(Input::method()=='POST'){
    $quantity=Input::post('quantity');

    $product_id=Input::post('check');
    $order_id=Input::post('order_id');
    $status=Input::post('status');
    foreach($quantity as $key=>$quantity){
    $post=Model_Orderitem::forge();
    $post->product_id=$product_id[$key];
    $price = DB::select('price')->from('products')->where('id','in',$product_id)->as_object('Model_Product')->execute();
    $post->price=$price[$key]->price;
    $post->status=$status[$key];
    $post->quantity=$quantity;
    $post->order_id=$order_id+1;
    $post->amount=$amount=$price[$key]->price * $quantity;
    $post->save();
    }
   }
   
  return response::forge(view::forge('order/choose_item'));
  } 

    

  
 
 
public function action_orderlst()
  {
    $pro=Model_Product::products();
    $ord=Model_Order::orderr();
    $tbl=MOdel_Tables::tables();
    $data=array('products'=>$pro,'orders'=>$ord,'tables'=>$tbl);
  return Response::forge(View::forge('order/orderlst',$data,false));
  // Response::redirect('order/btn', 'refresh');
} 
  
  public function action_order()
{

    if(Input::method()=='POST'){
    $table_id=Input::post('table');
    
    $post=Model_Order::forge();
    $post->table_id=$table_id;

    $post->save();
    
  }


} 
    
  public function action_invoice()
{
    if(Input::post())
    // exit();
    {
      $table_id=Input::post('tbl');
      $service=Input::post('service');
      $vat=Input::post('tax');
      $discount=Input::post('discount');
      $orderitem_id=Input::post('id');
      $amount=Input::post('amount');
      $status=Input::post('status');
      foreach ($orderitem_id as $key=>$id) {
      $post=Model_Invoice::forge();
      $post->service_charge=$service_charge=$amount[$key]*$service[$key]/100;
      $post->tax=$tax=$amount[$key]*$vat[$key]/100;
      $post->discount=$discount=$amount[$key]*$discount[$key]/100;
      $post->total=$total=$amount[$key]+$service_charge+$tax-$discount;
      $post->table_id=$table_id[$key];
      $post->status=$status[$key];
      $post->amount=$amount[$key];
      $post->orderitem_id=$id;
      $post->save();
      $post=Model_Orderitem::find($id);
      $post->status=1;
      $post->save();

    }
    
  }


}

}
