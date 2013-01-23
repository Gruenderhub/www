<?php
/**
 * @author Markus Tacker <m@coderbyheart.de>
 *
 * Tests für CalendarParser
 */

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'CalendarParser.php';

/**
 * @author Markus Tacker <m@coderbyheart.de>
 *
 * Tests für CalendarParser
 */
class CalendarParserTest extends PHPUnit_Framework_TestCase
{
    public function testRepeatedEvents()
    {
        $calendar = new CalendarParser(new SplFileInfo(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'calendar-webmontag-repeat.ics'));
        $webmontag = $calendar->getEvents()[0];
        $now = new \DateTime();
        $date = new \DateTime(trim($webmontag->DTSTART));
        $this->assertTrue(!$now->diff($date)->invert, 'Date should be in future. ' . $date->format('Y-m-d') . ' is not.');
    }
}