<?php 

	class Payment extends CI_Model{

		function save($payment_data = null){
			if($this->db->insert('payment',$payment_data)){
				return ["success" => true , "payment" => $this->db->insert_id()];
			}else{
				return ["success" => false];
			}
		}

	}

 ?>