<h2>
    Kalender
    <small>
        <a href="https://www.google.com/calendar/ical/4hkvb3j7lf5ruq3oni1dtigccc%40group.calendar.google.com/public/basic.ics" class="align-right"><i class="icon-download"></i>
            iCal</a></small>
</h2>

<?php

setlocale(LC_ALL, 'de_DE.utf8');

require_once '../lib/CalendarParser.php';

$calendar = new CalendarParser(new SplFileInfo('../data/calendar.ics'));

foreach ($calendar->getEvents() as $event):
    $now = new DateTime();
    $start = new DateTime($event->DTSTART);

    $diff = $start->diff($now);
    $isPast = !$diff->invert;
    if ($isPast) continue;
    $end = new DateTime($event->DTEND);
    $id = sha1($event->UID);
    $showdetail = isset($_GET['detail']) && $_GET['detail'] == $id;

    if (isset($_GET['detail']) && $_GET['detail'] !== $id) continue;

    ?>

<div itemscope itemtype="http://schema.org/Event" class="event clearfix" id="<?php echo $id; ?>">

    <p class="info">

        <strong itemprop="name"><?php echo $event->SUMMARY; ?></strong><br>
        <small>
            <i class="icon-calendar"></i>
            <time datetime="<?php echo sprintf('%sT%s+00:00', $start->format('Y-m-d'), $start->format('H:i:s')); ?>" itemprop="startDate"><?php echo strftime('%A, %d. %B %Y', $start->format('U')); ?>
            </time>
            <time datetime="<?php echo sprintf('%sT%s+00:00', $end->format('Y-m-d'), $end->format('H:i:s')); ?>" itemprop="endDate"></time>
            <br><i class="icon-time"></i> <?php echo $start->format('H:i'); ?> Uhr
        </small>
        <br>
        <small itemprop="location">
            <a href="http://maps.google.com/?q=<?php echo urlencode($event->LOCATION); ?>"><i class="icon-map-marker"></i> <?php echo $event->LOCATION; ?>
            </a>
        </small>
    </p>

    <div itemprop="description" class="description">
        <?php

        error_reporting(-1);
        ini_set('display_errors', 1);

        $breakLimit = 400;
        $desc = $event->DESCRIPTION;

        $needsbreak = strlen($desc) >= $breakLimit;
        $hasmore = false;
        if ($needsbreak) {
            $hasbreak = strpos($desc, '\n');
            if ($hasbreak) {
                $nextBreak = strpos($desc, '\n', $breakLimit);
                if ($nextBreak === false) {
                    $shortdesc = $desc;
                } else {
                    $hasmore = true;
                    $shortdesc = substr($desc, 0, $nextBreak);
                }
            } else {
                $shortdesc = substr($desc, 0, $breakLimit);
                $hasmore = true;
            }
        } else {
            $shortdesc = $desc;
        }
        if ($hasmore) {
            $moredesc = str_replace('\n', "<br>", substr($desc, strlen($shortdesc)));
        }
        $desc = str_replace('\n', "<br>", $desc);
        $shortdesc = str_replace('\n', "<br>", $shortdesc);

        if ($showdetail) {
            echo $desc;
        } else {
            echo $shortdesc;
            ?>
            <?php if ($hasmore): ?><br>
                <a class="more" href="?detail=<?php echo $id; ?>"><i class="icon-plus"></i>
                    mehr …</a>
                <?php endif;
        }

        ?>
    </div>

</div>

<hr>


<?php endforeach; ?>