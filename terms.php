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
    <title>Terms</title>
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
        <article id="post-165" class="terms_wrapper container">
            <div class="entry-content">

                <div id="terms-and-conditions">
                    <h4>The Terms and Conditions</h4>

                    <p>Welcome to "<?= $generalConfig['brand_name'] ?>". Your agreement to all the Terms and Conditions of this agreement ("Agreement") is required before You can use the website at <?= $generalConfig['website_url'] ?> ("Website"). Your agreement is also required before <?= $generalConfig['brand_name'] ?> will grant You authorized access to the services and products ("Content") offered in, at or through the Website. If You do not agree to the Terms and Conditions, set forth below, You will not be authorized to access <?= $generalConfig['brand_name'] ?> or view, purchase or otherwise use any of the Content available in, at or through the Website.</p>

                    <p>IT IS VERY IMPORTANT THAT YOU COMPLETELY READ THIS AGREEMENT BECAUSE BY YOU MAKING A PURCHASE OR SUBSCRIBING TO <?= $generalConfig['brand_name'] ?>, YOU WILL BE EXPRESSLY SIGNIFYING THAT YOU AGREE TO ALL THE FOLLOWING TERMS, CONDITIONS AND OTHER PROVISIONS, SET FORTH IN THIS AGREEMENT, INCLUDING IMPORTANT LIMITATIONS REGARDING "PROHIBITED LOCATIONS" FROM WHICH YOU MAY NOT ACCESS THE WEBSITE, OBTAIN COPIES OF CONTENT, OR USE ANY <?= $generalConfig['brand_name'] ?> SERVICES.</p>

                    <h4>Parties to This Agreement and Consideration</h4>
                    <p>The parties to this Agreement ("Agreement") are You ("You", sometimes referred to as a "Customer" or "Subscriber" to the Website) and the owner of <?= $generalConfig['brand_name'] ?> (<?= $generalConfig['corp_name'] ?>). As used in this Agreement, the terms "we" and "us" are used interchangeably to refer to <?= $generalConfig['corp_name'] ?> and its operators of the Website (sometimes referred to as <?= $generalConfig['brand_name'] ?>). By further accessing the Website or materials available at or in association with the Website, and for other good and valuable consideration, the sufficiency of which is acknowledged by You and <?= $generalConfig['corp_name'] ?>. You hereby agree to be bound by all the Terms and Conditions set forth in this Agreement.</p>

                    <h4>0. Preamble</h4>
                    <ol>
                        <li>Subscriber/Customer data is for internal use only and will be treated confidential.</li>
                        <li>All transactions are SSL encrypted.</li>
                        <li>Subscriber's/Customer's credit card will be billed immediately after purchase.</li>
                        <li>After purchase Subscriber/Customer will receive an email notification including payment details. The contract is closed between Subscriber/Customer and shop as soon as the order is submitted.</li>
                        <li>All orders will be processed as soon as possible.</li>
                        <li>All questions will be answered within two (2) working days.</li>
                        <li>We recommend printing out the transaction data and Terms and Conditions and to keep them at an easily accessible place.</li>
                        <li>Prohibited for people under legal age in their respective country.</li>
                    </ol>

                    <h4>1. Definitions</h4>
                    <ol>
                        <li>"Member" or "Membership" shall mean the Subscriber or user of a valid username and password for the Site during the term of the membership.</li>
                        <li>"Customer" shall mean an individual who makes a single time purchase, without creating a membership account. </li>
                        <li>"<?= $generalConfig['brand_name'] ?>" shall mean any of the companies billing the Subscriber/Customer including any additional billing companies used by <?= $generalConfig['brand_name'] ?> or changes thereof.</li>
                        <li>"Site" shall mean the website on which Subscriber/Customer is purchasing either a product or a membership with a username and password in order to access the site and its products and obtain the benefits of the Membership.</li>
                        <li>"Subscriber" shall mean the user of the services of the site and holder of a valid username and password for the Site.</li>
                        <li>"Access rights" shall mean the combination of a unique username and password that is used to access a site. An access rights is a license to use a Site for a period of time that is specified.</li>
                        <li>"Bookmarking," shall mean a URL placed into a temporary file on the Subscriber's browser so that the Subscriber may return to that page at a future date without having to type in its username and password.</li>
                    </ol>

                    <h4>2. Description of Services</h4>
                    <p><?= $generalConfig['brand_name'] ?> provides large discounts on a variety of products. Shopping on the discounted prices on the Site is only possible if You are a Member of the Site. <?= $generalConfig['brand_name'] ?> is only for private customers.</p>

                    <p><?= $generalConfig['brand_name'] ?> however provides the same variety of products for all Customers to the regular, not discounted, price. You will not need an account or a Membership to purchase products to the regular price.</p>

                    <h4>3. How to Purchase</h4>
                    <p>Members will have to log into their account before the shopping on discounted prices can take place. If You are a new member, You will be offered a trial period of 3 days for only EUR 3. Once the order has been completed, You will receive an order confirmation via email, and You will receive another email once we have dispatched Your order.</p>

                    <p>As a Customer You make your purchase of the product directly on <?= $generalConfig['brand_name'] ?>. Once the order has been completed, You will receive an order confirmation via email, and You will receive another email once we have dispatched Your order.</p>

                    <h4>4. About Prices</h4>
                    <p>The discounted prices shown on the website are Member's prices. The prices that we compare our own to are the guiding market prices that are used in other shops and on other websites.</p>

                    <p><?= $generalConfig['brand_name'] ?> operates the Website with delivery in many Countries. Due to climate-related needs or the application of mandatory laws (e.g. VAT or regarding official mandatory periods for end of season sales), the Products sold and their prices may vary from Country to Country.</p>

                    <h4>5. Billing</h4>
                    <p><?= $generalConfig['brand_name'] ?> may appear on Subscriber's/Customer's credit card, bank statement, or phone bill for all applicable charges. If multiple venues are joined utilizing any payment method, Subscriber's/Customer's statements will list each individual purchase comprising the transaction. <?= $generalConfig['brand_name'] ?> may include other information on Subscriber/Customer statements based on credit card association, telephone regulation, NACHA and any other mandated rules and regulations.</p>

                    <p>As a Member Your subscription is deducted automatically at or after the end of the original term selected, for a similar period of time and for a similar or lower amount, unless notice of cancellation is received by <?= $generalConfig['brand_name'] ?> from the Subscriber. If You no longer wish to be a Member, You can terminate Your Membership at any time by logging in to Your account and then fill the cancel subscription form on the <a routerlink="/support">support page</a>. You may also cancel Your Membership in writing by sending an email directly to our <a routerlink="/support">support</a>.</p>

                    <p>As a Customer you will alone be deducted for the product(s) purchased, no other fees will apply, unless clearly stated on the payment page.</p>

                    <h4>6. Payment / Fee</h4>
                    <p>The Site may have periodic subscription fees at the time of the initial enrolment for subscription. The Member is responsible for such fees according to the Terms and Conditions of such Site.</p>
                    <h4>7. Automatic Recurring Billing</h4>
                    <p>In accordance with the Terms and Conditions of the Site, subscription fees may be automatically renewed at or after the end of the original term selected, for a similar period of time and for a similar or lower amount, unless notice of cancellation is received from the Subscriber. From time to time we enroll our loyal subscribers in a loyalty program where the randomly chosen subscribers will be granted a discounted membership price on the next payment only.</p>

                    <p>Unless and until the Membership agreement is cancelled in accordance with the terms hereof, Subscriber hereby authorizes <?= $generalConfig['brand_name'] ?> to charge Subscriber's chosen payment method to pay for the ongoing cost of Membership. Subscriber hereby further authorizes <?= $generalConfig['brand_name'] ?> to charge Subscriber's chosen payment method for any and all additional purchases of materials provided on the site.</p>

                    <p>By agreeing to these terms of use, Subscriber accepts being enrolled in a 3 days trial for only 3 EUR, acknowledges that unless the Membership is cancelled prior to the end of the trial period, the Subscriber will automatically be enrolled to a full Membership at the price and terms chosen upon signup. Further, Subscriber authorize us to charge the Membership fee for the next billing cycle. Billing notifications will be sent from <?= $generalConfig['email'] ?>. This charge will appear on the Subscriber's credit card statement as <?= $generalConfig['brand_name'] ?> <?= $generalConfig['phone_number'] ?>.</p>

                    <p>In the event that a recurring payment is not successfully processed, an administrative fee of minimum <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencyCode">EUR</span>3.00</bdi></span> and maximum <span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencyCode">EUR</span>9.99</bdi></span> may be applied to your account in order to maintain the status of your subscription until the full subscription cost can be successfully processed.</p>

                    <h4>8. Delivery</h4>
                    <p>Orders will be delivered with either courier or local postal service, all with tracking number. The expected delivery time is 10-15 days depending on the location. We take full responsibility for the purchased products until they have been delivered.</p>

                    <h4>9. Agreed upon Method of Communication</h4>
                    <p><?= $generalConfig['brand_name'] ?> and the Subscriber/Customer agree that a transaction receipt will be provided via the email provided at the time of either initial enrolment (for the Subscriber) or direct purchase of a product (for the Customer).</p>
                    <p>

                    </p>
                    <h4>10. Electronic Communication</h4>
                    <p>Subscriber agrees and accepts that all information relating to the Membership (e.g. payment authorizations, invoices, changes in password or Payment Method, confirmation messages, notices) will be in electronic form only, for example via emails to Your email address provided during registration.</p>

                    <h4>11. Cancellation and Return of Products</h4>
                    <ol>
                        <li>MEMBERSHIP; CANCELLATION
                            <ul>
                                <li>By signing up for a subscription or membership to the Website, accessing any password protected area of the Website, using any "members only" content available at or through the Website, or by accepting these Terms and Conditions by any other legally recognizable means, You hereby acknowledge and agree that You will be irrevocably agreeing to all the terms, conditions, obligations, warranties, and other provisions set forth in this Agreement, including the authorization for and acceptance of full financial responsibility for all charges set forth in this Agreement.</li>
                                <li>To terminate Your membership, Your subscription must be canceled at least 7 days prior to the end of the current term (or within Your trial period in the case of trial membership). Certain features are available to upgraded or converted members only.</li>
                                <li>You agree that if You do not send the Company notice of cancellation of Your membership at least SEVEN (7) DAYS from the expiration of Your membership term (including any free or promotional membership terms), or within Your trial period in the case of trial membership the Company shall, with the full authorization You hereby provide, automatically and without further notice, renew Your membership to Website. You will receive an email from <a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a> before the end of Your trial period, confirming that, unless cancelled, Your membership will renew to the full subscription once the trial period has expired.</li>
                                <li>All cancellations received by the Company at least SEVEN (7) DAYS from the expiration of Your membership will be effective upon receipt and The Company may, at any time and at its sole discretion and without cause or the providing of any reason, cancel any membership.</li>
                                <li>You hereby acknowledge and agree that if You cancel Your membership, or if Your membership is cancelled by the Company, Your password will be removed from the system at the end of the then current membership period and that You will be entitled to receive the full benefits of Your membership until the end of such membership period. You shall not be entitled to any pro-rated or partial refund if You cancel Your membership before the end of the then current membership period for any reason.</li>
                                <li>In order to cancel Your <?= $generalConfig['brand_name'] ?> membership, please call us at "<?= $generalConfig['phone_number'] ?>" or email us at <a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a>.</li>
                            </ul>
                        </li>
                        <li>RETURN OF PRODUCTS
                            <ul>
                                <li>If You wish to return one or more purchased products, You should inform <?= $generalConfig['brand_name'] ?>, this can be done by calling us at <?= $generalConfig['phone_number'] ?> or sending an email to <a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a> (we reply within 24 hours 7 days a week).</li>
                                <li>In the case of sealed goods which are not suitable for returns due to health protection or hygiene reasons, the right to cancel ceases if the goods become unsealed after delivery.</li>
                                <li><strong>The Conditions of Returned Products</strong>
                                    <ul>Any depreciation in value related to product use that is improper or different from its intended use and function is paid for by the customer. In other words - You can try the product in the same way You would try it in a physical outlet. However, if You damage the product through misuse or carelessness and seek reimbursement, You may end up receiving only a small part or none of the purchase price back if You return it, depending on the commercial value of the product(s) in question and the nature of the given incident.
                                    </ul>
                                </li>
                                <li>Refunds are issued in the same format as the original payment method. We reserve the right to withhold Your refund until We have received the products that are to be returned. If You wish to cancel Your purchase, send Your product(s) to: <br><br>
                                    <h6>RETURN ADDRESS;</h6>
                                    <?= $generalConfig['fulfillment'] ?><br>
                                    <?= $generalConfig['return_address'] ?><br>
                                </li>
                                <li>In order to expedite the return process, please include a copy of Your order confirmation in addition to the product(s) that You are returning. If You do no longer have Your order confirmation, You may also include the email address used when placing the order or the order number itself.</li>
                            </ul>
                        </li>
                    </ol>

                    <h4>12. Refunds</h4>
                    <p>Refunds for purchases or recurring charges may be requested by contacting customer support. Refunds or credits will not be issued for partially used Memberships. Cancellation for all future recurring billing may be requested in accordance with Section 11 - Cancellation. <?= $generalConfig['brand_name'] ?> reserves the right to grant a refund or a credit applicable to purchases to the Site at its discretion. The decision to refund a charge does not imply the obligation to issue additional future refunds. Should a refund be issued by <?= $generalConfig['brand_name'] ?> for any reason, it will be credited solely to the payment method used in the original transaction. <?= $generalConfig['brand_name'] ?> will not issue refunds by cash, cheque, money transfer or other means of payment. The refund will be processed immediately by <?= $generalConfig['brand_name'] ?> , depending on the payment method used in the original transaction, depositing the funds may take 3-5 business days.</p>

                    <h4>13. Cardholder Disputes/Chargebacks</h4>
                    <p>All chargebacks are thoroughly investigated and may prevent future purchases with <?= $generalConfig['brand_name'] ?> given the circumstances. Fraud claims may result in <?= $generalConfig['brand_name'] ?> contacting Subscriber's/Customer's issuer to protect You and prevent future fraudulent charges to Your card.</p>

                    <h4>14. Your Right to Complain</h4>
                    <p><?= $generalConfig['brand_name'] ?> offer the standard legal complaints procedure, applicable for 24 months after delivery. This means that You can get Your product repaired, exchanged, get Your money back or receive a price reduction, depending on the situation in question. Your complaint must be valid, meaning that any faults cannot be the result of incorrect use of the product or destructive behavior. Note that for products with a limited lifespan, Your right to complain is limited accordingly.</p>

                    <ol>
                        <li>
                            <h6>How quickly should I file a complaint?</h6>
                            <ul>
                                <li>Contact <?= $generalConfig['brand_name'] ?> as soon as You notice a mistake or missing parts on and for a product that has been purchased at the Site. This should happen as soon as possible or within a reasonable time period from the moment You notice that there is something wrong with the product. File the complaint via the Support page or by contacting <?= $generalConfig['brand_name'] ?> customer service directly on phone <?= $generalConfig['phone_number'] ?> or email <a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a>.</li>
                            </ul>
                        </li>
                        <li>
                            <h6>Complaints</h6>
                            <ul>
                                <li>If You want to complain about Your purchase, send the complaint to our customer service either by calling them at <?= $generalConfig['phone_number'] ?> or send an email to <a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a>. </li>
                            </ul>
                        </li>
                    </ol>

                    <h4>15. Membership; Authorization of Use</h4>
                    <p>Subscribers to the Site are hereby authorized a single access rights to access the service and or products located at this Site. This access rights shall be granted for sole use to one Subscriber. All Memberships are provided for personal use and shall not be used for any commercial purposes or by any other third parties. Commercial use of either the Site or any products/services found within is strictly prohibited unless authorized by the Site. No material within the Site may be transferred to any other person or entity, whether commercial or non-commercial. No material within the Site may be distributed through peer-to-peer networks or any other file sharing platforms. In addition, materials may not be modified, or altered. Materials may not be displayed publicly, or used for any rental, sale, or display. Materials shall extend to copyright, trademarks, or other proprietary notices there from. <?= $generalConfig['brand_name'] ?> and the Site reserve the right to terminate the Subscriber's access rights at any time if the terms of this agreement are breached. In the case that the terms are breached, Subscriber will be required to immediately destroy any information or material printed, downloaded or otherwise copied from the site.</p>
                    <p>

                    </p>
                    <h4>16. Membership; Transfer of Access Rights</h4>
                    <p>Access to the Site is through a combination of a username and password. Subscribers may not under any circumstances release their access rights to any other person and are required to keep their access rights strictly confidential. <?= $generalConfig['brand_name'] ?> will not release passwords for any reason, to anyone other than the Subscriber, except as may be specifically required by law or court order. Unauthorized access to the Site is a breach of this Agreement. Subscribers acknowledge that the owner of the Site may track through the use of special software each Subscriber's entry to the site. If any breach of security, theft or loss of access rights, or unauthorized disclosure of access rights information occurs, Subscriber must immediately notify <?= $generalConfig['brand_name'] ?> or the Site of said security breach. Subscriber will remain liable for unauthorized use of service until <?= $generalConfig['brand_name'] ?> or the site is notified of the security breach by e-mail or telephone.</p>

                    <h4>17. Supplementary Terms and Conditions</h4>
                    <p>The Site may have additional Terms and Conditions that are an integral part of their offering to the Subscriber/Customer and are in addition to these Terms and Conditions. Such Terms and Conditions as listed at the site will in no way invalidate any of the Terms and Conditions listed here. This Agreement shall be construed and enforced in accordance with the Laws of "United Kingdom" applicable to contracts negotiated, executed, and wholly performed within said Country. Disputes arising hereunder shall be settled in "United Kingdom".</p>

                    <h4>18. Severability</h4>
                    <p>If any provision of this Agreement shall be held to be invalid or unenforceable for any reason, the remaining provisions shall continue to be valid and enforceable. If a court finds that any of this Agreement is invalid or unenforceable, but that by limiting such provision it would become valid or enforceable, then such provision shall be deemed to be written, construed, and enforced as so limited.</p>

                    <h4>19. Notice</h4>
                    <p>Notices by the Site to Subscribers/Customer may be given by means of electronic messages through the Site, by a general posting on the Site, or by conventional mail. Notices by Subscriber/Customer may be given by electronic messages, conventional mail, telephone unless otherwise specified in the Agreement. All questions, complaints, or notices regarding the site must be directed to <?= $generalConfig['brand_name'] ?>. All cancellations of service to a site must also be directed to <?= $generalConfig['brand_name'] ?>. Questions and Contact Information All questions to <?= $generalConfig['brand_name'] ?> regarding these Terms and Conditions must be directed to <a href="mailto:<?= $generalConfig['email'] ?>"><?= $generalConfig['email'] ?></a>.</p>
                    <p>

                    </p>
                    <h4>20. DISCLAIMER</h4>
                    <p>USER UNDERSTANDS THAT <?= $generalConfig['brand_name'] ?> CANNOT AND DOES NOT GUARANTEE OR WARRANT THAT FILES AVAILABLE FOR DOWNLOADING FROM THE INTERNET WILL BE FREE OF VIRUSES, WORMS, TROJAN HORSES OR OTHER CODE THAT MAY MANIFEST CONTAMINATING OR DESTRUCTIVE PROPERTIES. USER IS RESPONSIBLE FOR IMPLEMENTING SUFFICIENT PROCEDURES AND CHECKPOINTS TO SATISFY SUBSCRIBER/CUSTOMER PARTICULAR REQUIREMENTS FOR ACCURACY OF DATA INPUT AND OUTPUT, AND FOR MAINTAINING A MEANS EXTERNAL TO THE SITE FOR THE RECONSTRUCTION OF ANY LOST DATA. <?= $generalConfig['brand_name'] ?> DOES NOT ASSUME ANY RESPONSIBILITY OR RISK FOR SUBSCRIBER/CUSTOMER USE OF THE INTERNET. USERS USE OF THE SITE IS AT THEIR OWN RISK. THE CONTENT IS PROVIDED "AS IS" AND WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESSED OR IMPLIED. <?= $generalConfig['brand_name'] ?> DISCLAIMS ALL WARRANTIES, INCLUDING ANY IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, OR NON-INFRINGEMENT. <?= $generalConfig['brand_name'] ?> DOES NOT WARRANT THAT THE FUNCTIONS OR CONTENT CONTAINED IN THE SITE WILL BE UNINTERRUPTED OR ERROR-FREE, THAT DEFECTS WILL BE CORRECTED, OR THAT THE SITE OR THE SERVER THAT MAKES IT AVAILABLE ARE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS. <?= $generalConfig['brand_name'] ?> DOES NOT WARRANT OR MAKE ANY REPRESENTATION REGARDING USE, OR THE RESULT OF USE, OF THE CONTENT IN TERMS OF ACCURACY, RELIABILITY, OR OTHERWISE. THE CONTENT MAY INCLUDE TECHNICAL INACCURACIES OR TYPOGRAPHICAL ERRORS, AND <?= $generalConfig['brand_name'] ?> MAY MAKE CHANGES OR IMPROVEMENTS AT ANY TIME. USER, AND NOT <?= $generalConfig['brand_name'] ?>, ASSUME THE ENTIRE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION IN THE EVENT OF ANY LOSS OR DAMAGE ARISING FROM THE USE OF THE SITE OR ITS CONTENT. <?= $generalConfig['brand_name'] ?> MAKES NO WARRANTIES THAT SUBSCRIBER/CUSTOMER USE OF THE CONTENT WILL NOT INFRINGE THE RIGHTS OF OTHERS AND ASSUMES NO LIABILITY OR RESPONSIBILITY FOR ERRORS OR OMISSIONS IN SUCH CONTENT. <?= $generalConfig['brand_name'] ?> DOES NOT WARRANT OR MAKE ANY REPRESENTATIONS REGARDING THE CONTENT'S APPROPRIATENESS OR AUTHORIZATION FOR USE IN ALL COUNTRIES, STATES, PROVINCES, COUNTY OR ANY OTHER JURISDICTIONS. IF SUBSCRIBER/CUSTOMER CHOOSES TO ACCESS THE SITE, SUBSCRIBER/CUSTOMER DOES SO ON SUBSCRIBER'S/CUSTOMER'S OWN INITIATIVE AND RISK AND IS RESPONSIBLE FOR COMPLIANCE WITH ALL APPLICABLE LAWS.</p>

                    <h4>21. Membership; Subscription fees and user communication</h4>
                    <p>The current membership rate which will appear on Subscriber credit card bill, will be debited from Subscriber's account according to Subscriber's choice of payment means. "OPT-IN AND USER COMMUNICATION" - Subscriber expressly and specifically acknowledges and agrees that the email address or other means of communicating with Subscriber may be used to send the Subscriber offers, information or any other commercially oriented emails or other means of communications. More specifically, some offers may be presented to the Subscriber via email campaigns or other means of communications with the option to express the Subscriber's preference by either clicking or entering "accept" (alternatively "yes") or "decline" (alternatively "no"). By selecting or clicking the "accept" or "yes", the Subscriber indicates that the Subscriber "OPTS-IN" to that offer and thereby agrees and accepts that the Subscriber's personal information, including its email address and data may be used for that matter or disclosed to third-parties.</p>

                    <h4>22. Sponsors, Advertisers and Third Parties</h4>
                    <p>The Site may provide links to sponsor, advertiser, or other third party websites that are not owned or controlled by <?= $generalConfig['brand_name'] ?>. Inclusion of, linking to, or permitting the use or installation of any third party site, applications, software, content or advertising does not imply approval or endorsement thereof by <?= $generalConfig['brand_name'] ?>. <?= $generalConfig['brand_name'] ?> has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third parties. By accessing or using the Site, You agree to release <?= $generalConfig['brand_name'] ?> from any and all liability arising from Your use of any third-party website, content, service, or software accessed through the Site. Your communications or dealings with, or participation in promotions of, sponsors, advertisers, or other third parties found through the Site, are solely between You and such third parties. You agree that <?= $generalConfig['brand_name'] ?> shall not be responsible or liable for any loss or damage of any sort incurred as the result of any dealings with such sponsors, third parties or advertisers, or as the result of their presence in the Site.</p>


                </div>

                <div class="entry-links"></div>
            </div>
        </article>
    </div>
    <script type="text/javascript">
        $("div#prodTerms").remove();
        $('.terms_cond').show();
        $("#return_btn").click(function() {
            $("#returns_wrapper .im_before").fadeIn();
            setTimeout(() => {
                $("#returns_wrapper .im_before").fadeOut();
            }, 3000);
        });
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        #returns_wrapper {
            position: relative;
            z-index: 1;
        }

        #returns_wrapper .im_before {
            background-color: #d9d9d9;
            content: "";
            width: 103%;
            height: 118%;
            position: absolute;
            top: 0;
            left: -10%;
            z-index: -1;
            right: -10%;
            bottom: 0;
            margin: auto;
            border-radius: 25px;
            transform: all 0.3 ease;
            display: none;
        }
    </style>

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