<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model {

	var $table = 'pesanan';
    // var $column_order = array('channel_id','channel_freq',null); //set column field database for datatable orderable
    // var $column_search = array('channel_id','channel_freq'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    // var $order = array('channel_id' => 'desc'); // default order 

	function __construct() {
		parent::__construct();
	}
 
    function get_datatables()
    {
        // $this->_get_datatables_query();
        // if($_POST['length'] != -1)
        // $this->db->limit($_POST['length'], $_POST['start']);
        $user_id = $this->session->userdata('user_id');
        //var_dump($this->session->userdata('user_id'));
         $this->db->from($this->table);
         $this->db->join('user', 'user.user_id=pesanan.user_id', 'left');
         $this->db->join('paket', 'paket.id=pesanan.id_paket', 'left');
         $this->db->where("user.user_id = '".$user_id."'");
        $query = $this->db->get();
        return $query->result();
    }

    function get_paket()
    {
        $this->db->from('paket');
        $query  = $this->db->get();
        return  $query->result();
    }

    
    function save($data)
    {
        $this->db->insert('pesanan');
        return $this->db->insert_id();
    }
 

}
