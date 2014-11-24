<?
$iframe_url = "";
$randk = trim(rand(10000000, 409237000));
$strPostUrl = 'http://payforit.txtnation.com/api/?';
$strPostReq = 'company=mpremium';
$strPostReq .= '&ekey=ef97c86f0a444e3f79e99759399bb6ba';
$strPostReq .= '&sub_period_units=weeks';
$strPostReq .= '&sub_period=1';
$strPostReq .= '&value=3.00';
$strPostReq .= '&name=Beflirty';
$strPostReq .= '&description=Beflirty';
$strPostReq .= '&sub_repeat=0';
$strPostReq .= '&brand=BeFlirty';
$strPostReq .= '&window=embed_small';
$strPostReq .= '&sub_grace_period=2';
$strPostReq .= '&sub_grace_period_units=days';
$strPostReq .= '&sub_suspend_period=10';
$strPostReq .= '&sub_suspend_period_units=days';

$strPostReq .= '&password=ef97c86f0a444e3f79e99759399bb6ba';
$strPostReq .= '&callback_url=http%3A%2F%2Fbeflirty.net%2Fpayforitresponder.php';
$strPostReq .= '&id=' . $randk . '|signupimobi';
$strPostReq .= '&success_url=http%3A%2F%2Fbeflirty.net%2Fr%2F' . $randk; //http://dev.beflirty.net/r/
$strPostReq .= '&cancel_url=http%3A%2F%2Fbeflirty.net%2Fsignupuk.php';//http://dev.beflirty.net/signupuk.php
$strPostReq .= '&currency=GBP';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $strPostUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "$strPostReq");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$strBuffer = curl_exec($ch);
curl_close($ch);
$pieces = explode("|", $strBuffer);
$iframe_url = $pieces[2];
?>

<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>BeFlirty!</title>
    <meta name="description" content="">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    <meta http-equiv="cleartype" content="on">

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicons/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/favicons/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="img/favicons/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/favicons/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="img/favicons/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="img/favicons/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="img/favicons/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="img/favicons/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="img/favicons/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="img/favicons/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="img/favicons/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="img/favicons/mstile-310x310.png" />

    <!-- SEO: If mobile URL is different from desktop URL, add a canonical link to the desktop page -->
    <!--
    <link rel="canonical" href="http://www.example.com/" >
    -->

    <!-- Add to homescreen for Chrome on Android -->
    <!--
    <meta name="mobile-web-app-capable" content="yes">
    -->

    <!-- For iOS web apps. Delete if not needed. https://github.com/h5bp/mobile-boilerplate/issues/94 -->
    <!--
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="">
    -->

    <!-- This script prevents links from opening in Mobile Safari. https://gist.github.com/1042026 -->
    <!--
    <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
    -->

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="js/vendor/owlcarousel/owl-carousel/owl.carousel.css">
</head>
<body>
<header class="@main_header">
    <div class="container">
        <div class="-brand">
            <img src="img/beflirty_logo.svg" alt="Be Flirty!"/>
        </div>
        <div class="headerinfo +text-center">
            <h1>Mobile Chat Rooms</h1>
        </div>
    </div>
</header>
<div class="slogan +text-center">
    Connect to real people just like you with unlimited chat and private messages.
</div>
<main>
    <section class="-slider-users clearfix">
        <div class="-slider-users--slides-wrapper">
            <article>
                <div class="-slider-users--photo">
                    <img src="img/user1.png" alt="Suzy William"/>
                </div>
                <h2>Suzy William</h2>
                <h3>Princess 18</h3>
                <button type="button" class="-btn +online">online</button>
            </article>
            <article>
                <div class="-slider-users--photo">
                    <img src="img/user1.png" alt="Suzy William"/>
                </div>
                <h2>Suzy William</h2>
                <h3>Princess 18</h3>
                <button type="button" class="-btn +online">online</button>
            </article>
            <article>
                <div class="-slider-users--photo">
                    <img src="img/user1.png" alt="Suzy William"/>
                </div>
                <h2>Suzy William</h2>
                <h3>Princess 18</h3>
                <button type="button" class="-btn +offline">offline</button>
            </article>
            <!--end of visible-->
            <article>
                <div class="-slider-users--photo">
                    <img src="img/user1.png" alt="Suzy William"/>
                </div>
                <h2>Suzy William</h2>
                <h3>Princess 18</h3>
                <button type="button" class="-btn +offline">offline</button>
            </article>
            <article>
                <div class="-slider-users--photo">
                    <img src="img/user1.png" alt="Suzy William"/>
                </div>
                <h2>Suzy William</h2>
                <h3>Princess 18</h3>
                <button type="button" class="-btn +offline">offline</button>
            </article>
            <article>
                <div class="-slider-users--photo">
                    <img src="img/user1.png" alt="Suzy William"/>
                </div>
                <h2>Suzy William</h2>
                <h3>Princess 18</h3>
                <button type="button" class="-btn +offline">offline</button>
            </article>
            <article>
                <div class="-slider-users--photo">
                    <img src="img/user1.png" alt="Suzy William"/>
                </div>
                <h2>Suzy William</h2>
                <h3>Princess 18</h3>
                <button type="button" class="-btn +offline">offline</button>
            </article>
            <article>
                <div class="-slider-users--photo">
                    <img src="img/user1.png" alt="Suzy William"/>
                </div>
                <h2>Suzy William</h2>
                <h3>Princess 18</h3>
                <button type="button" class="-btn +offline">offline</button>
            </article>
            <article>
                <div class="-slider-users--photo">
                    <img src="img/user1.png" alt="Suzy William"/>
                </div>
                <h2>Suzy William</h2>
                <h3>Princess 18</h3>
                <button type="button" class="-btn +offline">offline</button>
            </article>
            <article>
                <div class="-slider-users--photo">
                    <img src="img/user1.png" alt="Suzy William"/>
                </div>
                <h2>Suzy William</h2>
                <h3>Princess 18</h3>
                <button type="button" class="-btn +offline">offline</button>
            </article>
        </div>
        <div class="-slider-users--navigation">
            <button type="button" class="left">&nbsp;</button>
            <button type="button" class="right">&nbsp;</button>
        </div>
    </section>
    <div class="container +text-center">
        <iframe src="<?= $iframe_url ?>" width="280" height="125" scrolling="no" frameborder="0" id="frame" style="padding: 0;"></iframe>
    </div>
</main>
<footer class="@main_footer">
    <div class="container">
        <p class="+text-center">
            Join BeFlirty! for £3.00 per week until you text STOP to 64546. <br/>
            This is a subscription service. Help phone: (0)2088205234
        </p>
    </div>
</footer>

<!-- Add your site or application content here -->

<script src="js/vendor/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="js/vendor/owlcarousel/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="//maps.google.co.il/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="//www.google.com/jsapi"></script>
<script type="text/javascript" src="//js.maxmind.com/js/geoip.js"></script>
<script type="text/javascript" src="js/vendor/maplander/markers.js"></script>
<script src="js/main.min.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>