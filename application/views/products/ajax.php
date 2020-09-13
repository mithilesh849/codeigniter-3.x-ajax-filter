<!--  -->

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Item</th>
          <th>Price</th>
          <th>Category</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if( count($products ) > 0 ) {
          foreach($products as $item) {
        ?>
        <tr>
         <td><?= $item['id']?></td>
         <td><?= $item['name']?></td>
         <td><?= $item['price']?></td>
         <td><?= $item['category']?></td>
         <td><?= $item['status']?></td>
        </tr>
       <?php } }else{?>
        <tr><td class="5">No record!</td></tr>
       <?php } ?>

      </tbody>
  </table>

  <div class="row" style="margin-bottom: 30px;">
    <div class="col-sm-6 productsPagination "> 
      <ul class="pagination">
      <?= $pagelinks?>
      </ul>
    </div>
  </div>