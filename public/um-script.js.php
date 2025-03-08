<?php
// Set the correct content type
header('Content-Type: application/javascript');

// Set caching headers
header('Cache-Control: max-age=3600');
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');

// Fetch the script from Umami
$script = file_get_contents('https://cloud.umami.is/script.js');

// Output the script
echo $script; 