<!DOCTYPE html>
<html lang="en">
<head>
  <title>Codeigniter-3.x with ajax filter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   padding: 8px;
   width: 100%;
   background-color: #306af2;
   color: white;
   text-align: center;
}
</style>
</head>
<body>

<header class="text-center">
  <h1 class="text-primary">Codeigniter 3.x.x multi column filter</h1>
  <p class="text-danger">Filter data without refresh the page and easy to pagination with filtered data</p> 
</header>

  
<div class="container">
  <div class="row">
    <div class="col-sm-10 col-md-offset-1">
    <h3>Products</h3>
    <!-- filter -->
    <div class="row">
      <div class="col-sm-2"> 
        <div class="form-group">
          <label>Product name</label>
          <input type="text" class="form-control" name="product_name">
        </div>
      </div>
      <div class="col-sm-2"> 
         <div class="form-group">
          <label>Product Category</label>
        <select type="text" class="form-control" name="category_name">
          <option value="">-Select-</option>
          <option value="">Laptop</option>
          <option value="">Mobile</option>
        </select>
      </div>
      </div>

      <div class="col-sm-2"> 
         <div class="form-group">
            <label>Sort By</label>
            <select type="text" class="form-control" name="category_name">
              <option value="">-Select-</option>
              <option value="">Price Low to High</option>
              <option value="">Price High to Low </option>
            </select>
          </div>
      </div>
      <div class="col-sm-2"> 
         <div class="form-group">
            <label>Status</label>
            <select type="text" class="form-control" name="category_name">
              <option value="">-Select-</option>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
      </div>    
      
    </div>

    <div id="productAjaxResults">
      

    </div>

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
     <?php } }?>
    </tbody>
  </table>
      
    </div>
   
   
</div>

<div class="footer">
  <p>Created by Mithilesh Sah </p>
</div>

<script type="text/javascript">

$(function() {
    
    /*--first time load--*/
    loadProducts();
    
    /*-- Search keyword--*/
    $(document).on('click', "#searchExpireDocBtn", function(event) {
      //      
      loadProducts(page_url=false);
      event.preventDefault();
    });
    
    /*-- Page click --*/
    $(document).on('click', ".ajaxPagination .pagination li a", function(event) {     
           
      var page_url = $(this).attr('href');
      loadProducts(page_url);
      event.preventDefault();
    });
    
    /*-- create function to get products --*/
    function loadProducts(page_url = false)
    {
      // get changed or filtered value
      var product_name        = $("#product_name").val();
      var product_category    = $("#product_category option:selected").val();
      var product_sort_by    = $("#product_sort_by option:selected").val();
      var product_status    = $("#product_status option:selected").val();
      
      var dataString    = 'employee_id=' + employee_id+'&form_type='+product_status;
      var base_url      = "<?= base_url(); ?>product/"+'index_ajax';
      
      if(page_url == false) {
        var page_url = base_url;
      }
      
      $.ajax({
        type: "POST",
        url: page_url,
        data: dataString,
        success: function(response) {
          console.log(response);
          $("#productAjaxResults").empty().html(response);
          //
          $("#overlay").fadeOut(300);
        }
      });
    }

  });

</script>

</body>
</html>
