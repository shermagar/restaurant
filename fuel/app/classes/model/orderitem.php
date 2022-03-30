    <?php
    use Orm\Model;

    class Model_Orderitem extends Model {

    	protected static $_properties = array(
            'id',
            'product_id',
            'order_id',
            'quantity',
            'amount' ,
            'status'       
        );
        protected static $_observers = array(
            'Orm\Observer_CreatedAt' => array(
                'events' => array('before_insert'),
                'mysql_timestamp' => false,
            ),
        );


        protected static $_table_name = 'order_item';

        public static function orderlist(){
          
            $sql = DB::query("SELECT * FROM order_item")->as_object('Model_Orderitem')->execute();
            // debug::dump($sql);
            // exit();
            return $sql;
        } 

        public static function join(){
            $join=DB::select('order_item.id', 'order_item.quantity','order_item.product_id','order_item.order_id','order_item.amount','products.name','order.table_id','products.type','products.image','order_item.status')
            ->from('order_item')
            ->join('products')
            ->on('products.id','=','order_item.product_id')
            ->join('order')
            ->on('order.id','=','order_item.order_id')
            ->as_object()
            ->execute();
            //  debug::dump(DB::last_query());
            // die();
            return $join;
        }
    public static function get_orderitem_status($id){

        $status = DB::query("SELECT * FROM order_item where id =".$id)->as_object('Model_Orderitem')->execute();
        return $status;
    }
 
    }