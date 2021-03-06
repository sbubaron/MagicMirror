<?php

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