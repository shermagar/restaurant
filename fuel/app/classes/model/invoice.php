<?php
use Orm\Model;

class Model_Invoice extends Model {

	protected static $_properties = array(
        'id',
        'table_id',
        'orderitem_id',
        'tax',
        'service_charge',
        'discount',
        'total' ,     
        'invoice_at',
        'status'
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );


    protected static $_table_name = 'invoices';

    public static function invoice(){

        $sql = DB::query("SELECT * FROM invoices")->as_object('Model_Invoice')->execute();
        return $sql;
    }

public static function merze($tab_id=null){
    if(is_null($tab_id)){
        $result=DB::select('invoices.id','invoices.status','order_item.amount','order_item.quantity','products.price','products.name','invoices.tax','invoices.discount','invoices.total','invoices.service_charge','tables.table_num','invoices.invoice_at','order.table_id','invoices.table_id','invoices.status')
    ->from('invoices')
    ->join('order_item')
    ->on('order_item.id','=','invoices.orderitem_id')
    ->join('order')
    ->on('order.id','=','order_item.order_id')
    ->join('products')
    ->on('products.id','=','order_item.product_id')
    ->join('tables')
    ->on('tables.id','=','invoices.table_id')
    ->as_object()
    ->execute();
}else{
// debug::dump(DB::last_query());
// die('jhsaguy');
   
    $result=DB::select('invoices.id','invoices.status','order_item.amount','order_item.quantity','products.price','products.name','invoices.tax','invoices.discount','invoices.total','invoices.service_charge','tables.table_num','invoices.invoice_at','order.table_id','invoices.table_id','invoices.status')
    ->from('invoices')
    ->join('order_item')
    ->on('order_item.id','=','invoices.orderitem_id')
    ->join('order')
    ->on('order.id','=','order_item.order_id')
    ->join('products')
    ->on('products.id','=','order_item.product_id')
    ->join('tables')
    ->on('tables.id','=','invoices.table_id')
    ->where('order.table_id','=', $tab_id)
    ->as_object()
    ->execute();
   
    // echo "<pre>";
    // print_r($merze);
    // die();
}
    return $result;
}

    public static function get_paid($id){

        $paid = DB::query("SELECT * FROM invoices where table_id =".$id)->as_object('Model_Invoice')->execute();
        return $paid;
    }

}
?>