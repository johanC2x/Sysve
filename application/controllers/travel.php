<?php

require_once ("secure_area.php");

class Travel extends Secure_area {

	function __construct(){
		parent::__construct();
		$this->load->model("customer");
	}

	function index(){
		$this->load->view('travel/index');
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

}

?>