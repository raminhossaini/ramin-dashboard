<?php 
namespace App\Controllers;
use App\Models\SitesModel;
use App\Models\ThemesModel;
use App\Models\SettingsModel;

use CodeIgniter\Controller;

class Sites extends Controller
{

    // show users list
    public function index() {
        helper("functions");

        $sitesModel = new SitesModel();
        $themesModel = new ThemesModel();
        $settingsModel = new SettingsModel();
        
		//get the theme value chosen
		$data['myTheme'] = $settingsModel->where('setting_description', 'theme')->first();
		//find the theme details for chosen user theme
		$data['theme'] = $themesModel->where('theme_id', $data['myTheme']['value'])->first();
        
        $data['sites'] = $sitesModel->orderBy('sort_order', 'DESC')->findAll();
        
        
        echo view('header', $data);
        //echo view('admin_nav', $data);
        echo view('sites_view', $data);
        echo view('footer');
    }

    // show single site
    public function edit($id = null) {
        helper("functions");

        $sitesModel = new SitesModel();
        $themesModel = new ThemesModel();
        $settingsModel = new SettingsModel();
        
		//get the theme value chosen
		$data['myTheme'] = $settingsModel->where('setting_description', 'theme')->first();
		//find the theme details for chosen user theme
		$data['theme'] = $themesModel->where('theme_id', $data['myTheme']['value'])->first();


        $data['sites_obj'] = $sitesModel->where('site_id', $id)->first();
        echo view('header', $data);
        //echo view('admin_nav');
        echo view('sites_edit', $data);
        echo view('footer');
    }

    // update site data
    public function update($id) {
        $sitesModel = new SitesModel();
        
        $data = [
            'site_description' => $this->request->getVar('site_description'),
            'sort_order'  => $this->request->getVar('sort_order'),
        ];

        $sitesModel->update($id, $data);
        return $this->response->redirect(site_url('/sites'));
    }
    
    
    public function create(){
        return view('sites_add');
    }
 
    // insert data
    public function store() {
        $sitesModel = new SitesModel();
        $data = [
            'site_description' => $this->request->getVar('site_description'),
            'sort_order'  => $this->request->getVar('sort_order'),
        ];

        $sitesModel->insert($data);
        return $this->response->redirect(site_url('/sites'));
    }

 
    // delete site
    public function delete($id) {
        $sitesModel = new SitesModel();
        $data['sites_obj'] = $sitesModel->where('site_id', $id)->delete($id);
        return $this->response->redirect(site_url('/sites'));
    }    
    
    
    
}