<?php
use Orm\Model;

class Model_Orderipad extends Model {

	protected static $_properties = array(
        'id',
        'table_id',
        'amount',
        'pro_id',
        'quantity',
        'date',
        'status'

    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );


    protected static $_table_name = 'ipad_order';

    public static function orderipad(){

        $sql = DB::query("SELECT * FROM ipad_order")->as_object('Model_Orderipad')->execute();
        return $sql;
    } 
    
 public static function pro_order(){
    $proor = DB::select('products.name','products.price','products.image','ipad_order.id','ipad_order.table_id','ipad_order.quantity','ipad_order.amount','products.type','ipad_order.status')
    ->from('ipad_order')
    ->join('products')
    ->on('ipad_order.pro_id','=','products.id')
    ->as_object('Model_Orderipad')
    ->execute();
    return $proor;
 }
     public static function update_status($id){

        $status = DB::query("SELECT * FROM ipad_order where id =".$id)->as_object('Model_Orderipad')->execute();
        return $status;
    }

     public static function paid(){
    $table_id=Input::post('table');
        $stat = DB::select('id')->from('ipad_order')
         ->where('table_id','=',$table_id)
         ->and_where('status','=',1)->as_object()
         ->execute()
         ->as_array();
        return $stat;
    } 
      public static function bill_ipad(){
        $table_id=Input::post('table');
        $bill = DB::select('products.name','products.price','ipad_order.quantity','ipad_order.amount','ipad_order.status')->from('ipad_order')->join('products')->on('products.id','=','ipad_order.pro_id')
         ->where('ipad_order.table_id','=',$table_id)
         ->and_where('ipad_order.status','=',1)->as_object()
         ->execute()
         ->as_array();
           // debug::dump(DB::last_query());
           //  die();
        return $bill;
    }

        public static function varified(){
        $table_id=Input::post('table');
        $varification = DB::select('status')->from('ipad_order')
         ->where('ipad_order.table_id','=',$table_id)
         ->and_where('ipad_order.status','!=',2)
         ->as_object()
         ->execute()
         ->as_array();
           // debug::dump(DB::last_query());
           //  die();
        return $varification;
    }  
    public static function qty_dlt(){
       $quantity=DB::select('id')->from('ipad_order')
         ->where('quantity','=',0)
         ->execute()
         ->as_array();
        return $quantity;
    }

}
?>