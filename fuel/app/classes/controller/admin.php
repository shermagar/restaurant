<?php

class Controller_Admin extends Controller_Base
{
public $template = 'admin/template';

public function before()
{
parent::before();

if (Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action, array('login', 'logout')))
{
if (Auth::check())
{
$user_group= Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
if ( ! Auth::member($user_group))
{
Session::set_flash('error', e('You don\'t have access to the admin panel'));
Response::redirect('admin/login');
}
}
else
{
// Auth::force_login(1);
Response::redirect('admin/login');
}
}
}

public function action_login()
{
// Already logged in

// debug::dump('bi');
Auth::check() and Response::redirect('admin');

$val = Validation::forge();

if (Input::method() == 'POST')
{
  // debug::dump('post');
  // exit();
$val->add('email', 'Email or Username')
   ->add_rule('required');
$val->add('password', 'Password')
   ->add_rule('required');

if ($val->run())
{
if ( ! Auth::check())
{ 

if (Auth::login(Input::post('email'), Input::post('password')))

{


foreach (\Auth::verified() as $driver)

{
if (($id = $driver->get_user_id()) !== false)
{

$current_user = Model\Auth_User::find($id[1]);

Session::set_flash('success', e('Welcome, '.$current_user->username));
Response::redirect('dashboard');
}
}
}
else
{
$this->template->set_global('login_error', 'Login failed!');
}
}
else
{
$this->template->set_global('login_error', 'Already logged in!');
}
}
}

$this->template->title = 'Login';
$this->template->content = View::forge('admin/login', array('val' => $val), false);
}

/**
* The logout action.
*
* @access  public
* @return  void
*/
public function action_logout()
{
Auth::logout();
Response::redirect('admin');
}

/**
* The index action.
*
* @access  public
* @return  void
*/
public function action_index()
{
// Debug::dump("Here");exit;
$this->template->title = 'Contact_us';
$this->template->content = View::forge('pages/contact');
}

}