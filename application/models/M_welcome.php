<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_welcome extends CI_Model {

	var $table = 'paket';
    // var $column_order = array('channel_id','channel_freq',null); //set column field database for datatable orderable
    // var $column_search = array('channel_id','channel_freq'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    // var $order = array('channel_id' => 'desc'); // default order 

	function __construct() {
		parent::__construct();
	}

    function get_paket()
    {
        $this->db->from('paket');
        $query  = $this->db->get();
        return  $query->result();
    }

    
    function save($data2)
    {
        $this->db->insert('pesanan', $data2);
        return $this->db->insert_id();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 

}
