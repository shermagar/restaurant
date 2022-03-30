<?php
use Orm\Model;

class Model_Category extends Model {

	protected static $_properties = array(
        'id',
        'name',
        'image',
        'active'        
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );


    protected static $_table_name = 'category';

    public static function category(){

        $sql = DB::query("SELECT * FROM category")->as_object('Model_Category')->execute();
        // debug::dump($sql);
        // exit();
        return $sql;
    } 
    public static function edit($id)
    {
        $result = DB::query("SELECT * FROM category WHERE id=".$id)->as_object('')->execute();
        return $result;
    }
    public static function remove($id) 
    {
       $rst = DB::query("SELECT *FROM category WHERE id=".$id)->as_object('')->execute();
       return $rst;
    }
}
?>