<?php 

class Code extends CI_Model{

	function listByCode($code = null){
		$this->db->from('code');
		$this->db->where('type',$code);
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}

}

?>