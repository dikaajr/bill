<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_revenue extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('M_revenue');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Pendapatan Lagu RBT';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pendapatan RBT' => '',
        ];
        $data['code_js'] = 'c_revenue/codejs';
        $data['page'] = 'c_revenue/C_revenue_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_revenue->json();
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_revenue/create_action'),
	    'id_revenue' => set_value('id_revenue'),
	    'id_rbt' => set_value('id_rbt'),
	    'revenue' => set_value('revenue'),
	    'month' => set_value('month'),
	    'download' => set_value('download'),
	    'renew' => set_value('renew'),
	    'campaign' => set_value('campaign'),
	    'status' => set_value('status'),
	);
        $data['title'] = 'Masukan Pendapatan Lagu RBT';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_revenue/C_revenue_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_rbt' => $this->input->post('id_rbt',TRUE),
		'revenue' => $this->input->post('revenue',TRUE),
		'month' => $this->input->post('month',TRUE),
		'download' => $this->input->post('download',TRUE),
		'renew' => $this->input->post('renew',TRUE),
		'campaign' => $this->input->post('campaign',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );$this->M_revenue->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_revenue'));}
    }
    
    public function update($id) 
    {
        $row = $this->M_revenue->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_revenue/update_action'),
		'id_revenue' => set_value('id_revenue', $row->id_revenue),
		'id_rbt' => set_value('id_rbt', $row->id_rbt),
		'revenue' => set_value('revenue', $row->revenue),
		'month' => set_value('month', $row->month),
		'download' => set_value('download', $row->download),
		'renew' => set_value('renew', $row->renew),
		'campaign' => set_value('campaign', $row->campaign),
		'status' => set_value('status', $row->status),
	    );
            $data['title'] = 'Edit Pendapatan Lagu RBT';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Edit Pendapatan RBT' => '',
        ];

        $data['page'] = 'c_revenue/C_revenue_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_revenue'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_revenue', TRUE));
        } else {
            $data = array(
		'id_rbt' => $this->input->post('id_rbt',TRUE),
		'revenue' => $this->input->post('revenue',TRUE),
		'month' => $this->input->post('month',TRUE),
		'download' => $this->input->post('download',TRUE),
		'renew' => $this->input->post('renew',TRUE),
		'campaign' => $this->input->post('campaign',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->M_revenue->update($this->input->post('id_revenue', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_revenue'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_revenue->get_by_id($id);

        if ($row) {
            $this->M_revenue->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_revenue'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_revenue'));
        }
    }

    public function deletebulk(){
        $delete = $this->M_revenue->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_rbt', 'id rbt', 'trim|required');
	$this->form_validation->set_rules('revenue', 'revenue', 'trim|required');
	$this->form_validation->set_rules('month', 'month', 'trim|required');
	$this->form_validation->set_rules('download', 'download', 'trim|required');
	$this->form_validation->set_rules('renew', 'renew', 'trim|required');
	$this->form_validation->set_rules('campaign', 'campaign', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_revenue', 'id_revenue', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_revenue.xls";
        $judul = "t_revenue";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Judul RBT");
	xlsWriteLabel($tablehead, $kolomhead++, "Revenue");
	xlsWriteLabel($tablehead, $kolomhead++, "Month");
	xlsWriteLabel($tablehead, $kolomhead++, "Download");
	xlsWriteLabel($tablehead, $kolomhead++, "Renew");
	xlsWriteLabel($tablehead, $kolomhead++, "Campaign");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->M_revenue->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->revenue);
	    xlsWriteLabel($tablebody, $kolombody++, $data->month);
	    xlsWriteNumber($tablebody, $kolombody++, $data->download);
	    xlsWriteNumber($tablebody, $kolombody++, $data->renew);
	    xlsWriteNumber($tablebody, $kolombody++, $data->campaign);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

  public function printdoc(){
        $data = array(
            'c_revenue_data' => $this->M_revenue->get_all(),
            'start' => 0
        );
        $this->load->view('c_revenue/c_revenue_print', $data);
    }

}

/* End of file C_revenue.php */
/* Location: ./application/controllers/C_revenue.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 12:36:45 */
/* http://harviacode.com */