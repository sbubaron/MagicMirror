<?php
header('Content-type: application/json');

require '../lib/google-api-php-client-1.1.6/src/Google/autoload.php';

define('APPLICATION_NAME', 'MagicMirror');
define('CREDENTIALS_PLANETRICH_PATH', '../.credentials/gcal-planetrich-access-token.json');
define('CREDENTIALS_SBU_PATH', '../.credentials/gcal-sbu-access-token.json');

define('CLIENT_SECRET_PATH',  '../.credentials/client_secret.json');
define('SCOPES', implode(' ', array(
  Google_Service_Calendar::CALENDAR_READONLY)
));




/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getPlanetRichClient() {

//echo "getting client";

  $client = new Google_Client();
  $client->setApplicationName(APPLICATION_NAME);
  $client->setScopes(SCOPES);
  $client->setAuthConfigFile(CLIENT_SECRET_PATH);

 // echo "setting auth config file";
  $client->setAccessType('offline');

  // Load previously authorized credentials from a file.
  $credentialsPath = expandHomeDirectory(CREDENTIALS_PLANETRICH_PATH);
 // echo "cred path " . $credentialsPath;
  if (file_exists($credentialsPath)) {

    $accessToken = file_get_contents($credentialsPath);
  //  echo "access token got";
  } else {

    // Exchange authorization code for an access token.
    $accessToken = $client->authenticate($authCode);

    // Store the credentials to disk.
    if(!file_exists(dirname($credentialsPath))) {
      mkdir(dirname($credentialsPath), 0700, true);
    }

    file_put_contents($credentialsPath, $accessToken);

  }

//  echo $accessToken;

  $client->setAccessToken($accessToken);

  // Refresh the token if it's expired.
  if ($client->isAccessTokenExpired()) {

    $client->refreshToken($client->getRefreshToken());
    file_put_contents($credentialsPath, $client->getAccessToken());
  }
  return $client;
}


/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getSBUClient() {

//echo "getting client";

  $client = new Google_Client();
  $client->setApplicationName(APPLICATION_NAME);
  $client->setScopes(SCOPES);
  $client->setAuthConfigFile(CLIENT_SECRET_PATH);

 // echo "setting auth config file";
  $client->setAccessType('offline');

  // Load previously authorized credentials from a file.
  $credentialsPath = expandHomeDirectory(CREDENTIALS_SBU_PATH);
 // echo "cred path " . $credentialsPath;
  if (file_exists($credentialsPath)) {

    $accessToken = file_get_contents($credentialsPath);
  //  echo "access token got";
  } else {

    // Exchange authorization code for an access token.
    $accessToken = $client->authenticate($authCode);

    // Store the credentials to disk.
    if(!file_exists(dirname($credentialsPath))) {
      mkdir(dirname($credentialsPath), 0700, true);
    }

    file_put_contents($credentialsPath, $accessToken);

  }

//  echo $accessToken;

  $client->setAccessToken($accessToken);

  // Refresh the token if it's expired.
  if ($client->isAccessTokenExpired()) {

    $client->refreshToken($client->getRefreshToken());
    file_put_contents($credentialsPath, $client->getAccessToken());
  }
  return $client;
}

/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path) {
  $homeDirectory = getenv('HOME');

  if (empty($homeDirectory)) {
    $homeDirectory = getenv("HOMEDRIVE") . getenv("HOMEPATH");
  }
  return str_replace('~', realpath($homeDirectory), $path);
}


function parseGoogleCalendar($res, $cssClass)
{

    $id =0;
    $processedItems = $res->getItems();

    //$jsonRes->results = $results->getSummary();

    $resArr = Array();

    if (count($processedItems) == 0)
    {

    }

    else
    {

        foreach ($processedItems as $event)
        {

          $processedEvent = new stdClass();

          $start = $event->start->dateTime;
          $end = $event->end->dateTime;

          if (empty($start)) {
            $start = $event->start->date;
          }

          if(empty($end)) {
            $end = $event->end->date;
          }

          if(empty($end)) {
            $end = $start;
          }

          $id++;

          $processedEvent->id = $id;
          $processedEvent->start = $start;
          $processedEvent->end = $end;
          $processedEvent->title = $event->getSummary();
          $processedEvent->summary= $event->getSummary();
          $processedEvent->calendar= $res->getSummary();
          $processedEvent->details = $event->getDescription();
          $processedEvent->cssClass= $cssClass;

          $resArr[] = $processedEvent;


        }
    }

    return $resArr;
}


  $jsonRes = new stdClass();

$jsonRes = Array();

// Get the API client and construct the service object.
$planetrichClient = getPlanetRichClient();
$service = new Google_Service_Calendar($planetrichClient);

// Print the next 10 events on the user's calendar.
$calendarId = 'primary';
$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => date('c'),
);

$results = $service->events->listEvents($calendarId, $optParams);

$jsonRes = array_merge($jsonRes, parseGoogleCalendar($results, 'planetrich-primary planetrich'));



// Print the next 10 events on the user's calendar.
$calendarId = '#contacts@group.v.calendar.google.com';

$maxDate = new DateTime();
$maxDate->modify('+ 14 days');


$optParams = array(
  'maxResults' => 10,
  'orderBy' => 'startTime',
  'singleEvents' => TRUE,
  'timeMin' => date('c'),
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
  'timeMin' => date('c'),
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
  'timeMin' => date('c'),
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
  'timeMin' => date('c'),
  'timeMax' => $maxDate->format(DateTime::ISO8601),

);

$results = $service->events->listEvents($calendarId, $optParams);

$jsonRes = array_merge($jsonRes, parseGoogleCalendar($results, 'sbu-holidays sbu'));






echo json_encode($jsonRes);
