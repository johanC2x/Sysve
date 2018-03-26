<?php 

	class Customer_travel extends CI_Model{

		function update($customer_travel_data = null,$travel_id){
			$this->db->where('travel_id', $travel_id);
			$success = $this->db->update('customer_travel',$customer_travel_data);
			return $success;
		}

	}


 ?>