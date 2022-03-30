<?php
use Orm\Model;

class Model_Product extends Model {

	protected static $_properties = array(
        'id',
        'name',
        'image',
        'price',
        'description',
        'category_id',
        // 'store_id',
        'type',
        'status'        
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );


    protected static $_table_name = 'products';

    public static function products(){

        $sql = DB::query("SELECT * FROM products")->as_object('Model_Product')->execute();
        // debug::dump($sql);
        // exit();
        return $sql;
    }

public static function search(){
     $name=Input::post('name');
     $rst=DB::query("SELECT * FROM products WHERE name like '%$name%'")->as_object('Model_Product')->execute();    
  
    return $rst;
}
 public static function barsearch(){
     $name=Input::post('name');
     $rlt=DB::query("SELECT * FROM products WHERE name like '%$name%'")->as_object('Model_Product')->execute();    
  
  return $rlt;
}
        public static function type(){
        $type=Input::post('type');
        $ord=DB::query("SELECT * FROM products WHERE type =".$type)->as_object('Model_product')->execute();

        return $ord;
    }
    public static function edit($id)
    {
        $result = DB::query("SELECT * FROM products WHERE id=".$id)->as_object('')->execute();
        return $result;
    }
    public static function procat(){
        $category_id=Input::post('subm');
        $jns=DB::query("SELECT * FROM products WHERE category_id =".$category_id)->as_object('Model_product')->execute();
        return $jns;
    } 
    // ->as_array();
  public static function pro_id(){ 
  $id=Input::post('pro_id');     
 $pro=DB::query("SELECT * FROM products WHERE id=".$id)->as_object("Model_product")->execute();
 return $pro;
}
}

