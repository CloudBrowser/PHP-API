<?php

require "autoload.php";

use CloudBrowser\Adapter\EndPoint\Screenshot;

# set key for demo
define('CLOUDBROWSER_PRIV_KEY', 'REPLACE WITH YOUR KEY HERE');

# set to true to ignore TLS errors (use only for testing)
define('CLOUDBROWSER_IGNORE_CA', true);

# url from which to make a screenshot
$url = 'google.com';

# Create a new instance of Screenshot
# This is not required with each call, only the first
$Screenshot = new Screenshot(CLOUDBROWSER_PRIV_KEY);

$options = [
	'client_width' => 1920,
	'client_height' => 1080,
	'capture_full_page' => 2
];

# set the url for the query
$Screenshot->setPayload($url, $options);

# Perform the query and store the resulting object 
$Result = $Screenshot->run();

# check for successful execution
if (!$Result->isSuccessful()) {
	# query failed, print the reason
	echo 'Lookup failed (' . $Result->getStatusCode() . '): ' . $Result->getStatusMessage();
} else {
	# get the result of the successful query as an array (default) 
	$dataArray = $Result->getDataArray();
	
	echo '<img src="' . $dataArray['prefix'] . $dataArray['base64'] . '" />';
}