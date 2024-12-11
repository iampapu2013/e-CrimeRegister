<?php

class Mod_login extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('string');
	}
	// Read data using username and password

	public function login_process_ci($data)
	{
		$condition = "user_id =" . "'" . $data['user_id'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
		$this->db->select('user_id,user_password');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function read_user_information_ci($user_id)
	{
		$condition = "user_id =" . "'" . $user_id . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function get_user_ps_information($user_id)
	{
		$this->db->select('user_ps_maping.ps_id, user_login.*');
		$this->db->from('user_login');
		$this->db->join('user_type', 'user_type.user_type_id = user_login.user_type_id', 'inner');
		$this->db->join('user_ps_maping', 'user_ps_maping.user_id = user_login.user_id', 'inner');
		$this->db->where('user_login.user_id', $user_id);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	//--------- Crime Head Entry -------->

	public function crimehead_insert($abc)
	{
		$data = array('crimehead' => $abc);
		return $xyz = $this->db->insert('crime_head', $data);
	}

	//----------Crime Method Form add Crime Head in Dropdown--------->
	public function get_crime_head()
	{
		$sql = "SELECT * from crime_head";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function get_seizure_type()
	{
		$sql = "SELECT * from seizure_type";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_crime_head_ps()
	{

		$sql = "SELECT * from crime_head";
		$query = $this->db->query($sql);
		return $query->result();

	}
	//-----------Crime Method Count----->
	public function get_crime_method($crimehead)
	{
		$sql = "SELECT crime_method_id,crimemethod from crime_method where crime_head_id='" . $crimehead . "'";
		$query = $this->db->query($sql);
		return $query->result();

	}

	//---------DataTable Case Show --------------->
	public function get_allcase($user_id)
	{
		$sql = "SELECT ps_name.name_of_ps,fir_entry.case_id,fir_entry.ps, crime_head.crimehead,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, fir_entry.crime_head, fir_entry.arrest, fir_entry.gist, fir_entry.flag from fir_entry INNER JOIN ps_name on  fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps where user_ps_maping.user_id='" . $user_id . "'";
		$query = $this->db->query($sql);
		return $query->result();

	}
	public function get_newcase($user_id)
	{
		$sql = "SELECT ps_name.name_of_ps,fir_entry.case_id,fir_entry.ps, crime_head.crimehead,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, fir_entry.crime_head, fir_entry.arrest, fir_entry.gist, fir_entry.flag from fir_entry INNER JOIN ps_name on  fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps where fir_entry.flag='P' and user_ps_maping.user_id='" . $user_id . "'";
		// $sql="SELECT ps_name.name_of_ps,fir_entry.case_id, crime_head.crimehead,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, fir_entry.crime_head, fir_entry.arrest, fir_entry.flag from fir_entry INNER JOIN ps_name on  fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id where flag='P'";
		//$sql="select * from fir_entry where flag ='P'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function get_approvedcase()
	{
		$sql = "SELECT ps_name.name_of_ps,fir_entry.case_id, crime_head.crimehead,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, fir_entry.crime_head, fir_entry.arrest, fir_entry.flag from fir_entry INNER JOIN ps_name on  fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id where flag='A'";
		//$sql="select * from fir_entry where flag='A'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	//---------DataTable Case Show for PS edit--------------->
	// public function ps_edit_allcase($user_id)
	// {
	// 	$sql="SELECT ps_name.name_of_ps,fir_entry.case_id,fir_entry.ps, crime_head.crimehead,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, fir_entry.crime_head, fir_entry.arrest, fir_entry.gist, fir_entry.flag from fir_entry INNER JOIN ps_name on  fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps where fir_entry.flag='A' and user_ps_maping.user_id='".$user_id."'";
	// 	$query=$this->db->query($sql);
	// 	return $query->result();
	// }

	// public function ps_edit_newcase($user_id)
	// {
	// 	$sql="SELECT ps_name.name_of_ps,fir_entry.case_id,fir_entry.ps, crime_head.crimehead,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, fir_entry.crime_head, fir_entry.arrest, fir_entry.gist, fir_entry.flag from fir_entry INNER JOIN ps_name on  fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps where fir_entry.flag='P' and user_ps_maping.user_id='".$user_id."'";
	// 	$query=$this->db->query($sql);
	// 	return $query->result();
	// }

	//---------Module & Edit form case show --------------->
	public function view_allcase($caseid)
	{
		$sql = "SELECT ps_name.name_of_ps,ps_name.ps_id,crime_head.crimehead,crime_head.crime_head_id, fir_entry.* from fir_entry  INNER JOIN ps_name on  fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id where case_id='" . $caseid . "'";

		$query = $this->db->query($sql);
		//echo $query;die() ;

		return $query->result_array();

	}

	public function ps_disposal($user_id)
	{
		$sql = "SELECT ps_name.name_of_ps,fir_entry.case_id,fir_entry.ps, crime_head.crimehead,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, fir_entry.crime_head, fir_entry.arrest, fir_entry.gist, fir_entry.flag from fir_entry INNER JOIN ps_name on  fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps where fir_entry.ps_disposal='N' and user_ps_maping.user_id='" . $user_id . "'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function court_disposal($user_id)
	{
		$sql = "SELECT ps_name.name_of_ps,fir_entry.case_id,fir_entry.ps, crime_head.crimehead,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, fir_entry.crime_head, fir_entry.arrest, fir_entry.gist, fir_entry.flag, ps_disposal.cs_no,ps_disposal.cs_date,ps_disposal.section_of_law, ps_disposal.person_cs from fir_entry INNER JOIN ps_name on  fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps INNER JOIN ps_disposal on fir_entry.case_id=ps_disposal.case_id where fir_entry.ps_disposal='Y' and ps_disposal.type_of_disposal='CS' and fir_entry.court_disposal='N' and user_ps_maping.user_id='" . $user_id . "'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	// public function court_disposal_entry($case_id)
	// {
	// 	$sql="SELECT ps_name.name_of_ps,fir_entry.case_id,fir_entry.ps, crime_head.crimehead,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, fir_entry.crime_head, fir_entry.arrest, fir_entry.gist, fir_entry.flag, ps_disposal.cs_no,ps_disposal.section_of_law, ps_disposal.person_cs from fir_entry INNER JOIN ps_name on  fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps INNER JOIN ps_disposal on fir_entry.case_id=ps_disposal.case_id where case_id='".$caseid."'";
	// 	$query=$this->db->query($sql);
	// 	return $query->result();
	// }


	public function court_disposal_entry($caseid)
	{
		$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id,fir_entry.fir_no, fir_entry.fir_date, fir_entry.arrest, fir_entry.gist, crime_head.crimehead, fir_entry.us, ps_disposal.* from ps_disposal INNER JOIN fir_entry on fir_entry.case_id=ps_disposal.case_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN ps_name on fir_entry.ps=ps_name.ps_id where ps_disposal.case_id='" . $caseid . "'";
		$query = $this->db->query($sql);
		//echo $query;die() ;
		return $query->result_array();
	}

	public function edit_seizure($user_id, $user_ps_id)
	{
		if ($user_id == "ADMIN") {
			$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id, fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, seizure.* FROM seizure LEFT JOIN fir_entry ON fir_entry.case_id = seizure.case_id LEFT JOIN ps_name ON fir_entry.ps = ps_name.ps_id LEFT JOIN user_ps_maping ON user_ps_maping.ps_id = fir_entry.ps WHERE (user_ps_maping.user_id='" . $user_id . "' OR seizure.gde_no != 0)";
		} else {
			$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id, fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, seizure.* FROM seizure LEFT JOIN fir_entry ON fir_entry.case_id = seizure.case_id LEFT JOIN ps_name ON fir_entry.ps = ps_name.ps_id LEFT JOIN user_ps_maping ON user_ps_maping.ps_id = fir_entry.ps WHERE (user_ps_maping.user_id='" . $user_id . "' OR seizure.seizure_ps =$user_ps_id)";
		}


		$query = $this->db->query($sql);
		return $query->result();
	}

	public function edit_seizure_data($case_id)
	{
		// $sql = "SELECT ps_name.name_of_ps, ps_name.ps_id,fir_entry.fir_no, fir_entry.fir_date, seizure.* from seizure
		// 	INNER JOIN fir_entry on fir_entry.case_id=seizure.case_id INNER JOIN ps_name on fir_entry.ps=ps_name.ps_id where seizure.case_id='" . $case_id . "'";

		$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id, fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, seizure.* FROM seizure LEFT JOIN fir_entry ON fir_entry.case_id = seizure.case_id LEFT JOIN ps_name ON fir_entry.ps = ps_name.ps_id where seizure.case_id='" . $case_id . "'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function edit_ud($user_id)
	{
		$sql = "SELECT ps_name.name_of_ps, ud_entry.* from ud_entry  INNER JOIN ps_name on  ud_entry.ud_ps=ps_name.ps_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=ud_entry.ud_ps where user_ps_maping.user_id='" . $user_id . "'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function edit_ud_update($ud_id)
	{
		$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id, ud_entry.* from ud_entry  INNER JOIN ps_name on  ud_entry.ud_ps=ps_name.ps_id where ud_entry.ud_id='" . $ud_id . "'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function countCase($user_id)
	{
		$sql = "SELECT 
				    COUNT(fe.case_id) AS count_for_case_id,
				    COALESCE(SUM(fe.arrest), 0) AS count_for_arrest,    
				    COUNT(CASE WHEN fe.crime_head = 1 THEN 1 END) AS count_for_dacoity,
				    COALESCE(SUM(CASE WHEN fe.crime_head = 1 THEN fe.arrest ELSE 0 END), 0) AS count_for_dacoity_arrest,    
				    COUNT(CASE WHEN fe.crime_head = 2 THEN 1 END) AS count_for_robbery,
				    COALESCE(SUM(CASE WHEN fe.crime_head = 2 THEN fe.arrest ELSE 0 END), 0) AS count_for_robbery_arrest,    
				    COUNT(CASE WHEN fe.crime_head = 3 THEN 1 END) AS count_for_burglary,
				    COALESCE(SUM(CASE WHEN fe.crime_head = 3 THEN fe.arrest ELSE 0 END), 0) AS count_for_burglary_arrest,    
				    COUNT(CASE WHEN fe.crime_head = 4 THEN 1 END) AS count_for_theft,
				    COALESCE(SUM(CASE WHEN fe.crime_head = 4 THEN fe.arrest ELSE 0 END), 0) AS count_for_theft_arrest,    
				    COUNT(CASE WHEN fe.crime_head = 5 THEN 1 END) AS count_for_murder,
				    COALESCE(SUM(CASE WHEN fe.crime_head = 5 THEN fe.arrest ELSE 0 END), 0) AS count_for_murder_arrest,    
				    COUNT(CASE WHEN fe.ps_disposal = 'Y' THEN 1 END) AS count_for_case_disposal,
				    COUNT(CASE WHEN fe.ps_disposal = 'N' THEN 1 END) AS count_for_case_disposal_pending,    
				    COUNT(CASE WHEN pd.type_of_disposal = 'CS' THEN 1 END) AS count_for_cs,
				    COALESCE(SUM(CASE WHEN fe.crime_head = 1 THEN pd.type_of_disposal='CS' ELSE 0 END), 0) AS count_for_cs_dacoity,
					COALESCE(SUM(CASE WHEN fe.crime_head = 1 THEN pd.type_of_disposal!='CS' ELSE 0 END), 0) AS count_for_fr_dacoity,
                    COALESCE(SUM(CASE WHEN fe.crime_head = 1 THEN fe.ps_disposal = 'N' ELSE 0 END), 0) AS count_for_pending_dacoity,

					COALESCE(SUM(CASE WHEN fe.crime_head = 2 THEN pd.type_of_disposal='CS' ELSE 0 END), 0) AS count_for_cs_robbery,
					COALESCE(SUM(CASE WHEN fe.crime_head = 2 THEN pd.type_of_disposal!='CS' ELSE 0 END), 0) AS count_for_fr_robbery,
                    COALESCE(SUM(CASE WHEN fe.crime_head = 2 THEN fe.ps_disposal = 'N' ELSE 0 END), 0) AS count_for_pending_robbery,

					COALESCE(SUM(CASE WHEN fe.crime_head = 3 THEN pd.type_of_disposal='CS' ELSE 0 END), 0) AS count_for_cs_burglary,
					COALESCE(SUM(CASE WHEN fe.crime_head = 3 THEN pd.type_of_disposal!='CS' ELSE 0 END), 0) AS count_for_fr_burglary,
                    COALESCE(SUM(CASE WHEN fe.crime_head = 3 THEN fe.ps_disposal = 'N' ELSE 0 END), 0) AS count_for_pending_burglary,

					COALESCE(SUM(CASE WHEN fe.crime_head = 4 THEN pd.type_of_disposal='CS' ELSE 0 END), 0) AS count_for_cs_theft,
					COALESCE(SUM(CASE WHEN fe.crime_head = 4 THEN pd.type_of_disposal!='CS' ELSE 0 END), 0) AS count_for_fr_theft,
                    COALESCE(SUM(CASE WHEN fe.crime_head = 4 THEN fe.ps_disposal = 'N' ELSE 0 END), 0) AS count_for_pending_theft,

					COALESCE(SUM(CASE WHEN fe.crime_head = 5 THEN pd.type_of_disposal='CS' ELSE 0 END), 0) AS count_for_cs_murder,
					COALESCE(SUM(CASE WHEN fe.crime_head = 5 THEN pd.type_of_disposal!='CS' ELSE 0 END), 0) AS count_for_fr_murder,
                    COALESCE(SUM(CASE WHEN fe.crime_head = 5 THEN fe.ps_disposal = 'N' ELSE 0 END), 0) AS count_for_pending_murder
                    FROM fir_entry fe
				LEFT JOIN ps_disposal pd ON pd.case_id = fe.case_id
				INNER JOIN user_ps_maping upm ON upm.ps_id = fe.ps
				WHERE upm.user_id ='" . $user_id . "'";

		$query = $this->db->query($sql);
		//print_r($query->result());die();	
		return $query->result();

		// SELECT COUNT(case_id) as count_for_case_id,SUM(arrest) as count_for_arrest,COUNT(CASE WHEN crime_head = 1 THEN 1 END) as count_for_dec
		//SELECT COUNT(case_id) as count_for_case_id,SUM(arrest) as count_for_arrest

	}

	public function get_crime_search($user_id, $crime_search_fir_no, $crime_search_ps, $from_date, $to_date, $crime_search_crime_head)
	{
		$condition = "";
		$all_condition = "";
		if ($crime_search_crime_head == "all") {
			if ($crime_search_fir_no != "") {
				$all_condition .= " fe.fir_no = '" . $crime_search_fir_no . "'";
			}
			if ($crime_search_ps != "") {
				$all_condition .= " fe.ps = '" . $crime_search_ps . "'";
			}
			if ($from_date != "" && $to_date != "") {
				if ($all_condition != "") {
					$all_condition .= " AND ";
				}
				$all_condition .= " fe.fir_date BETWEEN '" . $from_date . "' AND '" . $to_date . "'";
			}
			if ($crime_search_ps != "" && $from_date != "" && $to_date != "") {
				if ($all_condition != "") {
					$all_condition .= " AND ";
				}
				$all_condition .= " fe.ps = '" . $crime_search_ps . "' AND fe.fir_date BETWEEN '" . $from_date . "' AND '" . $to_date . "'";
			}
			if ($all_condition != "") {
				$all_condition = " WHERE " . $all_condition;
			}

			$sql = "SELECT fe.case_id, fe.ps, fe.gist, upm.user_id, fe.case_id, pn.name_of_ps, fe.fir_no, fe.us, fe.fir_date, fe.crime_head, ch.crimehead, fe.crime_method, cm.crimemethod, fe.arrest, fe.victim, pd.cs_no, pd.cs_date,pd.person_cs,pd.cs_accused_details,pd.frt_no,pd.frt_date,pd.frmf_no,pd.frmf_date,pd.transfer_unit,pd.transfer_date, 
		            (CASE WHEN fe.ps_disposal = 'Y' THEN pd.type_of_disposal ELSE 'Pending' END) as type_of_ps_disposal, fe.ps_disposal, 
		            (CASE WHEN fe.court_disposal = 'Y' THEN cd.type_of_court_disposal ELSE 'Pending' END) as type_of_court_disposal, fe.court_disposal FROM fir_entry fe 
		            LEFT JOIN user_ps_maping upm on upm.ps_id=fe.ps
		            LEFT JOIN ps_name pn ON fe.ps=pn.ps_id
		            LEFT JOIN crime_head ch ON ch.crime_head_id = fe.crime_head 
		            LEFT JOIN crime_method cm ON cm.crime_method_id = fe.crime_method 
		            LEFT JOIN ps_disposal pd ON pd.case_id = fe.case_id 
		            LEFT JOIN court_disposal cd ON cd.case_id = fe.case_id
		            " . $all_condition . " AND upm.user_id ='" . $user_id . "' ORDER BY fe.fir_date ASC";

		} else {
			if ($crime_search_fir_no != "") {
				$condition .= " AND fe.fir_no = '" . $crime_search_fir_no . "'";
			}
			if ($crime_search_ps != "") {
				$condition .= " AND fe.ps = '" . $crime_search_ps . "'";
			}
			if ($from_date != "" && $to_date != "") {
				$condition .= " AND fe.fir_date BETWEEN '" . $from_date . "' AND '" . $to_date . "'";
			}
			if ($crime_search_crime_head != "") {
				$condition .= " AND fe.crime_head = '" . $crime_search_crime_head . "'";
			}
			//Also, WHERE 1=1 is added so that you can directly append the conditions without worrying about starting with AND or OR.
			$sql = "SELECT fe.case_id, fe.ps, fe.gist, upm.user_id, fe.case_id, pn.name_of_ps, fe.fir_no, fe.us, fe.fir_date, fe.crime_head, ch.crimehead, fe.crime_method, cm.crimemethod, fe.arrest, fe.victim,pd.cs_no,pd.cs_date,pd.person_cs,pd.cs_accused_details,pd.frt_no,pd.frt_date,pd.frmf_no,pd.frmf_date,pd.transfer_unit,pd.transfer_date,cd.court_disposal_date,cd.court_disposal_accused_person,cd.gist_of_disposal, 
		            (CASE WHEN fe.ps_disposal = 'Y' THEN pd.type_of_disposal ELSE 'Pending' END) as type_of_ps_disposal, fe.ps_disposal, 
		            (CASE WHEN fe.court_disposal = 'Y' THEN cd.type_of_court_disposal ELSE 'Pending' END) as type_of_court_disposal, fe.court_disposal FROM fir_entry fe 
		            LEFT JOIN user_ps_maping upm on upm.ps_id=fe.ps
		            LEFT JOIN ps_name pn ON fe.ps=pn.ps_id
		            LEFT JOIN crime_head ch ON ch.crime_head_id = fe.crime_head 
		            LEFT JOIN crime_method cm ON cm.crime_method_id = fe.crime_method 
		            LEFT JOIN ps_disposal pd ON pd.case_id = fe.case_id 
		            LEFT JOIN court_disposal cd ON cd.case_id = fe.case_id
		            WHERE 1=1" . $condition . " AND upm.user_id ='" . $user_id . "' ORDER BY fe.fir_date ASC";
		}

		//echo $sql;die();
		$query = $this->db->query($sql);
		return $query->result();
	}


	public function get_Alldispoal_search($user_id, $from_date, $to_date, $disposaltype)
	{
		$condition = "";
		if ($disposaltype == "PD") {
			if ($from_date != "" && $to_date != "") {
				$condition .= " AND ps_disposal.disposal_date BETWEEN '" . $from_date . "' AND '" . $to_date . "'";
			}

			//Also, WHERE 1=1 is added so that you can directly append the conditions without worrying about starting with AND or OR.
			$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, crime_head.crimehead, ps_disposal.* from ps_disposal INNER JOIN fir_entry on fir_entry.case_id=ps_disposal.case_id INNER JOIN ps_name on fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps WHERE 1=1" . $condition . " AND user_ps_maping.user_id='" . $user_id . "'";
		} else {
			if ($from_date != "" && $to_date != "") {
				$condition .= " AND court_disposal.court_disposal_date BETWEEN '" . $from_date . "' AND '" . $to_date . "'";
			}
			//Also, WHERE 1=1 is added so that you can directly append the conditions without worrying about starting with AND or OR.
			$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, crime_head.crimehead, court_disposal.* from court_disposal INNER JOIN fir_entry on fir_entry.case_id=court_disposal.case_id INNER JOIN ps_name on fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps WHERE 1=1" . $condition . " AND user_ps_maping.user_id='" . $user_id . "'";
		}
		$query = $this->db->query($sql);
		return $query->result();
	}


	public function get_criminal_search($user_id, $criminal_name, $criminal_ps, $criminal_crimehead)
	{
		//echo $user_id, $criminal_name, $criminal_ps, $criminal_crimehead;die();
		$condition = "";
		if ($criminal_name != "") {
			$condition .= " AND (LOWER(arrest.name) LIKE CONCAT ('%',LOWER(SUBSTRING('$criminal_name',1,2)),'%')) ";
			//echo strlen($criminal_name);
			// if (strlen($criminal_name) == 2) {
			// 	$condition .= " AND (arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 0, 1),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 2),'%'))";
			// } else if (strlen($criminal_name) == 3) {
			// 	$condition .= " AND (arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 1),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 2),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 3),'%'))";
			// } else if (strlen($criminal_name) == 4) {
			// 	$condition .= " AND (arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 1),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 2),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 3),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 4),'%'))";
			// } else if (strlen($criminal_name) == 5) {
			// 	$condition .= " AND (arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 1),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 2),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 3),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 4),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 5),'%'))";
			// } else {
			// 	$condition .= " AND (arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 1),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 2),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 3),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 4),'%') OR arrest.name LIKE CONCAT('%',SUBSTRING(LOWER('$criminal_name'), 1, 5),'%') OR arrest.name LIKE CONCAT('%',LOWER('$criminal_name'),'%'))";
			// }
		}
		if ($criminal_ps != "") {
			$condition .= " AND fir_entry.ps = '" . $criminal_ps . "'";
		}
		if ($criminal_crimehead != "") {
			$condition .= " AND fir_entry.crime_head = '" . $criminal_crimehead . "'";
		}
		//Also, WHERE 1=1 is added so that you can directly append the conditions without worrying about starting with AND or OR.
		$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, crime_head.crimehead, arrest.* from arrest INNER JOIN fir_entry on fir_entry.case_id=arrest.case_id INNER JOIN ps_name on fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps WHERE 1=1" . $condition . " AND user_ps_maping.user_id='" . $user_id . "'";
		//echo $sql;
		//die();
		$query = $this->db->query($sql);
		return $query->result();
	}


	//-------------Edit Form victim show------------------>
	public function view_allvictim($caseid)
	{
		$sql = "SELECT * from victim where case_id='" . $caseid . "'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	//-------------Edit Form Arrest show------------------>
	public function view_allarrest($caseid)
	{
		$sql = "SELECT * from arrest where case_id='" . $caseid . "'";
		$query = $this->db->query($sql);
		return $query->result();
	}


	//---------Crime Method Entry --------------->

	public function crimemethod_insert($crime_head_id, $crimemethod)
	{
		$data = array('crime_head_id' => $crime_head_id, 'crimemethod' => $crimemethod);
		return $flags = $this->db->insert('crime_method', $data);
	}

	public function get_psname($user_id)
	{
		$sql = "SELECT a.* FROM ps_name a INNER JOIN user_ps_maping b on b.ps_id=a.ps_id WHERE b.user_id='" . $user_id . "' ORDER BY a.name_of_ps ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}


	//-------- Add New Case -----------//
	public function check_caseid($caseid)
	{
		$this->db->where('case_id', $caseid);
		$query = $this->db->get('fir_entry');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	// Caes insert---------->
	public function case_insert($data = array())
	{
		$this->db->insert('fir_entry', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}
	public function victim_insert($data = array())
	{
		$this->db->insert_batch('victim', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function arrest_insert($data = array())
	{
		$this->db->insert_batch('arrest', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function seizure_insert($data = array())
	{
		$this->db->insert_batch('seizure', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function case_update($data1, $case_id)
	{
		$this->db->where('case_id', $case_id);
		$flag = $this->db->UPDATE('fir_entry', $data1);
		return $flag;
	}

	public function seizure_data_update($data1, $case_id)
	{
		$this->db->where('case_id', $case_id);
		$flag = $this->db->UPDATE('seizure', $data1);
		return $flag;
	}

	public function ud_data_update($data, $ud_id)
	{
		$this->db->where('ud_id', $ud_id);
		$flag = $this->db->UPDATE('ud_entry', $data);
		return $flag;
	}

	public function ps_disposal_change_flag_update($data1, $case_id)
	{
		$this->db->where('case_id', $case_id);
		$flag = $this->db->UPDATE('fir_entry', $data1);
		return $flag;
	}

	public function court_disposal_change_flag_update($data1, $case_id)
	{
		$this->db->where('case_id', $case_id);
		$flag = $this->db->UPDATE('fir_entry', $data1);
		return $flag;
	}

	// ------------For PS Disposal Y/N---------->
	public function case_updateps_disposal($data1, $case_id)
	{
		$this->db->where('case_id', $case_id);
		$flag = $this->db->UPDATE('fir_entry', $data1);
		return $flag;
	}

	public function arrest_new_insert($data = array())
	{
		//echo $data = array(); die();
		$this->db->insert('arrest', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function victim_new_insert($data = array())
	{
		$this->db->insert('victim', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

	public function court_disposal_insert($data = array())
	{
		$this->db->insert('court_disposal', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

	public function seizure_new_insert($data = array())
	{
		$this->db->insert('seizure', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

	// public function arrest_max_id($caseid)
	// {
	// 	$sql="SELECT case_id,MAX(a_id) as max_a_id,name FROM arrest where case_id='".$caseid."'";
	// 	$query=$this->db->query($sql);
	// 	$result = $query->row();
	// 	return $result;
	// }

	public function arrest_max_id($caseid)
	{
		$sql = "SELECT case_id, MAX(CAST(SUBSTRING_INDEX(a_id, '-', -1) AS UNSIGNED)) AS max_a_id, name FROM arrest where case_id='" . $caseid . "'";
		$query = $this->db->query($sql);
		$result = $query->row();
		return $result->max_a_id;
	}

	public function victim_max_id($caseid)
	{
		$sql = "SELECT case_id,MAX(v_id) as max_v_id,name FROM victim where case_id='" . $caseid . "'";
		$query = $this->db->query($sql);
		$result = $query->row();
		return $result;
	}

	public function insert_ps_disposal($data = array())
	{
		$this->db->insert('ps_disposal', $data);
		//print_r($this->db->affected_rows());die();
		//echo $this->db->affected_rows();die();
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}
	public function insert_ud($data = array())
	{
		$this->db->insert('ud_entry', $data);
		//print_r($this->db->affected_rows());die();
		//echo $this->db->affected_rows();die();
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function view_fetch_victim_details($vId)
	{
		$sql = "SELECT * from victim where v_id='" . $vId . "'";
		$query = $this->db->query($sql);
		//echo $query;die() ;

		return $query->result_array();

	}

	public function view_fetch_arrest_details($aId)
	{
		$sql = "SELECT * from arrest where a_id='" . $aId . "'";
		$query = $this->db->query($sql);
		//echo $query;die() ;

		return $query->result_array();

	}

	/*public function victim_update($victim_update_arr,$victim_id)
												 { 
												 $this->db->where('v_id',$victim_id);
												 $flag = $this->db->UPDATE('victim',$victim_update_arr);
												 return $flag;
												 }*/
	public function victim_update($victim_update_arr, $victim_id)
	{
		$this->db->where('v_id', $victim_id);
		$this->db->update('victim', $victim_update_arr);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_v_table_data($vEditId)
	{
		$sql = "SELECT * from victim where v_id='" . $vEditId . "'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function arrest_update($arrest_update_arr, $arrest_id)
	{
		$this->db->where('a_id', $arrest_id);
		$this->db->update('arrest', $arrest_update_arr);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_a_table_data($aEditId)
	{
		$sql = "SELECT * from arrest where a_id='" . $aEditId . "'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function arrest_count($caseid)
	{
		$sql = "SELECT * FROM `arrest` WHERE case_id='" . $caseid . "'";
		$query = $this->db->query($sql);
		return $query->num_rows(); // Using num_rows() to get the count directly
	}


	public function update_arrest_count($data1, $case_id)
	{
		$this->db->where('case_id', $case_id);
		$flag = $this->db->UPDATE('fir_entry', $data1);
		return $flag;
	}

	public function get_ps_disposal_data($caseId, $typeOfDisposal)
	{
		$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id,fir_entry.fir_no, fir_entry.fir_date, ps_disposal.* from ps_disposal INNER JOIN fir_entry on fir_entry.case_id=ps_disposal.case_id INNER JOIN ps_name on fir_entry.ps=ps_name.ps_id where ps_disposal.case_id='" . $caseId . "' AND type_of_disposal='" . $typeOfDisposal . "'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}




	// public function get_ps_disposal_data($caseId, $typeOfDisposal)
// 	{
// 		$sql = "SELECT * from ps_disposal where case_id='" . $caseId . "' AND type_of_disposal='" . $typeOfDisposal . "'";
// 		$query = $this->db->query($sql);
// 		return $query->result_array();
// 	}

	public function get_court_disposal_data($caseId, $typeOfDisposal)
	{
		$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id,fir_entry.fir_no, fir_entry.fir_date, court_disposal.* from court_disposal INNER JOIN fir_entry on fir_entry.case_id=court_disposal.case_id INNER JOIN ps_name on fir_entry.ps=ps_name.ps_id where court_disposal.case_id='" . $caseId . "' AND type_of_court_disposal='" . $typeOfDisposal . "'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function psdisposal_search($user_id)
	{
		$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, crime_head.crimehead, ps_disposal.* from ps_disposal INNER JOIN fir_entry on fir_entry.case_id=ps_disposal.case_id INNER JOIN ps_name on fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps where user_ps_maping.user_id='" . $user_id . "'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function courtdisposal_search($user_id)
	{
		$sql = "SELECT ps_name.name_of_ps, ps_name.ps_id,fir_entry.fir_no, fir_entry.fir_date, fir_entry.us, crime_head.crimehead, court_disposal.* from court_disposal INNER JOIN fir_entry on fir_entry.case_id=court_disposal.case_id INNER JOIN ps_name on fir_entry.ps=ps_name.ps_id INNER JOIN crime_head on fir_entry.crime_head=crime_head.crime_head_id INNER JOIN user_ps_maping on user_ps_maping.ps_id=fir_entry.ps where user_ps_maping.user_id='" . $user_id . "'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function delete_arrest($a_id)
	{
		// $this->db->where('a_id', $a_id);
		// $result = $this->db->delete('arrest');
		// //echo $result;die();
		// // $query = $this->db->query($result);
		// return $result;
		$sql = "DELETE FROM arrest WHERE a_id = '" . $a_id . "'";
		// echo $sql;
		if ($this->db->query($sql)) {

			return 1;
		} else {
			return $this->db->error();
		}
	}
	public function reload_arrest_table($case_id)
	{
		$sql = "SELECT * from arrest where case_id='" . $case_id . "'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	// public function insert_rta($data = array())
	// {
	// 	$this->db->insert('rta', $data);
	// 	print_r($this->db->affected_rows());die();
	// 	echo $this->db->affected_rows();die();
	// 	if ($this->db->affected_rows() > 0) {
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	public function insert_rta($data = array())
	{
		$this->db->insert('rta', $data);
		//print_r($this->db->affected_rows());die();
		//echo $this->db->affected_rows();die();
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function get_search_seizure_data($user_id, $seizure_search_ps, $seizure_type, $seizure_search_from_date, $seizure_search_to_date)
	{
		$conditions = "";
		switch ($seizure_type) {
			case "id_seizure/id_destroy":
				$types = explode('/', $seizure_type);
				$type_id_seizure = $types[0];
				$type_id_destroy = $types[1];
				$conditions .= "(seizure.$type_id_seizure != 0 OR seizure.$type_id_destroy != 0)";
				break;
			case "unclaim_property":
			case "suspicious_property":
			case "other":
				$conditions .= "seizure.$seizure_type != ''";
				break;
			default:
				$conditions .= "seizure.$seizure_type != 0";
				break;
		}

		// Add date filters
		$date_conditions = "((fir_entry.fir_date BETWEEN '$seizure_search_from_date' AND '$seizure_search_to_date') OR (fir_entry.fir_date IS NULL AND seizure.gde_date BETWEEN '$seizure_search_from_date' AND '$seizure_search_to_date'))";

		// Add PS filter if provided
		$ps_conditions = "";
		if (!empty($seizure_search_ps)) {
			$ps_conditions = "AND ((ps_name.ps_id = $seizure_search_ps) OR (ps_name.ps_id IS NULL AND seizure.seizure_ps = $seizure_search_ps))";
		}

		// Build final SQL query
		$sql = "SELECT ps_name.name_of_ps, fir_entry.fir_date, seizure.case_id,seizure.seizure_psname,seizure.gde_no,seizure.gde_date,seizure.arms,seizure.arms_type,seizure.ammunition,seizure.ammunition_type,seizure.explosive,seizure.explosive_type,seizure.id_seizure,seizure.id_destroy,seizure.bomb,seizure.ganja,seizure.herion,seizure.fire_cracker,seizure.board_money,seizure.unclaim_property,seizure.suspicious_property,seizure.other FROM seizure 
        LEFT JOIN fir_entry ON fir_entry.case_id = seizure.case_id 
        LEFT JOIN ps_name ON fir_entry.ps = ps_name.ps_id 
        WHERE $conditions AND $date_conditions $ps_conditions";
		// echo $sql;die();
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}

