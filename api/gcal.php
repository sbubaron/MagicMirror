<?php
header('Content-type: application/json');
require 'gcalapi.php';

define('APPLICATION_NAME', 'MagicMirror');
define('CREDENTIALS_PLANETRICH_PATH', '../.credentials/gcal-planetrich-access-token.json');
define('CREDENTIALS_SBU_PATH', '../.credentials/gcal-sbu-access-token.json');

define('CLIENT_SECRET_PATH',  '../.credentials/client_secret.json');
define('SCOPES', implode(' ', array(
  Google_Service_Calendar::CALENDAR_READONLY)
));






  $jsonRes = new stdClass();

$jsonRes = Array();

// Get the API client and construct the service object.
$planetrichClient = getPlanetRichClient();
$service = new Google_Service_Calendar($planetrichClient);

$minDate = new DateTime();
$minDate->modify('- 32 days');
$minDate->setTime(0,0);

$maxDate = new DateTime();
$maxDate->modify('+ 32 days');


// Print the next 10 events on the user's calendar.
$calendarId = 'primary';
$optParams = array(
  'maxResults' => 100,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => $minDate->format(DateTime::ISO8601),
  'timeMax' => $maxDate->format(DateTime::ISO8601),
);

$results = $service->events->listEvents($calendarId, $optParams);

$jsonRes = array_merge($jsonRes, parseGoogleCalendar($results, 'planetrich-primary planetrich'));



// Print the next 10 events on the user's calendar.
$calendarId = '#contacts@group.v.calendar.google.com';



$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => $minDate->format(DateTime::ISO8601),
  'timeMax' => $maxDate->format(DateTime::ISO8601),

);

$results = $service->events->listEvents($calendarId, $optParams);

$jsonRes = array_merge($jsonRes, parseGoogleCalendar($results, 'planetrich-birthdays planetrich'));



// Print the next 10 events on the user's calendar.
$calendarId = 'planetrich.com_2tdev4ms51p3nkho7ef22fiqv0@group.calendar.google.com';

$maxDate = new DateTime();
$maxDate->modify('+ 14 days');

$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => $minDate->format(DateTime::ISO8601),
  'timeMax' => $maxDate->format(DateTime::ISO8601),

);

$results = $service->events->listEvents($calendarId, $optParams);

$jsonRes = array_merge($jsonRes, parseGoogleCalendar($results, 'planetrich-bills planetrich'));



$sbuClient = getSBUClient();
$service = new Google_Service_Calendar($sbuClient);

// Print the next 10 events on the user's calendar.
$calendarId = 'primary';
$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => $minDate->format(DateTime::ISO8601),
  'timeMax' => $maxDate->format(DateTime::ISO8601),
);

$results = $service->events->listEvents($calendarId, $optParams);

$jsonRes = array_merge($jsonRes, parseGoogleCalendar($results, 'sbu-primary sbu'));

$calendarId = 'en.usa#holiday@group.v.calendar.google.com';

$maxDate = new DateTime();
$maxDate->modify('+ 21 days');


$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => $minDate->format(DateTime::ISO8601),
  'timeMax' => $maxDate->format(DateTime::ISO8601),

);

$results = $service->events->listEvents($calendarId, $optParams);

$jsonRes = array_merge($jsonRes, parseGoogleCalendar($results, 'sbu-holidays sbu'));






echo json_encode($jsonRes);
