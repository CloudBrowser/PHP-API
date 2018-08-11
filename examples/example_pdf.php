<?php

require "autoload.php";

use CloudBrowser\Adapter\EndPoint\Pdf;

# set key for demo
define('CLOUDBROWSER_PRIV_KEY', 'REPLACE WITH YOUR KEY HERE');

# set to true to ignore TLS errors (use only for testing)
define('CLOUDBROWSER_IGNORE_CA', true);

# domain for which to make a screenshot
$source = 'google.com';

# Create a new instance of Pdf
# This is not required with each call, only the first
$Pdf = new Pdf(CLOUDBROWSER_PRIV_KEY);

$options = [
	'capture_export_format' => 'A5'
];

# set the source for the query
$Pdf->setPayload($source, $options);

# Perform the query and store the resulting object 
$Result = $Pdf->run();

# check for successful execution
if (!$Result->isSuccessful()) {
	# query failed, print the reason
	echo 'Lookup failed (' . $Result->getStatusCode() . '): ' . $Result->getStatusMessage();
} else {
	# get the result of the successful query as an array (default) 
	$dataArray = $Result->getDataArray();
	echo '<object width="100%" height="100%" type="application/pdf" data="' . $dataArray['prefix'] . $dataArray['base64'] . '">
                PDF could not be displayed
            	</object>';
}