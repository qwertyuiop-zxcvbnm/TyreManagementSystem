<?php
defined ('BASEPATH') or exit('No Direct Script Allowed');

if (!function_exists('get_foreign_key'))
{
	function get_foreign_key($table_column_id,$table_name,$table_column_name,$table_column_value){
		$ci=& get_instance();
		$FK;
		$ci->db->select($table_column_id);
		$ci->db->from($table_name);
		$ci->db->where($table_column_name,$table_column_value);
		$query=$ci->db->get();
		$data_id=$query->row_array();
        $FK=$data_id[$table_column_id];
		
		return $FK;
	}
	
}

if (!function_exists('get_joined_data'))
{
   function get_joined_data($table,$fields,$join_fields)
  {
	    $ci=& get_instance();
		foreach($fields as $coll => $value){
			$ci->db->select($value);
		}
	
		$ci->db->from($table);
	
		foreach($join_fields as $coll => $value){
			$ci->db->join($coll, $value);
		}
	
		$query = $ci->db->get();
		return $query->result();
		
		
		
		
	
	}
	 
  }






