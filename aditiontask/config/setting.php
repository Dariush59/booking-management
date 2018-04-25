<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

require __DIR__ . '/../vendor/jacwright/restserver/source/Jacwright/RestServer/RestServer.php';

require  __DIR__ . '/../src/BookingManagement/Controller/BannerController.php';
require  __DIR__ . '/../src/BookingManagement/Controller/CampaignController.php';

header( 'Content-Type: application/json' );

?>