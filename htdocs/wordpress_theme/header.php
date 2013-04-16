<!doctype html>
<html lang="de-de">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('title'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="Gründerhub FrankfurtRheinMain | http://gründerhub.de/">
    <!-- See /humans.txt for more infos -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php
    // define('BUST', time());
    define('BUST', '20130123');?>
    <!--
    <link rel="stylesheet" href="/build/complete-min.<?php echo BUST; ?>.css" type="text/css">
-->
    <link rel="stylesheet" href="/assets/normalize.css" type="text/css">
    <link rel="stylesheet" href="/assets/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="/assets/styles.css" type="text/css">
    <?php wp_head(); ?>
</head>
<body>
<div id="main" class="clearfix">
    <header>
        <div id="logo">
            <h1><a href="/" rel="index"><img src="/build/logo-m.png" alt="Gründerhub FrankfurtRheinMain"></a>
            </h1>
        </div>
        <p>Der Gründerhub FrankfurtRheinMain ist eine Initiative aus privaten, gewerblichen und kommunalen Mitgliedern
            zur Förderung innovativer Gründungen.</p>
        <hr>
        <nav>
            <dl>
                <dt>Themen</dt>
                <dd>
                    <a href="/"><i class="icon-calendar"></i> Kalender</a><br>
                    <a href="/magazin/"><i class="icon-book"></i> Magazin</a>
                </dd>
                <dt>Kontakt</dt>
                <dd>
                    <a href="https://www.facebook.com/gruenderhub" rel="me"><i class="icon-facebook"></i>
                        Facebook</a><br> <a href="https://twitter.com/gruenderhub"><i class="icon-twitter"></i> Twitter</a><br>
                        <a href="/impressum"><i class="icon-group"></i> Impressum</a>
                </dd>
            </dl>
        </nav>
        <hr>
        <h2>Mailingliste</h2>

        <p>Du kannst Dich hier für unsere <a href="http://groups.google.com/group/gruenderhub?hl=de">Mailingliste</a>
            registrieren. Wir werden deine E-Mail-Adresse nur für Informationen rund um den Gründerhub verwenden und
            niemals weitergeben.</p>

        <form action="http://groups.google.com/group/gruenderhub/boxsubscribe">
            <input type=hidden name="hl" value="de"> <label> <input type="enmail" name="email"> </label>
            <button type="submit">Beitreten</button>
        </form>

        <hr>
        <div class="warning-box">
            <h2>Hinweis</h2>

            <p><em>Wir arbeiten gerade an dem Aufbau dieser Plattform.</em></p>

            <p>Aktuelle Infos zum Geschehen rund um die Gründer-Szene in FrankfurtRheinMain findest Du <strong>jetzt
                schon</strong> auf unseren Social-Media-Kanälen in
                <a href="https://www.facebook.com/gruenderhub" rel="me">Facebook</a> und in
                <a href="https://twitter.com/gruenderhub">Twitter</a>.</p>
        </div>
    </header>
