<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {

	function create($table, $data) {
		$this->db->insert($table,$data);
	}

	//read params: $select $table $where $order $join, $contains
	function read($select, $table, $where="", $order="",$join=array(), $containsDataTables=false, $group="") {
		if ( !empty($where) ) $this->db->where($where);
		if ( !empty($order) ) $this->db->order_by($order,'asc');
		if ( !empty($group) ) $this->db->group_by($group);
        $select_mod = array();
        
		$this->db->distinct();
        $this->db->select($select);
		
		if(!empty($join)) {
			foreach($join as $key=>$props) {
				$this->db->join($props['table'], $props['fkey']);
			} 
		}
        
		$query_tmp = $this->db->from($table);
		$query = $query_tmp->get();
		
		if ($query AND $query->num_rows() != 0) {
			return $query->result();
		} else {
			return array();
		}
	}
	
	function update($table, $where, $data) {
        $permit = true;

        if($permit==true) {
                $this->db->where($where);
		      $this->db->update($table, $data);
        } else {
            exit("Operation not allowed");
        }
        

	}
	
	function delete($table, $where) {
        $permit = true;

        if($permit==true) {
                $this->db->where($where);
		      $this->db->delete($table);	
        } else {
            exit("Operation not allowed");
        }
        
			
	}
}