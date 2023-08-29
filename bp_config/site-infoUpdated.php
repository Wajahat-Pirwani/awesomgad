<?php
// <!--********************
//     Version 3.4
// ********************-->
require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'helper.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'verbiage.php';
$optionPrices = Helper::getOptionPrices('https://reloadpoints.xyz/option-prices.php');

$products = array(
    //Product Array - paste under this line
    'product1' => array(
        'id' => '11',
        'CheckoutChampId' => 1101,
        'name' => 'Garlic Crusher',
        'description' => '
        Color : Black orange <br>
        Size : 17*8.5*3.1cm,115g <br>
        Made of stainless steel in excellent quality. Easy to wash and clean. Non-toxic and durable use.
        
        ',
        'image' => 'products/1.webp',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Pink',
        'billingModel' => '1',                       // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '9.99',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '44.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days) 
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '2.95',       //if continuity
        'continuityShipping' => '2.01',     //if continuity
        'continuityMaxqty' => '10',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'no',  // if yes, only then it take price from below
        'shop_option' => array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '3.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '5.96'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '7.95'
            ),
            'shop_option4' => array(
                'option_quantity' => '4',
                'option_price' => '9.97'
            ),
            'shop_option5' => array(
                'option_quantity' => '7',
                'option_price' => '14.95'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product2' => array(
        'id' => '12',
        'CheckoutChampId' => 1101,
        'name' => 'Glass suction cup',
        'description' => '
        Material:aluminum <br>
        Color : Black/grey/yellow/orange/brown  <br>
        Service: OEM / ODM
        ',
        'image' => 'products/2.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Pink',
        'billingModel' => '1',                       // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '14.99',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '44.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days) 
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '2.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '10',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'no',  // if yes, only then it take price from below
        'shop_option' => array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '4.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '3',
                'option_price' => '13.99'
            ),
            'shop_option3' => array(
                'option_quantity' => '5',
                'option_price' => '19.99'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product3' => array(
        'id' => '13',
        'CheckoutChampId' => 1101,
        'name' => 'Portable SSD External hard drive',
        'description' => '
        External Interface : USB <br>
        Interface :	USB3.1 <br>
        Used for :	Desktop/Laptop
         
        ',
        'image' => 'products/3.webp',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Pink',
        'billingModel' => '1',                       // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '24.99',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '44.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days) 
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '2.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '10',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'no',  // if yes, only then it take price from below
        'shop_option' => array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '29.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '49.50'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '63.71'
            ),
            'shop_option4' => array(
                'option_quantity' => '4',
                'option_price' => '75.97'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product4' => array(
        'id' => '14',
        'CheckoutChampId' => 1101,
        'name' => 'Mesh Nebulizer',
        'description' => '
        Fine particles: large fog, fine atomized particles,particles can reach 1-5 m, drug absorption more fully
        <br>
        High speed: microporous spray tablets,atomization speed 0.2ml/min
        <br>Quieter: with piezoelectric components, quieter design with low noise
        <br>
        Flashing light: green light means normal operation, red light means no power or insufficient voltage

 

        ',
        'image' => 'products/4.webp',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Pink',
        'billingModel' => '1',                       // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '39.99',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '44.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days) 
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '2.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '10',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'no',  // if yes, only then it take price from below
        'shop_option' => array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '21.99'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '39.99'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '56.92'
            ),
            'shop_option4' => array(
                'option_quantity' => '4',
                'option_price' => '73.21'
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product5' => array(
        'id' => '15',
        'CheckoutChampId' => 1101,
        'name' => 'QR Code Scanner',
        'description' => '
        --ARM-32bit Cortex class-leading high speed processor <br>
        --Wireless freedom at 50M working range in the open area <br>
        --Instant upload mode and storage mode switching <br>
        --850~1400mAh Li-ion battery optional, working time up to 60 hours
       
        ',
        'image' => 'products/5.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Pink',
        'billingModel' => '1',                       // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '59.99',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '44.00',             //if trial
        'trialShipping' => '5.45',          //if trial
        'trialRebillPrice' => '91.95',       //Rebill price - if trial(after 14 days) 
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '2.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '10',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'no',  // if yes, only then it take price from below
        'shop_option' => array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '44.91'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '54.98'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '67.43 '
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'active',               //active or inactive
    ),
    'product6' => array(
        'id' => '16',
        'CheckoutChampId' => 1102,
        'name' => 'Basic Plan',
        'description' => '
            3 days trial<br>
            Discounted Products<br>
            Fast Shipping<br>
            Money-Back Guarantee<br>
            Easy cancellation<br>
            24/7 support
        ',
        'image' => 'products/basic.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Pink',
        'billingModel' => '1',                       // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '3.00',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '3.00',             //if trial
        'trialShipping' => '0.00',          //if trial
        'trialRebillPrice' => '39.74',       //Rebill price - if trial(after 14 days) 
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '2.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '10',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'no',  // if yes, only then it take price from below
        'shop_option' => array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '44.91'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '54.98'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '67.43 '
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'inactive',               //active or inactive
    ),
    'product7' => array(
        'id' => '17',
        'CheckoutChampId' => 1101,
        'name' => 'Premium Plan',
        'description' => '
            14 days trial<br>
            Discounted Products<br>
            Fast Shipping<br>
            Money-Back Guarantee<br>
            Easy cancellation<br>
            24/7 support<br>
            Complimentary Products<br>
            Reduced Shipping Prices
       
        ',
        'image' => 'products/premium.png',
        'show_ingredients' => 'no',
        'ingredients_image' => 'ingredients/keto.jpg',
        'category' => 'Pink',
        'billingModel' => '1',                       // 1=ss|2=trial|3=con|4=SS+trial|5=SS+con|6=trial+con|7= SS+trial+con
        'ssPrice' => '0.00',               //if ss
        'ssShipping' => '0.00',             //if ss
        'ssMaxqty' => '1',                  // 1 for disable qty, 2 for enable qty
        'trialPrice' => '0.00',             //if trial
        'trialShipping' => '0.00',          //if trial
        'trialRebillPrice' => '29.75',       //Rebill price - if trial(after 14 days) 
        'trialMaxqty' => '1',               // 1 for disable qty, 2 for enable qty
        'continuityPrice' => '2.95',       //if continuity
        'continuityShipping' => '3.95',     //if continuity
        'continuityMaxqty' => '10',          // 1 for disable qty, 2 for enable qty
        'straightSaleMultiPrice' => 'no',  // if yes, only then it take price from below
        'shop_option' => array(
            'shop_option1' => array(
                'option_quantity' => '1',
                'option_price' => '44.91'
            ),
            'shop_option2' => array(
                'option_quantity' => '2',
                'option_price' => '54.98'
            ),
            'shop_option3' => array(
                'option_quantity' => '3',
                'option_price' => '67.43 '
            )
        ),
        'enableMaxqty' => '1',               //1 for not display quantity increase/decrease button, any other number is the maximum qty customer can buy
        'sizeOption' => 'no',              //if yes then how size options in product page
        'size_option' => array(
            '0' => 'S',
            '1' => 'M',
            '2' => 'L',
            '3' => 'XL',
            '4' => '2XL',
            '5' => '3XL',
        ),
        'status' => 'inactive',               //active or inactive
    )
    //End of Product Array          
);

