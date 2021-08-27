<?php

namespace App\Controllers;
use App\Models\ThemesModel;
use App\Models\SettingsModel;

class Settings extends BaseController
{

	public function index($msg = null)
	{
        helper("functions");
        $themesModel = new ThemesModel();
        $settingsModel = new SettingsModel();
		$data['myTheme'] = $settingsModel->where('setting_description', 'theme')->first(); //get the theme value chosen
		$data['theme'] = $themesModel->where('theme_id', $data['myTheme']['value'])->first(); //find the theme details for chosen user theme
		$data['feed'] = $settingsModel->where('setting_description', 'rss_feed')->first(); //find rss feed
		$data['weather_location'] = $settingsModel->where('setting_description', 'weather_location')->first(); //find weather location
		$data['system'] = $settingsModel->where('setting_description', 'system')->first();
		$data['timezone'] = $settingsModel->where('setting_description', 'timezone')->first();
		$data['weather_api'] = $settingsModel->where('setting_description', 'weather_api')->first();
		
		if ($msg) {
			$data['message'] = $msg;
		}
		
        echo view('header', $data);
        echo view('settings_view',$data);
        echo view('footer');
		
	}
	
	public function themes()
	{
        helper("functions");
        $themesModel = new ThemesModel();
        $settingsModel = new SettingsModel();
		$data['myTheme'] = $settingsModel->where('setting_description', 'theme')->first(); //get the theme value chosen
		$data['theme'] = $themesModel->where('theme_id', $data['myTheme']['value'])->first(); //find the theme details for chosen user theme

		//get all themes
		$data['allThemes'] = $themesModel->findAll();
		
        echo view('header', $data);
        echo view('themes_view',$data);
        echo view('footer');
	}
	
	
	public function update_theme($id)
	{
        $settingsModel = new SettingsModel();
        
        $data = [
            'setting_description' => "theme",
            'value'  => $id,
        ];
        //$settingsModel->set('name', $name);
        
        //theme's setting is number 1
        $settingsModel->update("1", $data);
        
        return $this->response->redirect(site_url('/Settings/Themes'));
	}

	public function update_feed()
	{
        $value_text = $this->request->getVar('rss_feed');
        
        $settingsModel = new SettingsModel();
        
        $data = [
            'setting_description' => "rss_feed",
            'value_text'  => $value_text,
        ];
        
        $settingsModel->update("2", $data);
        //if success
        $output['message'] = "Success";
        
        return $this->response->redirect(site_url('/Settings'));
	}
	

	public function update_weather_location()
	{
        $value_text = $this->request->getVar('weather_city');
        
        $settingsModel = new SettingsModel();
        
        $data = [
            'setting_description' => "weather_location",
            'value_text'  => $value_text,
        ];
        
        //print_r ($data);

        $settingsModel->update("3", $data);
        
        return $this->response->redirect(site_url('/Settings'));
	}

	public function update_system()
	{
        $value_text = $this->request->getVar('weather_system');
        
        $settingsModel = new SettingsModel();
        
        $data = [
            'setting_description' => "system",
            'value_text'  => $value_text,
        ];
        
        //print_r ($data);

        $settingsModel->update("4", $data);
        
        return $this->response->redirect(site_url('/Settings'));
	}

	public function update_timezone()
	{
        $value_text = $this->request->getVar('timezone');
        
        $settingsModel = new SettingsModel();
        
        $data = [
            'setting_description' => "timezone",
            'value_text'  => $value_text,
        ];
        
        //print_r ($data);

        $settingsModel->update("5", $data);
        
        return $this->response->redirect(site_url('/Settings'));
	}


	public function update_weather_api()
	{
        $value_text = $this->request->getVar('weather_api');
        
        $settingsModel = new SettingsModel();
        
        $data = [
            'setting_description' => "weather_api",
            'value_text'  => $value_text,
        ];
        
        $settingsModel->update("6", $data);
        
        return $this->response->redirect(site_url('/Settings'));
	}
	
	
	
}
