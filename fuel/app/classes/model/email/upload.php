<!-- <?php
use Orm\Model;

class Model_Upload extends Model {

	protected static $_properties = array(
        'id',
        'name',
        'active',
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );
    protected static $_table_name = 'category';

    public static function category(){
        $sql = DB::query("SELECT * FROM category")->as_object('Model_Upload')->execute();
        return $sql;
    }

}
?> -->