<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_partner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('M_partner');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'C Partner';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'C Partner' => '',
        ];
        $data['code_js'] = 'c_partner/codejs';
        $data['page'] = 'c_partner/C_partner_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_partner->json();
    }

    public function read($id) 
    {
        $row = $this->M_partner->get_by_id($id);
        if ($row) {
            $data = array(
		'id_partner' => $row->id_partner,
		'id_users' => $row->id_users,
		'namaPartner' => $row->namaPartner,
		'telp' => $row->telp,
		'bankacc' => $row->bankacc,
	    );
        $data['title'] = 'C Partner';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_partner/C_partner_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_partner'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_partner/create_action'),
	    'id_partner' => set_value('id_partner'),
	    'id_users' => set_value('id_users'),
	    'namaPartner' => set_value('namaPartner'),
	    'telp' => set_value('telp'),
	    'bankacc' => set_value('bankacc'),
	);
        $data['title'] = 'C Partner';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_partner/C_partner_form';
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
		'namaPartner' => $this->input->post('namaPartner',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'bankacc' => $this->input->post('bankacc',TRUE),
	    );$this->M_partner->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_partner'));}
    }
    
    public function update($id) 
    {
        $row = $this->M_partner->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_partner/update_action'),
		'id_partner' => set_value('id_partner', $row->id_partner),
		'id_users' => set_value('id_users', $row->id_users),
		'namaPartner' => set_value('namaPartner', $row->namaPartner),
		'telp' => set_value('telp', $row->telp),
		'bankacc' => set_value('bankacc', $row->bankacc),
	    );
            $data['title'] = 'C Partner';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_partner/C_partner_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_partner'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_partner', TRUE));
        } else {
            $data = array(
		'id_users' => $this->input->post('id_users',TRUE),
		'namaPartner' => $this->input->post('namaPartner',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'bankacc' => $this->input->post('bankacc',TRUE),
	    );

            $this->M_partner->update($this->input->post('id_partner', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_partner'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_partner->get_by_id($id);

        if ($row) {
            $this->M_partner->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_partner'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_partner'));
        }
    }

    public function deletebulk(){
        $delete = $this->M_partner->deletebulk();
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
	$this->form_validation->set_rules('namaPartner', 'namapartner', 'trim|required');
	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
	$this->form_validation->set_rules('bankacc', 'bankacc', 'trim|required');

	$this->form_validation->set_rules('id_partner', 'id_partner', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_partner.xls";
        $judul = "t_partner";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NamaPartner");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Bankacc");

	foreach ($this->M_partner->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaPartner);
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
            'c_partner_data' => $this->M_partner->get_all(),
            'start' => 0
        );
        $this->load->view('c_partner/c_partner_print', $data);
    }

}

/* End of file C_partner.php */
/* Location: ./application/controllers/C_partner.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 12:35:51 */
/* http://harviacode.com */