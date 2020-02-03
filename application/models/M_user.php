<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	var $table = 'user';
    var $column_order = array('user_id','user_email', 'user_name'); //set column field database for datatable orderable
    var $column_search = array('user_id', 'user_email', 'user_name'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('user_id' => 'desc'); // default order 

	function __construct() {
		parent::__construct();
        $this->load->database();
	}

	
    private function _get_datatables_query() {
         
        // $this->tt_scm->from($this->table);
        $this->tt_scm->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->tt_scm->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->tt_scm->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->tt_scm->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->tt_scm->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->tt_scm->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->tt_scm->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        // $this->_get_datatables_query();
        // if($_POST['length'] != -1)
        // $this->tt_scm->limit($_POST['length'], $_POST['start']);
        
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }
     function misal2()
    {
        $this->db->select('')
                    ->from('user');
        $query=$this->db->get();

        return $query->result();
    }
    
    function get_enginer()
    {
        // $this->_get_datatables_query();
        // if($_POST['length'] != -1)
        $position_id='7';
         $this->tt_scm->from($this->table);
        //$this->tt_scm->limit($_POST['length'], $_POST['start']);
        $query = $this->tt_scm->where('position_id',$position_id)->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->tt_scm->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->tt_scm->from($this->table);
        return $this->tt_scm->count_all_results();
    }

    function cek($username, $password){
		// $this->db->where(array('email'=>$username , 'password'=>$password));
		// return $this->db->get($this->table);

         $this->db->from($this->table);
        $this->db->where(array('email'=>$username , 'password'=>$password));
        $query = $this->db->get();
 
        return $query;
	}
 
    public function get_by_id($id)
    {
        $this->tt_scm->from($this->table);
        $this->tt_scm->where('user_id',$id);
        $query = $this->tt_scm->get();
 
        return $query->row();
    }
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->tt_scm->update($this->table, $data, $where);
        return $this->tt_scm->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete($this->table);
    }

}
