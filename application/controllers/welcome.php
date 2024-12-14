<?php
defined('BASEPATH') or exit('No direct script access allowed');

class welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mod_login');
		$this->load->helper('user_helper');
		//$this->load->model('xyz');
	}
	// ---------------------Page Load function -------------------------
	public function index()
	{

		$this->load->view('login');

	}
	public function dashbordpage()
	{
		// print_r($this->session->userdata['logged_in']);die();
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['countdetails'] = $this->Mod_login->countCase($user_id);
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/dashbord', $data);
		//print_r($data);die();
		$this->load->view('pages/footer');
	}

	public function admin_caseentry()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['get_allcase'] = $this->Mod_login->get_allcase($user_id);
		$data['get_newcase'] = $this->Mod_login->get_newcase($user_id);
		$data['get_approvedcase'] = $this->Mod_login->get_approvedcase();
		//$data['view_allcase']=$this->Mod_login->view_allcase();
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/caseentry_admin', $data);
		$this->load->view('pages/footer');
	}

	public function caseentry()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id); //Add Crime Head in Dropdown -->
		$data['get_crime_head'] = $this->Mod_login->get_crime_head(); //Add Crime Head in Dropdown -->
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/case_entry', $data);
		$this->load->view('pages/footer');
	}
	public function rta_page()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id); //Add Crime Head in Dropdown -->
		$data['get_crime_head'] = $this->Mod_login->get_crime_head(); //Add Crime Head in Dropdown -->
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/rta_entry_form', $data);
		$this->load->view('pages/footer');
	}

	public function arrest_entry()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id); //Add Crime Head in Dropdown -->
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/arrest_entry_form', $data);
		$this->load->view('pages/footer');
	}
	public function victim_entry()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id); //Add Crime Head in Dropdown -->
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/victim_entry_form', $data);
		$this->load->view('pages/footer');
	}
	public function seizure_entry()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id); //Add Crime Head in Dropdown -->
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/seizure_entry_form', $data);
		$this->load->view('pages/footer');
	}

	public function case_edit_ps()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['editps_allcase'] = $this->Mod_login->ps_edit_allcase($user_id);
		$data['editps_newcase'] = $this->Mod_login->ps_edit_newcase($user_id);
		// $data['editps_approvedcase']=$this->Mod_login->get_newcase();
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/case_edit_ps', $data);
		$this->load->view('pages/footer');
	}

	public function psdisposal()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['ps_disposal'] = $this->Mod_login->ps_disposal($user_id);
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/ps_disposal', $data);
		$this->load->view('pages/footer');
	}

	public function court_disposal()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['court_disposal'] = $this->Mod_login->court_disposal($user_id);
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/court_disposal', $data);
		$this->load->view('pages/footer');
	}


	// after update data for seizure this function is call
	public function edit_seizure()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$user_type_id = $this->session->userdata['logged_in']['user_type_id'];
		$user_ps_id = $this->session->userdata['logged_in']['user_ps_id'];
		$data['edit_seizure_list'] = $this->Mod_login->edit_seizure($user_id, $user_type_id, $user_ps_id);
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/edit_seizure', $data);
		$this->load->view('pages/footer');
	}

	public function seizure_edit_form()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		//echo $user_id;die();
		$case_id = $this->uri->segment(3);
		//echo $case_id;die();
		$data['seizure_edit_data'] = $this->Mod_login->edit_seizure_data($case_id);
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id);
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/seizure_edit_form', $data);
		$this->load->view('pages/footer');
	}

	public function ud_entry_form()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id);
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/ud_entry_form', $data);
		$this->load->view('pages/footer');
	}


	public function edit_ud()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['edit_ud'] = $this->Mod_login->edit_ud($user_id);
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/edit_ud', $data);
		$this->load->view('pages/footer');
	}



	public function edit_ud_form()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$ud_id = $this->uri->segment(3);
		//echo $ud_id;die();
		$data['ud_update'] = $this->Mod_login->edit_ud_update($ud_id);
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id);
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/ud_edit_form', $data);
		$this->load->view('pages/footer');
	}

	public function psdisposal_entry_form()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		//echo $user_id;die();
		$case_id = $this->uri->segment(3);
		//echo $case_id;die();
		$data['edit_case'] = $this->Mod_login->view_allcase($case_id);
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id);
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/ps_disposal_entry_form', $data);
		$this->load->view('pages/footer');
	}

	public function court_disposal_entry_form()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$case_id = $this->uri->segment(3);
		$data['court_desposal_entry_data'] = $this->Mod_login->court_disposal_entry($case_id);
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id);
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/court_disposal_entry_form', $data);
		$this->load->view('pages/footer');
	}

	public function crime_search()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id); //Add Crime Head in Dropdown -->
		$data['get_crime_head'] = $this->Mod_login->get_crime_head(); //Add Crime Head in Dropdown -->
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/crime_search', $data);
		$this->load->view('pages/footer');
	}

	public function criminal_search()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id); //Add Crime Head in Dropdown -->
		$data['get_crime_head'] = $this->Mod_login->get_crime_head(); //Add Crime Head in Dropdown -->
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/criminal_search', $data);
		$this->load->view('pages/footer');
	}

	public function ps_disposal_search()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/psdisposal_search');
		$this->load->view('pages/footer');
	}
	public function seizure_search()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$data['get_policestation'] = $this->Mod_login->get_psname($user_id);
		$data['get_seizure_type'] = $this->Mod_login->get_seizure_type(); //Add Seizure Type in Dropdown -->
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/seizure_search', $data);
		$this->load->view('pages/footer');
	}

	public function crime_search_data()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		//echo $user_id;die();
		$crime_search_fir_no = $this->input->post('crime_search_fir_no');
		$crime_search_ps = $this->input->post('crime_search_ps');
		$crime_search_from_date = $this->input->post('crime_search_from_date');
		$crime_search_to_date = $this->input->post('crime_search_to_date');
		$crime_search_crime_head = $this->input->post('crime_search_crime_head');
		if ($crime_search_from_date != "") {
			$orderfromdate = explode('/', $crime_search_from_date);
			$day = $orderfromdate[0];
			$month = $orderfromdate[1];
			$year = $orderfromdate[2];
			$from_date = $year . '-' . $month . '-' . $day;
		} else {
			$from_date = "";
		}
		if ($crime_search_to_date != "") {
			$ordertodate = explode('/', $crime_search_to_date);
			$day = $ordertodate[0];
			$month = $ordertodate[1];
			$year = $ordertodate[2];
			$to_date = $year . '-' . $month . '-' . $day;
		} else {
			$to_date = "";
		}
		//echo $crime_search_fir_no;die();
		$data['search_data'] = $this->Mod_login->get_crime_search($user_id, $crime_search_fir_no, $crime_search_ps, $from_date, $to_date, $crime_search_crime_head);
		echo json_encode($data);
	}

	public function criminal_search_data()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		//echo $user_id;die();
		$criminal_name = $this->input->post('criminal_name');
		$criminal_ps = $this->input->post('criminal_ps');
		$criminal_crimehead = $this->input->post('criminal_crimehead');

		//echo $crime_search_fir_no;die();
		$data['search_criminal_data'] = $this->Mod_login->get_criminal_search($user_id, $criminal_name, $criminal_ps, $criminal_crimehead);
		echo json_encode($data);
	}


	public function disposal_search_alldata()
	{
		$user_id = $this->session->userdata['logged_in']['user_id'];
		//echo $user_id;die();
		$disposaltype = $this->input->post('disposaltype');
		$psdisposal_search_from_date = $this->input->post('psdisposal_search_from_date');
		$psdisposal_search_to_date = $this->input->post('psdisposal_search_to_date');

		if ($psdisposal_search_from_date != "") {
			$orderfromdate = explode('/', $psdisposal_search_from_date);
			$day = $orderfromdate[0];
			$month = $orderfromdate[1];
			$year = $orderfromdate[2];
			$from_date = $year . '-' . $month . '-' . $day;
		} else {
			$from_date = "";
		}
		if ($psdisposal_search_to_date != "") {
			$ordertodate = explode('/', $psdisposal_search_to_date);
			$day = $ordertodate[0];
			$month = $ordertodate[1];
			$year = $ordertodate[2];
			$to_date = $year . '-' . $month . '-' . $day;
		} else {
			$to_date = "";
		}
		if ($disposaltype != "") {
			if ($disposaltype == "PD") {
				$data['ps_disposal_value'] = $this->Mod_login->get_Alldispoal_search($user_id, $from_date, $to_date, $disposaltype);
			} else {
				$data['court_disposal_value'] = $this->Mod_login->get_Alldispoal_search($user_id, $from_date, $to_date, $disposaltype);
			}
		}
		echo json_encode($data);
	}

	public function view_allcase()
	{
		$caseid = $this->input->post('caseid');
		$data = $this->Mod_login->view_allcase($caseid);
		echo json_encode($data);
	}

	public function view_newcase()
	{
		$caseid = $this->input->post('caseid');
		$data = $this->Mod_login->view_allcase($caseid);
		echo json_encode($data);
	}

	public function view_approvedcase()
	{
		$caseid = $this->input->post('caseid');
		$data = $this->Mod_login->view_allcase($caseid);
		echo json_encode($data);
	}

	public function view_court_disposal()
	{
		$caseid = $this->input->post('caseid');
		$data = $this->Mod_login->court_disposal_entry($caseid);
		echo json_encode($data);
	}

	public function view_all_seizure_data()
	{
		$caseid = $this->input->post('caseid');
		$data = $this->Mod_login->edit_seizure_data($caseid);
		echo json_encode($data);
	}
	public function view_all_ud_data()
	{
		$ud_id = $this->input->post('ud_id');
		$data = $this->Mod_login->edit_ud_update($ud_id);
		echo json_encode($data);
	}


	public function edit_case()
	{
		$case_id = $this->uri->segment(3);
		$data['edit_case'] = $this->Mod_login->view_allcase($case_id);
		$data['view_victim'] = $this->Mod_login->view_allvictim($case_id);
		$data['view_arrest'] = $this->Mod_login->view_allarrest($case_id);
		//$data['get_crime_head']=$this->Mod_login->get_crime_head(); //Add Crime Head in Dropdown -->
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/case_edit_form', $data);
		//print_r($data);die();
		$this->load->view('pages/footer');
	}



	public function crimehead()
	{
		$data['get_crime_head'] = $this->Mod_login->get_crime_head(); //Add Crime Head in Dropdown -->
		$this->load->view('pages/header');
		$this->load->view('pages/nav');
		$this->load->view('pages/crime_head', $data);
		$this->load->view('pages/footer');
	}

	public function changepassword()
	{
		$this->load->view('pages/change_password');

	}
	// for Login process  ---  date. 01.08.2021 
	public function loginprocess()
	{
		$this->form_validation->set_rules('user_id', 'User Name', 'trim|required');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if (isset($this->session->userdata['logged_in'])) {
				unset($this->session->userdata['logged_in']);
			}
			$this->index();

		} else {

			$login = array(
				'user_id' => $this->input->post('user_id'),
				'password' => MD5($this->input->post('user_password'))
			);

			$result = $this->Mod_login->login_process_ci($login);

			if ($result == TRUE) {
				$user_id = $this->input->post('user_id');
				$this->data['feeder'] = $this->Mod_login->read_user_information_ci($user_id);
				$this->data['feeder_ps'] = $this->Mod_login->get_user_ps_information($user_id);

				if ($this->data['feeder_ps'] != false) {
					$ps_ids = array();
					foreach ($this->data['feeder_ps'] as $feeder_ps) {
						$ps_ids[] = $feeder_ps->ps_id;
					}
					$session_data = array(
						'user_type_id' => $this->data['feeder'][0]->user_type_id,
						'user_name' => $this->data['feeder'][0]->user_name,
						'user_id' => $this->data['feeder'][0]->user_id,
						'user_ps_id' => $ps_ids,
					);
					// echo implode(", ", $ps_ids);
					$this->session->set_userdata('logged_in', $session_data);
					//redirect('dashboard',$session_data);
					$this->dashbordpage($session_data);
				}
			} else {
				$this->session->set_flashdata('login_message_display', "Invalid User ID or Password! Please check it carefully once again !");
				//$this->session->set_flashdata('login_message_display',"successfully logout");
				//echo "<script>alert('Invalid User ID or Password! Please check it carefully once again!');</script>";		
				$this->index();
				//redirect('home/case_entry');
			}
		}

	}

	// ---------------For logout process------------------  
	public function logout()
	{
		$sess_array = array('user_id' => '', 'user_type_id' => '', 'user_name' => '');
		$this->session->unset_userdata('logged_in', $sess_array);

		//$this->session->set_flashdata('login_message_display',"successfully logout");
		echo "<script>alert('Logout Successfully');</script>";
		$this->index();
	}

	// ----------------Insert Crime Head---------------------
	public function crimehead_entry()
	{
		$this->form_validation->set_rules('crimehead', 'Crime Head', 'trim|required|is_unique[crime_head.crimehead]');

		if ($this->form_validation->run() == FALSE) {
			$this->crimehead();

		} else {
			$abc = $this->input->post('crimehead');// ('crimehead')Text box name.....
			$result = $this->Mod_login->crimehead_insert($abc);

			if ($result == 1) {
				echo "<script>alert('Crime Head - $abc Successfully insert');</script>";
				$this->crimehead();
			} else {
				echo "<script>alert('Crime Head - $abc not insert');</script>";
				$this->crimehead();
			}
		}
	}

	//------Add Crime Method Form add crime head--------->

	public function crimemethod_entry()
	{
		$this->form_validation->set_rules('crimemethod', 'Crime Method', 'trim|required');
		$this->form_validation->set_rules('crime_head_id', 'Crime Head', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->crimehead();
		} else {
			$crimemethod = $this->input->post('crimemethod');
			$crime_head_id = $this->input->post('crime_head_id');
			$result = $this->Mod_login->crimemethod_insert($crime_head_id, $crimemethod);

			if ($result == 1) {
				echo "<script>alert('Crime Method- $crimemethod Successfully insert');</script>";
				$this->crimehead();
			} else {
				echo "<script>alert('Crime Method- $crimemethod not insert');</script>";
				$this->crimehead();
			}
		}
	}
	//---------------Crime Method Show -------------///

	public function get_crime_method()
	{
		$crimehead = $this->input->post('crimehead');
		$data = $this->Mod_login->get_crime_method($crimehead);
		echo json_encode($data);
	}

	//------------Case Entry --------------//////
	public function add_case()
	{
		$this->form_validation->set_rules('complain', 'Type of Complain', 'trim|required');
		$this->form_validation->set_rules('ps', 'Police Station', 'trim|required');
		$this->form_validation->set_rules('fir_no', 'FIR No', 'trim|required');
		$this->form_validation->set_rules('fir_date', 'FIR Date', 'trim|required');
		$this->form_validation->set_rules('us', 'Under Section', 'trim|required');
		$this->form_validation->set_rules('crime_head', 'Crime Head', 'trim|required');
		// $this->form_validation->set_rules('crime_method','Crime Method','trim|required');
		$this->form_validation->set_rules('gist', 'Gist of Case', 'trim|required');
		// $this->form_validation->set_rules('po','Place of Occurrence','trim|required');
		// $this->form_validation->set_rules('do','Date of Occurrence','trim|required');
		// $this->form_validation->set_rules('complaint_information','Complaint Information','trim|required');
		// $this->form_validation->set_rules('victim','Victim','trim|required');
		// $this->form_validation->set_rules('accused','Accused','trim|required');
		// $this->form_validation->set_rules('arrest','Arrest','trim|required');
		// $this->form_validation->set_rules('properties_stolen','Properties Stolen','trim');
		// $this->form_validation->set_rules('value','Value of Properties','trim');
		// $this->form_validation->set_rules('ud_case_no','UD Cae No','trim');
		// $this->form_validation->set_rules('ud_date','UD Date','trim');
		if ($this->form_validation->run() == false) {//---ok-->
			$this->caseentry();
		}//---ok-->
		else {
			$comp = $this->input->post('complain');
			$ps = $this->input->post('ps');
			$orderps = explode(',', $ps);
			//echo $orderps; die();
			$psid = $orderps[0];
			$psshortame = $orderps[1];
			$fir_no = $this->input->post('fir_no');
			$fir_date = $this->input->post('fir_date');
			//---------FIR Date-----------//
			$orderdate = explode('/', $fir_date);
			$day = $orderdate[0];
			$month = $orderdate[1];
			$year = $orderdate[2];
			$date = $year . '-' . $month . '-' . $day;
			//$date=$day.'-'.$month.'-'.$year;
			$us = $this->input->post('us');
			$crime_head = $this->input->post('crime_head');
			$crime_method = $this->input->post('crime_method');
			$gist = $this->input->post('gist');
			$po = $this->input->post('po');
			$do = $this->input->post('do');
			$c_info = $this->input->post('c_info');
			$victim = $this->input->post('victim');
			$accused = $this->input->post('accused');
			$arrest = $this->input->post('arrest');
			$p_stolen = $this->input->post('p_stolen');
			$p_value = $this->input->post('p_value');
			$ud_no = $this->input->post('ud_no');
			$ud_date = $this->input->post('ud_date');
			$caseid = $psshortame . $year . $fir_no;
			$v_id = 'V' . '-' . $caseid . '-';
			$a_id = 'A' . '-' . $caseid . '-';
			//echo $caseid; die();
			date_default_timezone_set('Asia/Kolkata');
			$create_timestamp = date("Y-m-d H:i:s");

			$fir_arr = array();
			$fir_arr['case_id'] = $caseid;
			$fir_arr['complain'] = $comp;
			$fir_arr['ps'] = $psid;
			$fir_arr['fir_no'] = $fir_no;
			$fir_arr['fir_date'] = $date;
			$fir_arr['us'] = $us;
			$fir_arr['crime_head'] = $crime_head;
			$fir_arr['crime_method'] = $crime_method;
			$fir_arr['gist'] = $gist;
			$fir_arr['po'] = $po;
			$fir_arr['do'] = $do;
			$fir_arr['c_info'] = $c_info;
			$fir_arr['victim'] = $victim;
			$fir_arr['accused'] = $accused;
			$fir_arr['arrest'] = $arrest;
			$fir_arr['p_stolen'] = $p_stolen;
			$fir_arr['p_value'] = $p_value;
			$fir_arr['ud_no'] = $ud_no;
			$fir_arr['ud_date'] = $ud_date;
			$fir_arr['flag'] = "P";
			$fir_arr['ps_disposal'] = "N";
			$fir_arr['court_disposal'] = "N";
			$fir_arr['entry_date'] = $create_timestamp;

			// VICTIM TABLE//
			if ($victim >= 1) {//---ok-->	
				$vi_no = $this->input->post('vi_no');
				$v_name = $this->input->post('vi_name');
				$v_fathername = $this->input->post('vi_fathername');
				$v_address = $this->input->post('vi_address');
				$v_age = $this->input->post('vi_age');
				$v_gender = $this->input->post('vi_gender');
				$v_contact = $this->input->post('vi_contact');


				$victim_arr = array();
				for ($i = 0; $i < count($vi_no); $i++) { //---ok-->
					$victim_arr[] = [
						'case_id' => $caseid,
						'v_id' => $v_id . $i,
						'name' => $v_name[$i],
						'f_name' => $v_fathername[$i],
						'address' => $v_address[$i],
						'age' => $v_age[$i],
						'gender' => $v_gender[$i],
						'contact' => $v_contact[$i]
					];
				}//---ok-->
			}//---ok-->

			// ARREST TABLE//
			if ($arrest >= 1) {//---ok-->
				$ar_no = $this->input->post('ar_no');
				$a_name = $this->input->post('ar_name');
				$a_nickname = $this->input->post('ar_nickname');
				$a_fathername = $this->input->post('ar_fathername');
				$a_address = $this->input->post('ar_address');
				$a_mobile = $this->input->post('ar_mobile');
				$a_age = $this->input->post('ar_age');
				$a_gender = $this->input->post('ar_gender');
				$a_caselink = $this->input->post('ar_caselink');
				$a_modus = $this->input->post('ar_modus');
				$a_date = $this->input->post('ar_date');
				$a_status = $this->input->post('ar_status');
				$a_physical = $this->input->post('ar_physical');
				$imageInput = $this->input->post('arrest_image');


				$arrest_per = array();
				for ($i = 0; $i < count($ar_no); $i++) { //---ok-->
					$arrest_per[] = [
						'case_id' => $caseid,
						'a_id' => $a_id . $i,
						'name' => $a_name[$i],
						'nick_name' => $a_nickname[$i],
						'father_name' => $a_fathername[$i],
						'address' => $a_address[$i],
						'mobile_no' => $a_mobile[$i],
						'age' => $a_age[$i],
						'gender' => $a_gender[$i],
						'other_case_link' => $a_caselink[$i],
						'modus_operandi' => $a_modus[$i],
						'arrest_date' => $a_date[$i],
						'status' => $a_status[$i],
						'identification_mark' => $a_physical[$i],
						'image' => $imageInput[$i],
					];
				}//---ok-->
			}//---ok-->


			//SEIZUE TABLE///
			$se_no = $this->input->post('se_no');
			$s_arms = $this->input->post('se_arms');
			$st_arms = $this->input->post('se_type_arms');
			$s_ammu = $this->input->post('se_ammu');
			$s_ta = $this->input->post('se_ta');
			$s_exp = $this->input->post('se_exp');
			$s_te = $this->input->post('se_te');
			$s_ids = $this->input->post('se_ids');
			$s_idd = $this->input->post('se_idd');
			$s_bomb = $this->input->post('se_bomb');
			$s_ganja = $this->input->post('se_ganja');
			$s_herion = $this->input->post('se_herion');
			$s_fc = $this->input->post('se_fc');
			$s_bm = $this->input->post('se_bm');
			$s_up = $this->input->post('se_up');
			$s_sp = $this->input->post('se_sp');
			$s_os = $this->input->post('se_os');
			//echo $s_arms;die();
			if ($s_arms == "" && $st_arms == "" && $s_ammu == "" && $s_ta == "" && $s_exp == "" && $s_te == "" && $s_ids == "" && $s_idd == "" && $s_bomb == "" && $s_ganja == "" && $s_herion == "" && $s_fc == "" && $s_bm == "" && $s_up == "" && $s_sp == "" && $s_os == "") {
				$seizure_pro = array();
				$seizure_pro[] = [
					'case_id' => $caseid,
					'arms' => "",
					'arms_type' => "",
					'ammunition' => "",
					'ammunition_type' => "",
					'explosive' => "",
					'explosive_type' => "",
					'id_seizure' => "",
					'id_destroy' => "",
					'bomb' => "",
					'ganja' => "",
					'herion' => "",
					'fire_cracker' => "",
					'board_money' => "",
					'unclaim_property' => "",
					'suspicious_property' => "",
					'other' => "",
				];
			} else {
				if ($s_arms != "" || $s_ammu != "") {//---ok-->
					$seizure_pro = array();

					for ($i = 0; $i < count($se_no); $i++) { //---ok-->
						$seizure_pro[] = [
							'case_id' => $caseid,
							'arms' => $s_arms[$i],
							'arms_type' => $st_arms[$i],
							'ammunition' => $s_ammu[$i],
							'ammunition_type' => $s_ta[$i],
							'explosive' => $s_exp[$i],
							'explosive_type' => $s_te[$i],
							'id_seizure' => $s_ids[$i],
							'id_destroy' => $s_idd[$i],
							'bomb' => $s_bomb[$i],
							'ganja' => $s_ganja[$i],
							'herion' => $s_herion[$i],
							'fire_cracker' => $s_fc[$i],
							'board_money' => $s_bm[$i],
							'unclaim_property' => $s_up[$i],
							'suspicious_property' => $s_up[$i],
							'other' => $s_os[$i],
						];
					}//---ok-->
				}//---ok-->
			}

			$checkcaseid = $this->Mod_login->check_caseid($caseid);
			$this->db->trans_begin();
			if ($checkcaseid == 1) {//---ok-->
				echo "<script>alert('Oops duplicate!!! FIR No. $fir_no is already insert!!!');</script>";
				//$this->session->set_flashdata('case_duplicate','Please check FIR No. ');
				//redirect('welcome/caseentry');
				$this->caseentry();
			}//---ok-->
			else { //---ok-->
				$fir_insert = $this->Mod_login->case_insert($fir_arr);
				if ($victim >= 1) {//---ok-->
					$victim_insert = $this->Mod_login->victim_insert($victim_arr);
				}//---ok-->
				if ($arrest >= 1) {//---ok-->
					$arrest_insert = $this->Mod_login->arrest_insert($arrest_per);
				}//---ok-->
				if ($s_arms >= 1 || $s_ammu >= 1) {//---ok-->
					$seizure_insert = $this->Mod_login->seizure_insert($seizure_pro);
				}//---ok-->
				if ($s_arms == "" || $s_ammu == "") {//---ok-->
					$seizure_insert = $this->Mod_login->seizure_insert($seizure_pro);
				}//---ok-->
				if ($fir_insert) {//---ok-->
					$this->db->trans_commit();
					echo "<script>alert('FIR No. $fir_no insert successfully');</script>";
					$this->caseentry();
				}//---ok-->
				else {//---ok-->
					$this->db->trans_rollback();
					echo "<script>alert('FIR No. $fir_no not insert !!!');</script>";
					$this->caseentry();
					// $this->session->set_flashdata('case_error','FIR not insert.');
					// redirect('welcome/caseentry');
				}//---ok-->
			}//---ok-->
		}
	}


	//----------------Add_Arrest_Persons Enty from Form------------>

	public function add_arrest_person()
	{
		$this->form_validation->set_rules('arrest_entry_ps', 'Police Station', 'trim|required');
		$this->form_validation->set_rules('arrest_entry_fir_no', 'FIR No', 'trim|required');
		$this->form_validation->set_rules('arrest_entry_fir_date', 'FIR Date', 'trim|required');
		//$this->form_validation->set_rules('arrest_image', 'Arrest Image', 'callback_validate_image');


		if ($this->form_validation->run() == false) {
			$this->arrest_entry();
		} else {
			$accname = $this->input->post('acc_name');
			$accnickname = $this->input->post('acc_nickname');
			$accfathername = $this->input->post('acc_fathername');
			$accaddress = $this->input->post('acc_address');
			$accmobile = $this->input->post('acc_mobile');
			$accage = $this->input->post('acc_age');
			$accgender = $this->input->post('acc_gender');
			$acccaselink = $this->input->post('acc_caselink');
			$accmouds = $this->input->post('acc_modus');
			$accarrestdate = $this->input->post('acc_arrestdate');
			$accstatus = $this->input->post('acc_status');
			$accphusical = $this->input->post('acc_physical');
			$ps = $this->input->post('arrest_entry_ps');
			$orderps = explode(',', $ps);
			$psid = $orderps[0];
			$psshortame = $orderps[1];
			$fir_no = $this->input->post('arrest_entry_fir_no');
			$fir_date = $this->input->post('arrest_entry_fir_date');
			$orderdate = explode('/', $fir_date);
			$day = $orderdate[0];
			$month = $orderdate[1];
			$year = $orderdate[2];
			$date = $year . '-' . $month . '-' . $day;
			$orderdate_arrest = explode('/', $accarrestdate);
			$day_arrest = $orderdate_arrest[0];
			$month_arrest = $orderdate_arrest[1];
			$year_arrest = $orderdate_arrest[2];
			$date_arrest = $year_arrest . '-' . $month_arrest . '-' . $day_arrest;
			$caseid = $psshortame . $year . $fir_no;
			//echo $caseid;
			$get_arrest_max_id = $this->Mod_login->arrest_max_id($caseid);
			//echo $get_arrest_max_id;
			// $max_val_a_id = $get_arrest_max_id->max_a_id;
			$max_val_a_id = $get_arrest_max_id;
			$max_a_id = "";

			// if ($max_val_a_id != "") {
			// 	//$a_id=substr($max_val_a_id, -1)+1;
			// 	$a_id = explode('-', $max_val_a_id)[2] + 1;
			// 	$max_a_id = 'A' . '-' . $caseid . '-' . $a_id;
			// } else {
			// 	$max_a_id = 'A' . '-' . $caseid . '-0';
			// }

			if ($max_val_a_id != "") {
				$a_id = $max_val_a_id + 1;
				$max_a_id = 'A' . '-' . $caseid . '-' . $a_id;
			} else {
				$max_a_id = 'A' . '-' . $caseid . '-0';
			}

			if ($_FILES['arrest_image']['name'] != '') {
				$config['upload_path'] = "./upload/arrest_persons/";
				$config['allowed_types'] = "jpg|jpeg|png";
				$config['max_size'] = 40;
				// $config['file_name'] = str_replace("-", "_", $max_a_id) . ".jpg";
				$config['file_name'] = 'image_' . uniqid() . '.jpg';

				$this->load->library('upload', $config); // Loading the upload library

				if (!$this->upload->do_upload('arrest_image')) {
					$arrest_image = array('error' => $this->upload->display_errors());
				} else {
					$data = array('upload_data' => $this->upload->data());
					$arrest_image = $data['upload_data']['file_name'];
				}
			} else {
				$arrest_image = '';
			}


			//echo $max_a_id; die();
			$arrest_arr = array();
			$arrest_arr['case_id'] = $caseid;
			$arrest_arr['a_id'] = $max_a_id;
			$arrest_arr['name'] = $accname;
			$arrest_arr['nick_name'] = $accnickname;
			$arrest_arr['father_name'] = $accfathername;
			$arrest_arr['address'] = $accaddress;
			$arrest_arr['mobile_no'] = $accmobile;
			$arrest_arr['age'] = $accage;
			$arrest_arr['gender'] = $accgender;
			$arrest_arr['other_case_link'] = $acccaselink;
			$arrest_arr['modus_operandi'] = $accmouds;
			$arrest_arr['arrest_date'] = $date_arrest;
			$arrest_arr['status'] = $accstatus;
			$arrest_arr['identification_mark'] = $accphusical;
			$arrest_arr['image'] = $arrest_image;
			//echo $arrest_arr; die();
			if ($caseid) {
				$check_caseid = $this->Mod_login->check_caseid($caseid);
				//echo $check_caseid;die();
				if ($check_caseid == 1) {
					$arrest_new_insert = $this->Mod_login->arrest_new_insert($arrest_arr);
					$arrest_count = $this->Mod_login->arrest_count($caseid);
					$this->db->trans_begin();

					if ($arrest_new_insert == 1) {
						echo "<script>alert('Arrest Person - $accname insert successfully');</script>";
						$this->arrest_entry();
						$this->update_arrest_count($caseid, $arrest_count);
					} else {
						echo "<script>alert('Arrest Person - $accname not insert');</script>";
						$this->arrest_entry();
					}
				} else {
					// echo "<script>alert('This Case Number not insert in database');'</script>";
					// $this->arrest_entry();
					echo "<script>alert('This Case Number not insert in database'); window.location.href='" . site_url('welcome/arrest_entry') . "'</script>";
				}
			}
		}
	}

	public function update_arrest_count($caseid, $arrest_count)
	{
		$data1 = array(
			'arrest' => $arrest_count,
		);
		$this->Mod_login->update_arrest_count($data1, $caseid);
	}


	// Define a callback function for custom validation
	function validate_image($str)
	{
		$allowed_mime_types = array('image/jpeg', 'image/jpg', 'image/png');
		$max_size_kb = 40; // 40 kilobytes

		if ($_FILES['arrest_image']['error'] == UPLOAD_ERR_NO_FILE) {
			// No file uploaded
			return true; // Validation passes
		}

		// Check file size
		if ($_FILES['arrest_image']['size'] / 1024 > $max_size_kb) {
			// File size exceeds the limit
			$this->form_validation->set_message('validate_image', 'Image must be under ' . $max_size_kb . ' kilobytes.');
			return false; // Validation fails
		}

		// Check file type
		$file_info = getimagesize($_FILES['arrest_image']['tmp_name']);
		if (!in_array($file_info['mime'], $allowed_mime_types)) {
			// Invalid file type
			$this->form_validation->set_message('validate_image', 'Invalid file type. Must be a JPG, JPEG, or PNG format.');
			return false; // Validation fails
		}

		return true; // Validation passes
	}


	//----------------Extra Victim Enty from Form------------>

	public function add_victim()
	{
		$this->form_validation->set_rules('victim_ps', 'Police Station', 'trim|required');
		$this->form_validation->set_rules('victim_fir_no', 'FIR No', 'trim|required');
		$this->form_validation->set_rules('victim_fir_date', 'FIR Date', 'trim|required');
		$this->form_validation->set_rules('victim_name_form', 'Victim Name', 'trim|required');
		$this->form_validation->set_rules('victim_fathername_form', 'Victim Father Name', 'trim|required');
		$this->form_validation->set_rules('victim_address_form', 'Victim Address', 'trim|required');
		$this->form_validation->set_rules('victim_age_form', 'Victim Age', 'trim|required');
		$this->form_validation->set_rules('victim_gender_form', 'Victim Gender', 'trim|required');



		if ($this->form_validation->run() == false) {
			$this->victim_entry();
		} else {
			$victimname = $this->input->post('victim_name_form');
			$victimfather = $this->input->post('victim_fathername_form');
			$victimaddress = $this->input->post('victim_address_form');
			$victimage = $this->input->post('victim_age_form');
			$victimegender = $this->input->post('victim_gender_form');
			$victimcontact = $this->input->post('victim_contact_form');
			$ps = $this->input->post('victim_ps');
			$orderps = explode(',', $ps);
			$psid = $orderps[0];
			$psshortame = $orderps[1];
			$fir_no = $this->input->post('victim_fir_no');
			$fir_date = $this->input->post('victim_fir_date');
			$orderdate = explode('/', $fir_date);
			$day = $orderdate[0];
			$month = $orderdate[1];
			$year = $orderdate[2];
			$date = $year . '-' . $month . '-' . $day;
			$caseid = $psshortame . $year . $fir_no;
			$get_victim_max_id = $this->Mod_login->victim_max_id($caseid);
			$max_val_v_id = $get_victim_max_id->max_v_id;
			$max_v_id = "";

			if ($max_val_v_id != "") {
				//$a_id=substr($max_val_a_id, -1)+1;
				$v_id = explode('-', $max_val_v_id)[2] + 1;
				$max_v_id = 'V' . '-' . $caseid . '-' . $v_id;
			} else {
				$max_v_id = 'V' . '-' . $caseid . '-0';
			}
			//echo $max_a_id; die();
			$victim_entry_arr = array();
			$victim_entry_arr['case_id'] = $caseid;
			$victim_entry_arr['v_id'] = $max_v_id;
			$victim_entry_arr['name'] = $victimname;
			$victim_entry_arr['f_name'] = $victimfather;
			$victim_entry_arr['address'] = $victimaddress;
			$victim_entry_arr['age'] = $victimage;
			$victim_entry_arr['gender'] = $victimegender;
			$victim_entry_arr['contact'] = $victimcontact;


			$victim_new_insert = $this->Mod_login->victim_new_insert($victim_entry_arr);
			$this->db->trans_begin();

			if ($victim_new_insert == 1) {
				echo "<script>alert('Victim - $victimname insert successfully'); window.location.href='" . site_url('welcome/victim_entry') . "'</script>";
			} else {
				echo "<script>alert('Victim - $victimname not insert successfully'); window.location.href='" . site_url('welcome/victim_entry') . "'</script>";
			}
		}
	}



	//----------------PS Disposal Enty from Form------------>

	public function add_ps_disposal()
	{
		$typeofdisposal = $this->input->post('type_of_disposal');
		$caseid = $this->input->post('disposal_caseid');
		if ($typeofdisposal == "CS") {
			$this->form_validation->set_rules('type_cs', 'Charge Sheet', 'trim|required');
			$this->form_validation->set_rules('cs_no', 'Charge Sheet No', 'trim|required');
			$this->form_validation->set_rules('cs_date', 'Charge Sheet Date', 'trim|required');
			$this->form_validation->set_rules('cs_section', 'Under Section', 'trim|required');
			$this->form_validation->set_rules('cs_person', 'Charge Sheeted Person', 'trim|required');
			$this->form_validation->set_rules('cs_accused_details', 'Accused Persons Details', 'trim|required');
		}
		if ($typeofdisposal == "FRT") {
			$this->form_validation->set_rules('frt_no', 'FRT No', 'trim|required');
			$this->form_validation->set_rules('frt_date', 'FRT Date', 'trim|required');
		}
		if ($typeofdisposal == "FRMF") {
			$this->form_validation->set_rules('frmf_no', 'FRMF No', 'trim|required');
			$this->form_validation->set_rules('frmf_date', 'FRMF Date', 'trim|required');
		}
		if ($typeofdisposal == "TRANSFER") {
			$this->form_validation->set_rules('transfer_unit', 'Transfer Unit', 'trim|required');
			$this->form_validation->set_rules('transfer_date', 'Transfer Date', 'trim|required');
		}
		if ($this->form_validation->run() == false) {
			$this->psdisposal_entry_form();
			echo "<script>window.location.href='" . site_url('welcome/psdisposal_entry_form/' . $caseid) . "'</script>";
		} else {
			//echo $typeofdisposal;die();
			if ($typeofdisposal == "CS") {
				$cstype = $this->input->post('type_cs');
				$csno = $this->input->post('cs_no');
				$csdate = $this->input->post('cs_date');
				$cssec = $this->input->post('cs_section');
				$csperson = $this->input->post('cs_person');
				$accdetails = $this->input->post('cs_accused_details');
				$orderdate = explode('/', $csdate);
				$day = $orderdate[0];
				$month = $orderdate[1];
				$year = $orderdate[2];
				$date = $year . '-' . $month . '-' . $day;
				$disposal_arr = array();
				$disposal_arr['type_of_disposal'] = $typeofdisposal;
				$disposal_arr['disposal_date'] = $date;
				$disposal_arr['case_id'] = $caseid;
				$disposal_arr['cs_type'] = $cstype;
				$disposal_arr['cs_no'] = $csno;
				$disposal_arr['cs_date'] = $date;
				$disposal_arr['section_of_law'] = $cssec;
				$disposal_arr['person_cs'] = $csperson;
				$disposal_arr['person_cs'] = $csperson;
				$disposal_arr['cs_accused_details'] = $accdetails;
			}
			if ($typeofdisposal == "FRT") {
				$frtno = $this->input->post('frt_no');
				$frtdate = $this->input->post('frt_date');
				$orderdate = explode('/', $frtdate);
				$day = $orderdate[0];
				$month = $orderdate[1];
				$year = $orderdate[2];
				$date = $year . '-' . $month . '-' . $day;
				$disposal_arr = array();
				$disposal_arr['type_of_disposal'] = $typeofdisposal;
				$disposal_arr['disposal_date'] = $date;
				$disposal_arr['case_id'] = $caseid;
				$disposal_arr['frt_no'] = $frtno;
				$disposal_arr['frt_date'] = $date;
			}
			if ($typeofdisposal == "FRMF") {
				$frmfno = $this->input->post('frmf_no');
				$frmfdate = $this->input->post('frmf_date');
				$orderdate = explode('/', $frmfdate);
				$day = $orderdate[0];
				$month = $orderdate[1];
				$year = $orderdate[2];
				$date = $year . '-' . $month . '-' . $day;
				$disposal_arr = array();
				$disposal_arr['type_of_disposal'] = $typeofdisposal;
				$disposal_arr['disposal_date'] = $date;
				$disposal_arr['case_id'] = $caseid;
				$disposal_arr['frmf_no'] = $frmfno;
				$disposal_arr['frmf_date'] = $date;
			}
			if ($typeofdisposal == "TRANSFER") {
				$unit = $this->input->post('transfer_unit');
				$transferdate = $this->input->post('transfer_date');
				$orderdate = explode('/', $transferdate);
				$day = $orderdate[0];
				$month = $orderdate[1];
				$year = $orderdate[2];
				$date = $year . '-' . $month . '-' . $day;
				$disposal_arr = array();
				$disposal_arr['type_of_disposal'] = $typeofdisposal;
				$disposal_arr['disposal_date'] = $date;
				$disposal_arr['case_id'] = $caseid;
				$disposal_arr['transfer_unit'] = $unit;
				$disposal_arr['transfer_date'] = $date;
			}
			$insert_ps_disposal = $this->Mod_login->insert_ps_disposal($disposal_arr);
			$this->db->trans_begin();
			//echo $insert_ps_disposal;die();
			if ($insert_ps_disposal == 1) {
				$this->db->trans_commit();
				$this->ps_disposal_change_flag();
				echo "<script>alert('Successfully insert -$typeofdisposal'); window.location.href='" . site_url('welcome/psdisposal') . "'</script>";
			} else {
				$this->db->trans_rollback();
				echo "<script>alert('Oops!!! Not insert -$typeofdisposal'); window.location.href='" . site_url('welcome/psdisposal') . "'</script>";
			}
		}
	}
	public function ps_disposal_change_flag()
	{
		$caseid = $this->input->post('disposal_caseid');
		$data1 = array(
			'ps_disposal' => 'Y',
		);
		$return = $this->Mod_login->ps_disposal_change_flag_update($data1, $caseid);
	}



	// ------------ADD COURT DISPOSAL--------------->

	public function add_court_disposal()
	{
		$this->form_validation->set_rules('gr_no', 'GR Number', 'trim|required');
		$this->form_validation->set_rules('type_of_court_disposal', 'Type of Court Disposal', 'trim|required');
		$this->form_validation->set_rules('court_disposal_accused_person', 'Accused Person', 'trim|required');
		$this->form_validation->set_rules('court_disposal_date', 'Disposal Date', 'trim|required');
		$this->form_validation->set_rules('disposal_court_name', 'Court Name', 'trim|required');
		$this->form_validation->set_rules('gist_of_disposal', 'Gist of Disposal', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->court_disposal_entry_form();
		} else {
			$caseid = $this->input->post('court_disposal_caseid');
			$grno = $this->input->post('gr_no');
			$typeofdisposal = $this->input->post('type_of_court_disposal');
			$cdap = $this->input->post('court_disposal_accused_person');
			$courtdispsoaldate = $this->input->post('court_disposal_date');
			$courtname = $this->input->post('disposal_court_name');
			$dispsoalgist = $this->input->post('gist_of_disposal');
			// $orderps = explode(',', $ps);
			// $psid = $orderps[0];
			// $psshortame = $orderps[1];
			// $fir_no = $this->input->post('victim_fir_no');
			// $fir_date = $this->input->post('victim_fir_date');
			$orderdate = explode('/', $courtdispsoaldate);
			$day = $orderdate[0];
			$month = $orderdate[1];
			$year = $orderdate[2];
			$courtdate = $year . '-' . $month . '-' . $day;
			// $caseid = $psshortame . $year . $fir_no;
			// $get_victim_max_id = $this->Mod_login->victim_max_id($caseid);
			// $max_val_v_id = $get_victim_max_id->max_v_id;
			// $max_v_id = "";

			// if ($max_val_v_id != "") {
			// 	//$a_id=substr($max_val_a_id, -1)+1;
			// 	$v_id = explode('-', $max_val_v_id)[2] + 1;
			// 	$max_v_id = 'V' . '-' . $caseid . '-' . $v_id;
			// } else {
			// 	$max_v_id = 'V' . '-' . $caseid . '-0';
			// }
			//echo $max_a_id; die();
			$court_array = array();
			$court_array['case_id'] = $caseid;
			$court_array['gr_no'] = $grno;
			$court_array['type_of_court_disposal'] = $typeofdisposal;
			$court_array['court_disposal_accused_person'] = $cdap;
			$court_array['court_disposal_date'] = $courtdate;
			$court_array['disposal_court_name'] = $courtname;
			$court_array['gist_of_disposal'] = $dispsoalgist;

			// $victim_entry_arr['gender'] = $victimegender;
			// $victim_entry_arr['contact'] = $victimcontact;


			$court_disposal_insert = $this->Mod_login->court_disposal_insert($court_array);
			$this->db->trans_begin();
			$this->court_disposal_change_flag();

			if ($court_disposal_insert == 1) {
				echo "<script>alert('Court Disposal Insert successfully'); window.location.href='" . site_url('welcome/court_disposal') . "'</script>";
			} else {
				echo "<script>alert('Court Disposal not insert successfully'); window.location.href='" . site_url('welcome/court_disposal') . "'</script>";
			}
		}
	}


	public function court_disposal_change_flag()
	{
		$caseid = $this->input->post('court_disposal_caseid');
		$data1 = array(
			'court_disposal' => 'Y',
		);
		$return = $this->Mod_login->court_disposal_change_flag_update($data1, $caseid);
	}
	//----------------UD Entry ------------>

	public function add_ud()
	{
		$this->form_validation->set_rules('ud_ps', 'Police Station', 'trim|required');
		$this->form_validation->set_rules('ud_no', 'UD Number', 'trim|required');
		$this->form_validation->set_rules('ud_date', 'UD Date', 'trim|required');
		$this->form_validation->set_rules('ud_religion', 'Religion', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$this->ud_entry_form();
		} else {
			$udps = $this->input->post('ud_ps');
			$orderps = explode(',', $udps);
			//echo $orderps; die();
			$psid = $orderps[0];
			$psshortame = $orderps[1];
			$ud_no = $this->input->post('ud_no');
			$ud_date = $this->input->post('ud_date');
			//---------FIR Date-----------//
			$orderdate = explode('/', $ud_date);
			$day = $orderdate[0];
			$month = $orderdate[1];
			$year = $orderdate[2];
			$date = $year . '-' . $month . '-' . $day;
			$ud_id = $psshortame . $year . $ud_no;

			$religion = $this->input->post('ud_religion');
			$caste = $this->input->post('ud_caste');
			$gender = $this->input->post('ud_gender');
			$age = $this->input->post('ud_age');
			$howtodeath = $this->input->post('how_to_death');
			$reason = $this->input->post('reason_death');
			$profession = $this->input->post('profession_death');
			$social = $this->input->post('social_death');
			$education = $this->input->post('education_death');
			$place = $this->input->post('ud_place');
			$case = $this->input->post('ud_caes_ref');

			$ud_arr = array();
			$ud_arr['ud_id'] = $ud_id;
			$ud_arr['ud_ps'] = $psid;
			$ud_arr['ud_no'] = $ud_no;
			$ud_arr['ud_date'] = $date;
			$ud_arr['ud_religion'] = $religion;
			$ud_arr['ud_caste'] = $caste;
			$ud_arr['ud_gender'] = $gender;
			$ud_arr['age'] = $age;
			$ud_arr['how_to_death'] = $howtodeath;
			$ud_arr['reason_death'] = $reason;
			$ud_arr['profession_death'] = $profession;
			$ud_arr['social_death'] = $social;
			$ud_arr['education_death'] = $education;
			$ud_arr['ud_place'] = $place;
			$ud_arr['ud_case_ref'] = $case;

			$result = $this->Mod_login->insert_ud($ud_arr);

			if ($result == 1) {
				$this->db->trans_commit();
				echo "<script>alert('Successfully insert'); window.location.href='" . site_url('welcome/ud_entry_form') . "'</script>";
			} else {
				$this->db->trans_rollback();
				echo "<script>alert('Oops!!! Not insert'); window.location.href='" . site_url('welcome/ud_entry_form') . "'</script>";
			}
		}
	}
	//----------------Add_New Seizure Enty from Form------------>

	public function add_new_seizure()
	{
		$this->form_validation->set_rules('seizure_entry_ps', 'Police Station', 'trim|required');
		$this->form_validation->set_rules('seizure_entry_gde_no', 'FIR No', 'trim|required');
		$this->form_validation->set_rules('seizure_entry_gde_date', 'FIR Date', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->seizure_entry();
		} else {
			$arms = $this->input->post('seizure_entry_arms');
			$gde_no = $this->input->post('seizure_entry_gde_no');
			$armstype = $this->input->post('seizure_entry_armstype');
			$ammu = $this->input->post('seizure_entry_ammu');
			$ammutype = $this->input->post('seizure_entry_ammutype');
			$expo = $this->input->post('seizure_entry_exp');
			$expotype = $this->input->post('seizure_entry_exptype');
			$idseiz = $this->input->post('seizure_entry_ids');
			$iddes = $this->input->post('seizure_entry_idd');
			$bomb = $this->input->post('seizure_entry_bomb');
			$ganja = $this->input->post('seizure_entry_ganja');
			$herion = $this->input->post('seizure_entry_herion');
			$fc = $this->input->post('seizure_entry_fc');
			$bm = $this->input->post('seizure_entry_bm');
			$up = $this->input->post('seizure_entry_up');
			$sp = $this->input->post('seizure_entry_sp');
			$os = $this->input->post('seizure_entry_os');
			$ps = $this->input->post('seizure_entry_ps');
			$orderps = explode(',', $ps);
			$psid = $orderps[0];
			$psshortame = $orderps[1];
			$psfullname = $orderps[2];
			// $gde_no = $this->input->post('seizure_entry_gde_no');
			$gde_date = $this->input->post('seizure_entry_gde_date');
			$orderdate = explode('/', $gde_date);
			$day = $orderdate[0];
			$month = $orderdate[1];
			$year = $orderdate[2];
			$date = $year . '-' . $month . '-' . $day;
			$case_id = 'GDE' . $psshortame . $year . $month . $gde_no;
			if ($arms == "" && $armstype == "") {
				echo "<script>alert('Please Entery any Seizure Item');</script>";
				$this->seizure_entry();
			} else {
				$seizure_arr = array();
				$seizure_arr['case_id'] = $case_id;
				$seizure_arr['seizure_ps'] = $psid;
				$seizure_arr['seizure_psname'] = $psfullname;
				$seizure_arr['gde_no'] = $gde_no;
				$seizure_arr['gde_date'] = $date;
				$seizure_arr['arms'] = $arms;
				$seizure_arr['arms_type'] = $armstype;
				$seizure_arr['ammunition'] = $ammu;
				$seizure_arr['ammunition_type'] = $ammutype;
				$seizure_arr['explosive'] = $expo;
				$seizure_arr['explosive_type'] = $expotype;
				$seizure_arr['id_seizure'] = $idseiz;
				$seizure_arr['id_destroy'] = $iddes;
				$seizure_arr['bomb'] = $bomb;
				$seizure_arr['ganja'] = $ganja;
				$seizure_arr['herion'] = $herion;
				$seizure_arr['fire_cracker'] = $fc;
				$seizure_arr['board_money'] = $bm;
				$seizure_arr['unclaim_property'] = $up;
				$seizure_arr['suspicious_property'] = $sp;
				$seizure_arr['other'] = $os;

				$seizure_new_insert = $this->Mod_login->seizure_new_insert($seizure_arr);
				$this->db->trans_begin();
				if ($seizure_new_insert == 1) {
					$this->db->trans_commit();
					echo "<script>alert('Successfully insert'); window.location.href='" . site_url('welcome/add_new_seizure') . "'</script>";
				} else {
					$this->db->trans_rollback();
					echo "<script>alert('Oops!!! Not insert'); window.location.href='" . site_url('welcome/add_new_seizure') . "'</script>";
				}
			}

		}
	}


	public function case_edit()
	{
		//echo $ps; 
		//echo $complain;
		//$case_id=$this->uri->segment(3);
		$case_id = $this->input->post('case_id');
		$userid = $this->input->post('userid');
		if ($this->input->post('crimemethod') != "") {
			$crimemethod = $this->input->post('crimemethod');
			$data1 = array(
				'complain' => $this->input->post('complain'),
				//'ps'=>$this->input->post('ps'),
				//'fir_no'=>$this->input->post('fir_no'),
				//'fir_date'=>$this->input->post('fir_datets'),
				'us' => $this->input->post('us'),
				'crime_head' => $this->input->post('crime_head'),
				'crimemethod' => $crimemethod,
				'gist' => $this->input->post('gist'),
				'po' => $this->input->post('po'),
				'do' => $this->input->post('do'),
				'c_info' => $this->input->post('c_info'),
				'victim' => $this->input->post('victim'),
				'accused' => $this->input->post('accused'),
				//'arrest' => $this->input->post('arrest'),
				'p_stolen' => $this->input->post('p_stolen'),
				'p_value' => $this->input->post('p_value'),
				'ud_no' => $this->input->post('ud_no'),
				'ud_date' => $this->input->post('ud_date'),
				'flag' => $userid == "ADMIN" ? 'A' : 'P',
			);
		} else {
			$data1 = array(
				'complain' => $this->input->post('complain'),
				//'ps'=>$this->input->post('ps'),
				//'fir_no'=>$this->input->post('fir_no'),
				//'fir_date'=>$this->input->post('fir_datets'),
				'us' => $this->input->post('us'),
				'crime_head' => $this->input->post('crime_head'),
				'gist' => $this->input->post('gist'),
				'po' => $this->input->post('po'),
				'do' => $this->input->post('do'),
				'c_info' => $this->input->post('c_info'),
				'victim' => $this->input->post('victim'),
				'accused' => $this->input->post('accused'),
				//'arrest' => $this->input->post('arrest'),
				'p_stolen' => $this->input->post('p_stolen'),
				'p_value' => $this->input->post('p_value'),
				'ud_no' => $this->input->post('ud_no'),
				'ud_date' => $this->input->post('ud_date'),
				'flag' => $userid == "ADMIN" ? 'A' : 'P',
			);
		}
		//echo $this->input->post('arrest');die();
		$return = $this->Mod_login->case_update($data1, $case_id);
		// $victim_update=$this->Mod_login->victim_update($victim_update_arr,$victim_id);

		if ($return == 1) {
			echo "<script>alert('update successfully');</script>";
			$this->admin_caseentry();
			// $this->session->set_flashdata('case_edit_message','Update successfully');
			// redirect('welcome/edit_case');
		} else {
			echo "<script>alert('update not successfully');</script>";
		}
	}


	public function seizure_data_update()
	{
		$case_id = $this->input->post('case_id');
		$data1 = array(
			'arms' => $this->input->post('seizure_edit_arms'),
			'arms_type' => $this->input->post('seizure_edit_armstype'),
			'ammunition' => $this->input->post('seizure_edit_ammu'),
			'ammunition_type' => $this->input->post('seizure_edit_ammutype'),
			'explosive' => $this->input->post('seizure_edit_exp'),
			'explosive_type' => $this->input->post('seizure_edit_exptype'),
			'id_seizure' => $this->input->post('seizure_edit_ids'),
			'id_destroy' => $this->input->post('seizure_edit_idd'),
			'bomb' => $this->input->post('seizure_edit_bomb'),
			'ganja' => $this->input->post('seizure_edit_ganja'),
			'herion' => $this->input->post('seizure_edit_herion'),
			'fire_cracker' => $this->input->post('seizure_edit_fc'),
			'board_money' => $this->input->post('seizure_edit_bm'),
			'unclaim_property' => $this->input->post('seizure_edit_up'),
			'suspicious_property' => $this->input->post('seizure_edit_sp'),
			'other' => $this->input->post('seizure_edit_os'),
		);

		$return = $this->Mod_login->seizure_data_update($data1, $case_id);
		// $victim_update=$this->Mod_login->victim_update($victim_update_arr,$victim_id);

		if ($return == 1) {
			echo "<script>alert('Seizure Update successfully');</script>";
			$this->edit_seizure();
			// $this->session->set_flashdata('case_edit_message','Update successfully');
			// redirect('welcome/edit_case');
		} else {
			echo "<script>alert('Update Not successfully');</script>";
		}
	}

	public function ud_update()
	{
		$ud_id = $this->input->post('ud_id');
		$data = array(
			// 'ud_ps' => $this->input->post('ud_ps'),
			// 'ud_no' => $this->input->post('ud_no'),
			// 'ud_date' => $this->input->post('ud_date'),
			'ud_religion' => $this->input->post('ud_religion'),
			'ud_caste' => $this->input->post('ud_caste'),
			'ud_gender' => $this->input->post('ud_gender'),
			'age' => $this->input->post('ud_age'),
			'how_to_death' => $this->input->post('how_to_death'),
			'reason_death' => $this->input->post('reason_death'),
			'profession_death' => $this->input->post('profession_death'),
			'social_death' => $this->input->post('social_death'),
			'education_death' => $this->input->post('education_death'),
			'ud_place' => $this->input->post('ud_place'),
			'ud_case_ref' => $this->input->post('ud_caes_ref'),
		);

		$return = $this->Mod_login->ud_data_update($data, $ud_id);
		// $victim_update=$this->Mod_login->victim_update($victim_update_arr,$victim_id);

		if ($return == 1) {
			echo "<script>alert('UD Update successfully');</script>";
			$this->edit_ud();
			// $this->session->set_flashdata('case_edit_message','Update successfully');
			// redirect('welcome/edit_case');
		} else {
			echo "<script>alert('UD Update Not successfully');</script>";
		}
	}


	public function fetch_victim_details()
	{
		$vId = $this->input->post('vId');
		//echo $vId;die();
		$data = $this->Mod_login->view_fetch_victim_details($vId);
		echo json_encode($data);
	}

	public function fetch_arrest_details()
	{
		$aId = $this->input->post('aId');
		//echo $aId;die();
		$data = $this->Mod_login->view_fetch_arrest_details($aId);
		echo json_encode($data);
	}

	/*public function victim_update_data()
										{
											$v_edit_id = $this->input->post('v_edit_id');
											//echo $vId;die();
											$data1 = array(
											'name'=>$this->input->post('v_edit_name'),
											);
											$return = $this->Mod_login->victim_update($data1,$v_edit_id);
											//echo json_encode($data);
											$caseid=$this->input->post('case_id');
											//echo $caseid;die();
											if($return==1){
												redirect('welcome/edit_case');
											//echo "<script>window.location.href='".site_url('welcome/edit_case/'.$caseid)."'</script>";
											}
											
										}*/

	public function victim_update_data()
	{
		$v_edit_id = $this->input->post('v_edit_id');
		$caseid = $this->input->post('case_id');
		$data1 = array(
			'name' => $this->input->post('v_edit_name'),
			'f_name' => $this->input->post('v_edit_fathername'),
			'address' => $this->input->post('v_edit_address'),
			'age' => $this->input->post('v_edit_age'),
			'gender' => $this->input->post('v_edit_gender'),
			'contact' => $this->input->post('v_edit_contact'),
		);
		$data = $this->Mod_login->victim_update($data1, $v_edit_id);
		if ($data) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Failed to update victim data'));
		}
	}

	public function reload_table_data_victim()
	{
		$vEditId = $this->input->post('vEditId');
		$data = $this->Mod_login->get_v_table_data($vEditId);
		echo json_encode($data);
	}

	public function arrest_update_data()
	{
		$a_edit_id = $this->input->post('a_edit_id');
		$caseid = $this->input->post('case_id');
		$a_edit_arrestdate = $this->input->post('a_edit_arrestdate');
		$orderdate = explode('-', $a_edit_arrestdate);
		$day = $orderdate[0];
		$month = $orderdate[1];
		$year = $orderdate[2];
		$date = $year . '-' . $month . '-' . $day;
		$data1 = array(
			'name' => $this->input->post('a_edit_name'),
			'nick_name' => $this->input->post('a_edit_nickname'),
			'father_name' => $this->input->post('a_edit_fathername'),
			'address' => $this->input->post('a_edit_address'),
			'mobile_no' => $this->input->post('a_edit_mobile'),
			'age' => $this->input->post('a_edit_age'),
			'gender' => $this->input->post('a_edit_gender'),
			'other_case_link' => $this->input->post('a_edit_caselink'),
			'modus_operandi' => $this->input->post('a_edit_modus'),
			'arrest_date' => $date,
			'status' => $this->input->post('a_edit_status'),
			'identification_mark' => $this->input->post('a_edit_physical'),
		);
		$data = $this->Mod_login->arrest_update($data1, $a_edit_id);
		//echo $data1;
		if ($data) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Failed to update Arrest data'));
		}
	}

	public function reload_table_data_arrest()
	{
		$aEditId = $this->input->post('aEditId');
		$data = $this->Mod_login->get_a_table_data($aEditId);
		echo json_encode($data);
	}

	public function load_ps_disposal_data()
	{
		$caseId = $this->input->post('caseId');
		$typeOfDisposal = $this->input->post('typeOfDisposal');
		$data = $this->Mod_login->get_ps_disposal_data($caseId, $typeOfDisposal);
		echo json_encode($data);
	}

	public function load_court_disposal_data()
	{
		$caseId = $this->input->post('caseId');
		$typeOfDisposal = $this->input->post('typeOfDisposal');
		$data = $this->Mod_login->get_court_disposal_data($caseId, $typeOfDisposal);
		echo json_encode($data);
	}

	public function delete_arrest_person()
	{
		$a_id = $this->input->post('aId');
		$case_id = $this->input->post('case_id');
		$return = $this->Mod_login->delete_arrest($a_id);
		//echo $a_id;
		// $victim_update=$this->Mod_login->victim_update($victim_update_arr,$victim_id);

		if ($return == 1) {
			$arrest_count = $this->Mod_login->arrest_count($case_id);

			// echo $arrest_count;
			$data = $this->update_arrest_count($case_id, $arrest_count);
			echo $data;
			// if ($data) {
			echo json_encode(array('success' => true));
			// } else {
			// 	echo json_encode(array('success' => false, 'message' => 'Failed to Arrest Delete'));
			// }
			// echo "<script>alert('Delete Arrest Persons Successfully');</script>";
		}
	}
	public function reload_arrest_table()
	{
		$case_id = $this->input->post('case_id');
		$return = $this->Mod_login->reload_arrest_table($case_id);
		echo json_encode($return);
	}

	// public function add_rta()
	// {
	// 	// $this->form_validation->set_rules('rta_ps', 'Police Station', 'trim|required');
	// 	// $this->form_validation->set_rules('ud_no', 'UD Number', 'trim|required');
	// 	// $this->form_validation->set_rules('ud_date', 'UD Date', 'trim|required');
	// 	// $this->form_validation->set_rules('ud_religion', 'Religion', 'trim|required');


	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->rta_page();
	// 	} else {
	// 		$rta_ps = $this->input->post('rta_ps');
	// 		$orderps = explode(',', $rta_ps);
	// 		//echo $orderps; die();
	// 		$psid = $orderps[0];
	// 		$psshortame = $orderps[1];
	// 		// $ud_no = $this->input->post('ud_no');
	// 		$rta_date = $this->input->post('rta_date');
	// 		//---------FIR Date-----------//
	// 		$orderdate = explode('/', $rta_date);
	// 		$day = $orderdate[0];
	// 		$month = $orderdate[1];
	// 		$year = $orderdate[2];
	// 		$date = $year . '-' . $month . '-' . $day;

	// 		// $ud_id = $psshortame . $year . $ud_no;

	// 		$rta_time = $this->input->post('rta_time');
	// 		$type_of_road = $this->input->post('type_of_road');
	// 		$rta_case_no = $this->input->post('rta_case_no');
	// 		$rta_id = $psshortame . $year . $rta_case_no;
	// 		$rta_case_ref = $this->input->post('rta_case_ref');
	// 		$rta_po = $this->input->post('rta_po');
	// 		$rta_lat = $this->input->post('rta_lat');
	// 		$rta_long = $this->input->post('rta_long');
	// 		$rta_kiled = $this->input->post('rta_kiled');
	// 		$rta_injure = $this->input->post('rta_injure');
	// 		$rta_offending_vehicle = $this->input->post('rta_offending_vehicle');
	// 		$rta_victim_vehicle = $this->input->post('rta_victim_vehicle');
	// 		$rta_reason = $this->input->post('rta_reason');

	// 		$rta_array = array();
	// 		$rta_array['rta_id'] = $rta_id;
	// 		$rta_array['name_of_ps'] = $rta_ps;
	// 		$rta_array['date_of_accident'] = $date;
	// 		$rta_array['time_of_accident'] = $rta_time;
	// 		$rta_array['type_of_road'] = $type_of_road;
	// 		$rta_array['rta_case_no'] = $rta_case_no;
	// 		$rta_array['case_ref'] = $rta_case_ref;
	// 		$rta_array['place_of_occ'] = $rta_po;
	// 		$rta_array['lat'] = $rta_lat;
	// 		$rta_array['long'] = $rta_long;
	// 		$rta_array['kiled'] = $rta_kiled;
	// 		$rta_array['injure'] = $rta_injure;
	// 		$rta_array['offender_vehicle'] = $rta_offending_vehicle;
	// 		$rta_array['victim_vehicle'] = $rta_victim_vehicle;
	// 		$rta_array['reason_of_accident'] = $rta_reason;

	// 		$result = $this->Mod_login->insert_rta($rta_array);

	// 		if ($result == 1) {
	// 			$this->db->trans_commit();
	// 			echo "<script>alert('RTA Successfully insert'); window.location.href='" . site_url('welcome/rta_page') . "'</script>";
	// 		} else {
	// 			$this->db->trans_rollback();
	// 			echo "<script>alert('Oops!!! RTA Not insert'); window.location.href='" . site_url('welcome/rta_page') . "'</script>";
	// 		}
	// 	}
	// }


	public function add_rta()
	{
		$this->form_validation->set_rules('rta_ps', 'Police Station', 'trim|required');
		$this->form_validation->set_rules('rta_date', 'Accident Date', 'trim|required');
		$this->form_validation->set_rules('rta_time', 'Accident Time', 'trim|required');
		$this->form_validation->set_rules('type_of_road', 'Type of Road', 'trim|required');
		$this->form_validation->set_rules('rta_case_no', 'RTA Case No', 'trim|required');
		$this->form_validation->set_rules('rta_case_ref', 'Case Reference', 'trim|required');
		$this->form_validation->set_rules('placeNameInput', 'Place Of Occurrence', 'trim|required');
		$this->form_validation->set_rules('rta_kiled', 'Number of Person Kiled', 'trim|required');
		$this->form_validation->set_rules('rta_injure', 'Number of Person Injure', 'trim|required');
		$this->form_validation->set_rules('rta_offending_vehicle', 'Offender Vehicle', 'trim|required');
		$this->form_validation->set_rules('rta_victim_vehicle', 'Victim Vehicle', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$this->rta_page();
		} else {
			$rtaps = $this->input->post('rta_ps');
			$orderps = explode(',', $rtaps);
			//echo $orderps; die();
			$psid = $orderps[0];
			$psshortame = $orderps[1];
			$rta_date = $this->input->post('rta_date');
			$rta_time = $this->input->post('rta_time');
			//---------FIR Date-----------//
			$orderdate = explode('-', $rta_date);
			$day = $orderdate[0];
			$month = $orderdate[1];
			$year = $orderdate[2];
			$date = $year . '-' . $month . '-' . $day;
			$type_of_road = $this->input->post('type_of_road');
			$rta_case_no = $this->input->post('rta_case_no');
			$rta_id = $psshortame . $year . $rta_case_no;
			$rta_case_ref = $this->input->post('rta_case_ref');
			$rta_po = $this->input->post('placeNameInput');
			$rta_lat = $this->input->post('latInput');
			$rta_long = $this->input->post('lngInput');
			$rta_kiled = $this->input->post('rta_kiled');
			$rta_injure = $this->input->post('rta_injure');
			$rta_offending_vehicle = $this->input->post('rta_offending_vehicle');
			$rta_victim_vehicle = $this->input->post('rta_victim_vehicle');
			$rta_reason = $this->input->post('rta_reason');


			$rta_arr = array();
			// $ud_arr['ud_id'] = $ud_id;
			$rta_arr['rta_id'] = $rta_id;
			$rta_arr['name_of_ps'] = $psid;
			$rta_arr['date_of_accident'] = $date;
			$rta_arr['time_of_accident'] = $rta_time;
			$rta_arr['type_of_road'] = $type_of_road;
			$rta_arr['rta_case_no'] = $rta_case_no;
			$rta_arr['case_ref'] = $rta_case_ref;
			$rta_arr['place_of_occ'] = $rta_po;
			$rta_arr['lat'] = $rta_lat;
			$rta_arr['long'] = $rta_long;
			$rta_arr['kiled'] = $rta_kiled;
			$rta_arr['injure'] = $rta_injure;
			$rta_arr['offender_vehicle'] = $rta_offending_vehicle;
			$rta_arr['victim_vehicle'] = $rta_victim_vehicle;
			$rta_arr['reason_of_accident'] = $rta_reason;
			//echo $rta_arr; die();
			$result = $this->Mod_login->insert_rta($rta_arr);
			//echo $rta_arr; die();
			if ($result == 1) {
				$this->db->trans_commit();
				echo "<script>alert('RTA Successfully insert'); window.location.href='" . site_url('welcome/rta_page') . "'</script>";
			} else {
				$this->db->trans_rollback();
				echo "<script>alert('Oops!!! RTA Not insert'); window.location.href='" . site_url('welcome/rta_page') . "'</script>";
			}
		}
	}

	public function search_seizure_data()
	{
		$user_id = $this->input->post('user_id');
		$seizure_search_ps = $this->input->post('seizure_search_ps');
		$seizure_type = $this->input->post('seizure_type');
		$seizure_search_from_date = $this->input->post('seizure_search_from_date');
		$seizure_search_to_date = $this->input->post('seizure_search_to_date');
		$data = $this->Mod_login->get_search_seizure_data($user_id, $seizure_search_ps, $seizure_type, $seizure_search_from_date, $seizure_search_to_date);
		echo json_encode($data);
	}



}
?>