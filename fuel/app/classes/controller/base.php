<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Base extends Controller_Template
{
    // protected $currency = '&pound;';
   
    public function before(){

       
        /*to use these variables in modal*/
        // Session::set('lang', $lang);
        // Session::set('site', $site);


        /*
        Debug::dump($site);
        $lang = Session::get('lang');
        $lang = is_null($lang)?'en':$lang;
        Config::set('language', $lang);
        Lang::load('global');
        */
        parent::before();
        $this->current_user = null;

        foreach (\Auth::verified() as $driver)
        {
            if (($id = $driver->get_user_id()) !== false)
            {
                $this->current_user = Model\Auth_User::find($id[1]);
            }
            break;
        }


        // Set a global variable so views can use it
        View::set_global('current_user', $this->current_user);

        //set label


        
    }
}