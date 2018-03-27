<?php
class TravelModel extends CI_Model
{
	function get_customer_info($key){
		$this->load->model('Person');
		$data = $this->Person->get_info_by_name($key);
		return $data;
	}

	function saveTravel($travel_data = null){
		if($this->db->insert('travel',$travel_data)){
			return ["success" => true , "travel" => $this->db->insert_id()];
		}else{
			return ["success" => false];
		}
	}

	function saveTravelCustomer($travel_data = null){
		if($this->db->insert('customer_travel',$travel_data)){
			return ["success" => true , "travel" => $this->db->insert_id()];
		}else{
			return ["success" => false];
		}
	}

	function getTravelCode(){
		$this->db->select_max('id');
		$data = $this->db->from('travel');
		$query = $this->db->get();
		return $query->row();
	}

	function getLastTravelInfo($travel_id){
		$this->db->from('travel');
		$this->db->join('customer_travel','travel.id=customer_travel.travel_id');
		$this->db->join('customers','customer_travel.customer_id=customers.person_id');
		$this->db->join('people','customers.person_id=people.person_id');
		$this->db->where('travel.id', $travel_id);
		$query =  $this->db->get();
		return $query->row();
	}

	function getSearchTravel(){

	}

	function get_solicitud($array_search){
		$this->db->select('travel.*,customer_travel.*,people.*');
		$this->db->where('customer_travel.type_state_travel_id',2);
		if(isset($array_search["code_travel"]) && !empty($array_search["code_travel"])){
			$this->db->like('code',$array_search["code_travel"]);
		}
		if(isset($array_search["document_travel"]) && !empty($array_search["document_travel"])){
			$this->db->like('customers.person_id',$array_search["document_travel"]);
		}
		if(isset($array_search["customer_travel"]) && !empty($array_search["customer_travel"])){
			//$this->db->like('people.first_name',$array_search["customer_travel"]);
			$this->db->like('people.last_name',$array_search["customer_travel"]);
		}
		$this->db->from('travel');
		$this->db->join('customer_travel','travel.id=customer_travel.travel_id');
		$this->db->join('customers','customer_travel.customer_id=customers.person_id');
		$this->db->join('people','customers.person_id=people.person_id');	
		$query =  $this->db->get();
		//echo "<pre/>";print_r($this->db->last_query());exit();
		return $query->result_array();
	}

	function getConfiguration(){
		$data = $this->db->from('app_config');
		$keys = array('address','company', 'ruc');
		$this->db->where_in('key',$keys);
		$query = $this->db->get();
		// var_dump($query);
		$resultado = [];
		foreach($query->result() as $row){
			$resultado[] = array(
				"key" => $row->key,
				"value" => $row->value
			);
		}

		return $resultado;
	}

}