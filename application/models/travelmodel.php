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

	function get_solicitud($key){
		$this->db->like('code',$key);
		$data = $this->db->from('travel');
		return $this->db->get();
	}

}