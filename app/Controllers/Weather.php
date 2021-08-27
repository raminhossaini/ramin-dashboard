<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Controllers;
use App\Models\SitesModel;
use App\Models\SiteLinksModel;
use App\Models\ThemesModel;
use App\Models\SettingsModel;

class Weather extends BaseController {


	public function index()
	{
        $settingsModel = new SettingsModel();
		$data['weather_location'] = $settingsModel->where('setting_description', 'weather_location')->first(); //find weather location
		$data['weather_api'] = $settingsModel->where('setting_description', 'weather_api')->first();
		$data['system'] = $settingsModel->where('setting_description', 'system')->first();
		$locale = $data['weather_location']['value_text'];
		$system = $data['system']['value_text'];
		$timezone = $data['timezone']['value_text'];
		
		if ($system == "Metric") {
			$temperature_symbol = "°C";
		}
		else {
			$temperature_symbol = "°F";
		}
		
		$apiKey = $data['weather_api']['value_text'];
		$googleApiUrl = "api.openweathermap.org/data/2.5/weather?q=".$locale."&units=".$system."&appid=" . $apiKey;
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		
		curl_close($ch);
		$data = json_decode($response);
		$currentTime = time();
		date_default_timezone_set($timezone);
		
		echo json_encode(array(
			"time"=>date("l g:i a", $currentTime),
			"date"=>date("jS F, Y",$currentTime),
			"place"=>ucwords($data->name),
			"humidity"=>$data->main->humidity,
			"speed"=>$data->wind->speed,
			"description"=>$data->weather[0]->description,
			"icon"=>$data->weather[0]->icon.".png",
			"temp"=>$data->main->temp . $temperature_symbol,
			"temp_max"=>$data->main->temp_max,
			"temp_min"=>$data->main->temp_min
			));

	}
}