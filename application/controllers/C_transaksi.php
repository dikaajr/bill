<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('M_transaksi');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'C Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'C Transaksi' => '',
        ];
        $data['code_js'] = 'c_transaksi/codejs';
        $data['page'] = 'c_transaksi/C_transaksi_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_transaksi->json();
    }

    public function read($id) 
    {
        $row = $this->M_transaksi->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaksi' => $row->id_transaksi,
		'id_revenue' => $row->id_revenue,
		'id_users' => $row->id_users,
		'tgl_dibuat' => $row->tgl_dibuat,
		'tgl_disetujui' => $row->tgl_disetujui,
		'status' => $row->status,
	    );
        $data['title'] = 'C Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_transaksi/C_transaksi_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_transaksi/create_action'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'id_revenue' => set_value('id_revenue'),
	    'id_users' => set_value('id_users'),
	    'tgl_dibuat' => set_value('tgl_dibuat'),
	    'tgl_disetujui' => set_value('tgl_disetujui'),
	    'status' => set_value('status'),
	);
        $data['title'] = 'C Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_transaksi/C_transaksi_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_revenue' => $this->input->post('id_revenue',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
		'tgl_dibuat' => $this->input->post('tgl_dibuat',TRUE),
		'tgl_disetujui' => $this->input->post('tgl_disetujui',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );$this->M_transaksi->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_transaksi'));}
    }
    
    public function update($id) 
    {
        $row = $this->M_transaksi->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_transaksi/update_action'),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'id_revenue' => set_value('id_revenue', $row->id_revenue),
		'id_users' => set_value('id_users', $row->id_users),
		'tgl_dibuat' => set_value('tgl_dibuat', $row->tgl_dibuat),
		'tgl_disetujui' => set_value('tgl_disetujui', $row->tgl_disetujui),
		'status' => set_value('status', $row->status),
	    );
            $data['title'] = 'C Transaksi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_transaksi/C_transaksi_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		'id_revenue' => $this->input->post('id_revenue',TRUE),
		'id_users' => $this->input->post('id_users',TRUE),
		'tgl_dibuat' => $this->input->post('tgl_dibuat',TRUE),
		'tgl_disetujui' => $this->input->post('tgl_disetujui',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->M_transaksi->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_transaksi->get_by_id($id);

        if ($row) {
            $this->M_transaksi->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_transaksi'));
        }
    }

    public function deletebulk(){
        $delete = $this->M_transaksi->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_revenue', 'id revenue', 'trim|required');
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');
	$this->form_validation->set_rules('tgl_dibuat', 'tgl dibuat', 'trim|required');
	$this->form_validation->set_rules('tgl_disetujui', 'tgl disetujui', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_transaksi.xls";
        $judul = "t_transaksi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

            $kolomhead = 0;
            xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Judul");
        xlsWriteLabel($tablehead, $kolomhead++, "Revenue");
        xlsWriteLabel($tablehead, $kolomhead++, "Month");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Pengguna");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Dibuat");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Disetujui");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");

    foreach ($this->M_transaksi->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->judul);
        xlsWriteNumber($tablebody, $kolombody++, $data->revenue);
        xlsWriteNumber($tablebody, $kolombody++, $data->month);
        xlsWriteLabel($tablebody, $kolombody++, $data->username);
        xlsWriteLabel($tablebody, $kolombody++, $data->tgl_dibuat);
        xlsWriteLabel($tablebody, $kolombody++, $data->tgl_disetujui);
        xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

  public function printdoc(){
        $data = array(
            'c_transaksi_data' => $this->M_transaksi->get_all(),
            'start' => 0
        );
        $this->load->view('c_transaksi/c_transaksi_print', $data);
    }

}

/* End of file C_transaksi.php */
/* Location: ./application/controllers/C_transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 12:37:01 */
/* http://harviacode.com */