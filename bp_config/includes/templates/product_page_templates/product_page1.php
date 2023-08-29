<section class="pdt-section single-pdt product-page1">
   <div class="container" id="products">
      <div class="product-wrapper row" id="single_pdt_id">

         <div class="pdt-image col-lg-5 col-12">
            <a href="" data-bs-toggle="modal" data-bs-target="#img-lightbox" id="lightbox-wrapper">
               <div class="pdt-img-wrapper">
                  <img src="" class="img-fluid pdt-image" id="single_pdt_link">
                  <i class="fal fa-search-plus" data-toggle="tooltip" data-placement="top" title="View Large Image"></i>
               </div>
            </a>
         </div>
         <div class="pdt-image col-lg-7 col-12">
            <div class="breadcrumb-col">
               <p>
                  <a href="/">Home</a> /
                  <a href="javascript:void(0);" id="single_pdt_category"></a>
               </p>
            </div>
            <div class="title-col">
               <h2 id="single_pdt_title"></h2>
            </div>
            <?php if ($pageConfig['displayBillingModel'] == 'yes') { ?>
               <div>
                  <p style="margin-bottom: 0; font-size:15px;" id="bill_model"></p>
               </div>
            <?php } ?>
            <div style="font-size: 20px;">
               <p style="margin-bottom: 5px;">
                  Subtotal: $<span id="subtotal_price"><?= $subtotalPrice ?? 0; ?></span>
               </p>
               <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>
                  <p style="margin-bottom: 5px;">
                     Shipping: <span class="currency_symbol">€</span><span id="shipping_price"><?= $shippingPrice ?? 0; ?></span>
                  </p>
               <?php } ?>
            </div>
            <div class="price-col">
               <p>
                  Total: $<span id="single_pdt_price"><?= (isset($subtotalPrice) && isset($shippingPrice)) ? sprintf("%0.2f", $subtotalPrice + $shippingPrice) : 0; ?></span>
               </p>

            </div>


            <!-- Size variant option -->
            <div class="size-options-text">
               <b class="size">SIZE</b>: REQUIRED
            </div>
            <div class="size-opts">
               <ul class="proSize-ul">
                  <script type="text/javascript">
                     //fetch size options for each products
                     $(document).ready(function() {
                        var checksizeoption = sessionStorage.getItem('data_product_size_option');
                        var prod_id = sessionStorage.getItem('data_product');
                        var prod_id_inner = sessionStorage.getItem('data_prod_id');
                        console.log(prod_id);
                        if (checksizeoption == 'yes') {
                           $.ajax({
                              url: "bp_config/site-info.php",
                              type: "POST",
                              data: {
                                 type: 5,
                                 prod_id: prod_id,
                                 prod_id_inner: prod_id_inner
                              },
                              cache: false,
                              success: function(result) {
                                 // console.log(result);
                                 $('ul.proSize-ul').html(result);
                                 setSizeonLoad();
                              }
                           });

                           function setSizeonLoad() {
                              //set size in session storage on page load
                              var size_val = $('.first-size-option').val();
                              sessionStorage.setItem('data_product_selected_size', size_val);
                           }
                           $(document).on('change', '.proSize-ul input[type=radio]', function() {
                              var size_val = $(this).val();
                              sessionStorage.setItem('data_product_selected_size', size_val);
                           });
                           //prevent clicking on unavailable sizes
                           $(document).on('click', 'li.unavailable', function() {
                              $('.first-size-option').trigger('click');
                           });
                        }
                        if (checksizeoption == 'no') {
                           $('div.size-options-text').hide();
                           $('div.size-opts').hide();
                           sessionStorage.setItem('data_product_selected_size', '');
                        }
                     });
                  </script>
               </ul>
            </div>

            <?php if ($showTrialContinuityVerbiage) { ?>
               <!-- this is for bill model 4 -->
               <div class="qty-col1" id="pdt_type" style="display: none;">
                  <select class="form-control selectbox">
                     <!-- <option>Choose One</option> -->
                     <option id="trl" value="2"><?= $generalConfig['naming_convention']['2'] ?> </option>
                     <option id="s_sale" value="1"><?= $generalConfig['naming_convention']['1'] ?></option>
                  </select>
               </div>
               <!-- this is for bill model 5 -->
               <div class="qty-col1" id="pdt_type_5" style="display: none;">
                  <select class="form-control selectbox">
                     <!-- <option>Choose One</option> -->
                     <option id="s_sale" value="1"><?= $generalConfig['naming_convention']['1'] ?></option>
                     <option id="con" value="3"><?= $generalConfig['naming_convention']['3'] ?></option>
                  </select>
               </div>
               <!-- this is for bill model 6 -->
               <div class="qty-col1" id="pdt_type6" style="display: none;">
                  <select class="form-control selectbox">
                     <!-- <option>Choose One</option> -->
                     <option id="trl" value="2"><?= $generalConfig['naming_convention']['2'] ?></option>
                     <option id="con" value="3"><?= $generalConfig['naming_convention']['3'] ?></option>
                  </select>
               </div>
               <!-- this is for bill model 7 -->
               <div class="qty-col1" id="pdt_type7" style="display: none;">
                  <select class="form-control selectbox">
                     <!-- <option>Choose One</option> -->
                     <option id="s_sale" value="1"><?= $generalConfig['naming_convention']['1'] ?></option>
                     <option id="trl" value="2"><?= $generalConfig['naming_convention']['2'] ?></option>
                     <option id="con" value="3"><?= $generalConfig['naming_convention']['3'] ?></option>
                  </select>
               </div>
            <?php } ?>

            <script type="text/javascript" src="<?= $path['js']; ?>/include/product1.js"></script>
            <div class="pdt-add">
               <!-- for bill model 1 if it set to multiprc= yes then fetch dropdown qty and each pricing -->
               <script type="text/javascript">
                  var prod_id = sessionStorage.getItem('data_product');
                  var billMod = sessionStorage.getItem('data_product_billing_model');
                  var multiPrice = sessionStorage.getItem('data_product_MultiPrice');
                  if (billMod == 1 && multiPrice == 'yes') {
                     // alert('SS off');
                     document.write('<div class="qty-select"></div>');

                     $(".qty-select").html(
                        '<div>Select Quantity</div>' +
                        '<select class="select-qty" id="qty_dropdown">' +
                        <?php foreach ($options as $option) { ?> '<option value="<?= $option['option_quantity']; ?>" data-price="<?= $option['option_price']; ?>"><?= $option['option_quantity']; ?></option>' +
                        <?php } ?> '</select>'
                     );
                  }
               </script>
               <div id="select-qty-text" style="display: none;">Select Quantity</div>
               <div class="qty-col" style="margin: 0; display: none;">

                  <button type="button" class="material-icons span_counter" id="decrease" disabled=""> remove </button>

                  <input type="text" class="form-control qty qty-value" value="1" id="qty" readonly>

                  <button type="button" class="material-icons span_counter" id="increase"> add </button>
               </div>
               <div class="pdt-button">
                  <button type="button" class="btn btn-primary btn-cart pdt-page-btn-color" onclick="AddtoCart()">Add to cart</button>
               </div>
            </div>
            <div class="category-col pt-3" style="display: <?= $pageConfig['displayCategory'] == 'yes' ? 'block' : 'none'; ?>;">
               <p>
                  <span>Category</span>: <a href="javascript:void(0);" id="single_pdt_cat"></a>
               </p>
            </div>
         </div>
      </div>
   </div>

   <div class="container" id="products_desc">
      <div class="product-wrapper row">

         <div class="tab-desc col-lg-12 col-12">
            <div class="panel with-nav-tabs panel-default">


               <div class="panel-heading">
                  <ul class="nav nav-tabs nav_tabs">
                     <li class="active title"><a href="#desc" data-toggle="tab">Description</a></li>

                  </ul>
               </div>
               <div class="panel-body">
                  <div class="tab-content">
                     <div class="tab-pane in active" id="desc">
                        <p id="single_pdt_description">
                           <script>
                              document.write(sessionStorage.getItem('data_product_description'))
                           </script>
                        </p>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>