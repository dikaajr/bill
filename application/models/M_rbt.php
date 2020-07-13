<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_rbt extends CI_Model
{

    public $table = 't_rbt';
    public $id = 'id_rbt';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_rbt,judul,artis,namaPencipta,namaPartner,kdTsel,kdXL,kdIsat,kdM8,kdFlexi');
        $this->datatables->from('t_rbt a');
		$this->datatables->join('t_partner p','p.id_partner=a.partnerId','inner');
        $this->datatables->join('t_pencipta tp','tp.id_pencipta=a.penciptaId','inner');
        //add this line for join
        //$this->datatables->join('table2', 't_rbt.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('c_rbt/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"')."  ".anchor(site_url('c_rbt/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'c_rbt/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_rbt');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_rbt', $q);
	$this->db->or_like('judul', $q);
	$this->db->or_like('artis', $q);
	$this->db->or_like('penciptaId', $q);
	$this->db->or_like('partnerId', $q);
	$this->db->or_like('kdTsel', $q);
	$this->db->or_like('kdXL', $q);
	$this->db->or_like('kdIsat', $q);
	$this->db->or_like('kdM8', $q);
	$this->db->or_like('kdFlexi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_rbt', $q);
	$this->db->or_like('judul', $q);
	$this->db->or_like('artis', $q);
	$this->db->or_like('penciptaId', $q);
	$this->db->or_like('partnerId', $q);
	$this->db->or_like('kdTsel', $q);
	$this->db->or_like('kdXL', $q);
	$this->db->or_like('kdIsat', $q);
	$this->db->or_like('kdM8', $q);
	$this->db->or_like('kdFlexi', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete bulkdata
    function deletebulk(){
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data); 
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }


}

/* End of file M_rbt.php */
/* Location: ./application/models/M_rbt.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 12:36:34 */
/* http://harviacode.com */