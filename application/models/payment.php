<?php 

	class Payment extends CI_Model{

		function save($payment_data = null){
			if($this->db->insert('payment',$payment_data)){
				return ["success" => true , "payment" => $this->db->insert_id()];
			}else{
				return ["success" => false];
			}
		}

		function getByCode($code = null){
			$this->db->select('payment.*');
			$this->db->from('payment_detail');
			$this->db->join('travel','travel.id=payment_detail.travel_id');
			$this->db->join('payment','payment.id=payment_detail.payment_id');
			$this->db->where('travel.code', $code);
			$query =  $this->db->get();
			return $query->row();
		}

	}

 ?>