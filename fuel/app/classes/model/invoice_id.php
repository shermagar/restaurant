<?php
use Orm\Model;

class Model_Invoice_id extends Model {

	protected static $_properties = array(
        'id',
        'invoice_id',
        'order_id',



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

public static function invce(){
    $rst=DB::select()->from('invoices')->join('tables')->on('tables.id','=','invoices.table_id')->as_object()->execute();
    return $rst;
}
  

}
?>