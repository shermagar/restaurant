<?php
use Orm\Model;

class Model_Groups extends Model {

	protected static $_properties = array(
        'id',
        'group_name',
        'permission'        
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );


    protected static $_table_name = 'groups';

    public static function group(){

        $sql = DB::query("SELECT * FROM groups")->as_object('Model_Groups')->execute();
        // debug::dump($sql);
        // exit();
        return $sql;
    }


  

}
?>