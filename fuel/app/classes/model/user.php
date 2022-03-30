<?php

class Model_User extends \Orm\Model
{
  protected static $_properties = array(
    'id',
    'username',
    'password',
    'group',
    'email',
    'full_name',
    'phone',
    'address',
    'last_login',
    'login_hash',
    // 'created_on',
    'created_at',
    'updated_at',
  );

  protected static $_observers = array(
    'Orm\Observer_CreatedAt' => array(
      'events' => array('before_insert'),
      'mysql_timestamp' => false,
    ),
    'Orm\Observer_UpdatedAt' => array(
      'events' => array('before_update'),
      'mysql_timestamp' => false,
    ),
  );

  protected static $_table_name = 'users';

   public static function post(){
    
      $sql = DB::query("SELECT * FROM users")->as_object('Model_user')->execute();
         return $sql;
        
       }

      public static function edit($id){
    
        $sql = DB::query('SELECT * FROM users WHERE id='.$id)->as_object('')->execute();
         return $sql;
        
    }

}
?>