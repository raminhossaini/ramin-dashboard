<?php

namespace App\Controllers;

use App\Models\SitesModel;
use App\Models\SiteLinksModel;
use App\Models\ThemesModel;
use App\Models\SettingsModel;

class Home extends BaseController
{
	public function index()
	{
        $sitesModel = new SitesModel();
        $linksModel = new SiteLinksModel();
        $themesModel = new ThemesModel();
        $settingsModel = new SettingsModel();
        
        $data['sites'] = $sitesModel->orderBy('sort_order', 'ASC')->findAll();
		
		
		//Fix URL display
		$urls = $linksModel->orderBy('sort_order', 'ASC')->findAll();

		for ($i = 0; $i < count($urls); $i++)
		{
			$MAX_LENGTH = 30;
			$urls[$i]['link_display'] = $urls[$i]['link_url'];
			
			$urls[$i]['link_display'] = str_replace("http://","",$urls[$i]['link_display']); //remove http
			$urls[$i]['link_display'] = str_replace("https://","",$urls[$i]['link_display']); //remove https
			$urls[$i]['link_display'] = str_replace("www.","",$urls[$i]['link_display']); //remove www
			
			if (mb_strlen($urls[$i]['link_display']) > $MAX_LENGTH) {
				$urls[$i]['link_display'] = substr($urls[$i]['link_display'],0,$MAX_LENGTH); //truncate if longer than $MAX_LENGTH
				$urls[$i]['link_display'] = $urls[$i]['link_display']."..."; //add ... if it has been truncated
			}
			
			$urls[$i]['link_display'] = rtrim($urls[$i]['link_display'],"/");	//remove trailing slash
		}
		$data['links'] = $urls;
		
		
		
		//get the theme value chosen
		$data['myTheme'] = $settingsModel->where('setting_description', 'theme')->first();
		
		//find the theme details for chosen user theme
		$data['theme'] = $themesModel->where('theme_id', $data['myTheme']['value'])->first();
		
		
		//weather
		$ch = curl_init();
		$url = base_url().'/weather';
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);
		$data['weather'] = json_decode($response);
		
		//stats
		$ch = curl_init();
		$url = base_url().'/stats';
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);
		$data['stats'] = json_decode($response);
		
		
		echo view('header', $data);
		echo view('home', $data);
		echo view('footer');
	}
	
	
	
}
