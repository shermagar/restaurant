<?php
use Orm\Model;

class Model_Ipadinvoice extends Model {

	protected static $_properties = array(
        'id',
        'table_id',
        'total_amount',
        'status'

    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );


    protected static $_table_name = 'ipad_invoice';

    public static function ipadinvoice(){

        $sql = DB::query("SELECT * FROM ipad_invoice")->as_object('Model_Ipadinvoice')->execute();
        return $sql;
    } 
    
 
   

}
?>