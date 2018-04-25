<?php 


$server = new \Jacwright\RestServer\RestServer('dev');
	
// $server->addClass('TestController');
$server->addClass('BannerController');	
$server->addClass('CampaignController');

$server->handle();

// use BookingManagement\Controller\CampaignController;

// $campaignController = new CampaignController();

// $campaignController->listCampaign();
