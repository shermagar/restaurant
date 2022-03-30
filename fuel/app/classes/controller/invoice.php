	<?php 

	class Controller_Invoice extends Controller 
	{

	public function action_index()
		{ 

	    $tab_id=Input::post('table');
	    $info=Model_Restinfo::info();
	    $merze=Model_Invoice::merze($tab_id);
	    // debug::dump($merze);
	    // exit();
	    $total_amnt=0;
	    $sub_total=0;

	    foreach ($merze as $key => $value) {
	    	if($merze[$key]->status==0){
	    	$total=$merze[$key]->total;
	    	 $total_amnt += $merze[$key]->total;
	    	 $amount=$merze[$key]->amount;
	    	 $sub_total += $merze[$key]->amount; 
	    }
	    }	
	    $header=$this->header = View::forge('templates/header');
	    $data=array('header'=>$header,'restaurants'=>$info,'invoices'=>$merze,'sum'=>$total_amnt,'sub'=>$sub_total);
		return Response::forge(View::forge('invoice/index',$data,false));
	}

		public function action_create()
		{
	    $tb=Model_Tables::tables();
	    $header=$this->header = View::forge('templates/header');
	    $data=array('header'=>$header,'tables'=>$tb);
			return response::forge(View::forge('invoice/create',$data));
		}

public function action_pay()
		{
       $id=Input::post('tbid');
	  $paid=Model_Invoice::get_paid($id);
       // debug::dump($id);
       // exit();
	  $pay=Model_Invoice::find($id);
	  foreach ($paid as $pay) {
	  	
      $pay->status=$status=1;
      $pay->save();
	  }
	  // $response['result']='paid';
	  // return json_decode($response);
		}

	}
	?>