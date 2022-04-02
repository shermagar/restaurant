    <?php

    get_include_path(). "dompdf/dompdf_config.inc.php";


    // require_once '../vendor/autoload.php';

    use Dompdf\Dompdf;

    class Controller_Orderipad extends Controller_Base 
    {
    public $template = 'templates';


    public function action_checkbox(){

     return View::forge('ipad/checkbox_test'); 
    }
    public function action_index()
      {
        $pro = Model_Product::products();
        $ord = Model_Order::orderr();
        $tbl = Model_Tables::tables();
        $cat = Model_Category::category();
        $chrg = Model_Restinfo::info();
        $ipad = Model_Orderipad::orderipad(); 
        $this ->template->title="Ipad";
        $this ->template->header = View::forge('templates/header');
        $data = array(
          'orderipad' => $ipad,
          'products' => $pro,
          'orders' => $ord,
          'tables' => $tbl,
          'categorys' => $cat,
          'charge' => $chrg
        );
      $this->template->content = View::forge('ipad/index',$data,false);
    } 
    public function action_search()
    {
        $name = Input::post('name');
        $ord = Model_Product::search();
        $data = array('products'=>$ord);
        $response = view::forge('ipad/filter',$data)->render();
        return $response;

    }

    public function action_filter()
     {
        $type = Input::post('type');
        if($type == "0"){
        $ord = Model_Product::products();
      }else{
        $ord = Model_Product::type();
      }
        $data = array(
          'products' => $ord
        );
        $response = view::forge('ipad/filter',$data)->render();
        return $response;

    }

    public function action_catpro()
     {
        $category_id = Input::post('subm');
        $ord = Model_Product::procat();
        $item = Model_Category::find($category_id);
        $data = array(
          'products' => $ord,
          'items' => $item
        );
        $response = view::forge('ipad/sub_menu_filter',$data)->render();
         
         return $response;

    }
    public function action_filter_by_pro_id()
     {
        $id = Input::post('pro_id');
        $ord = Model_Product::pro_id();
        $chrg = Model_Restinfo::info();
        $data = array(
          'products' => $ord,
          'charge' => $chrg
        );
        $respo = view::forge('ipad/flash_pro_in_tab',$data)->render();
        // debug::dump($respo);
        // die();
        return $respo;
    }

    public function action_charge()
     {
       if(Input::method()=='POST'){       
       $post = Model_Restinfo::forge();
       $post->vat = Input::post('tax');
       $post->discount = Input::post('discount');

       $post->save();
        } 
        Response::redirect('orderipad/ipad');
    }

    public function action_send_order(){
        if(Input::method() == 'POST'){ 
        $table_id = Input::post('table');      
        $pro_id = Input::post('pro_id');
        $quantity = Input::post('qty_number');
        $amount = Input::post('js-amount');
        foreach ($pro_id as $key => $id) {

        $post = Model_Orderipad::forge();
        $post->amount = $amount[$key];
        $post->quantity = $quantity[$key];
        $post->table_id = $table_id[$key];
        $post->status = 0;
        $post->pro_id = $id;
        $post->save();

      }

    }
      $send = 'success';
      return json_encode($send);
    }

    public function action_type()
      {
        $info = Model_Orderipad::pro_order();
        $data = array('ipadorders' => $info);
        $this->template->title = "Type";
        $this->template->header = View::forge('templates/header');
        $this->template->content = View::forge('ipad/type',$data,false);         
      // return Response::forge(View::forge('ipad/type',$data));
      // $type='success';
      // return json_encode($type);
    } 

    public function action_upgrade_status(){
      if(Input::post())
        {
        $id = Input::post('check');
        $service = Model_Restinfo::info();
        $charge = end($service);
        $vat = $charge['vat'];
        $dis = $charge['discount'];
        foreach ($id as $key => $id) {
        $sts=Model_Orderipad::find($id);
        $sts->status = 1;
        $sts->save();
        // $table_id = $sts['table_id'];
        // $amount = $sts['amount'];
        // $post = Model_Ipadinvoice::forge();
        // $post->table_id = $table_id;
        // $tax = $amount*$vat/100;
        // $discount = $amount*$dis/100;
        // $post->total_amount = $total_amount = $amount - $tax + $discount;
        // $post->status=0;
        // $post->save();
        }

      }
      $type='success';
      return json_encode($type);
    } 

    public function action_ipad_bill(){
        $table_id = Input::post('table');
        $varid = Model_Orderipad::varified();
        // debug::dump($varid);
        // die();
        if($varid == NULL)
        {
         $status = '';
        }
        else
        {
        $charg = end($varid);
        $status = $charg->status;
        }
        // debug::dump($status);
        // die();
        $inv = Model_Orderipad::bill_ipad();
        $service = Model_Restinfo::info();
        $charge = end($service);
        $vat = $charge['vat'];
        $dis = $charge['discount'];
          $total_amnt = 0;
          $sub_total = 0;
          $tax = 0;
          $discount = 0;
      foreach ($inv as $key => $value) {
         $amount = $inv[$key]->amount;
         $sub_total += $inv[$key]->amount; 
           $tax = $sub_total*$vat/100;
         $discount = $sub_total*$dis/100;
         $total_amnt = $sub_total + $tax - $discount; 
          }

       $data = array(
        'charge' => $service,
        'total' => $total_amnt,
        'sub' => $sub_total,
        'tax' => $tax,
        'discount' => $discount);
        $datas['resps'] = view::forge('ipad/invoicebill',$data)->render();
        // $datas['ress']=view::forge('ipad/invoicebill',$data)->render();
        $data['invoices'] = $inv;
        $datas['resp'] = view::forge('ipad/invoice',$data)->render();
        if($status == 0 || $status == 1){
         $datas['msg'] = 'THis Table Is Book varified it!';
          }
         if($status == NULL){
          $datas['msg'] = 'Do you want to booked the table!';           
          }
      return json_encode($datas);
        // return $resp;
    }
    // public function action_ipadbill(){
    //     $table_id=Input::post('table');
    //     $inv = Model_Orderipad::bill_ipad();
    //     $service = Model_Restinfo::info();
    //     $charge = end($service);
    //     $vat = $charge['vat'];
    //     $dis = $charge['discount'];
    //       $total_amnt=0;
    //       $sub_total=0;
    //       $tax=0;
    //       $discount=0;
    //   foreach ($inv as $key => $value) {
    //      $amount=$inv[$key]->amount;
    //      $sub_total += $inv[$key]->amount; 
    //      $tax = $sub_total*$vat/100;
    //      $discount = $sub_total*$dis/100;
    //      $total_amnt = $sub_total + $tax - $discount; 
    //       }


    //     $data=array('charge'=>$service,'total'=>$total_amnt,'sub'=>$sub_total,'tax'=>$tax,'discount'=>$discount);
    //     $resps=view::forge('ipad/invoicebill',$data)->render();

    //     return $resps;
    // }
     
 public function action_prints($tabl){
    $inv = DB::select('products.name','products.price','ipad_order.quantity','ipad_order.amount','ipad_order.table_id')
     ->from('ipad_order')
     ->join('products')
     ->on('products.id','=','ipad_order.pro_id')
     ->where('ipad_order.table_id','=',$tabl)
     ->and_where('ipad_order.status','=',1)
     ->as_object()
     ->execute()
     ->as_array();
    $service = Model_Restinfo::info();
    $charge = end($service);
    $vat = $charge['vat'];
    $dis = $charge['discount'];
    $total_amnt = 0;
    $sub_total = 0;
    $tax = 0;
   $discount = 0;
  foreach ($inv as $key => $value) {
     $amount = $inv[$key]->amount;
     $sub_total += $inv[$key]->amount; 
     $tax = $sub_total * $vat/100;
     $discount = $sub_total * $dis/100;
     $total_amnt = $sub_total + $tax - $discount; 
      }

   $data=array(
    'invoices' => $inv,
    'charge' => $service,
    'total' => $total_amnt,
    'sub' => $sub_total,
    'tax' => $tax,
    'discount' => $discount
  );
    $dompdf = new DOMPDF();
    $dompdf->setPaper('A4','landscape');
    $html = view::forge('ipad/dompdf',$data,false);
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream("ipad",array("Attachment" => 1));

    die;
     }


    public function action_paid(){
    $qty = Model_Orderipad::qty_dlt();
            foreach ($qty as $key => $qy)
        {
        $qid = $qty[$key]['id'];

        $post = Model_Orderipad::find($qid);
        $post->delete();
      }
        $table_id = Input::post('table');
        $paid = Model_Orderipad::paid();
        foreach ($paid as $key => $row)
        {
        $id = $paid[$key]->id;
        $post = Model_Orderipad::find($id);
        $post->status = 2;
        $post->save();
     }


      $send = 'success';
      return json_encode($send);
  }


 }
