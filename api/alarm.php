<?php

/*
The following php loads a set events from calendars for sbu and planetrich. 
It creates a default alarm based on day of week.
It takes the earliest time between the default alarm and each events start time.$_COOKIE
If the event title doesn't include the word ALARM it subtracts 90 minutes (time to get ready / go).  
If the alarm was set from an event, it provides that event for context

Based on alarm time, it provides turn on time (15 minutes before alarm)
Based on alarm time, it provides alarm off time (20 minutes after) 
*/

header('Content-type: application/json');

require 'gcalapi.php';

$defaultAlarm = array(
    'monday' => '8:00am',
    'tuesday' => '8:10am',
    'wednesday' => '8:20am',
    'thursday' => '8:30am',
    'friday' => '8:40am',
    'saturday' => '8:50am',
    'sunday' => '9:00am'
);



  $jsonRes = new stdClass();

$minDate = new DateTime();
//$minDate->modify('- 32 days');
$minDate->setTime(3,0);

$maxDate = new DateTime();
$maxDate->setTime(12,0);


if($minDate < new DateTime()) {
    $minDate->modify('+1 days');
    $maxDate->modify('+1 days');
}


$jsonRes = new stdClass();
//$jsonRes->minDate = $minDate->format('c');
//$jsonRes->maxDate = $maxDate->format('c');

// Print the next 10 events on the user's calendar.

$planetRichArr = Array();
$planetRichArr[0] = 'rich@planetrich.com';
//$planetRichArr[1] = 'planetrich.com_t4ddl4ag6m1nds59v0essgqak8@group.calendar.google.com';

$sbuArr = Array();
$sbuArr[0] = 'primary';

$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => $minDate->format(DateTime::ISO8601),
  'timeMax' => $maxDate->format(DateTime::ISO8601),

);



$data = Array();

// Get the API client and construct the service object.
$service = new Google_Service_Calendar(getPlanetRichClient());

foreach($planetRichArr as $cal) {
    $results = $service->events->listEvents($cal, $optParams);
    $data = array_merge($data, parseGoogleCalendar($results, 'planetrich'));
}

// Get the API client and construct the service object.
$service = new Google_Service_Calendar(getSBUClient());

foreach($sbuArr as $cal) {
    $results = $service->events->listEvents($cal, $optParams);
    $data = array_merge($data, parseGoogleCalendar($results, 'sbu'));
}

//$jsonRes->DefaultAlarms = $defaultAlarm;

//$jsonRes->data = $data;

$dow = strtolower($minDate->format('l'));

$curAlarm = $minDate->format('m/d/Y') . ' ' . $defaultAlarm[$dow];

$curAlarmDate = DateTime::createFromFormat('m/d/Y h:ia', $curAlarm);

$jsonRes->DefaultAlarm = $curAlarmDate->format('c');

$index = -1;
$i=0;
foreach($data as $entry) {
    
    $tempDate = new DateTime($entry->start);
    $entryTitle = strToLower($entry->title);
    
    if(strpos($entryTitle, 'alarm') === false) {
        $tempDate->modify('-90 minutes');
    }
    else {
        
    }

    
    
    if($tempDate < $curAlarmDate)
    { 
        $curAlarmDate = clone $tempDate;
        $index = $i;
    }

    $i++;
}

//$jsonRes->curAlarm = $curAlarm;
$jsonRes->Alarm = $curAlarmDate->format('c');

if($index >= 0) {
    $jsonRes->WakeUpFor = $data[$index];
}
else {
    
}

$alarmOff = clone $curAlarmDate;
$alarmOff->modify('+20 minutes');

$jsonRes->AlarmOff = $alarmOff->format('c');


$turnOn = clone $curAlarmDate;
$turnOn->modify('-15 minutes');
$jsonRes->TurnOn = $turnOn->format('c');


echo json_encode($jsonRes);