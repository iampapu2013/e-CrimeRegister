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

function getcrimehead($crimehead)
	{
		date_default_timezone_set('Asia/Kolkata');
        $today=date("Y-m-d");
		$ci =& get_instance();
		$ci->load->database();
		$sql="SELECT * from crime_head WHERE crime_head_id NOT IN ('".$crimehead."')";
		$query = $ci->db->query($sql);
		$row = $query->result_array();
		return $row;
	}

function getcrimemethod($crimehead)
	{
		date_default_timezone_set('Asia/Kolkata');
        $today=date("Y-m-d");
		$ci =& get_instance();
		$ci->load->database();
		$sql="SELECT * from crime_method WHERE crime_head_id IN ('".$crimehead."')";
		$query = $ci->db->query($sql);
		$row = $query->result_array();
		return $row;
	}	
?>