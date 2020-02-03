<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
        parent::__construct();

         // $this->tt_scm=$this->load->database('tt_scm', TRUE);
         $this->load->model('M_user');
         // $this->load->session();
    }

	public function index()
	{
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] !=''){
			redirect(base_url('dashboard'));
		}else{
			$this->load->view('welcome');
		}
	}
	
	function signIn(){
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		
		$cek		= $this->M_user->cek($username, $password);
		
		
		
		if($cek->num_rows() == 1 ){
			$sess_data = array();
			foreach($cek->result() as $data){
				$sess_data['user_id']	= $data->user_id;
				$sess_data['user_name']	= $data->user_name;
				$sess_data['email']	= $data->email;
				$sess_data['user_type']	= $data->user_type;
				// $sess_data['station_id']	= $data->station_id;
				// $sess_data['region_id']	= $data->region_id;
				// $sess_data['department_id']	= $data->department_id;
				// $sess_data['user_email']	= $data->user_email;
				$sess_data['status']='login';
				$this->session->set_userdata($sess_data);
				if ($sess_data['user_type'] == 0) {
						redirect(base_url('form') );
					}
				else{
					redirect(base_url('dashboard') );
				}	
			}
			// redirect(base_url('dashboard') );
		}else{
			//$this->session->set_flashdata('Message', 'Username Or Password Is Not Correct!!!');
			redirect(base_url('welcome'));
		}
	}
	
	function signOut(){
		$this->session->sess_destroy();
		redirect(base_url('welcome'));
	}
}
