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
.pagination li a.current_page {
    background-color: #0056b3;
    color: #fff;
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
          <input type="text" class="form-control" id="product_name" name="product_name">
        </div>
      </div>
      <div class="col-sm-2"> 
         <div class="form-group">
          <label>Product Category</label>
        <select type="text" class="form-control" id="product_category" name="product_category">
          <option value="">-Select-</option>
          <option value="Laptop">Laptop</option>
          <option value="Mobile">Mobile</option>
        </select>
      </div>
      </div>
      
      <div class="col-sm-2"> 
         <div class="form-group">
            <label>Status</label>
            <select type="text" class="form-control" id="product_status" name="product_status">
              <option value="">-Select-</option>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
      </div>    

       <div class="col-sm-2"> 
         <div class="form-group">
            <label>Stock Status</label>
            <select type="text" class="form-control" id="product_stock_status" name="product_stock_status">
              <option value="">-Select-</option>
              <option value="in_stock">In Stock </option>
              <option value="out_of_stock">Out of Stock </option>
            </select>
          </div>
      </div> 
      <div class="col-sm-3"> 
         <div class="form-group">
            <label>Sort By</label>
            <select type="text" class="form-control" id="product_sort_by" name="product_sort_by">
              <option value="">-Select-</option>
              <option value="price_low">Price Low to High</option>
              <option value="price_high">Price High to Low </option>
            </select>
          </div>
      </div>
      
    </div>

    <div id="productAjaxResults">
      

    </div>

  </div>  
</div>
<div class="footer">
  <p>Created by MS<a class="text-danger" href="https://github.com/mithilesh849" target="_blank"> Mithilesh Sah </a></p>
</div>

<script type="text/javascript">

$(function() {
    
    /*--first time load--*/
    loadProducts(false);
    
    /*-- Search keyword--*/
    $(document).on('keyup', "#product_name", function(event) {
      //      
      loadProducts(page_url=false);
      event.preventDefault();
    });

    // on change params
    $(document).on('change', "#product_category, #product_status, #product_stock_status", function(event) {
      //      
      loadProducts(page_url=false);
      event.preventDefault();
    });

    // on change params
    $(document).on('change', "#product_sort_by", function(event) {
      //      
      alert("it's seems like your are a good programmer, you can modify for this. Happy Coding!");
      loadProducts(page_url=false);
      event.preventDefault();
    });
    
    /*-- Page click --*/
    $(document).on('click', ".productsPagination .pagination li a", function(event) {     
           
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
      var product_sort_by     = $("#product_sort_by option:selected").val();
      var product_status      = $("#product_status option:selected").val();
      var product_stock_status      = $("#product_stock_status option:selected").val();
      //you can add more filter params as per your need.
      var dataString    = 'product_name=' + product_name+'&product_category='+product_category+'&product_status='+product_status+'&product_stock_status='+product_stock_status;
      var base_url      = "<?= base_url(); ?>product/"+'product_ajax';
      
      if(page_url == false) {
        var page_url = base_url;
      }
      
      //loader
      $('#productAjaxResults').html("<div style='background-color:#ddd; min-height:450px; line-height:450px; vertical-align:middle; text-align:center'><img alt='' src='' /></div>").fadeIn(800);

      $.ajax({
        type: "POST",
        url: page_url,
        data: dataString,
        success: function(response) {
          console.log(response);
          $("#productAjaxResults").empty().html(response);                  
        }
      });
    }

  });

</script>

</body>
</html>