//Website Information
$generalConfig =  array(
    'brand_name' => 'Awesome Gadget Discount',
    'website_url' => 'awesomegadgetdiscount.com',
    'email' => 'support@awesomegadgetdiscount.com',
    'descriptor' => 'awesomegadget556',
    'corp_name' => 'Hamalty Limited ( Registration #14910255)',
    'phone_number' => '1-888-555-5556',
    'address' => '23 Prospect Avenue, South Normanton, Alfreton, Derbyshire,DE55 2BA, United Kingdom',
    'fulfillment' => 'NITRO LOGISTICS',
    'return_address' => '23 Prospect Avenue, South Normanton, Alfreton, Derbyshire,DE55 2BA, United Kingdom',

    'trial_period' => '14',
    'trial_period_breakdown' => '',
    'shipping_period' => '3-5',
    'shipping_carrier' => 'USPS',
    'customer_service_hours' => '5:00 am - 5:00 pm PST Monday through Sunday',
    'add_stylesheet' => '',
    'maximum_ticket_value' => '500',
    'naming_convention' => array(       //this is the billing model name 
        '1' => 'One Time Sale',              //this is for SS
        '2' => 'Trial',            //this is for trial
        '3' => 'Continuity'        //this is for continuity
    ),
    'product_count' => count($products), //total products count
);


//Website Content
$updateContent = array(
    'slogan'        => Info::$slogan[45],            // choose 1-70   
    'tagline'       => Info::$tagline[2],           // choose 1-70
    'aboutUsTitle'  => Info::$aboutUsTitle[4],      // choose 1-40
    'aboutUs'       => Info::$aboutUs[34],           // choose 1-70
    'shopTitle'     => Info::$shopTitle[7],         // choose 1-40
    'buttonName'    => Info::$buttonName[6],        // choose 1-40
    'popularTitle'  => Info::$popularTitle[6],      // choose 1-40
    'contactTitle'  => Info::$contactTitle[4],      // choose 1-40
    'contactContent'  => Info::$contactContent[6]   // choose 1-70
);

