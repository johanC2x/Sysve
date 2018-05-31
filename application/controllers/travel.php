<?php

require_once ("secure_area.php");

class Travel extends Secure_area {

	function __construct(){
		parent::__construct();
		$this->load->model("property");
		$this->load->model("customer");
		$this->load->model("travelmodel");
		$this->load->model("code");
		$this->load->model("payment");
		$this->load->model("payment_detail");
		$this->load->model("customer_travel");
	}

	function index(){
		$data["property"] = $this->property->getListPropertyModule("travel");
		$data["property_customer"] = $this->property->getListPropertyModule("customer");
		$data["operator"] = $this->code->listByCode("travel_operator");
		$this->load->view('travel/new',$data);
	}

	function render(){
		$data["property"] = $this->property->getListPropertyModule("travel");
		$this->load->view('travel/index',$data);
	}

	function payment(){
		$data["type_dscto_payment"] = $this->code->listByCode("payment_dscto_type");
		$data["payment_type"] = $this->code->listByCode("payment_type");
		$this->load->view('travel/payment',$data);
	}

	/*function new(){
		$data["property"] = $this->property->getListPropertyModule("travel");
		$this->load->view('travel/new',$data);
	}*/

	function search(){
		$this->load->model('TravelModel');
		$key = $this->input->post('key');
		$data = $this->TravelModel->get_customer_info($key);
		echo json_encode($data);
	}

	function searchTravel(){
		$code_travel = $this->input->post('code_travel') ;
		$document_travel = $this->input->post('document_travel');
		$customer_travel = $this->input->post('customer_travel');
		$travel_id = $this->input->post('travel_id');
		$array_search = array(
			"code_travel" => $code_travel,
			"document_travel" => $document_travel,
			"customer_travel" => $customer_travel,
			"travel_id" => $travel_id
		);
		$response = $this->travelmodel->get_solicitud($array_search);
		echo json_encode($response);
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
					"address" => $value["address"],
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
		$data_travel["comisiones"] = $this->input->post('data');
		$data_cotizacion = $this->input->post('data_cotizacion');
		$travel_data = array(
			'code'=>$this->input->post('code_travel'),
			'name'=>$this->input->post('name_travel'),
			'destiny_origin'=>$this->input->post('destiny_origin_travel'),
			'destiny_end'=>$this->input->post('destiny_end_travel'),
			'date_init'=>$this->input->post('date_init'),
			'id' => $this->input->post('travel_id'),
			'date_end'=>$this->input->post('date_end'),
			'data_travel' => json_encode($data_travel),
			'data_cotizacion' => json_encode($data_cotizacion),
			// 'type_travel'=>$this->input->post('type_travel'),
		);
		$res_travel = $this->travelmodel->saveTravel($travel_data);
		if($res_travel["success"]){
			$travel_customer_data = array(
				'customer_id' => $this->input->post('customer_document'),
				'travel_id' => $this->input->post('travel_id'),
				'data' => json_encode($data_travel),
				'type_state_travel_id' => 2
			);
			$res_cus_travel = $this->travelmodel->saveTravelCustomer($travel_customer_data);
			if($res_cus_travel["success"]){
				echo json_encode(["success" => true, "travel" => $this->input->post('travel_id')]);
			}else{
				echo json_decode(["success" => false]);
			}
		}else{
			echo json_decode(["success" => false]);
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

	function getTravelCode(){
		$code = $this->travelmodel->getTravelCode();
		$code = $code->id;
		if(empty($code->id)){
			$code = 0;
		}
		echo 'TRAVEL'.$code;
	}


	function getLastTravelInfo(){
		$travel_id = $this->input->post('travel_id');
		$data = $this->travelmodel->getLastTravelInfo($travel_id);
		echo json_encode($data);
	}

	function solicitud(){
		$response = [];
		$suggestions = $this->travelmodel->get_solicitud($this->input->post('key'),20);
		echo json_encode($suggestions);
	}

	function getConfig(){
		$config = $this->travelmodel->getConfiguration();
		echo json_encode($config);
	}


	function savePayment(){
		//DATA FOR PAYMENT
		$dscto_type_id = $this->input->post("dscto_type_id");
	    $dscto = $this->input->post("dscto");
	    $payment_type_id = $this->input->post("payment_type_id");
	    $data_payment = $this->input->post("data");
	    $total = $this->input->post("total");
	    //$payment_state_id = ($payment_type_id === "24") ? 0:1;
	    $state_pay = $this->input->post("state_pay");
	    $payment_state_id = ($state_pay === "false") ? 0:1;
	    $payment_data = array(
	    	"total" => $total,
	    	"subtotal" => $total,
	    	"dscto" => $dscto,
	    	"dscto_type_id" => (!empty($dscto_type_id)) ? $dscto_type_id : 0,
	    	"payment_type_id" => $payment_type_id,
	    	"payment_state_id" => $payment_state_id,
	    	"igv" => 0,
	    	"data_payment" => $data_payment,
	    	"created_by" => $this->session->userdata["person_id"]
 	    );
	    $payment = $this->payment->save($payment_data);

	    //DATA FOR PAYMENT_DETAIL
	    $travels = explode(",", $this->input->post("travels"));
	    if(sizeof($travels) > 0 && !empty($payment)){
	    	foreach ($travels as $key => $value) {
	    		if(!empty($value)){
	    			$payment_detail_data = array(
	    				"travel_id" => $value,
	    				"payment_id" => $payment["payment"]
	    			);
	    			$payment_detail = $this->payment_detail->save($payment_detail_data);
	    			if($payment_state_id === 1){
	    				$customer_travel_data = array(
		    				"type_state_travel_id" => 3
		    			);
		    			$customer_travel = $this->customer_travel->update($customer_travel_data,$value);
	    			}
	    		}
	    	}
	    	echo json_encode(["success" => true]);
	    }else{
	    	echo json_encode(["success" => false]);
	    }
	}

	function anular(){
		$viaje = $this->input->post('id');
		$this->load->model('TravelModel');
		$this->travelmodel->anular($viaje);
		return '0';
	}


	function getByCode(){
		$code = $this->input->post("code");
		$data = $this->payment->getByCode($code);
		if(!empty($data)){
			$data_pay = json_encode(json_decode($data->data_payment));
			echo json_encode(["success" => true,"data" => $data]);
		}else{
			echo json_encode(["success" => false]);
		}
	}

	function getPayByCode(){
		$code = $this->input->post("code");
		$data = $this->payment->getByCode($code);
		if(!empty($data)){
			echo $data->data_payment;
		}else{
			echo null;
		}
	}

	function travel_edit($travelid){
		$data["property"] = $this->property->getListPropertyModule("travel");
		$data["property_customer"] = $this->property->getListPropertyModule("customer");
		$data["operator"] = $this->code->listByCode("travel_operator");
		if(empty($travelid)){
			$travelid = 0;
		}
		$data["travelid"] = $travelid;
		$this->load->view('travel/new',$data);
	}

}

?>