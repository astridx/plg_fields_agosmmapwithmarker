<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  plg_fields_agosmmapwithmarker
 *
 * @copyright   Copyright (C) 2005 - 2018 Astrid Günther, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later;
 * @link        astrid-guenther.de
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;

defined('_JEXEC') or die;

if (!$field->value || $field->value == '-1')
{
	return;
}

$value = $field->rawvalue;

// Include skripts/styles to the header
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::root(true) . '/media/plg_fields_agosmmapwithmarker/leaflet/leaflet.css');
$document->addScript(JURI::root(true) . '/media/plg_fields_agosmmapwithmarker/leaflet/leaflet.js');

$document->addScript(JURI::root(true) . '/media/plg_fields_agosmmapwithmarker/js/site-agosmmapwithmarker.js');
$document->addStyleSheet(JURI::root(true) . '/media/plg_fields_agosmmapwithmarker/css/site-agosmmapwithmarker.css');

$unique = $field->id . '_' . uniqid();

$address = JFilterOutput::stringURLSafe($field->rawvalue);




	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://nominatim.openstreetmap.org/search?q=".$address."&format=json",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_REFERER => JPATH_BASE,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
	));

	$response = curl_exec($curl);

	$lat = 51.505;
	$lon = -0.09;

	if (!$obj = json_decode($response))
	{
		echo $response;
		/*
		 * You have been blocked because you have violated the usage policy of OSM's Nominatim geocoding service. Please be aware that OSM's resources are limited and shared between many users. The usage policy is there to ensure that the service remains usable for everybody.
		 * Please review the terms and make sure that your software adheres to the terms. You should in particular verify that you have set a +valid referrer or a user agent that identifies your application, and that you are not overusing the service with massive bulk requests.
		 * If you feel that this block is unjustified or remains after you have adopted your usage, you may contact the Nominatim system administrator at nominatim@openstreetmap.org to have this block lifted.
		 */
	} else {
		$lat = $obj[0]->lat;
		$lon = $obj[0]->lon;
	}
	
	$err = curl_error($curl);

	if ($err)
	{
		echo "cURL Error #:" . $err;
	}

	curl_close($curl);
?>




<div
	id="map<?php echo $unique ?>"
	class = 'leafletmap' 
	style="height: <?php echo $fieldParams->get('map_height', '400') ?>px;"
	data-unique='<?php echo $unique ?>'
	data-lat='<?php echo $lat ?>'
	data-lon='<?php echo $lon ?>'
>
</div>
