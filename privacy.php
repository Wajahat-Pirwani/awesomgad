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
    <title>Privacy Policy</title>
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
                <div id="privacy-policy">
                    <h1>Privacy Policy</h1>
                    <p>Effective date: 08-06-2021</p>
                    <p><?= $generalConfig['corp_name'] ?> ("us", "we", or "our") operates the <?= $generalConfig['brand_name'] ?> website (the "Service").</p>
                    <p>This page informs you of our policies regarding the collection, use, and disclosure of personal data
                        when you use our Service and the choices you have associated with that data.</p>
                    <p>We use your data to provide and improve the Service. By using the Service, you agree to the
                        collection and use of information in accordance with this policy. Unless otherwise defined in this
                        Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and
                        Conditions, accessible here <a href="https://<?= $generalConfig['website_url'] ?>/terms.php">Terms and Conditions</a></p>
                    <h4>Definitions</h4>
                    <ul>
                        <li>
                            <h6>Service</h6>
                            Service is the www.<?= $generalConfig['website_url'] ?> website operated by <?= $generalConfig['corp_name'] ?>.
                        </li>
                        <li>
                            <h6>Personal Data</h6>
                            Personal Data means data about a living individual who can be identified from those data (or
                            from those and other information either in our possession or likely to come into our
                            possession).
                        </li>
                        <li>
                            <h6>Usage Data</h6>
                            Usage Data is data collected automatically either generated by the use of the Service or from
                            the Service infrastructure itself (for example, the duration of a page visit).
                        </li>
                        <li>
                            <h6>Cookies</h6>
                            Cookies are small pieces of data stored on your device (computer or mobile device).
                        </li>
                        <li>
                            <h6>Data Controller</h6>
                            Data Controller means the natural or legal person who (either alone or jointly or in common with
                            other persons) determines the purposes for which and the manner in which any personal
                            information are, or are to be, processed.<br>
                            For the purpose of this Privacy Policy, we are a Data Controller of your Personal Data.
                        </li>
                        <li>
                            <h6>Data Processors (or Service Providers)</h6>
                            Data Processor (or Service Provider) means any natural or legal person who processes the data on
                            behalf of the Data Controller.
                            We may use the services of various Service Providers in order to process your data more
                            effectively.
                        </li>
                        <li>
                            <h6>Data Subject (or User)</h6>
                            Data Subject is any living individual who is using our Service and is the subject of Personal
                            Data.
                        </li>
                    </ul>
                    <h4>Information Collection and Use</h4>
                    <p>We collect several different types of information for various purposes to provide and improve our
                        Service to you.</p>
                    <h6>Types of Data Collected</h6>
                    <h6>Personal Data</h6>
                    <p>While using our Service, we may ask you to provide us with certain personally identifiable
                        information that can be used to contact or identify you ("Personal Data"). Personally identifiable
                        information may include, but is not limited to:</p>
                    <ul>
                        <li>Email address</li>
                        <li>First name and last name</li>
                        <li>Phone number</li>
                        <li>Address, State, Province, ZIP/Postal code, City</li>
                        <li>Cookies and Usage Data</li>
                    </ul>
                    <h6>Usage Data</h6>
                    <p>We may also collect information how the Service is accessed and used ("Usage Data"). This Usage Data
                        may include information such as your computer's Internet Protocol address (e.g. IP address), browser
                        type, browser version, the pages of our Service that you visit, the time and date of your visit, the
                        time spent on those pages, unique device identifiers and other diagnostic data.</p>
                    <h6>Tracking &amp; Cookies Data</h6>
                    <p>We use cookies and similar tracking technologies to track the activity on our Service and hold
                        certain information.</p>
                    <p>Cookies are files with small amount of data which may include an anonymous unique identifier. Cookies
                        are sent to your browser from a website and stored on your device. Tracking technologies also used
                        are beacons, tags, and scripts to collect and track information and to improve and analyze our
                        Service.</p>
                    <p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent.
                        However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>
                    <p>Examples of Cookies we use:</p>
                    <ul>
                        <li>
                            <h6>Session Cookies.</h6>
                            &nbsp; &nbsp; We use Session Cookies to operate our Service.
                        </li>
                        <li>
                            <h6>Preference Cookies.</h6>
                            &nbsp; &nbsp; We use Preference Cookies to remember your preferences and various settings.
                        </li>
                        <li>
                            <h6>Security Cookies.</h6>
                            &nbsp; &nbsp; We use Security Cookies for security purposes.
                        </li>
                    </ul>
                    <br>
                    <h4>Use of Data</h4>
                    <p><?= $generalConfig['corp_name'] ?> uses the collected data for various purposes:</p>
                    <ul>
                        <li>To provide and maintain our Service</li>
                        <li>To notify you about changes to our Service</li>
                        <li>To allow you to participate in interactive features of our Service when you choose to do so</li>
                        <li>To provide customer support</li>
                        <li>To gather analysis or valuable information so that we can improve our Service</li>
                        <li>To monitor the usage of our Service</li>
                        <li>To detect, prevent and address technical issues</li>
                    </ul>
                    <br>
                    <h4>Legal Basis For Processing Personal Data Under General Data Protection Regulation (GDPR)</h4>
                    <p>If you are from the European Economic Area (EEA), <?= $generalConfig['corp_name'] ?> legal basis for collecting and using
                        the personal information described in this Privacy Policy depends on the Personal Data we collect
                        and the specific context in which we collect it.</p>
                    <p><?= $generalConfig['corp_name'] ?> may process your Personal Data because:</p>
                    <ul>
                        <li>We need to perform a contract with you</li>
                        <li>You have given us permission to do so</li>
                        <li>The processing is in our legitimate interests and it's not overridden by your rights</li>
                        <li>For payment processing purposes</li>
                        <li>To comply with the law</li>
                    </ul>
                    <br>
                    <h4>Retention of Data</h4>
                    <p><?= $generalConfig['corp_name'] ?> will retain your Personal Data only for as long as is necessary for the purposes set
                        out in this Privacy Policy. We will retain and use your Personal Data to the extent necessary to
                        comply with our legal obligations (for example, if we are required to retain your data to comply
                        with applicable laws), resolve disputes, and enforce our legal agreements and policies.</p>
                    <p><?= $generalConfig['corp_name'] ?> will also retain Usage Data for internal analysis purposes. Usage Data is generally
                        retained for a shorter period of time, except when this data is used to strengthen the security or
                        to improve the functionality of our Service, or we are legally obligated to retain this data for
                        longer time periods.</p>
                    <h4>Transfer of Data</h4>
                    <p>Your information, including Personal Data, may be transferred to — and maintained on — computers
                        located outside of your state, province, country or other governmental jurisdiction where the data
                        protection laws may differ than those from your jurisdiction.</p>
                    <p>If you are located outside and choose to provide information to us, please note that we transfer the
                        data, including Personal Data, to and process it there.</p>
                    <p>Your consent to this Privacy Policy followed by your submission of such information represents your
                        agreement to that transfer.</p>
                    <p><?= $generalConfig['corp_name'] ?> will take all steps reasonably necessary to ensure that your data is treated securely
                        and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to
                        an organization or a country unless there are adequate controls in place including the security of
                        your data and other personal information.</p>
                    <h4>Disclosure of Data</h4>
                    <h6>Business Transaction</h6>
                    <p>If <?= $generalConfig['corp_name'] ?> is involved in a merger, acquisition or asset sale, your Personal Data may be
                        transferred. We will provide notice before your Personal Data is transferred and becomes subject to
                        a different Privacy Policy.</p>
                    <h6>Disclosure for Law Enforcement</h6>
                    <p>Under certain circumstances, <?= $generalConfig['corp_name'] ?> may be required to disclose your Personal Data if
                        required to do so by law or in response to valid requests by public authorities (e.g. a court or a
                        government agency).</p>
                    <h6>Legal Requirements</h6>
                    <p><?= $generalConfig['corp_name'] ?> may disclose your Personal Data in the good faith belief that such action is necessary
                        to:</p>
                    <ul>
                        <li>To comply with a legal obligation</li>
                        <li>To protect and defend the rights or property of <?= $generalConfig['corp_name'] ?></li>
                        <li>To prevent or investigate possible wrongdoing in connection with the Service</li>
                        <li>To protect the personal safety of users of the Service or the public</li>
                        <li>To protect against legal liability</li>
                    </ul>
                    <br>
                    <h4>Security of Data</h4>
                    <p>The security of your data is important to us, but remember that no method of transmission over the
                        Internet, or method of electronic storage is 100% secure. While we strive to use commercially
                        acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>
                    <h4>Your Data Protection Rights Under General Data Protection Regulation (GDPR)</h4>
                    <p>If you are a resident of the European Economic Area (EEA), you have certain data protection rights.
                        <?= $generalConfig['corp_name'] ?> aims to take reasonable steps to allow you to correct, amend, delete, or limit the
                        use of your Personal Data.</p>
                    <p>If you wish to be informed what Personal Data we hold about you and if you want it to be removed from
                        our systems, please contact us.</p>
                    <p>In certain circumstances, you have the following data protection rights:</p>
                    <ul>
                        <li>
                            The right to access, update or to delete the information we have on you. <br>
                            Whenever made possible, you can access, update or request deletion of your Personal Data
                            directly within your account settings section. If you are unable to perform these actions
                            yourself, please contact us to assist you.
                        </li>
                        <li>
                            The right of rectification. <br>
                            &nbsp;&nbsp; You have the right to have your information rectified if that information is inaccurate or
                            incomplete.
                        </li>
                        <li>
                            The right to object. <br>
                            &nbsp;&nbsp; You have the right to object to our processing of your Personal Data.
                        </li>
                        <li>
                            The right of restriction. <br>
                            &nbsp;&nbsp; You have the right to request that we restrict the processing of your personal information.
                        </li>
                        <li>
                            The right to data portability. <br>
                            &nbsp;&nbsp; You have the right to be provided with a copy of the information we have on you in a
                            structured,
                            machine-readable and commonly used format.
                        </li>
                        <li>
                            The right to withdraw consent. <br>
                            &nbsp;&nbsp;You also have the right to withdraw your consent at any time where <?= $generalConfig['corp_name'] ?> relied on
                            your
                            consent to process your personal information.
                        </li>
                    </ul>
                    <p>Please note that we may ask you to verify your identity before responding to such requests.</p>
                    <p>You have the right to complain to a Data Protection Authority about our collection and use of your
                        Personal Data. For more information, please contact your local data protection authority in the
                        European Economic Area (EEA).</p>
                    <h4>Service Providers</h4>
                    <p>We may employ third party companies and individuals to facilitate our Service ("Service Providers"),
                        to provide the Service on our behalf, to perform Service-related services or to assist us in
                        analyzing how our Service is used.</p>
                    <p>These third parties have access to your Personal Data only to perform these tasks on our behalf and
                        are obligated not to disclose or use it for any other purpose.</p>
                    <h6>Analytics</h6>
                    <p>We may use third-party Service Providers to monitor and analyze the use of our Service.</p>
                    <ul>
                        <li>
                            Google Analytics <br>
                            Google Analytics is a web analytics service offered by Google that tracks and reports website
                            traffic. Google uses the data collected to track and monitor the use of our Service. This data
                            is shared with other Google services. Google may use the collected data to contextualize and
                            personalize the ads of its own advertising network.<br>
                            You can opt-out of having made your activity on the Service available to Google Analytics by
                            installing the Google Analytics opt-out browser add-on. The add-on prevents the Google Analytics
                            JavaScript (ga.js, analytics.js, and dc.js) from sharing information with Google Analytics about
                            visits activity.<br>
                            For more information on the privacy practices of Google, please visit the Google Privacy &amp;
                            Terms web page: <a href="https://policies.google.com/privacy?hl=en">https://policies.google.com/privacy?hl=en</a>
                        </li>
                    </ul>
                    <h6>Payments</h6>
                    <p>We may provide paid products and/or services within the Service. In that case, we use third-party
                        services for payment processing (e.g. payment processors).</p>
                    <p>We will not store or collect your payment card details. That information is provided directly to our
                        third-party payment processors whose use of your personal information is governed by their Privacy
                        Policy. These payment processors adhere to the standards set by PCI-DSS as managed by the PCI
                        Security Standards Council, which is a joint effort of brands like Visa, Mastercard, American
                        Express and Discover. PCI-DSS requirements help ensure the secure handling of payment
                        information.</p>
                    <h4>Links to Other Sites</h4>
                    <p>Our Service may contain links to other sites that are not operated by us. If you click on a third
                        party link, you will be directed to that third party's site. We strongly advise you to review the
                        Privacy Policy of every site you visit.</p>
                    <p>We have no control over and assume no responsibility for the content, privacy policies or practices
                        of any third party sites or services.</p>
                    <h4>Children's Privacy</h4>
                    <p>Our Service does not address anyone under the age of 18 ("Children").</p>
                    <p>We do not knowingly collect personally identifiable information from anyone under the age of 18. If
                        you are a parent or guardian and you are aware that your child has provided us with Personal Data,
                        please contact us. If we become aware that we have collected Personal Data from children without
                        verification of parental consent, we take steps to remove that information from our servers.</p>
                    <h4>Scope of this Privacy Policy</h4>
                    <p>This privacy policy applies to your use of our services owned or operated by the <?= $generalConfig['corp_name'] ?> on
                        <?= $generalConfig['brand_name'] ?>. This policy does not apply to your use of unaffiliated sites to which we only link to.</p>
                    <h4>General digital content policy</h4>
                    <p><?= $generalConfig['corp_name'] ?> is legally authorized to offer this service on <?= $generalConfig['brand_name'] ?>. The content offered on
                        <?= $generalConfig['brand_name'] ?> does not contain any sexually-oriented adult (pornographic) content. <?= $generalConfig['brand_name'] ?> does not
                        include software that would damage anyone’s computer, which could be used for malicious purposes
                        like sending spam emails or spreading a computer virus, or would violate anyone’s privacy (spyware
                        or cookies, for example).</p>
                    <h4>Changes to This Privacy Policy</h4>
                    <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the
                        new Privacy Policy on this page.</p>
                    <p>We will update the "effective date" at the top of this Privacy Policy.</p>
                    <p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy
                        Policy are effective when they are posted on this page.</p>
                    <h4>Contact Us</h4>
                    <p>If you have any questions about this Privacy Policy, please contact us:</p>
                    <ul>
                        <li>By email: <?= $generalConfig['email'] ?></li>
                        <li>By phone number: <?= $generalConfig['phone_number'] ?></li>
                    </ul>
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