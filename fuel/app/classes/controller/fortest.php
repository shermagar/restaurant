  <?php 

class Controller_Fortest extends Controller
{
public function action_index()
    {

  return Response::forge(View::forge('fortest/index'));
  }

public function action_send()
{
if(Input::post())
  	{
   $name = input::post('name');
   $emailfrom = input::post('email');
   $subject = input::post('subject');
   $message = input::post('message');
   $mailTo = "bishalsws21@gmail.com";
   $txt = "You have recieved an e-mail from:".$name.".\r\n".$message;
   $email = Email::forge();
   $email->from($emailfrom, $name);
   $email->to($mailTo, 'bishal magar');
   $email->subject($subject);
   $email->body($txt);
   // debug::dump($message);
   //  die();

try
{
   $email->send();
}
   catch(\EmailSendingFailedException $e)
{

}

}
return Response::forge(View::forge('fortest/index'));
}

}
?>