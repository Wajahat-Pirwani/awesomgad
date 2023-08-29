<?php ob_start(); ?>
<section class="pdt-section pdt-section18 p-0 my50" id="order">
   <div class="container" id="products">


      <h3 class="fw-bold pb-3"><?= $updateContent['shopTitle'] ?></h3>


      <div class="product-wrapper row">
         <input type="hidden" name="user_ip" id="user_ip" value="" />
         <?php
         $i = 0;
         // echo "<pre>";
         // print_r($products);
         // die('testing');
         foreach ($products as $key => $value) {
            $i++;
            foreach ($value as $k => $v) {
               if ($v == 'active') {
                  $p = $key;
                  $product = $products[$p];
                  if ($product['status'] == 'active') {
                     $priceMin = $product['ssPrice'];
                     if ($product['straightSaleMultiPrice'] == 'yes' && $product['billingModel'] == '1')
                        $priceMin = $product['shop_option']['shop_option1']['option_price'];
                     else if ($product['billingModel'] == '2' || $product['billingModel'] == '6' || $product['billingModel'] == '7' || $product['billingModel'] == '8')
                        $priceMin = $product['trialPrice'];
                     else if ($product['billingModel'] == '3')
                        $priceMin = $product['continuityPrice'];
         ?>
                     <div class="product-section product-section18 col-lg-4 col-12" data-product="product<?php echo $i; ?>" data-prod-id="<?= $product['id'] ?>" data-product-category="<?= $product['category'] ?>" data-product-title="<?= $product['name'] ?>" data-product-alias="<?= $product['alias'] ?>" data-product-description="<?= $product['description'] ?>" data-product-price-orignal="<?= $priceMin ?>" data-product-price="<?= $priceMin ?>" data-product-shipping="<?= $product['ssShipping'] ?>" <?php if ($product['billingModel'] != 1) { ?> data-product-rbllprice="<?= $product['trialRebillPrice'] ?>" data-product-trlshipping="<?= $product['trialShipping'] ?>" data-product-cntntyprice="<?= $product['continuityPrice'] ?>" data-product-cntntyshipping="<?= $product['continuityShipping'] ?>" <?php } ?> data-product-billmodel="<?= $product['billingModel'] ?>" data-product-MultiPrice="<?= $product['straightSaleMultiPrice'] ?>" data-product-id="product-<?php echo $i; ?>" data-product-size-option="<?= $product['sizeOption'] ?>" data-product-image-link="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">


                        <div class="product-block wow animate__fadeIn" data-wow-duration=".5s" data-wow-delay=".2s">


                           <a href="javascript:void(0);" class="btn_shop btn_shop18" id="btn_shop">
                              <h5 class="product-title product-name18"><?= $product['name'] ?></h5>
                              <img class="prod_img18" src="<?= preg_match('/^(http\:\/\/|https\:\/\/)/', $product['image']) ? $product['image'] : $path['images'] . '/' . $product['image']; ?>">
                           </a>



                           <div class="product-details">
                              <?php if ($pageConfig['displayBillingModel'] == 'yes') { ?>
                                 <p class="prod_category18">
                                    <span>
                                       <?php
                                       switch ($product['billingModel']) {
                                          case 1:
                                             echo $generalConfig['naming_convention']['1'];
                                             break;

                                          case 2:
                                          case 8:
                                             echo $generalConfig['naming_convention']['2'];
                                             break;

                                          case 3:
                                             echo $generalConfig['naming_convention']['3'];
                                             break;

                                          case 4:
                                             echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['2'];
                                             break;

                                          case 5:
                                             echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['3'];
                                             break;

                                          case 6:
                                             echo $generalConfig['naming_convention']['2'] . ' & ' . $generalConfig['naming_convention']['3'];
                                             break;

                                          case 7:
                                             echo $generalConfig['naming_convention']['1'] . ' & ' . $generalConfig['naming_convention']['2'] . ' & ' . $generalConfig['naming_convention']['3'];
                                             break;
                                       }
                                       ?>
                                    </span>
                                 </p>
                              <?php } ?>


                              <?php
                              if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'no') { ?>
                                 <p class="prod_price_common prod_price18"><span>$<?= $product['ssPrice'] ?></span></p>
                              <?php }
                              if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'yes') {
                                 $prod_variant_count = count($product['shop_option']);
                              ?>
                                 <p class="prod_price_common prod_price18">
                                    <span>
                                       <?php if (($product['shop_option']['shop_option1']['option_price'] != $product['shop_option']['shop_option' . $prod_variant_count]['option_price']) && ($pageConfig['onlyShowFirstPrice'] == 'no')) { ?>
                                          $<?= $product['shop_option']['shop_option1']['option_price'] ?> - $<?= $product['shop_option']['shop_option' . $prod_variant_count]['option_price'] ?>
                                       <?php } else { ?>
                                          $<?= $product['shop_option']['shop_option1']['option_price']; ?>
                                       <?php } ?>
                                    </span>
                                 </p>
                              <?php }
                              if ($product['billingModel'] == 2 || $product['billingModel'] == 8) { ?>
                                 <p class="prod_price_common prod_price18"><span>$<?= $product['trialPrice']; ?> + <?= $product['trialShipping']; ?> for shipping</p>
                              <?php }
                              if ($product['billingModel'] == 3) { ?>
                                 <p class="prod_price_common prod_price18"><span>$<?= $product['continuityPrice']; ?> <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>+ <?= $product['continuityShipping']; ?> for shipping<?php } ?></span></p>
                              <?php }
                              if ($product['billingModel'] == 4) { ?>
                                 <p class="prod_price_common prod_price18"><span>$<?= $product['trialShipping'] ?></span></p>
                              <?php }
                              if ($product['billingModel'] == 5) { ?>
                                 <p class="prod_price_common prod_price18"><span>$<?= $product['ssPrice'] ?></span></p>
                              <?php }
                              if ($product['billingModel'] == 6) { ?>
                                 <p class="prod_price_common prod_price18"><span>$<?= $product['trialShipping'] ?></span></p>
                              <?php }
                              if ($product['billingModel'] == 7) { ?>
                                 <p class="prod_price_common prod_price18"><span>$<?= $product['ssPrice'] ?></span></p>
                              <?php }
                              ?>

                           </div>

                        </div>

                     </div>
         <?php
                  }
               }
            }
         } ?>
      </div>
   </div>
</section>
<?php $sections['productSection'] = ob_get_clean(); ?>