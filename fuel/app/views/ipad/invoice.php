        <?php foreach ($invoices as  $invoice):?>
      <tr class="js-bill_tr" name="pro_id">
        <td><?=$invoice->name?></td>
        <td><?=$invoice->quantity?></td>
        <td><?=$invoice->price?></td>
        <td><?=$invoice->amount?></td>
      </tr>
        <?php endforeach;?>    
