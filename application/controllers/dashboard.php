<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("/login/signOut"));
		}
          $this->load->model('M_user');
          $this->load->model('M_category');
          $this->load->model('M_item');
          $this->load->model('M_user_credit');
          $this->load->model('M_order');
         
         //$this->load->model('M_global_var');

    }

	public function index() {
	
		if($this->session->userdata('user_type')==1){
			$data['data_user']=$this->M_user->get_datatables();
			$data['data_category']= $this->M_category->get_datatables();
			$data['data_item']=$this->M_item->get_datatables();
			$data['data_user_credit']=$this->M_user_credit->get_datatables();
			$data['data_order']= $this->M_order->get_datatables();
			$data['data_paket']= $this->M_order->get_paket();
			$this->load->view('adm',$data);
		}elseif($this->session->userdata('user_type')==2){
			$data['data_user']=$this->M_user->get_datatables();
			$data['data_category']= $this->M_category->get_datatables();
			$data['data_item']=$this->M_item->get_datatables();
			$data['data_user_credit']=$this->M_user_credit->get_datatables();
			$this->load->view('client',$data);
			// echo $this->session->userdata('user_type');
		}else{
			echo "salah";
		}
		
		
	}
}
