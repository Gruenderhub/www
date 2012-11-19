<!doctype html>
<html lang="de-de">
<head>
    <meta charset="utf-8">
    <title>Gründerhub FrankfurtRheinMain</title>
    <meta name="description" content="Der Gründerhub FrankfurtRheinMain ist eine Initiative aus privaten, gewerblichen und kommunalen Mitgliedern zur Förderung innovativer Gründungen.">
    <meta name="author" content="Gründerhub FrankfurtRheinMain | http://gründerhub.de/">
    <!-- See /humans.txt for more infos -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="./build/complete-min.20121117.css" type="text/css">
    <!--
    <link rel="stylesheet" href="./assets/normalize.css" type="text/css">
    <link rel="stylesheet" href="./assets/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="./assets/styles.css" type="text/css">
    -->
</head>
<body>
<div id="main" class="clearfix">
    <header>
        <div id="logo">
            <h1><a href="/" rel="index"><img src="build/logo-m.png" alt="Gründerhub FrankfurtRheinMain"></a></h1>
        </div>
        <p>Der Gründerhub FrankfurtRheinMain ist eine Initiative aus privaten, gewerblichen und kommunalen Mitgliedern
            zur Förderung innovativer Gründungen.</p>
        <hr>
        <nav>
            <dl>
                <dt>Themen</dt>
                <dd><!-- a href="/kalender" --><i class="icon-calendar"></i> Kalender<!-- /a --></dd>
                <dt>Kontakt</dt>
                <dd>
                    <a href="https://www.facebook.com/gruenderhub" rel="me"><i class="icon-facebook"></i>
                        Facebook</a><br> <a href="https://twitter.com/gruenderhub"><i class="icon-twitter"></i> Twitter</a>
                </dd>
            </dl>
        </nav>
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
    <article>
        <h2>
            Kalender
            <small>
                <a href="https://www.google.com/calendar/ical/4hkvb3j7lf5ruq3oni1dtigccc%40group.calendar.google.com/public/basic.ics" class="align-right"><i class="icon-download"></i>
                    iCal</a></small>
        </h2>

        <?php

        setlocale(LC_ALL, 'de_DE.utf8');

        error_reporting(-1);
        ini_set('display_errors', 1);

        require_once '../lib/CalendarParser.php';

        $calendar = new CalendarParser(new SplFileInfo('../data/calendar.ics'));

        foreach ($calendar->getEvents() as $event):
            $now = new DateTime();
            $start = new DateTime($event->DTSTART);

            $diff = $start->diff($now);
            $diffDays = $diff->invert ? $diff->days : -1 * $diff->days;
            if ($diffDays < 0) continue;
            $end = new DateTime($event->DTEND);

            ?>

            <div itemscope itemtype="http://schema.org/Event" class="event clearfix">

                <p class="info">

                    <strong itemprop="name"><?php echo $event->SUMMARY; ?></strong><br>
                    <small>
                        <time datetime="<?php echo sprintf('%sT%s+00:00', $start->format('Y-m-d'), $start->format('H:i:s')); ?>" itemprop="startDate"><?php echo strftime('%A, %d. %B %Y', $start->format('U')); ?>
                        </time>
                        <time datetime="<?php echo sprintf('%sT%s+00:00', $end->format('Y-m-d'), $end->format('H:i:s')); ?>" itemprop="endDate"></time>
                        , <?php echo $start->format('H:i'); ?> Uhr
                    </small>
                    <br>
                    <small itemprop="location">
                        <a href="http://maps.google.com/?q=<?php echo urlencode($event->LOCATION); ?>"><?php echo $event->LOCATION; ?></a>
                    </small>
                </p>

                <div itemprop="description" class="description">
                    <?php
                    $desc = $event->DESCRIPTION;
                    $desc = str_replace('\n', "<br>", $desc);
                    echo $desc; ?>
                </div>

            </div>

            <hr>


            <?php endforeach; ?>
    </article>
</div>
<footer class="textcenter compactlines">
    <p>
        Das Gründerhub-Logo wurde von Markus Tacker entworfen und steht unter der
        <a href="http://creativecommons.org/licenses/by/3.0/de/deed.de">Creative Commons Namensnennung 3.0 Deutschland
            (CC BY 3.0) Lizenz</a>.</p>

    <p>Hergestellt in FrankfurtRheinMain von <a href="humans.txt">diesen Menschen</a>.</p>

    <p><a href="https://github.com/Gruenderhub/www">Quellcode dieser Website bei GitHub</a>.</p>
</footer>
</body>
</html>
