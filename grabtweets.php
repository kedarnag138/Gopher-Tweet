<?php

//We use already made Twitter OAuth library
//https://github.com/mynetx/codebird-php
require_once ('codebird.php');

//Twitter OAuth Settings, enter your settings here:
$CONSUMER_KEY = 'vyQIUS9JXl6DfhBhpQta5HvVK';
$CONSUMER_SECRET = 'qt8uwNieVrMWTo6y9uMDJCmYx2JHDvLZZbGe5hNdTBev8ZEOo6';
$ACCESS_TOKEN = '2217330260-O3YCzBzdO8HRkhzvC7iXFcIE6PFsuFmedWjpBDt';
$ACCESS_TOKEN_SECRET = '6xGPzAXbRbCP0Lga2oTd7w5NPb7ddFTboOJkmWHTLTkPl';

//Get authenticated
Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);
$cb = Codebird::getInstance();
$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);

/*
//retrieve posts
$q = $_POST['q'];
$count = $_POST['count'];
$api = "statuses_userTimeline";//$_POST['api'];
*/

// $q = "%23cio100selfie OR %23cio100";
// #justgopherit #goqwinix #gopherconindia 
$q = "%23justgopherit OR %23goqwinix OR %23gopherconindia;
$count = 21;
$api = "search_tweets";

//https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
//https://dev.twitter.com/docs/api/1.1/get/search/tweets
$params = array(
	'screen_name' => $q,
	'q' => $q,
	'count' => $count
);

//Make the REST call
$data = (array) $cb->$api($params);

//Output result in JSON, getting it ready for jQuery to process
echo json_encode($data);

?>
