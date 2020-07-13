<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    public $table = 't_transaksi';
    public $id = 'id_transaksi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('t.id_transaksi,tr.judul,r.revenue,r.month,u.username,t.tgl_dibuat,t.tgl_disetujui,t.status');
        $this->datatables->from('t_transaksi t');
        $this->datatables->join('t_revenue r','r.id_revenue=t.id_revenue','inner');
        $this->datatables->join('t_rbt tr','tr.id_rbt=r.id_rbt','inner');
        $this->datatables->join('users u','u.id=t.id_users','inner');
        //add this line for join
        //$this->datatables->join('table2', 't_transaksi.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('c_transaksi/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"')."  ".anchor(site_url('c_transaksi/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'c_transaksi/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_transaksi');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result();
        $this->db->select('t.id_transaksi,tr.judul,r.revenue,r.month,u.username,t.tgl_dibuat,t.tgl_disetujui,t.status');
        //$this->datatables->from('t_transaksi');
        $this->db->from('t_transaksi t');
        $this->db->join('t_revenue r','r.id_revenue=t.id_revenue','inner');
        $this->db->join('t_rbt tr','tr.id_rbt=r.id_rbt','inner');
        $this->db->join('users u','u.id=t.id_users','inner');
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_transaksi', $q);
	$this->db->or_like('id_revenue', $q);
	$this->db->or_like('id_users', $q);
	$this->db->or_like('tgl_dibuat', $q);
	$this->db->or_like('tgl_disetujui', $q);
	$this->db->or_like('status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi', $q);
	$this->db->or_like('id_revenue', $q);
	$this->db->or_like('id_users', $q);
	$this->db->or_like('tgl_dibuat', $q);
	$this->db->or_like('tgl_disetujui', $q);
	$this->db->or_like('status', $q);
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

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 12:37:01 */
/* http://harviacode.com */