<?php
use Orm\Model;

class Model_Bar extends Model {

	protected static $_properties = array(
        'id',
        'name',
        'price',
        'image'        
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );


    protected static $_table_name = 'baritem';

    public static function bar(){

        $sql = DB::query("SELECT * FROM baritem")->as_object('Model_Bar')->execute();
        // debug::dump($sql);
        // exit();
        return $sql;
    } 
    

}
?>