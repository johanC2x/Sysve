<?php

class Property extends CI_Model {

	function getListParent(){
		$this->db->from('property');
		$this->db->where('property.parent_id',0);
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}

	function getListParentModule(){
		$this->db->from('property');
		$this->db->where('property.parent_id',0);
		$this->db->where('property.module_id','customer');
		$this->db->order_by('property.sort',"asc");
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}

	function getListPropertyModule($module = null){
		$this->db->from('property');
		$this->db->where('property.parent_id',0);
		$this->db->where('property.module_id',$module);
		$this->db->order_by('property.sort',"asc");
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}

	function getListByParent($parent_id = null){
		$this->db->from('property');
		$this->db->where('property.parent_id',$parent_id);
		$query = $this->db->get();
        $data = $query->result_array();
        return $data;
	}

}

?>