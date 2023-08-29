<style>
   .custom-select {
      position: relative;
      display: inline-block;
      margin-left: 15px;
   }

   .custom-select select {
      display: inline-block;
      padding: 10px 30px 10px 15px;
      font-size: 16px;
      font-family: Arial, sans-serif;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
      appearance: none;
      -webkit-appearance: none;
      background-repeat: no-repeat;
      background-position: right center;
   }

   .custom-select select::-ms-expand {
      display: none;
   }

   .custom-select::after {
      content: "";
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      pointer-events: none;
   }

   .custom-select option {
      padding: 10px;
      background-repeat: no-repeat;
      background-position: 10px center;
   }

   .custom-select option[data-flag] {
      padding-left: 40px;
   }

   .custom-select option[data-flag]::before {
      content: attr(data-flag);
      display: inline-block;
      margin-right: 5px;
   }


   .right_wrapper {
      display: flex;
      align-items: center;
      justify-content: space-between;
   }
</style>

<section class="header_section header_section1" id="header_section">

   <header>
      <div class="topbar topbar-background-color top-bar">
         <div class="container">
            <div class="row align-content-between">

               <div class="col text-sm contact-head topbar-text-color d-flex align-items-center">WELCOME TO <?= $generalConfig['brand_name'] ?></div>

               <div class="col-auto right_wrapper">
                  <ul class="list-inline m-0">
                     <li class="list-inline-item  ms-3 topbar-text-color">Currency: </li>
                  </ul>

                  <div class="currency_wrapper custom-select">
                     <select name="currency" id="currency-select">
                        <option value="EUR" data-flag="🇪🇺">🇪🇺 Euro (EUR)</option>
                        <option value="GBP" data-flag="🇬🇧">🇬🇧 British Pound (GBP)</option>
                        <option value="DKK" data-flag="🇩🇰">🇩🇰 Danish Krone (DKK)</option>
                     </select>
                  </div>

               </div>
            </div>
         </div>
      </div>

      <nav class="navbar navbar-expand-lg py-4 nav-color" aria-label="Third navbar example">
         <div class="container"> <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a>
            <button class="navbar-toggler menu-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarsExample03">
               <ul class="navbar-nav mb-2 mb-sm-0  me-auto ms-0 ms-xl-5">
                  <li class="nav-item active"> <a class="nav-link nav-active-color" aria-current="page" href="index.php">Home</a> </li>
                                    <li class="nav-item"> <a class="nav-link nav-text-color" aria-current="page" href="club.php">Club</a> </li>
                  <li class="nav-item"> <a class="nav-link nav-text-color" aria-current="page" href="shop.php">Products</a> </li>
                  <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="cart.php">Cart</a> </li>
                  </li>
               </ul>

               <div class="call-us d-flex align-items-center me-4">
                  <div class="me-2"> <i class="bi bi-telephone fs-2 nav-icon-color"></i></div>
                  <div class="call-txt me-3"> <span class="ct nav-text-color">Call Us:</span> <br />
                     <span class="pht">
                        <a href="tel:<?= $generalConfig['phone_number'] ?>" class="nav-text-color">
                           <?= $generalConfig['phone_number'] ?>
                        </a>
                     </span>
                  </div>
               </div>


               <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
                  <ul class="navbar-nav navbar-nav1">
                     <li class="cart_link">
                        <a href="javascript:void(0);" class="nav-text-color">
                           <span class="cart_text">
                              <i class="bi bi-bag fs-2 nav-icon-color"></i>

                           </span>
                           <span class="cart_amt">
                              <span class="currency_symbol">€</span>
                              <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                           </span>
                        </a>
                        <div class="minibag cart_bag cart-bag-outline" id="minicart">
                           <!-- class = empty_bag -->
                           <div class="minicart_inner">
                              <!-- <p class="empty_cart">
                                 Your cart is empty
                                 </p> -->
                              <div class="minicart_table table-responsive">
                                 <table class="table minicart_details">
                                    <tr id="minicartRow">

                                    </tr>
                                 </table>
                              </div>
                              <div class="subtotal_column">
                                 <p>
                                    Subtotal: <span class="currency_symbol">€</span><span class="subtotalAmount" id="subtotalAmount"></span>
                                 </p>
                              </div>
                              <div class="minicart_buttons">
                                 <a href="cart.php" class="btn btn-continue shop-btn-outline">
                                    View Cart
                                 </a>
                                 <a href="checkout.php" class="btn btn-update shop-btn-color">
                                    Checkout
                                 </a>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               <?php } ?>


            </div>
         </div>
      </nav>
      </div>
   </header>

