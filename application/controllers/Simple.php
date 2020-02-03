<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple extends CI_Controller {

function __construct() {
        parent::__construct();
      
         $this->load->model('M_user_credit');
         $this->load->model('M_order');
    }


	public function index()
	{
		$data['show'] = $this->M_user_credit->misal();
		$data['show1'] = $this->M_user_credit->misal1();

		$this->load->view('simple', $data);
	}

	function approval(){
		// $status = 3;
		$where['user_credit_id'] = $this->uri->segment(3);
		$data['status'] = 3;
		$this->M_user_credit->update($where, $data);
	}
	function approval1(){
		// $status = 3;
		$where['id'] = $this->uri->segment(3);
		$data['status'] = 3;
		$this->M_order->update($where, $data);
	}

}
