<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {

	function __construct() {
        parent::__construct();
         if($this->session->userdata('status') != "login"){
            redirect(base_url("/login/signOut"));
        }
         $this->load->model('M_category');
         $this->load->model('M_order');
         $this->load->model('M_item');
    }

	public function index()	{
		// $data = array(
		// 	'script'=>TRUE,
		// 	'script_url'=>'backend/channel/script'
		// );
		// $this->load->view('commons/header');
		// $this->load->view('backend/channel/index');
		// $this->load->view('commons/footer', $data);
	}

	
    
    // public function ajax_list() {
    //     $list = $this->M_channel->get_datatables();
    //     $data = array();
    //     $no = $_POST['start'];
    //     foreach ($list as $channel) {
    //         $no++;
    //         $row = array();
    //         $row[] = $channel->channel_id;
    //         $row[] = $channel->channel_freq;
 
    //         //add html for action
    //         $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_channel('."'".$channel->channel_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
    //               <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_channel('."'".$channel->channel_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
    //         $data[] = $row;
    //     }
 
    //     $output = array(
    //                     "draw" => $_POST['draw'],
    //                     "recordsTotal" => $this->M_channel->count_all(),
    //                     "recordsFiltered" => $this->M_channel->count_filtered(),
    //                     "data" => $data,
    //             );
    //     //output to json format
    //     echo json_encode($output);
    // }
 
    // public function edit_channel($id) {
    //     $data = $this->M_channel->get_by_id($id);
    //     echo json_encode($data);
    // }
 

        //input data
    public function ajax_add() {
        $user_id = $this->session->userdata('user_id');
        $kode = date_create('now')->format('YmdHis');
        $data = array('bank' => $this->input->post('bank'),
                    'user_id' => $user_id,
                            'price_month' => $this->input->post('price'),
                            'to_month' => '1',
		                      'rekening' => $this->input->post('rekening'),
                              'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
                              'kode_transaksi' => 'ID_'.$kode

            );
        $data2 = array('id_paket' => $this->input->post('id_paket'),
                    'user_id' => $user_id,
                            'cicilan' => $this->input->post('cicilan'),
                            'status' => '1',
                            'tgl_order' => $this->input->post('tgl_order'),
                            'kode_transaksi' => 'ID_'.$kode

            );
        $insert = $this->M_category->save($data);
        $insert2 = $this->M_order->save($data2);
        
        echo json_encode(array("status" => TRUE));
        redirect(base_url('dashboard'));
    }

    public function ajax_add2() {
        $user_id = $this->session->userdata('user_id');
        $data = array('bank' => $this->input->post('bank'),
                    'user_id' => $user_id,
                            'price_month' => $this->input->post('price'),
                            'to_month' => $this->input->post('to_month'),
                              'rekening' => $this->input->post('rekening'),
                              'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran'),
                              'kode_transaksi' => $this->input->post('kode_transaksi')
            );
        $insert = $this->M_category->save($data);
        
        echo json_encode(array("status" => TRUE));
        redirect(base_url('dashboard'));

    }
    public function register() {
        $data = array('id' => $this->input->post('id'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
            );
        var_dump($data);
        //$insert = $this->M_user->save($data);
        
        //echo json_encode(array("status" => TRUE));
        //redirect(base_url('dashboard'));

    }
    public function tambah() {
        $data = array('id' => $this->input->post('id'),
                    'nama' => $this->input->post('nama_paket'),
                    'price' => $this->input->post('harga'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'img' => $this->input->post('img')

            );
                $config['upload_path']          = './images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload($data['img']))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('form', $data);
                        //$insert = $this->M_item->save($data);
                }
        //var_dump($data);
        
        
        //echo json_encode(array("status" => TRUE));
        //redirect(base_url('dashboard'));

    }
 
  //   public function ajax_update() {
  //       $data = array(
  //               'channel_freq' => $this->input->post('channel_freq')
  //           );
  //       $this->M_channel->update(array(
		// 'channel_id' => $this->input->post('channel_id')), $data);
  //       echo json_encode(array("status" => TRUE));
  //   }
 
    public function ajax_delete($id) {
        $this->M_category->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
