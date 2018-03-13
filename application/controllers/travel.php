<?php

require_once ("secure_area.php");

class Travel extends Secure_area {

	function __construct(){
		parent::__construct();
		$this->load->model("property");
		$this->load->model("customer");
		$this->load->model("travelmodel");
	}

	function index(){
		$data["property"] = $this->property->getListPropertyModule("travel");
		$this->load->view('travel/index',$data);
	}

	function search(){
		$this->load->model('TravelModel');
		$key = $this->input->post('key');
		$data = $this->TravelModel->get_customer_info($key);
		echo json_encode($data);
	}

	function suggest(){
		$response = [];
		$suggestions = $this->customer->get_search_customer($this->input->post('key'),20);
		if(sizeof($suggestions) > 0){
			$response["success"] = true;
			foreach ($suggestions as $key => $value) {
				$response["data"][$key] = array(
					"person_id" => $value["person_id"],
					"value" => $value["name"],
				);
			}
		}else{
			$response["success"] = false;
		}
		echo json_encode($response);
	}

	function info(){
		$response = [];
		$customer = $this->customer->get_info($this->input->post('person_id'));
		if(!empty($customer->person_id)){
			$response['success'] = true;
			$response['data'] = $customer;
		}else{
			$response['success'] = false;
		}
		echo json_encode($response);
	}

	function registerTravel(){
		$response = [];
		$travel_data = array(
			'code'=>$this->input->post('code_travel'),
			'name'=>$this->input->post('name_travel'),
			'destiny_origin'=>$this->input->post('destiny_origin_travel'),
			'destiny_end'=>$this->input->post('destiny_end_travel'),
			'date_init'=>$this->input->post('date_init_travel'),
			'date_end'=>$this->input->post('date_end_travel')
		);
		$res_travel = $this->travelmodel->saveTravel($travel_data);
		if($res_travel["success"]){
			$travel_customer_data = array(
				'customer_id' => $this->input->post('customer_id'),
				'travel_id' => $res_travel["travel"]
			);
			$res_cus_travel = $this->travelmodel->saveTravelCustomer($travel_customer_data);
			if($res_cus_travel["success"]){
				return ["success" => true];
			}else{
				return ["success" => false];
			}
		}else{
			return ["success" => false];
		}
	}

	function updateCustomer($customer_id = null){
		$data = [];
		$customer = $this->customer->get_info($customer_id);
		$data["travel_detail"] = array(
			"window_travel_detail"  => $this->input->post("window_travel_detail"),
			"pas_travel_detail"  => $this->input->post("pas_travel_detail"),
			"mill_travel_detail"  => $this->input->post("mill_travel_detail"),
			"visa_travel_detail"  => $this->input->post("visa_travel_detail"),
			"vacuna_travel_detail"  => $this->input->post("vacuna_travel_detail")
		);
		$responseCustomer = $this->customer->updateCustomerData($customer_id,json_encode($data));
		if($responseCustomer){
			echo json_encode(["success" => true]);
		}else{
			echo json_encode(["success" => false]);
		}
	}

}

?>