//Website Theme
$pageConfig =  array(
    'header_template' => 1,             // choose 1-30
    'hero_section' => 2,                // choose 1-30
    'product_section' => 2,            // choose 1-30
    'about_section' => 2,               // choose 1-12
    'contact_section' => 3,             // choose 1-10
    'popularProducts_section' => 1,     // choose 1-13
    'cta_section' => 0,                 // choose 1-2
    'features_section' => 6,            // choose 1-9
    'footer_template' => 1,             // choose 1-30

    'product_page' => 2,                // choose 1-2
    'contact_page' => 6,                // choose 1-10
    'cart_page' => 8,                   // choose 1-10
    'checkout_page' => 8,               // choose 1-10

    'relatedProducts_section' => 1,      // choose 1
    // If you want to hide any section select 0

    'indexSectionsOrder' => [ //just order the lines like you want it to be ordered
        'productSection',
        'aboutSection',
        'featuresSection',
        'contactSection',
        'popularProductsection',
        'ctaSection',
    ],

    'font' => 3, // 1-Open Sans ; 2-Alegreya ; 3-Poppins ; 4-Roboto ; 5-Montserrat ; 6-Lato ; 7-Oswald ; 8-Raleway ; 
    // 9-Mulish ; 10-Nunito ; 11-Assistant ; 12-Barlow ; 13-Rubik ; 14-Work Sans ; 15-Mukta

    // CSS Colors for theme using HEX or rgba (Can also write Transparent, white, red or basic colors)
    'primary_color' => '#184e77',      //Accent Color on most elements like buttons bottom header
    'primary_text_color' => '#fff',    //Text to be used on Primary background color
    'secondary_color' => '#184e77',    //Elements which dont have primary color will use this
    'secondary_text_color' => '#fff',  //Text to be used on secondary background color
    // Header Colors
    'topbar_bg_color' => '#184e7730',
    'topbar_text_color' => '#222',
    'header_bg_color' => '#fff',
    'header_text_color' => '#222',
    'header_icon_color' => '#184e77',
    // Banner and Button Colors
    'banner_overly_color' => '#6f6f6f80',
    'banner_text_color' => '#fff',
    'button_bg_color' => '#184e77',
    'button_text_color' => '#fff',
    'button_bg_color_hover' => '#184e7750',
    'button_text_color_hover' => '#fff',
    // Footer Colors
    'footer_bg_color' => '#184e77',
    'footer_text_color' => '#fff',

    'displayCategory' => 'no', //this toggles the category on the index and product page

    'displayBillingModel' => 'yes', //this show/hide the billing model on entire site

    'displayShippingPrice' => 'yes', //this show/hide the shipping price on entire site

    'displayRelatedProducts' => 'yes', //this toggles the related products on the product page

    'onlyShowFirstPrice' => 'no', //this only applies when the multi price is enabled. if set to 'yes' it will only show the first price from the array for the product on the index and shop page

    'creditCardIcons' => 3, // Icons set Pick between 1 - 4

    'loadingGif' => 10, // Preloader Animation sitewide. Select from 1 - 10

    'sortProducts' => 5, //1 - alphabetical, 2 - reverse alphabetical, 3 - lowest to highest price, 4 - highest to lowest price, 5 - first to last product array, 6 - last to first product, 7 - shortest product name to longest product name, 8 - longest product name to shortest product name

    'showNavigationCart' => 'yes', //yes displays it, no hides it

    'showBillingColumnCheckoutPage' => 'no', //yes displays it, no hides it

    'popularProducts' => [ //this toggles the popular products on the landing page
        'displaypopularProducts' => 'yes',
        'popularProducts' => 3
    ],

    'oneProductCartLimit' => 'no', //this limits one product in the shopping cart

    'shippingOption' => array(
        'enableShippingOption' => 'no', //enables shipping option to checkout page and add description to terms page
        'shippingOptionName' => 'Shipping Insurance', //name that will be displayed in the checkout and terms page
        'shippingOptionPrice' => '1.00',   //price of the shipping option
    ),



    //Terms 
    'checkoutPage' => array(
        'require_generic_text_terms' => 'yes',   //if set to no, then disable checkout page product terms checkboxes
        'require_product_terms' => 'yes',   //if set to no, then disable checkout page product terms checkboxes
        'require_total_price_terms' => 'no'   //if set to no, then disable checkout page product terms checkboxes
    )
);

//Credit Card 

$card_type = array(
    'visa' => 'yes', //yes or no
    'discover' => 'yes', //yes or no 
    'master' => 'yes', //yes or no
);

//CRM settings
$CRM = [
    'url'                       => 'https://dcconsulting.sticky.io/api/v1/new_order',
    'username'                  => 'dc_consulting_bp',
    'password'                  => '6XYJvHVXUepd',
    'shippingId'                => 3,
    'campaignId'                => 262,
    'tranType'                  => 'Sale',
    'offerId'                   => 25,
    'billingModelId'            => 2,
    'gatewayId'                 => 959,

    //'shippingInsurancePrice'    => 1.00,
    //'shippingInsuranceProductId'=> 123
];

// all ajax and other css,images/js file path moved on this file => design_and_ajax.php
require 'design_and_ajax.php';
