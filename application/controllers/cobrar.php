<?php

require_once ("secure_area.php");

class Cobrar extends Secure_area {

	function __construct(){
		parent::__construct();
		$this->load->model("property");
		$this->load->model("customer");
		$this->load->model('TravelModel');
		$this->load->model("code");
		$this->load->model("payment");
		$this->load->model("payment_detail");
		$this->load->model("customer_travel");
		// $this->load->model("cobrar");
	}

	function index(){
		$data["property"] = $this->property->getListPropertyModule("travel");
		$data["property_customer"] = $this->property->getListPropertyModule("customer");
		$data["operator"] = $this->code->listByCode("travel_operator");
		$this->load->view('cobrar/lista',$data);
	}

	function render(){
		$data["property"] = $this->property->getListPropertyModule("travel");
		$this->load->view('travel/index',$data);
	}

	function anular(){
		$viaje = $this->input->post('id');
		$this->load->model('TravelModel');
		$this->travelmodel->anular($viaje);
		return '0';
	}
}

?>