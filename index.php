<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Anvil</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="assets/js/libs/css3mq.js"></script><![endif]--><!--[if IE 6]>
    <script type="text/javascript" src="assets/js/libs/png.js"></script>
    <script type="text/javascript">DD_belatedPNG.fix('div, p, li, img');</script><![endif]-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="sitemap.xml"/>
    <link rel="author" href="humans.txt"/>
    <script src="assets/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<body>
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or
    <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->


<header>

</header>

<div role="main" id="wrapper">
    <form id="mailForm">
        <div id="previewArea">
            <iframe></iframe>
        </div>
        <div id="controlPanel">

            <div>
                <label for="emailSelect">Choose mail:</label> <select id="emailSelect">
                <?php

                if ($handle = opendir('./mail')) {
                    while (false !== ($entry = readdir($handle))) {
                        $entryName = explode(".html", $entry);
                        if (substr($entry, -5) == ".html") {
                            echo ('<option value="' . $entry . '">' . $entryName[0] . '</option>');
                        }
                    }
                    closedir($handle);
                }?>

            </select>
                <!-- <input type="number" id="emailSelect" min="1" value="2"> -->

                <button id="refreshButton">Refresh</button>
            </div>
            <hr>
            <label for="emailTitle"></label><textarea type="text" id="emailTitle"></textarea>
            <hr>
            <div class="testWho">
                <label for="name1">Dan</label><input id="name1" type="checkbox" name="testCheck" value="dan">
                <label for="name2">Ian</label><input id="name2" type="checkbox" name="testCheck" value="ian">
                <label for="name3">Rick</label><input id="name3" type="checkbox" name="testCheck" value="richard">
                <label for="name4">Matt</label><input id="name4" type="checkbox" name="testCheck" value="matt">
                <label for="name5">James</label><input id="name5" type="checkbox" name="testCheck" value="james" checked>
            </div>
            <hr>
            <div><input type="submit" value="Test Systems" id="testButton" name="testButton"></div>
            <hr>
            <div class="keys">
                <label for="key1"></label><input type="checkbox" id="key1" class="key"><label id="turn">Turn the keys</label>
                <label for="key2"></label><input type="checkbox" id="key2" class="key">
            </div>
            <hr>
            <div><input type="submit" value="LAUNCH" disabled id="goButton"></div>

            <div id="feedback">

            </div>
        </div>
    </form>
</div>


<footer>

</footer>
<!-- scripts  --><!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<!--<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>-->
<script src="assets/js/libs/jquery-1.7.1.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/script.js"></script>
<!--<script>--><!--    var _gaq = [--><!--        ['_setAccount', 'UA-XXXXX-X'],--><!--        ['_trackPageview']--><!--    ];--><!--    (function (d, t) {-->
<!--        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];--><!--        g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';-->
<!--        s.parentNode.insertBefore(g, s)--><!--    }(document, 'script'));--><!--</script>-->
</body>
</html>