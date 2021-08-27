<?php
namespace App\Controllers;
use App\Models\Owm_city_listModel;

class City extends BaseController {

	public function index()
	{
		$Owm_city_listModel = new Owm_city_listModel();

		$search = $this->request->getVar("weather_city");
		$response = array();
		$data = array();
		
		$data = $Owm_city_listModel->like('owm_city_name', $search)->findAll();
		$Owm_city_listModel = new Owm_city_listModel();
		$cities = $Owm_city_listModel->select('owm_city_id,owm_city_name,owm_country')
									->like('owm_city_name',$search)
									->orderBy('owm_city_name')
									->findAll(10);
		
		foreach($cities as $city){
			$data_return[] = array(
			"city" => $city['owm_city_name'].", ".$city['owm_country']
			);
			}
		
		$response['data'] = $data_return;
		
		return $this->response->setJSON($response);

	}
}