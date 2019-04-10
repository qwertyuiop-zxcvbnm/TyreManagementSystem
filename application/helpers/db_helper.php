<?php
defined ('BASEBATH') or exit('No Direct Script Allowed');

if (!function_exists('get_foreign_key'))
{
	function get_foreign_key($table_column_id,$table_name,$table_column_name,$table_column_value){
		
		$FK;
		$this->db->select($table_column_id);
		$this->db->from($table_name);
		$this->db->where($table_column_name,$table_column_value);
		$query=$this->db->get();
		$data_id=$query->row_array();
        $FK=$data_id[0];
		
		return $FK;
	}
	
}