</section>

<script>
   $(document).ready(function() {

      // Set the default currency as Euro
      var defaultCurrency = sessionStorage.getItem('currency');
      if (!defaultCurrency) {
         defaultCurrency = 'EUR'; // Set "EUR" as the default currency
         sessionStorage.setItem('currency', defaultCurrency);
         sessionStorage.setItem('currency_symbol', "€");
      }
      $('#currency-select').val(defaultCurrency);
      $("select[name='currency']").val(defaultCurrency);
      var currency_symbol = sessionStorage.getItem('currency_symbol');
      $(".currency_symbol").html(currency_symbol);

      // Make an API call to retrieve the currency rates
      if (defaultCurrency != "EUR")
         currencyConverterAPICall(defaultCurrency);

      // Function to handle currency change event
      $("select[name='currency']").change(function() {
         var selectedCurrency = $(this).val();
         sessionStorage.clear();
         sessionStorage.setItem('currency', selectedCurrency);
         if (selectedCurrency == "EUR") {
            sessionStorage.setItem('currency_symbol', "€");
         } else if (selectedCurrency == "GBP") {
            sessionStorage.setItem('currency_symbol', "£");
         } else {
            sessionStorage.setItem('currency_symbol', "Kr");
         }
         window.location.href = './';
      });
   });

   function currencyConverterAPICall(selectedCurrency) {
      $.ajax({
         url: "https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_TOilsFiFRM1KpPMVd2YfaNcVx0uAZ7ieNJ2BTF3y&currencies=EUR%2CDKK%2CGBP&base_currency=EUR",
         method: "GET",
         success: function(response) {
            var currencyRate = response.data;
            updatePrices(selectedCurrency, currencyRate);
         },
         error: function(xhr, status, error) {
            // Handle the error if the API call fails
            console.log("Error:", error);
         }
      });
   }

   function updatePrices(selectedCurrency, currencyRate) {
      console.log("Update Prices Started");
      var allProducts = $(".product-section");
      allProducts.each(function() {
         var orignalPrice = $(this).data('product-price-orignal');
         var productName = $(this).data('product-title');
         var updatedPrice = 0;
         var newSymbol = "€";
         switch (selectedCurrency) {
            case 'EUR':
               updatedPrice = (orignalPrice).toFixed(2);
               newSymbol = "€";
               break;
            case 'GBP':
               updatedPrice = (orignalPrice * currencyRate.GBP).toFixed(2);
               newSymbol = "£";
               break;
            case 'DKK':
               updatedPrice = (orignalPrice * currencyRate.DKK).toFixed(2);
               newSymbol = "Kr";
               break;
         }
         $(this).attr('data-product-price', updatedPrice);
         $(this).find(".prod_price_common span").html(newSymbol + updatedPrice);
         console.log("Price of " + productName + ": " + updatedPrice);
      });
      updatePricesClubPage(selectedCurrency, currencyRate)
   }

   function updatePricesClubPage(selectedCurrency, currencyRate) {
      console.log("Update Prices Club Page Started");
      var allProducts = $(".pkg_price");
      allProducts.each(function() {
         var orignalPrice = parseFloat($(this).html());
         var updatedPrice = 0;
         var newSymbol = "€";
         switch (selectedCurrency) {
            case 'EUR':
               updatedPrice = (orignalPrice).toFixed(2);
               newSymbol = "€";
               break;
            case 'GBP':
               updatedPrice = (orignalPrice * currencyRate.GBP).toFixed(2);
               newSymbol = "£";
               break;
            case 'DKK':
               updatedPrice = (orignalPrice * currencyRate.DKK).toFixed(2);
               newSymbol = "Kr";
               break;
         }
         $(this).html(updatedPrice);
         console.log("Price of Pkg : " + updatedPrice);
      });
   }
</script>