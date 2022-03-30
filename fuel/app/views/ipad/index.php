        <style type="text/css">
      .active, .menu_btn:hover{  background-color:#5fdba7 ; color: #fff; height: 50px; border-radius: 7px; width: 130px;}

    </style>

      <?php foreach ($products as $product): ?>
      <?php endforeach ;?>
      <?php foreach ($orders as $key=>$order):?>
      <?php endforeach;?>
       <?php foreach ($charge as $chg):?>
      <?php endforeach;?>
     
      <!-- navabr start -->
        <div class="navbar">
          <br>
            <div class="row">
          <div class="nav">
            <div class="col-md-2">
              <div class="row">
                <div class="col-md-6 cog_clss">
                  <p class="p-cls">Revel</p>
                  <p class="psys">Systems</p>

                </div>
                  <div class="col-md-6">
                    <a href="<?php echo uri::base().'admin/login'?>"><button class="settng_btn"><i class="fa fa-cog settng"></i></button></a>
                  </div>
              </div>
            </div>
              <div class="col-md-2">
                <select class=" form-control js-table_list js-tablelst" style="width: 70%; background: #0085be; border: 2px solid #55A9D0; color: #fff;" id="table" name="table">
                <option value="">Table No:</option><br>
                <?php foreach ($tables as $table): ?>
                <option  class="js-form js-table" value="<?=$table->id?>" name="table" id="tab_btn" data-tab_id="<?=$table->id?>"><?php echo ($table->table_num);?></option>
                      <?php endforeach;?>
                </select>
              </div>
               <div class="col-md-3"> 
               </div> 
               <div class="col-md-4">  
                 <div class="search" />
                  <input class="input_search" id="search" type="text" name="name" placeholder="Search iPad" />
                </div>
              </div>
            </div>
          </div>
        </div><!--end navbar-->
   <div class="ord col-md-12">
    <div class="row">     
        <div class="sub_container col-md-6" >
          <div class=" border_tab">
              <div class="row">
                <div class="col-md-10"> 
                  <h4><b>Customer Name And Order Number</b></h4> 
                </div>
                <div class="col-md-2">            
                 <button  class="add_btn " style="margin-right: 44px;"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            <div class="box-body">
              <table  id="manageTable" class="table table-striped">
                <thead style="border-bottom:3px dotted #E8E9E9">
                  <tr >
                    <th> Name</th>
                    <th>Qty</th>
                    <th>Each</th>
                    <th>Total</th>
                   </tr>
                </thead>
                <tbody id="append_data" >
                    <tr>
                    </tr> 
                </tbody>
             </table>
          </div>

            <!-- <div class="row"> -->
              <div id="bill_id">
              <div class="col-md-12">
                <!--sub_total and total-->
                    <div class="row">
                      <div class="col-md-6">
                        <table class="table table-striped" >
                          <tr style="border-bottom: hidden; border-top: hidden;" >
                           <th class="thead">Sub_Total:</th>
                           <td class="amnt" id="subtotal" >0</td>
                          </tr>
                        </table>                  
                      </div>
                      <div class="col-md-6">
                        <table class="table table-striped" >
                          <tr style="border-bottom: hidden; border-top: hidden;" >
                            <th class="thead">Total:</th>
                            <td class="amnt" id="totalid">0</td>
                          </tr>
                        </table>
                      </div> 
                    </div>               
                  <!--discounts table-->
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table table-striped" >
                        <tr style="border-bottom: hidden; border-top: hidden;" >
                          <th class="thead">Discounts(<?=$chg->discount?>%):</th>
                          <td class="amnt" id="discount">0</td>
                        </tr>
                      </table>
                    </div>
                  </div>               
                  <!-- tax and balance due table-->
                  <div class="row">
                    <div class="col-md-6">
                      <table class="table table-striped" >
                          <tr style="border-bottom: hidden; border-top: hidden;" >
                            <th class="thead">Tax(<?=$chg->vat?>%):</th>
                            <td class="amnt" id="tax">0</td>
                          </tr>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <table class="table table-striped" >
                        <tr style="border-bottom: hidden; border-top: hidden;" >    
                          <th class="thead">Balance Due:</th>   
                          <td class="amnt">0.00</td>
                        </tr>
                      </table>
                    </div> 
                  </div>
              </div>
            </div>
            <!-- </div> -->
           <br>
                  <!-- order btn -->
            <div class="row">
              <div class="col-md-4">
              </div>
                  <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                          <button class="hold_btn " id="btnbtn1" val="" name="submit"><b>Hold Order</b></button> 
                        </div>
                      <div class="col-md-4">
                        <a href="<?php echo uri::base().'orderipad/ipad'?>"><button class=" cancel_btn" id="btnbtn1" val="" name="submit"><b>Cancel Order</b></button></a>
                      </div>
                      <div class="col-md-4">
                        <button class="send_btn js-send_btn" id="btnbtn1" val="" data-tab_id="<?=$table->id?>" name="submit"><b>Send Order</b></button> 
                      </div>
                  </div>
                </div>
              </div>
              <br>
          </div><!--end border tab-->
                <!-- for bills-->
          <div class="row">
            <div class="col-md-9">
                <div class="row">
                  <div class="col-md-3">
                    <button class="bill_btn"><i class="fa fa-plus"></i></button>
                    <p class="pc">Add <br>Etra Item</p>
                  </div>
                  <div class="col-md-3">
                    <button class="bill_btn" data-toggle="modal" data-target="#addModal" ><i class="fa fa-percent"></i></button>
                    <p class="pc">Discount <br>Order</p>
                  </div>
                  <div class="col-md-3">
                    <a href="<?php echo uri::base().'orderipad/type'?>"><button class="bill_btn"><i class="fa fa-forward"></i></button></a>
                    <p class="pc">ToGO Order</p>
                  </div>
                  <div class="col-md-3" style="margin-top: 17px;">
                  <a href="#" class="bill_btn js-print_btn" style="margin: 29px;"><i class="fa fa-print"></i></a>
                    <p class="pc" style="magrin-top:30px;">Print Guest <br>Check</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
              <button class="pay_btn js-paid_btn" data-pay_id="<?=$product->id?>" name="pay"><i class="fa fa-dollar-sign"></i></button>
              <p class="pc">Pay</p>
            </div>
          </div>
         <br>
      </div><!--end of bills tables-->

    <div class="contain col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div class="top_menu" id="myDiv">
            <div class="col-md-3 ">
                  <button class="menu_btn menu_class lds active" name="type" data-type="0">All</button>
            </div>
            <div class="col-md-3">
                <button class="menu_btn menu_class lds " name="type" data-type="1"> Lunch</button>
            </div>
            <div class="col-md-3">
              <button class="menu_btn menu_class lds " name="type" data-type="2" > Drinks</button>
            </div>
            <div class="col-md-3">
                <button class="menu_btn menu_class lds " name="type" data-type="3" > Desserts</button>
            </div>
          </div>
        </div><!--end of menu-->
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class=" swiper1 swiper-container " style="margin: 29px 0 0px 15px; cursor: pointer;">       
                  <div class="swiper-wrapper">            
                    <?php foreach ($categorys as $category): ?>
                      <div class="col-md-3  swiper-slide  submenu" data-toggle="modal" data-target="#categoryId"  data-cat="<?=$category['id']?>" name="subm" >
                          <?php $path=Uri::base().'assets/img/'.$category->image;?>
                          <img class="img_item" src="<?=$path?>">
                          <button class="img_btn "><?php echo ($category->name);?></button>
                      </div>
                    <?php endforeach;?>
                  </div>
                  <div class="swiper-pagination swiper-pagination1"></div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row" style="height: 433px; overflow: auto; cursor: pointer;">
            <div id="display" class="display"> 
                    <?php foreach ($products as $product): ?>
                  <div class="col-md-3">
                    <div class="sub_menu js-img_btn" name="pro_id" id="imgbtn<?=$product->id?>" data-pro_id="<?=$product->id?>">
                      <?php $path=Uri::base().'assets/img/'.$product->image;?>
                      <img class="img_item" src="<?=$path?>">
                      <button class="img_btn "  ><?php echo ($product->name);?></button>
                    </div>
                  </div>
                 <?php endforeach; ?>
            </div>
          </div>
        </div>   
      </div>
      </div>
    </div>
  </div>



<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Service</h4>
      </div>

        <div class="modal-body">
          <form role="form" action="<?php echo uri::base().'orderipad/charge'?>" method="post" id="createForm" enctype='multipart/form-data'>
                <div class="form-group">
                  <label for="discount_charge">Discount (%)</label>
                  <input type="text" class="form-control" id="discount_charge" required name="discount" placeholder="Enter discount  %" value="">
                </div>
                <div class="form-group">
                  <label for="tax_charge">Tax Charge (%)</label>
                  <input type="text" class="form-control" id="tax_charge" required name="tax" placeholder="Enter tax  %" value="" >
                </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary " id="charge" value="submit">Save changes</button>
        </div>
      </form>
         </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="categoryId">
  <div class="modal-dialog" role="document">
    <div class="modal-content " id="category">

            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
  <script type="text/javascript">
    $(document).on('click', ".submenu", function(){
       var sub=$(this).data('cat');
       $.ajax({
        type:"POST",
        url:"<?php echo uri::base().'orderipad/catpro'?>",
        data:{'subm':sub},
        dataType:"html",
        success: function(response){
          $('#category').html(response);
        }
       });
       });

    $(document).on('click',".js-img_btn",function(){
     var pro_id=$(this).data("pro_id");
     // alert(pro_id);
      $.ajax({
      type:"POST",
      url:"<?php echo uri::base().'orderipad/filter_by_pro_id'?>",
      data:{'pro_id':pro_id},
      datatype:"html",
      success: function(respo){
        html_tag = $.parseHTML(respo)[1];
        // console.log(html_tag);
        // return false;

       document.getElementById("append_data").append(html_tag);
       $("#imgbtn"+pro_id).removeClass("js-img_btn");
              document.getElementById("append_data").append(html_tag);
       $("#imgbt"+pro_id).removeClass("js-img_btn");
            }
    });
    });
  </script>

  <script type="text/javascript">
    $(document).on('click', ".lds", function(){
       var type=$(this).data('type');
       // alert(type);
       $.ajax({
        type:"POST",
        url:"<?php echo uri::base().'orderipad/filter'?>",
        data:{'type':type},
        dataType:"html",
        success: function(response){
          $('#display').html(response);
        }
       });
       });
  </script>
  <script type="text/javascript">
  $('#search').on('keyup',function(){
    var name=$(this).val();
       // alert(name);
       $.ajax({
        type:"POST",
        url:"<?php echo uri::base().'orderipad/search'?>",
        data:{'name':name},
        dataType:"html",
        success: function(response){
          $('#display').html(response);
        }
       });
       });
  </script>
   <script>
          var swiper1 = new Swiper('.swiper1', {
        slidesPerView: 4,
        spaceBetween: 30,
            mousewheel: {
              enabled: true,
            },
            keyboard: {
              enabled: true,
            },
        pagination: {
          el: '.swiper-pagination1',
          clickable: true,
        },
      });   
      </script>

    <script type="text/javascript">
      $(document).on('click',".js-send_btn",function(){

        var bill_qty = [];
        var bill_amount = [];
        var proid = [];
        var table = [];
      $( ".js-bill_tr" ).each(function( index,object ) {
        pro_id = object.id;
      var table_id = $('#table').val();
      var status = $('#status').val();
      var qty = $('#js-bill_number'+pro_id).val();
      var amount = $('#js-bill_amount'+pro_id).val();
      
      bill_qty.push(qty);
      bill_amount.push(amount);
      proid.push(pro_id);
      table.push(table_id);
      console.log(table); 
});
             $.ajax({
        type:"POST",
        url:"<?php echo uri::base().'orderipad/send_order'?>",
        data:{'qty_number':bill_qty,'js-amount':bill_amount,'pro_id':proid,'table':table},
        dataType:"json",
              success:function(send){
                // alert('bb');
       location.href = '<?php echo uri::base().'orderipad/ipad'?>';
              }

       });

 });
    </script>
    <script type="text/javascript">
      // $(document).on('click',"#btnbtn1",function(){
      //   // var tab = $(this).data('tab_id');
      //   var tab = $('#table').val();
      //   $('.js-send_btn').attr('tab_id',tab);

      // });
      $(document).on('change',".js-table_list",function(){
        var tabl = $('#table').val();
        // alert('tabl');
            $.ajax({
        type:"POST",
        url:"<?php echo uri::base().'orderipad/ipad_bill'?>",
        data:{'table':tabl},
        dataType:"json",
      success: function(datas){
        alert(datas.msg);
        // console.log(html(datas));
        // return false;
        $('#append_data').html(datas.resp);
        $('#bill_id').html(datas.resps);
        // $('#bill_id').html(datas.ress);
            }

       });
       var tabl = $('#table').val();
       $('.js-print_btn').attr('href',"<?php echo uri::base().'orderipad/prints/'?>"+tabl);         
   
      });
    </script>
<!--     <script type="text/javascript">
            $(document).on('change',".js-tablelst",function(){
        var tabl = $('#table').val();
            $.ajax({
        type:"POST",
        url:"<?php //echo uri::base().'orderipad/ipadbill'?>",
        data:{'table':tabl},
        dataType:"html",
      success: function(resps){
        $('#bill_id').html(resps);
            }

       });
 var tabl = $('#table').val();
       $('.js-print_btn').attr('href',"<?php// echo uri::base().'orderipad/prints/'?>"+tabl);         
      });
    </script> -->

<script type="text/javascript">
        $(document).on('click',".js-paid_btn",function(){
        var table_id = $('#table').val();
            $.ajax({
        type:"POST",
        url:"<?php echo uri::base().'orderipad/paid'?>",
        data:{'table':table_id},
        dataType:"json",
              success:function(send){
                // alert('bb');
       location.href = '<?php echo uri::base().'orderipad/ipad'?>';
              }
       });
      });
    </script>
  
   <script>

var header = document.getElementById("myDiv");
var menu_btns = header.getElementsByClassName("menu_btn");
for (var i = 0; i < menu_btns.length; i++) {
  menu_btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script> 