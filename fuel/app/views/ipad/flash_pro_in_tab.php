      <tr class="js-bill_tr" id="<?=$products[0]['id']?>" name="pro_id">
          <form>
            <?php foreach ($charge as  $value):?>

            <?php endforeach;?>

        <td id="js-pro_name<?=$products[0]['id']?>" name='pro_name'><?=$products[0]['name']?></td>
        <td>
            <button type="button" class="value-button decrease" id="decrease<?=$products[0]['id']?>" data-pro_id="<?=$products[0]['id']?>" data-price="<?=$products[0]['price']?>" data-tax="<?=$value->vat?>" data-discount="<?=$value->discount?>" value="">-</button>

            <input type="number" readonly name="qty_number" id="js-bill_number<?=$products[0]['id']?>"  value="0" />

            <button type="button" class="value-button increase" id="increase<?=$products[0]['id']?>" data-pro_id="<?=$products[0]['id']?>" data-price="<?=$products[0]['price']?>" data-tax="<?=$value->vat?>" data-discount="<?=$value->discount?>"  value="">+</button>
        
      </td>
      	<td id="js-bill_each<?=$products[0]['id']?>" name="each"><?=$products[0]['price']?></td>
      	<td>
            <input  type="total" readonly name="js-amount" id="js-bill_amount<?=$products[0]['id']?>"  value="" />
        </td>
          </form>       
      </tr>
