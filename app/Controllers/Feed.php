<?php

namespace App\Controllers;

use App\Models\SettingsModel;
use App\Libraries\RSSParser;

class Feed extends BaseController
{
	public function index()
	{
        $settingsModel = new SettingsModel();
		$data['rss_feed'] = $settingsModel->where('setting_description', 'rss_feed')->first(); //get the theme value chosen
		
		$rss = new RSSParser();
		
		//news
		$rss->set_feed_url($data['rss_feed']['value_text']);
		$data['rss'] = $rss->getFeed(10);
		
		foreach ($data['rss'] as $news) {
			//text-muted class for grey
			echo("<p class='mb-0 mt-0'><a class='' style='text-decoration:none;' href=".$news['link'].">".$news['title']."</a></p>");
		}
	}
	
}
