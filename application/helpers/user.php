<?php
function getps($ps)
	{
		date_default_timezone_set('Asia/Kolkata');
        $today=date("Y-m-d");
		$ci =& get_instance();
		$ci->load->database();
		$sql="SELECT * from ps_name WHERE ps_id NOT IN ('".$ps."')";
		$query = $ci->db->query($sql);
		$row = $query->result_array();
		return $row;
	}

?>