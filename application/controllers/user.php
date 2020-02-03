<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct() {
        parent::__construct();
         $this->load->model('M_user');
    }

	public function index()
	{
		$data['show2'] = $this->M_user->misal2();
		$this->load->view('user', $data);
	}
	public function tambah() {
        $data = array('user_name' => $this->input->post('nama'),
                    'password' => $this->input->post('password'),
                    'email' => $this->input->post('email'),
                    'user_type' => $this->input->post('tipe')
            );
        $insert = $this->M_user->save($data);
        redirect(base_url('user'));
	}
	function delete($id){
			//$id = $this->uri->segment(3);
			$this->M_user->delete_by_id($id);
			redirect(base_url('user'));
	}
}