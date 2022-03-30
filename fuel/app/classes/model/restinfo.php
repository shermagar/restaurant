<?php
use Orm\Model;

class Model_Restinfo extends Model {

	protected static $_properties = array(
        'id',
        'vat',
        // 'service',
        'discount'

    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );


    protected static $_table_name = 'restaurant_info';

    public static function info(){

        $sql = DB::query("SELECT * FROM restaurant_info")->as_object('Model_Restinfo')->execute()->as_array();
        return $sql;
    }


}
?>