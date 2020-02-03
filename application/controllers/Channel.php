<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Channel extends CI_Controller {

	function __construct() {
        parent::__construct();
         if($this->session->userdata('status') != "login"){
            redirect(base_url("/login/signOut"));
        }
         $this->load->model('M_channel');
    }

	public function index()	{
		$data = array(
			'script'=>TRUE,
			'script_url'=>'backend/channel/script'
		);
		$this->load->view('commons/header');
		$this->load->view('backend/channel/index');
		$this->load->view('commons/footer', $data);
	}

	
    
    public function ajax_list() {
        $list = $this->M_channel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $channel) {
            $no++;
            $row = array();
            $row[] = $channel->channel_id;
            $row[] = $channel->channel_freq;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_channel('."'".$channel->channel_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_channel('."'".$channel->channel_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_channel->count_all(),
                        "recordsFiltered" => $this->M_channel->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function edit_channel($id) {
        $data = $this->M_channel->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add() {
        $data = array('channel_id' => $this->input->post('channel_id'),
		'channel_freq' => $this->input->post('channel_freq')
            );
        $insert = $this->M_channel->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update() {
        $data = array(
                'channel_freq' => $this->input->post('channel_freq')
            );
        $this->M_channel->update(array(
		'channel_id' => $this->input->post('channel_id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id) {
        $this->M_channel->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
