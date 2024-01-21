<?php
$eventsDetails = array(
    'Event1' => array(
        'date' => '2023-02-20',
        'time' => '01:30 PM',
        'location' => 'City Q',
        'title' => 'Event D'
    ),
    'Event2' => array(
        'date' => '2023-01-15',
        'time' => '08:00 AM',
        'location' => 'City U',
        'title' => 'Event B'
    ),
    'Event3' => array(
        'date' => '2023-05-12',
        'time' => '12:30 PM',
        'location' => 'City A',
        'title' => 'Event A'
    ),
    'Event4' => array(
        'date' => '2023-11-19',
        'time' => '2:30 PM',
        'location' => 'City C',
        'title' => 'Event C'
    ),
    'Event5' => array(
        'date' => '2023-10-21',
        'time' => '4:30 PM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
    'Event6' => array(
        'date' => '2019-10-21',
        'time' => '10:30 AM',
        'location' => 'City Z',
        'title' => 'Event DD'
    ),
    'Event7' => array(
        'date' => '2023-10-29',
        'time' => '3:30 PM',
        'location' => 'City K',
        'title' => 'Event K'
    ),
    'Event8' => array(
        'date' => '2022-01-22',
        'time' => '5:30 PM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
    'Event9' => array(
        'date' => '2015-10-21',
        'time' => '1:30 PM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
    'Event10' => array(
        'date' => '2017-01-25',
        'time' => '7:30 AM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
    'Event11' => array(
        'date' => '2018-06-11',
        'time' => '9:00 AM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
    'Event12' => array(
        'date' => '2009-10-21',
        'time' => '11:30 AM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
    'Event13' => array(
        'date' => '2009-10-11',
        'time' => '12:30 AM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
    'Event14' => array(
        'date' => '2023-10-20',
        'time' => '4:30 PM',
        'location' => 'City G',
        'title' => 'Event G'
    ),
    'Event15' => array(
        'date' => '',
        'time' => '4:30 PM',
        'location' => 'City G',
        'title' => 'Event G'
    ),
    'Event16' => array(
        'date' => '2009-09-11',
        'time' => '3:30 PM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
    'Event17' => array(
        'date' => '2009-09-11',
        'time' => '8:30 AM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
    'Event18' => array(
        'date' => '2009-09-11',
        'time' => '12:30 PM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
    'Event19' => array(
        'date' => '2022-06-22',
        'time' => '01:30 PM',
        'location' => 'City I',
        'title' => 'Event E'
    ),
);

// $index = 1;
// function compareEvents($event1, $event2) {
//     $dateTime1 = strtotime($event1['date'] . ' ' . $event1['time']);
//     $dateTime2 = strtotime($event2['date'] . ' ' . $event2['time']);

//     return $dateTime1 - $dateTime2;
// }

// usort($eventsDetails, 'compareEvents');

// echo "Sorted Events:<br>";
// foreach ($eventsDetails as $event) {
//     echo $index++ . " Date: " . $event['date'] . ", Time: " . $event['time'] . ", Location: " . $event['location'] . ", Title: " . $event['title'] . "<br>";
// }

$eventsByYearMonth = array();
foreach ($eventsDetails as $event) {
    if (isset($event['date']) && !empty($event['date'])) {
        $year = substr($event['date'], 0, 4);
        $month = substr($event['date'], 5, 2);
        // $month = date('F', strtotime($event['date']));
        $eventsByYearMonth[$year][$month][] = $event;
    }
}

ksort($eventsByYearMonth);
foreach ($eventsByYearMonth as &$eventsInYear) {
    ksort($eventsInYear);
    foreach ($eventsInYear as &$eventsInMonth) {
        usort($eventsInMonth, 'compareEventsByTime');
        usort($eventsInMonth, 'compareEventsByDates');
    }
}

// callback function for comparison of events by date 
function compareEventsByDates($a, $b) {
    $dateA = strtotime($a['date']);
    $dateB = strtotime($b['date']);
    return $dateA - $dateB;
}

function compareEventsByTime($a, $b) {
    $timeA = strtotime($a['time']);
    $timeB = strtotime($b['time']);
    return $timeA - $timeB;
}

echo "<pre>";
print_r($eventsByYearMonth);
?>