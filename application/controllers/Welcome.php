<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
         $this->load->model('M_user');
         //$this->load->model('M_welcome');
    }

	public function index()
	{
		$this->load->view('welcome');
	}

	public function register() {
        $data = array('user_name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'user_type' => '1'
            );
        //var_dump($data);
        $insert = $this->M_user->save($data);
        
        echo json_encode(array("status" => TRUE));
        redirect(base_url('welcome'));

    }
}
