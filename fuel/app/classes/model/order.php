<?php
use Orm\Model;

class Model_Order extends Model {

	protected static $_properties = array(
        'id',
        'table_id',
        'user_id',
        'order_at',        
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );


    protected static $_table_name = 'order';

    public static function item(){
        
        $sql = DB::query("SELECT * FROM order")->as_object('Model_Order')->execute();
        // debug::dump($sql);
        // exit();
        return $sql;
    } 
      
        public static function orderr(){
        // $id=Input::post('id');
        $ord = DB::select('id')->from('order')->as_object('Model_Order')->execute();

        return $ord;
    }
    


    // public static function search(){

    //     $sq = DB::query("SELECT * FROM order_item WHERE name like '%$term%'or name LIKE '%$term' or name LIKE '$term%'")->as_object('Model_Order')->execute($sq);
    //     debug::dump($sq); exit();
    // return $sq;
    // }

}
?>