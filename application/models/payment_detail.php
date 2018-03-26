<?php 

	class Payment_detail extends CI_Model{

		function save($payment_detail_data = null){
			if($this->db->insert('payment_detail',$payment_detail_data)){
				return ["success" => true , "payment_detail" => $this->db->insert_id()];
			}else{
				return ["success" => false];
			}
		}

	}

 ?>