              <script src="<?php echo uri::base().'assets/js/jquery.min.js' ?>"></script>
  <script src="<?php echo uri::base().'assets/js/jquery-ui.min.js' ?>"></script>
              <table>

                   <form method="post" enctype="multipart/form-data">
                    <tr>
                <td>Bishal</td>             
                 <td><input type="checkbox" name="check[]" id="bishal"   value="1" class="check"  ></td>
                </tr>
                <tr>
                <td>Vishal</td>             
                 <td><input type="checkbox" name="check[]" id="vishal"  value="2" class="check"  ></td>
                </tr>
                <tr>
                <td>Raj</td>             
                 <td><input type="checkbox" name="check[]" id="raj"   value="3" class="check"  ></td>
                </tr>
                <tr>
                <td>Kasam</td>             
                 <td><input type="checkbox" name="check[]" id="kasam"  value="4" class="check"  ></td>
                </tr>
                <input type="button" value="Submit" name="submit" class="js-submit" id="js-submit">
             </form>
                </table>

<script type="text/javascript">
        $(document).on('click',".js-submit",function(){
           var check=[];
          var bishal = $('#bishal').val();
           check = $('#vishal').val();
          var raj = $('#raj').val();
         check = $('#kasam').val();
          alert(check);
          //  check = bishal',' + vishal',' + raj',' + kasam;
          //  alert(check);
   $(".check:checked").each(function(){
    // var check =$('#bishal').val();
    check.push($('#bishal').val());
    // check.push($(this).val());
  });
      $(".check:checked").each(function(){
    // var check =$('#raj').val();
    check.push($('#raj').val());
    // check.push($(this).val());
  });
    alert(check);
        var check = $('#bishal ,'+'#vishal ,'+'#raj ,'+'#kasam').val();
        alert(check);
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