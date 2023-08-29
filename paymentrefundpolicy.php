<?php
error_reporting(0);
$configFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'site-info.php';
if (file_exists($configFilePath)) {
    require_once $configFilePath;
} else {
    echo 'General configuration error';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment & Refund Policy</title>
    <?= $generalConfig['add_stylesheet'] ?>
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/bootstrap.min.css?v=<?= time() ?>">
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/custom.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/style.css?v=<?= time() ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div id="loadingMask" style="width: 100%; height: 100%; position: fixed; background: #fff; z-index:99999999999;">
        <div>
            <img src="./img/loadingGif/<?= $pageConfig['loadingGif'] ?>.gif">
        </div>
    </div>

    <?php
    $showTrialContinuityVerbiage = false;

    foreach ($products as $product) {
        if ($product['status'] == 'active' && $product['billingModel'] != 1) {
            $showTrialContinuityVerbiage = true;
        }
    }
    ?>

    <?php
    if (file_exists('bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php')) {
        require 'bp_config/includes/templates/headers/header' . $pageConfig['header_template'] . '.php';
    }
    ?>

    <script type="text/javascript">
        $(function() {
            // var total = sessionStorage.getItem('cartTotal');
            // var qty = sessionStorage.getItem('qty');
            // console.log(qty);
            // // $('#cart_amt').html(total);
            // $('#cart_qty').html(qty);
            var productCart = [];
            var tot_pdt_count = <?= $generalConfig['product_count'] ?>;
            for (i = 1; i <= tot_pdt_count; i++) { //total pdt count

                var shoppingCart = JSON.parse(sessionStorage.getItem('product-' + i));
                var cartpdtTotal = productCart.push(shoppingCart);

            }
            //console.log(productCart);
            var cartPdtArrNew = productCart.filter(function(el) {
                return el != null && el != "";
            });

            console.log(cartPdtArrNew);
            sessionStorage.setItem("cartPdtArr", JSON.stringify(cartPdtArrNew));

            let table = document.getElementById("minicartRow");

            //let table = '<thead><tr><th>id</th><th>name</th><th>age</th></tr></thead><tbody>';

            // let table = $('#cartRO');


            var TotalPrice = {};

            var showCartNumber = false;
            cartPdtArrNew.forEach(function(d) {
                if (d.EnableMaxqty > 1) {
                    showCartNumber = true;
                    return;
                }
            });

            cartPdtArrNew.forEach(function(d) {
                if (d.billModel == '2' || d.billModel == '8') {
                    <?php if ($showTrialContinuityVerbiage) { ?>
                        table += '<tr id="row-' + d.Id + '" data-product-id="' + d.Id + '" data-product-name="' + d.Name + '">'
                        table += '<td><img src="' + d.Image + '" class="img-fluid  mini-pdt-image" id="mini-image-' + d.Id + '"></td>';
                        table += '<td><p>' + d.Name + '</p><p class="cart_amount"><span class="cartNumber" id="cartNumber">' + (showCartNumber ? d.Qty : '') + '</span> X <span class="cartPrice" id="cartPrice">€' + d.trlPrice + '</span></p><p class="cart_amount" style="display:none;"> = <span class="cartTotal" id="cartTotal" data-total="' + (d.Qty * d.trlPrice) + '">€' + (d.Qty * d.trlPrice) + '</span></p></td>';
                        table += '<td><span class="material-icons close_button close-button" id="close-' + d.Id + '">close</span></td></tr>';
                    <?php } ?>
                } else {
                    table += '<tr id="row-' + d.Id + '" data-product-id="' + d.Id + '" data-product-name="' + d.Name + '">'
                    table += '<td><img src="' + d.Image + '" class="img-fluid  mini-pdt-image" id="mini-image-' + d.Id + '"></td>';
                    table += '<td><p>' + d.Name + '</p><p class="cart_amount"><span class="cartNumber" id="cartNumber">' + (showCartNumber ? d.Qty : '') + '</span> X <span class="cartPrice" id="cartPrice">€' + d.Price + '</span></p><p class="cart_amount" style="display:none;"> = <span class="cartTotal" id="cartTotal" data-total="' + d.Total + '">€' + d.Total + '</span></p></td>';
                    table += '<td><span class="material-icons close_button close-button" id="close-' + d.Id + '">close</span></td></tr>';
                }
            })

            $('#minicartRow').empty().html(table);

            var miniTotal = sessionStorage.getItem('cartTotal');

            $('.subtotalAmount').html(miniTotal);

            var total = 0;
            $('.cartTotal').each(function() {

                total += parseFloat($(this).data('total'), 10);
                //console.log($(this).attr('data-total'));
                //console.log(total)
                $('#subtotalAmount').html(total.toFixed(2));
                $('#cart_amt').html(total.toFixed(2));
            })

            var qtyCol = 0;
            $('.cartNumber').each(function() {

                qtyCol += parseFloat($(this).data('qty'), 10);
                $('#cart_qty').html(qtyCol);
            })
            $('.close-button').click(function() {

                console.log($(this).parents('tr').data('product-id'));

                sessionStorage.removeItem($(this).parents('tr').data('product-id'));

                var removeItem = $(this).parents('tr').data('product-id');

                var ar = sessionStorage.getItem("cartPdtArr");

                for (var i = 0; i < ar.length; i++) {
                    if (ar[i].Id == removeItem) {
                        ar.splice(i, 1);

                    }
                    if (sessionStorage.getItem('cartPdtArrNew') == '[]' || sessionStorage.getItem('cartPdtArrNew') == '') {
                        $('.subtotalAmount').html('0.00');
                        $('#cart_amt').html('0.00');
                        $('.bag_icon').removeClass('active');
                    }
                }
                location.reload(true);
                //            $('#cart_amt').html(total);
                // $('#cart_qty').html(qty);
                // $('.subtotalAmount').html(total);
            })

            if (sessionStorage.getItem('cartPdtArr') == '[]' || sessionStorage.getItem('cartPdtArr') == '') {
                //alert('hello');
                $('#minicartRow')
                    .empty()
                    .html('<tr class="emptyRow"><td colspan="3"><p class="cart_empty">Cart is Empty</p></td></tr>');
                $('#cart_amt').html('0.00');
                $('#cart_qty').html('0');
                $('.subtotalAmount').html('0.00');
                $('.cart_bag').addClass('empty_bag');
                $('.bag_icon').removeClass('active');
            }
        })
    </script>

    <div class="py-5">
        <div class="container">
            <div>
                <div id="payment-and-refund">
                    <h4>Payment Policy</h4>
  <p>We accept: Visa and MasterCard. Payment can only be made using a credit or debit card. Payment is deducted from your account upon order and/or upon commencement of your membership. You will not be deducted for an amount in excess of that which was approved upon completion of your purchase.<p>
  <h4>Automatic Recurring Billing - Membership</h4>
  <p>In accordance with the Terms and Conditions of this website, subscription fees may be automatically renewed at or after the end of the original term selected, for a similar period of time and for a similar or lower amount, unless notice of cancellation is received from you. Unless and until this agreement is cancelled in accordance with the terms hereof, you hereby authorize awesomegadgetdiscount.com to charge you by your chosen payment method and to pay for the ongoing cost of the membership via the same payment method.<p>
  <p>By agreeing to these terms of use, Subscriber accepts being enrolled in a 3 days trial for only
  3 EUR, acknowledges that unless the Membership is cancelled prior to the end of the trial period, the Subscriber will automatically be enrolled to a full Membership at the price and terms chosen upon signup. Further, Subscriber authorize us to charge the Membership fee for the next billing cycle. Billing notifications will be sent from support@awesomegadgetdiscount.com. This charge will appear on the Subscriber's credit card statement as support@awesomegadgetdiscount.com+441942925720

  <h4>Membership Refund Policy</h4>
  <p>You can at all times cancel your Membership. When you choose to cancel your Membership, your Membership will continue only until the end of the current period already started and you will not be charged for further Membership periods. We do not offer refunds as the cancellation is effectuated instantly after the commenced period. However, should the unlikely happen that you are dissatisfied with our Membership service, it can in rare cases be considered to offer a refund of up to a maximum equal to 2 periods Membership fees. If you have a complaint about our Membership service please email your complaint to our customer service at support@awesomegadgetdiscount.com and we will take a decision within 3-4 working days.<p>
  <h4>Product Refund Policy</h4>
  <p>awesomegadgetdiscount.com offers a refund policy of 30 days (the standard, legally endorsed policy is 14 days). This period is valid from the day you receive delivery of your purchased goods. You can return a product for up to 30 days from the date you purchased it. Any product you return must be in the same condition you received it and in the original packaging.<p>
  <p>If you wish to return one or more purchased products, let us know via;<br/>
  <p>Telephone: +441942925720 or via email, support@awesomegadgetdiscount.com (we will reply within 24 hours). <p>
  <p>In the case of sealed goods which are not suitable for returns due to health protection or hygiene reasons, the right to cancel ceases if the goods become unsealed after delivery.<p>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (file_exists('bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php')) {
        require 'bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    $dynamicFont = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'fonts.php';
    if (file_exists($dynamicFont)) {
        require_once $dynamicFont;
    }
    ?>
    <?php
    $dynamicColors = __DIR__ . DIRECTORY_SEPARATOR . 'bp_config' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'colors.php';
    if (file_exists($dynamicColors)) {
        require_once $dynamicColors;
    }
    ?>
    <script>
        $(document).ready(function() {
            $('#loadingMask').fadeOut();
        });
    </script>
</body>

</html>