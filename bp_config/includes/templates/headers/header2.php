<section class="header_section header_section2" id="header_section">


  <header class="navbar-nav2">
    <div class="topbar topbar-background-color top-bar">
      <div class="container">


        <div class="row align-content-between">
          <div class="col text-sm">

            <span class="d-inline"> <i class="bi bi-telephone-fill topbar-text-color"></i>
              <a href="tel:<?= $generalConfig['phone_number'] ?>" class="topbar-text-color"><?= $generalConfig['phone_number'] ?></a>
            </span>

            <span class="ms-3 ms-lg-4 d-inline ">
              <i class="bi bi-envelope-fill topbar-text-color"></i>
              <a href="mailto:<?= $generalConfig['email'] ?>" class="topbar-text-color"><?= $generalConfig['email'] ?></a>
            </span>

          </div>

        </div>


      </div>
    </div>



    <div class="primary-navigation  px-0 py-4 nav-color">
      <nav class="navbar navbar-expand-lg p-0 ">
        <div class="container">

          <a class="header_brand nav-text-color" href="index.php"><?= $generalConfig['brand_name'] ?></a>

          <button class="navbar-toggler menu-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>


          <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav mx-auto mb-lg-0">
              <li class="nav-item active"> <a class="nav-link nav-active-color" aria-current="page" href="index.php">Home</a> </li>
              <li class="nav-item"> <a class="nav-link nav-text-color" aria-current="page" href="shop.php">Shop</a> </li>
              <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="cart.php">Cart</a> </li>
              <li class="nav-item"> <a class="nav-link  nav-text-color" aria-current="page" href="checkout.php">Checkout</a> </li>
              </li>
            </ul>
          </div>



          <?php if ($pageConfig['showNavigationCart'] == 'yes') { ?>
            <ul class="navbar-nav cart-nav ml-auto">

              <li class="cart_link d-none d-lg-inline"><a href="contact.php"><span class="nav-text-color"> <i class="bi bi-person  fs-4 me-3 icuser nav-icon-color"></i> </span></span> </li>

              <li class="cart_link"> <a href="javascript:void(0);"><span class="cart_text nav-text-color"><i class="bi bi-cart fs-5 nav-icon-color"></i> </span> <span class="cart_amt nav-text-color"> <span class="currency_symbol">€</span>
                    <p id="cart_amt" class="subtotalAmount" style="display: inline;"></p>
                  </span>
                  <!-- <span class="material-icons bag_icon ">shopping_bag 
                              <span class="bag_count" id="bag_count">
                              	<p id="cart_qty" style="display: inline;"></p>
                              </span>
                              </span> -->
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
                      <p> Subtotal: $<span class="subtotalAmount" id="subtotalAmount"></span> </p>
                    </div>
                    <div class="minicart_buttons"> <a href="cart.php" class="btn btn-continue shop-btn-outline"> View Cart </a> <a href="checkout.php" class="btn btn-update shop-btn-color"> Checkout </a> </div>
                  </div>
                </div>
              </li>
            </ul>
          <?php } ?>
        </div>
      </nav>
    </div>





  </header>



</section>