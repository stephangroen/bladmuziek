<?php

require 'vendor/autoload.php';

Dotenv::load(__DIR__);

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    set_time_limit(300);

// Start
    $apiclient = new Bladmuziek\Api(getenv('DOMAIN'), getenv('APIKEY'));

// Retrieve open picklists
    $picklists = $apiclient->getAllPicklists(['status' => 'new']);

    foreach ($picklists['data'] as $picklist)
    {
        if (count($picklist['products']) === 1 && $picklist['products'][0]['productcode'] == '999998')
        {
            $apiclient->cancelPicklist($picklist['idpicklist']);
        }
    }

    echo 'Picklists cancelled.';
} else {
    echo '<form method="post"><input type="submit" value="Cancel shipping cost picklists" /></form>';
}