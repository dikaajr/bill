<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_pencipta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('M_pencipta');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'C Pencipta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'C Pencipta' => '',
        ];
        $data['code_js'] = 'c_pencipta/codejs';
        $data['page'] = 'c_pencipta/C_pencipta_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_pencipta->json();
    }

    public function read($id) 
    {
        $row = $this->M_pencipta->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pencipta' => $row->id_pencipta,
		'id_users' => $row->id_users,
		'namaPencipta' => $row->namaPencipta,
		'telp' => $row->telp,
		'bankacc' => $row->bankacc,
	    );
        $data['title'] = 'C Pencipta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_pencipta/C_pencipta_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_pencipta'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_pencipta/create_action'),
	    'id_pencipta' => set_value('id_pencipta'),
	    'id_users' => set_value('id_users'),
	    'namaPencipta' => set_value('namaPencipta'),
	    'telp' => set_value('telp'),
	    'bankacc' => set_value('bankacc'),
	);
        $data['title'] = 'C Pencipta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_pencipta/C_pencipta_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_users' => $this->input->post('id_users',TRUE),
		'namaPencipta' => $this->input->post('namaPencipta',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'bankacc' => $this->input->post('bankacc',TRUE),
	    );$this->M_pencipta->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_pencipta'));}
    }
    
    public function update($id) 
    {
        $row = $this->M_pencipta->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_pencipta/update_action'),
		'id_pencipta' => set_value('id_pencipta', $row->id_pencipta),
		'id_users' => set_value('id_users', $row->id_users),
		'namaPencipta' => set_value('namaPencipta', $row->namaPencipta),
		'telp' => set_value('telp', $row->telp),
		'bankacc' => set_value('bankacc', $row->bankacc),
	    );
            $data['title'] = 'C Pencipta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_pencipta/C_pencipta_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_pencipta'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pencipta', TRUE));
        } else {
            $data = array(
		'id_users' => $this->input->post('id_users',TRUE),
		'namaPencipta' => $this->input->post('namaPencipta',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'bankacc' => $this->input->post('bankacc',TRUE),
	    );

            $this->M_pencipta->update($this->input->post('id_pencipta', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_pencipta'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_pencipta->get_by_id($id);

        if ($row) {
            $this->M_pencipta->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_pencipta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_pencipta'));
        }
    }

    public function deletebulk(){
        $delete = $this->M_pencipta->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');
	$this->form_validation->set_rules('namaPencipta', 'namapencipta', 'trim|required');
	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
	$this->form_validation->set_rules('bankacc', 'bankacc', 'trim|required');

	$this->form_validation->set_rules('id_pencipta', 'id_pencipta', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_pencipta.xls";
        $judul = "t_pencipta";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Users");
	xlsWriteLabel($tablehead, $kolomhead++, "NamaPencipta");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Bankacc");

	foreach ($this->M_pencipta->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaPencipta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bankacc);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

  public function printdoc(){
        $data = array(
            'c_pencipta_data' => $this->M_pencipta->get_all(),
            'start' => 0
        );
        $this->load->view('c_pencipta/c_pencipta_print', $data);
    }

}

/* End of file C_pencipta.php */
/* Location: ./application/controllers/C_pencipta.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 12:36:14 */
/* http://harviacode.com */