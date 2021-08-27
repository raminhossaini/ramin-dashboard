<?php 
namespace App\Controllers;
use App\Models\SitesModel;
use App\Models\SiteLinksModel;
use App\Models\ThemesModel;
use App\Models\SettingsModel;

use CodeIgniter\Controller;

class Links extends Controller
{
    // show Links list
    public function index($site_id) {
        helper("functions");

        $linksModel = new SiteLinksModel();
        $themesModel = new ThemesModel();
        $settingsModel = new SettingsModel();
        
		//get the theme value chosen
		$data['myTheme'] = $settingsModel->where('setting_description', 'theme')->first();

		//find the theme details for chosen user theme
		$data['theme'] = $themesModel->where('theme_id', $data['myTheme']['value'])->first();
        
        
        $data['site_id'] = $site_id;
        $data['links'] = $linksModel->where(['sites_id' => $site_id])->orderBy('sort_order DESC ')->findAll();
        
        echo view('header',$data);
        echo view('links_view', $data);
        echo view('footer');
    }

    // insert data
    public function store($id) {
        $linksModel = new SiteLinksModel();
        $data = [
            'link_description' => $this->request->getVar('link_description'),
            'link_url'  => strtolower($this->request->getVar('link_url')),
            'link_icon'  => $this->request->getVar('link_icon'),
            'sites_id'  => $id,
            'sort_order'  => $this->request->getVar('sort_order'),
        ];

        $linksModel->insert($data);
        return $this->response->redirect(site_url('/Links/index/'.$id));
    }

    // show single site
    public function edit($id) {
        helper("functions");

        $linksModel = new SiteLinksModel();
        $themesModel = new ThemesModel();
        $settingsModel = new SettingsModel();
        
		//get the theme value chosen
		$data['myTheme'] = $settingsModel->where('setting_description', 'theme')->first();

		//find the theme details for chosen user theme
		$data['theme'] = $themesModel->where('theme_id', $data['myTheme']['value'])->first();
        
        $data['links_obj'] = $linksModel->where('link_id', $id)->first();

        echo view('header',$data);
        //echo view('admin_nav', $data);
        echo view('links_edit', $data);
        echo view('footer');
        
    }

    // update site data
    public function update($link_id){
        $linksModel = new SiteLinksModel();
        
        $data = [
            'link_description' => $this->request->getVar('link_description'),
            'link_url'  => $this->request->getVar('link_url'),
            'link_icon'  => $this->request->getVar('link_icon'),
            'sites_id'  => $this->request->getVar('site_id'),
            'sort_order'  => $this->request->getVar('sort_order'),
        ];
        $linksModel->update($link_id, $data);
        return $this->response->redirect(site_url('/Links/index/'.$this->request->getVar('site_id')));
    }
 
    // delete site
    public function delete($id, $site_id){
        $linksModel = new SiteLinksModel();
        $data['links'] = $linksModel->where('link_id', $id)->delete($id);
        return $this->response->redirect(site_url('/Links/index/'.$site_id));
    }    
}