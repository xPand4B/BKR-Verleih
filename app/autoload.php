<?php
// Create environment variables for project
require_once dirname(__DIR__) . '/config.php';
$count;

foreach($config as $topic => $subtopic){
    // echo $topic . '<br>';
    $count = 0;
    // print_r($subtopic);

    foreach($subtopic as $value){
        $temp = array_keys($subtopic);
        $setting = $temp[$count] . '=' . $value;
        putenv($setting);
        // echo $setting . '<br>';

        if(sizeof($temp) != $count+1){
            $count++;
        }
    }
    // echo '<br><br>';
}

// Check if settings aren't empty
if(empty(getenv('currentVersion')) || empty(getenv('development')) || empty(getenv('production'))){
    die('Something went wrong. Please check your config file for missing settings.');
}

if(getenv('development') == 'true'){
    if(empty(getenv('DB_DEV_HOST'))  || empty(getenv('DB_DEV_USERNAME'))  || empty(getenv('DB_DEV_DATABASE'))){
        die('Something went wrong. Pleases check your config file for missing database settings.');
    }
}

if(getenv('production') == 'true'){
    if(empty(getenv('DB_LIVE_HOST'))  || empty(getenv('DB_LIVE_USERNAME'))  || empty(getenv('DB_LIVE_DATABASE'))){
        die('Something went wrong. Pleases check your config file for missing database settings.');
    }
}