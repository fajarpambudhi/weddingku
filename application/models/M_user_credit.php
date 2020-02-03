<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user_credit extends CI_Model {

	var $table = 'user_credit';
    // var $column_order = array('channel_id','channel_freq',null); //set column field database for datatable orderable
    // var $column_search = array('channel_id','channel_freq'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    // var $order = array('channel_id' => 'desc'); // default order 

	function __construct() {
		parent::__construct();
	}

	
    private function _get_datatables_query() {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        // $this->_get_datatables_query();
        // if($_POST['length'] != -1)
        // $this->db->limit($_POST['length'], $_POST['start']);
        $user_id = $this->session->userdata('user_id');
        //var_dump($this->session->userdata('user_id'));
         $this->db->select('*, user_credit.user_credit_id as id, user_credit.status as status')
                    ->from('pesanan, user_credit, paket')
                    ->where("user_credit.user_id = '".$user_id."' 
                            AND pesanan.kode_transaksi = user_credit.kode_transaksi
                            AND pesanan.id_paket = paket.id
                            AND user_credit.kode_transaksi!= '0'");
        $query = $this->db->get();
        return $query->result();
    }
    function misal()
    {
        $this->db->select('*, user_credit.user_credit_id as id')
                    ->from('pesanan, paket, user_credit, user')
                    ->where('pesanan.id_paket = paket.id AND pesanan.kode_transaksi = user_credit.kode_transaksi AND user_credit.user_id = user.user_id');
        $query=$this->db->get();

        return $query->result();
    }
     function misal1()
    {
        $this->db->select('*,pesanan.id as id, paket.price as price')
                    ->from('pesanan, paket,user')
                    ->where('pesanan.id_paket = paket.id AND pesanan.user_id = user.user_id');
        $query=$this->db->get();

        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('channel_id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete($this->table);
    }

}
