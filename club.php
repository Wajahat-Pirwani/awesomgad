<?php
session_start();
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
    <title><?= $generalConfig['brand_name'] ?></title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Fonts -->
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/bootstrap.min.css?v=<?= time() ?>">
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/custom.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/style.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href="<?= $path['css']; ?>/animate.css?v=<?= time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="bp_config/css/swiper-bundle.min.css" />
    <!-- <script src="bp_config/js/swiper-bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <style>
        /* Club Page */
        .club-page {
            margin: 80px 0;
        }

        .club-page .page-heading h1 {
            font-size: 45px;
            text-align: center;
            font-weight: 800;
        }

        .club-page .page-heading p {
            font-size: 14px;
            text-align: center;
            font-weight: 300;
            width: 1000px;
            margin: auto;
            margin-bottom: 100px;
            position: relative;
        }

        .club-page .page-heading p:after {
            content: "";
            width: 140px;
            height: 2px;
            background-color: #184e77;
            position: absolute;
            bottom: -14px;
            left: 0;
            right: 0;
            margin: auto;
        }

        .club-content {
            display: flex;
            flex-direction: row;
            align-items: stretch;
            margin: 0px auto 50px;
            max-width: 900px;
            min-width: 600px;
            padding: 0 15px;
        }

        .club-content .club-sidebar {
            flex: 0 0 40%;
            max-width: 40%;
        }

        .club-content .club-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .club-content .club-body_title {
            min-height: 50px;
        }

        .club-content .club-body_title,
        .club-content .club-body_content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .club-content .club-sidebar .club-body_title {
            background-color: transparent;
            color: inherit;
            justify-content: flex-start;
        }

        .club-content .club-body_title h5 {
            margin-bottom: 0px;
            font-weight: 600;
        }

        .club-content .club-sidebar .club-body_title h5 {
            margin-left: 30px;
        }

        .club-content .club-body_content {
            min-height: 50px;
        }

        .club-content .club-body_title,
        .club-content .club-body_content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .club-content .club-sidebar .club-body_content {
            background-color: #f3f7f7;
            border-bottom: 1px solid #e7eeef;
            justify-content: flex-start;

        }

        .club-content .club-body_content p {
            margin-bottom: 0px;
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .club-content .club-sidebar .club-body_content p {
            margin-left: 30px;
            text-transform: capitalize;
            text-align: left;
            margin: 0 auto;
        }

        .table-wrapper ul,
        .table-wrapper ul.products {
            margin: 0 0 1em;
            margin-bottom: 1em;
            padding: 0;
            list-style: none outside;
            clear: both;
        }

        .table-wrapper ul {
            display: flex;
            flex-wrap: wrap;
        }

        .club-content ul.products {
            flex: 0 0 60%;
            max-width: 60%;
            margin-bottom: 0px;
        }

        .club-content .club-product_content {
            max-width: 50%;
            flex: 0 0 50%;
        }

        .club-content .club-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .club-content .club-product_content .club-body {
            position: relative;
        }

        .club-content .club-product_content.club-super .club-body {
            border-top: none;
            border-bottom: none;
        }

        .club-content .club-body_title {
            min-height: 50px;
        }

        .club-content .club-body_title,
        .club-content .club-body_content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .club-content .club-body_title p {
            margin-bottom: 0px;
            text-transform: uppercase;
            font-size: 14px;
        }

        .club-content .club-body_content {
            min-height: 50px;
        }

        .club-content .club-body_title,
        .club-content .club-body_content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .club-content ul.products .club-body_content {
            background-color: #fff;
            border: 1px solid #e7eeef;
            text-align: center;
        }

        .club-content .club-body_content p {
            margin-bottom: 0px;
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .club-content .club-body_content .club-icon {
            position: relative;
        }

        .club-content .club-body_content {
            min-height: 50px;
        }

        .club-content .club-body_content--button {
            min-height: 70px;
        }

        .club-content .club-body_title,
        .club-content .club-body_content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .club-content ul.products .club-body_content {
            background-color: #fff;
            border: 1px solid #e7eeef;
            text-align: center;
        }

        .club-content ul.products .club-body_content--button {
            background-color: transparent;
            border: none;
        }

        .club-content .club-body_content p {
            margin-bottom: 0px;
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .club-body_content--button a {
            color: #e56783;
            text-decoration: none;
        }

        .club-body_content--button a button {
            -webkit-appearance: inherit;
            padding: 12px 50px 12px 50px;
            border-radius: 4px !important;
            border: 3px solid #184e77;
            color: #303030 !important;
            font-weight: 400 !important;
            font-size: 1rem;
            line-height: 1;
            text-transform: capitalize;
            position: relative;
            box-shadow: 0em 0em 0.325em 0 rgba(115, 23, 16, 0.15);
            background: #fff !important;
            font-family: marine, sans-serif;
            transition: all .2s linear;
        }

        .club-content .club-product_content.club-premium .club-body_title p {
            font-weight: 600;
            margin-bottom: 0px;
            text-transform: uppercase;
        }

        .club-content .club-body_title,
        .club-content .club-body_content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .club-content .club-sidebar .club-body_content--button {
            background-color: transparent;
            border: none;
        }
    </style>

</head>

<body>
    <div id="loadingMask" style="width: 100%; height: 100%; position: fixed; background: #fff; z-index:99999999999;">
        <div>
            <img src="./img/loadingGif/<?= $pageConfig['loadingGif'] ?>.gif">
        </div>
    </div>

    <?php
    $thisProduct = null;
    $showTrialContinuityVerbiage = false;
    $subtotalPrice;
    foreach ($products as $product) {
        if ($product['status'] == 'inactive' && $product['billingModel'] != 1) {
            $showTrialContinuityVerbiage = true;
        }

        if ($product['id'] == $_GET['pro_id']) {
            $thisProduct = $product;

            switch ($thisProduct['billingModel']) {
                case '2':
                case '8':
                    $max_qty = $thisProduct['trialMaxqty'];
                    break;

                default:
                    $max_qty = $thisProduct['enableMaxqty'];
            }

            $options = $thisProduct['shop_option'];


            $subtotalPrice = $shippingPrice = 0;

            switch ($thisProduct['billingModel']) {
                case '1':
                    if ($thisProduct['straightSaleMultiPrice'] == "no") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['ssPrice']);
                    }
                    if ($thisProduct['straightSaleMultiPrice'] == "yes") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['shop_option']['shop_option1']['option_price']);
                    }
                    $shippingPrice = sprintf("%0.2f", $thisProduct['ssShipping']);
                    break;
                case '2':
                    $subtotalPrice = sprintf("%0.2f", $thisProduct['trialPrice']);
                    $shippingPrice = sprintf("%0.2f", $thisProduct['trialShipping']);
                    break;
                case '3':
                    $subtotalPrice = sprintf("%0.2f", $thisProduct['continuityPrice']);
                    $shippingPrice = sprintf("%0.2f", $thisProduct['continuityShipping']);
                    break;
                case '4':
                    $subtotalPrice = sprintf("%0.2f", $thisProduct['trialPrice']);
                    $shippingPrice = sprintf("%0.2f", $thisProduct['trialShipping']);
                    break;
                case '5':
                    if ($thisProduct['straightSaleMultiPrice'] == "no") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['ssPrice']);
                    }
                    if ($thisProduct['straightSaleMultiPrice'] == "yes") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['shop_option']['shop_option1']['option_price']);
                    }
                    $shippingPrice = sprintf("%0.2f", $thisProduct['ssShipping']);
                    break;
                case '6':
                    $subtotalPrice = sprintf("%0.2f", $thisProduct['trialPrice']);
                    $shippingPrice = sprintf("%0.2f", $thisProduct['trialShipping']);
                    break;
                case '7':
                    if ($thisProduct['straightSaleMultiPrice'] == "no") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['ssPrice']);
                    }
                    if ($thisProduct['straightSaleMultiPrice'] == "yes") {
                        $subtotalPrice = sprintf("%0.2f", $thisProduct['shop_option']['shop_option1']['option_price']);
                    }
                    $shippingPrice = sprintf("%0.2f", $thisProduct['ssShipping']);
                    break;
            }
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
                var cartArray = JSON.parse(sessionStorage.getItem("cartPdtArr"));
                var removeItem = $(this).parents('tr').data('product-id');
                var removeAll = false;
                if (cartArray.length == 2) {
                    console.log("2 items in cart");
                    cartArray.forEach(cartProduct => {
                        if (cartProduct.Id === "product-7" && removeItem !== "product-7") {
                            removeAll = true;
                        }
                    });
                }
                console.log($(this).parents('tr').data('product-id'));
                if (removeAll) {
                    cartArray.forEach(cartProduct => {
                        sessionStorage.removeItem(cartProduct.Id);
                    });
                }
                sessionStorage.removeItem($(this).parents('tr').data('product-id'));
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
                $('#cart_amt').html(total);
                $('#cart_qty').html(qty);
                $('.subtotalAmount').html(total);

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

    <section class="page-wrapper club-page">

        <div class="inner-wrapper container">

            <div class="page-heading">
                <h1>Become A Member</h1>
                <p>
                    We provide a wide variety of high-quality products and our subscribed members get access to huge discounts. If you don’t want to enroll in the subscription click on the “Cancel subscription” button on the My Subscription page or simply reach out to our customer support before the membership starts.
                </p>
            </div>

            <div class="table-wrapper">
                <div class="club-content">
                    <!--sidebar-->
                    <div class="club-sidebar">
                        <div class="club-sidebar_content">
                            <!--<div class="club-header"><h3>Choose your plan</h3></div>-->
                            <div class="club-body">
                                <div class="club-body_title">
                                    <h5>Benefits</h5>
                                </div>
                                <div class="club-body_content">
                                    <p>Discounted Products</p>
                                </div>
                                <div class="club-body_content">
                                    <p>Fast Shipping</p>
                                </div>
                                <div class="club-body_content">
                                    <p>Money-Back Guarantee</p>
                                </div>
                                <div class="club-body_content">
                                    <p>Easy cancellation</p>
                                </div>
                                <div class="club-body_content">
                                    <p>24/7 support</p>
                                </div>
                                <div class="club-body_content">
                                    <p>Complimentary Products</p>
                                </div>
                                <div class="club-body_content">
                                    <p>Reduced Shipping Prices</p>
                                </div>
                                <div class="club-body_title">
                                    <h5>Pricing</h5>
                                </div>
                                <div class="club-body_content club-body_content--trial">
                                    <p>trial Price</p>
                                </div>
                                <div class="club-body_content">
                                    <p>trial Period</p>
                                </div>
                                <div class="club-body_content">
                                    <p>Membership Price</p>
                                </div>
                                <div class="club-body_content">
                                    <p>Membership Period</p>
                                </div>
                                <div class="club-body_content club-body_content--empty club-body_content--button"></div>
                            </div>
                        </div>
                    </div><!--ends sidebar-->
                    <ul class="products columns-4">

                        <div class="club-product_content club-super ">
                            <div class="club-body">
                                <div class="club-body_title club-body_title--empty">
                                    <p>basic</p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content club-body_content--no">
                                    <p><span class="club-icon">—</span></p>
                                </div>
                                <div class="club-body_content club-body_content--no">
                                    <p><span class="club-icon">—</span></p>
                                </div>
                                <div class="club-body_title club-body_title--empty"></div>
                                <div class="club-body_content club-body_content--trial">
                                    <p><span class="currency_symbol">€</span><span class="pkg_price">3</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p>3 days trial</p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="currency_symbol">€</span><span class="pkg_price">29.74</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p>14 days</p>
                                </div>
                                <div class="club-body_content club-body_content--button">
                                    <p>
                                        <?php if ($_SESSION["id"] != "" || $_SESSION["id"] != null || isset($_SESSION["id"])) { ?>
                                            <?php if ($_SESSION["status"] == "true" && $_SESSION["plan"] == "1") { ?>
                                                <a href="" id="unsub_btn" class="basic package_addCart" data-bs-toggle="modal" data-bs-target="#myModal">
                                                    <button class="btn btn-dark unsub_btn">
                                                        Unsubscribe
                                                        <?php
                                                        $_SESSION["statusUpdate"] = "false";
                                                        $_SESSION["planUpdate"] = "0";
                                                        ?>
                                                    </button>
                                                </a>
                                                <script>
                                                    $('#unsub_btn').click(function() {
                                                        window.location.href = 'unsubscribe.php';
                                                    });
                                                </script>
                                            <?php } else { ?>
                                                <a href="" id="basic_addCart" class="package_addCart">
                                                    <button class="btn btn-dark" label="Add to cart">Subscribe</button>
                                                    <?php
                                                    $_SESSION["statusUpdate"] = "true";
                                                    $_SESSION["planUpdate"] = "2";
                                                    ?>
                                                </a>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <a href="" id="logout_sub_btn" class="package_addCart">
                                                <button class="btn btn-dark logout_sub_btn_inner">Subscribe</button>
                                            </a>
                                            <script>
                                                $('.logout_sub_btn_inner').click(function() {
                                                    window.location.href = 'login.php';
                                                });
                                            </script>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="club-product_content club-premium ">
                            <div class="club-body">
                                <div class="club-body_title club-body_title--empty">
                                    <p>premium 👑</p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content club-body_content--no">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_content club-body_content--no">
                                    <p><span class="club-icon">✔️</span></p>
                                </div>
                                <div class="club-body_title club-body_title--empty"></div>
                                <div class="club-body_content club-body_content--trial">
                                    <p><span>Buy 1 or more products to access your premium trial</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p>7 days trial</p>
                                </div>
                                <div class="club-body_content">
                                    <p><span class="currency_symbol">€</span><span class="pkg_price">24.75</span></p>
                                </div>
                                <div class="club-body_content">
                                    <p>14 days</p>
                                </div>
                                <div class="club-body_content club-body_content--button">
                                    <!-- <p>
                                        <a href="" id="premium_addCart" class="package_addCart">
                                            <button class="btn btn-dark" label="Add to cart">Subscribe</button>
                                        </a>
                                    </p> -->
                                    <p>
                                        <?php if ($_SESSION["id"] != "" || $_SESSION["id"] != null || isset($_SESSION["id"])) { ?>
                                            <?php if ($_SESSION["status"] == "true" && $_SESSION["plan"] == "2") { ?>
                                                <a href="" id="unsub_btn" class="basic package_addCart" data-bs-toggle="modal" data-bs-target="#myModal">
                                                    <button class="btn btn-dark unsub_btn">
                                                        Unsubscribe
                                                        <?php
                                                        $_SESSION["statusUpdate"] = "false";
                                                        $_SESSION["planUpdate"] = "0";
                                                        ?>
                                                    </button>
                                                </a>
                                                <script>
                                                    $('#unsub_btn').click(function() {
                                                        window.location.href = 'unsubscribe.php';
                                                    });
                                                </script>
                                            <?php } else { ?>
                                                <a href="" id="premium_addCart" class="package_addCart">
                                                    <button class="btn btn-dark" label="Add to cart">
                                                        Subscribe
                                                        <?php
                                                        $_SESSION["statusUpdate"] = "true";
                                                        $_SESSION["planUpdate"] = "2";
                                                        ?>
                                                    </button>
                                                </a>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <a href="" id="logout_sub_btn" class="package_addCart">
                                                <button class="btn btn-dark logout_sub_btn_inner">Subscribe</button>
                                            </a>
                                            <script>
                                                $('.logout_sub_btn_inner').click(function() {
                                                    window.location.href = 'login.php';
                                                });
                                            </script>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>

        <div class="product-section-wrapper-club d-none">
            <section class="pdt-section  pdt-section7 p-0 my50" id="order">
                <div class="container" id="products">
                    <div class="product-wrapper row">
                        <input type="hidden" name="user_ip" id="user_ip" value="" />
                        <?php
                        $i = 0;
                        foreach ($products as $key => $value) {
                            $i++;
                            foreach ($value as $k => $v) {
                                if ($v == 'inactive') {
                                    $p = $key;
                                    $product = $products[$p];
                                    if ($product['status'] == 'inactive') {
                                        $priceMin = $product['ssPrice'];
                                        if ($product['straightSaleMultiPrice'] == 'yes' && $product['billingModel'] == '1')
                                            $priceMin = $product['shop_option']['shop_option1']['option_price'];
                                        else if ($product['billingModel'] == '2' || $product['billingModel'] == '6' || $product['billingModel'] == '7' || $product['billingModel'] == '8')
                                            $priceMin = $product['trialPrice'];
                                        else if ($product['billingModel'] == '3')
                                            $priceMin = $product['continuityPrice'];
                        ?>
                                        <div class="product-section product-section7 col-lg-4 col-12" data-product="product<?php echo $i; ?>" data-prod-id="<?= $product['id'] ?>" data-product-category="<?= $product['category'] ?>" data-product-title="<?= $product['name'] ?>" data-product-alias="<?= $product['alias'] ?>" data-product-description="<?= $product['description'] ?>" data-product-price-orignal="<?= $priceMin ?>" data-product-price="<?= $priceMin ?>" data-product-shipping="<?= $product['ssShipping'] ?>" <?php if ($product['billingModel'] != 1) { ?> data-product-rbllprice="<?= $product['trialRebillPrice'] ?>" data-product-trlshipping="<?= $product['trialShipping'] ?>" data-product-cntntyprice="<?= $product['continuityPrice'] ?>" data-product-cntntyshipping="<?= $product['continuityShipping'] ?>" <?php } ?> data-product-billmodel="<?= $product['billingModel'] ?>" data-product-MultiPrice="<?= $product['straightSaleMultiPrice'] ?>" data-product-id="product-<?php echo $i; ?>" data-product-size-option="<?= $product['sizeOption'] ?>" data-product-image-link="<?= $path['images'] ?>/<?= $product['image'] ?>">
                                            <div class="product-block">
                                                <img class="prod_img7" src="<?= $path['images'] ?>/<?= $product['image'] ?>">
                                                <div class="product-details">
                                                    <?php if ($pageConfig['displayBillingModel'] == 'yes') { ?>
                                                        <p class="prod_category7">
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
                                                    <h5 class="product-title product-name7"><?= $product['name'] ?></h5>
                                                    <span class="prod-price">
                                                        <?php
                                                        if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'no') { ?>
                                                            <p class="prod_price_common prod_price7"><span class="">$<?= $product['ssPrice'] ?></span></p>
                                                        <?php }
                                                        if ($product['billingModel'] == 1 && $product['straightSaleMultiPrice'] == 'yes') {
                                                            $prod_variant_count = count($product['shop_option']);
                                                        ?>
                                                            <p class="prod_price_common prod_price7"><span class="">
                                                                    <?php if (($product['shop_option']['shop_option1']['option_price'] != $product['shop_option']['shop_option' . $prod_variant_count]['option_price']) && ($pageConfig['onlyShowFirstPrice'] == 'no')) { ?>
                                                                        $<?= $product['shop_option']['shop_option1']['option_price'] ?> - $<?= $product['shop_option']['shop_option' . $prod_variant_count]['option_price'] ?>
                                                                    <?php } else { ?>
                                                                        $<?= $product['shop_option']['shop_option1']['option_price']; ?>
                                                                    <?php } ?>
                                                                </span></p>
                                                        <?php }
                                                        if ($product['billingModel'] == 2 || $product['billingModel'] == 8) { ?>
                                                            <p class="prod_price_common prod_price7"><span>$<?= $product['trialPrice']; ?> + <?= $product['trialShipping']; ?> for shipping</p>
                                                        <?php }
                                                        if ($product['billingModel'] == 3) { ?>
                                                            <p class="prod_price_common prod_price7"><span>$<?= $product['continuityPrice']; ?> <?php if ($pageConfig['displayShippingPrice'] == "yes") { ?>+ <?= $product['continuityShipping']; ?> for shipping<?php } ?></span></p>
                                                        <?php }
                                                        if ($product['billingModel'] == 4) { ?>
                                                            <p class="prod_price_common prod_price7"><span class="">$<?= $product['trialShipping'] ?></span></p>
                                                        <?php }
                                                        if ($product['billingModel'] == 5) { ?>
                                                            <p class="prod_price_common prod_price7"><span class="">$<?= $product['ssPrice'] ?></span></p>
                                                        <?php }
                                                        if ($product['billingModel'] == 6) { ?>
                                                            <p class="prod_price_common prod_price7"><span class="">$<?= $product['trialShipping'] ?></span></p>
                                                        <?php }
                                                        if ($product['billingModel'] == 7) { ?>
                                                            <p class="prod_price_common prod_price7"><span class="">$<?= $product['ssPrice'] ?></span></p>
                                                        <?php }
                                                        ?>
                                                    </span>
                                                    <a href="javascript:void(0);" class="btn_shop btn_shop7" id="btn_shop"><button class="btn btn-primary btn-shop shop-btn-color">Add to Cart</button></a>
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
        </div>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Farewell!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p>We're sorry to see you go, thank you for being a part of our club. Your request will be followed up on shortly. Thank you.</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <script>
        $(document).ready(function() {
            $(".package_addCart").click(function(event) {
                event.preventDefault();
            });
            $("#basic_addCart").click(function() {
                var button = $(".product-section.product-section7[data-product='product6'] .btn_shop.btn_shop7");
                $(button).trigger("click");
            });
            $("#premium_addCart").click(function() {
                var button = $(".product-section.product-section7[data-product='product7'] .btn_shop.btn_shop7");
                $(button).trigger("click");
            });

        });
    </script>


    <?php
    if (file_exists('bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php')) {
        require 'bp_config/includes/templates/footer/footer' . $pageConfig['footer_template'] . '.php';
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?= $path['js']; ?>/include/shop.js"></script>
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