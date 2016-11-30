<?php
header('Content-type: application/json');

require 'gcalapi.php';



  $jsonRes = new stdClass();

$jsonRes = Array();

// Get the API client and construct the service object.
$planetrichClient = getPlanetRichClient();
$service = new Google_Service_Calendar($planetrichClient);

$minDate = new DateTime();
//$minDate->modify('- 32 days');
$minDate->setTime(0,0);

$maxDate = new DateTime();
$maxDate->modify('+ 365 days');



// Print the next 10 events on the user's calendar.
$calendarId = 'planetrich.com_t4ddl4ag6m1nds59v0essgqak8@group.calendar.google.com';



$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => $minDate->format(DateTime::ISO8601),
  'timeMax' => $maxDate->format(DateTime::ISO8601),

);

$results = $service->events->listEvents($calendarId, $optParams);

$jsonRes = array_merge($jsonRes, parseGoogleCalendar($results, 'planetrich-countdown planetrich'));



echo json_encode($jsonRes);
