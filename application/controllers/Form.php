<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	function __construct() {
        parent::__construct();
         $this->load->model('M_item');
         $this->load->model('M_category');
         $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$data['show3'] = $this->M_item->misal3();
		$this->load->view('form', $data);
	}

	public function tambah() {
		if ($_FILES['img']['error'] <> 4) {
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->index($error);
                }
                else
                {
                        $hasil = $this->upload->data();

						$data = array('id' => $this->input->post('id'),
						                    'nama' => $this->input->post('nama_paket'),
						                    'price' => $this->input->post('harga'),
						                    'deskripsi' => $this->input->post('deskripsi'),
						                    'img' => $hasil['file_name']

						);
                        $insert = $this->M_item->save($data);
                        redirect(base_url('form'));
                }
		}
        //var_dump($data);
        
        
        //echo json_encode(array("status" => TRUE));
        //redirect(base_url('dashboard'));

    }
    
    function delete($id){
			//$id = $this->uri->segment(3);
			$this->M_item->delete_by_id($id);
			redirect(base_url('form'));
	}
}
