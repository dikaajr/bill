<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_rbt extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('M_rbt');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'C Rbt';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'C Rbt' => '',
        ];
        $data['code_js'] = 'c_rbt/codejs';
        $data['page'] = 'c_rbt/C_rbt_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->M_rbt->json();
    }

    public function read($id) 
    {
        $row = $this->M_rbt->get_by_id($id);
        if ($row) {
            $data = array(
		'id_rbt' => $row->id_rbt,
		'judul' => $row->judul,
		'artis' => $row->artis,
		'penciptaId' => $row->penciptaId,
		'partnerId' => $row->partnerId,
		'kdTsel' => $row->kdTsel,
		'kdXL' => $row->kdXL,
		'kdIsat' => $row->kdIsat,
		'kdM8' => $row->kdM8,
		'kdFlexi' => $row->kdFlexi,
	    );
        $data['title'] = 'C Rbt';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_rbt/C_rbt_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_rbt'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('c_rbt/create_action'),
	    'id_rbt' => set_value('id_rbt'),
	    'judul' => set_value('judul'),
	    'artis' => set_value('artis'),
	    'penciptaId' => set_value('penciptaId'),
	    'partnerId' => set_value('partnerId'),
	    'kdTsel' => set_value('kdTsel'),
	    'kdXL' => set_value('kdXL'),
	    'kdIsat' => set_value('kdIsat'),
	    'kdM8' => set_value('kdM8'),
	    'kdFlexi' => set_value('kdFlexi'),
	);
        $data['title'] = 'C Rbt';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_rbt/C_rbt_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'artis' => $this->input->post('artis',TRUE),
		'penciptaId' => $this->input->post('penciptaId',TRUE),
		'partnerId' => $this->input->post('partnerId',TRUE),
		'kdTsel' => $this->input->post('kdTsel',TRUE),
		'kdXL' => $this->input->post('kdXL',TRUE),
		'kdIsat' => $this->input->post('kdIsat',TRUE),
		'kdM8' => $this->input->post('kdM8',TRUE),
		'kdFlexi' => $this->input->post('kdFlexi',TRUE),
	    );$this->M_rbt->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('c_rbt'));}
    }
    
    public function update($id) 
    {
        $row = $this->M_rbt->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('c_rbt/update_action'),
		'id_rbt' => set_value('id_rbt', $row->id_rbt),
		'judul' => set_value('judul', $row->judul),
		'artis' => set_value('artis', $row->artis),
		'penciptaId' => set_value('penciptaId', $row->penciptaId),
		'partnerId' => set_value('partnerId', $row->partnerId),
		'kdTsel' => set_value('kdTsel', $row->kdTsel),
		'kdXL' => set_value('kdXL', $row->kdXL),
		'kdIsat' => set_value('kdIsat', $row->kdIsat),
		'kdM8' => set_value('kdM8', $row->kdM8),
		'kdFlexi' => set_value('kdFlexi', $row->kdFlexi),
	    );
            $data['title'] = 'C Rbt';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'c_rbt/C_rbt_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_rbt'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rbt', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'artis' => $this->input->post('artis',TRUE),
		'penciptaId' => $this->input->post('penciptaId',TRUE),
		'partnerId' => $this->input->post('partnerId',TRUE),
		'kdTsel' => $this->input->post('kdTsel',TRUE),
		'kdXL' => $this->input->post('kdXL',TRUE),
		'kdIsat' => $this->input->post('kdIsat',TRUE),
		'kdM8' => $this->input->post('kdM8',TRUE),
		'kdFlexi' => $this->input->post('kdFlexi',TRUE),
	    );

            $this->M_rbt->update($this->input->post('id_rbt', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('c_rbt'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_rbt->get_by_id($id);

        if ($row) {
            $this->M_rbt->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('c_rbt'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('c_rbt'));
        }
    }

    public function deletebulk(){
        $delete = $this->M_rbt->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('artis', 'artis', 'trim|required');
	$this->form_validation->set_rules('penciptaId', 'penciptaid', 'trim|required');
	$this->form_validation->set_rules('partnerId', 'partnerid', 'trim|required');
	$this->form_validation->set_rules('kdTsel', 'kdtsel', 'trim|required');
	$this->form_validation->set_rules('kdXL', 'kdxl', 'trim|required');
	$this->form_validation->set_rules('kdIsat', 'kdisat', 'trim|required');
	$this->form_validation->set_rules('kdM8', 'kdm8', 'trim|required');
	$this->form_validation->set_rules('kdFlexi', 'kdflexi', 'trim|required');

	$this->form_validation->set_rules('id_rbt', 'id_rbt', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_rbt.xls";
        $judul = "t_rbt";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Artis");
	xlsWriteLabel($tablehead, $kolomhead++, "PenciptaId");
	xlsWriteLabel($tablehead, $kolomhead++, "PartnerId");
	xlsWriteLabel($tablehead, $kolomhead++, "KdTsel");
	xlsWriteLabel($tablehead, $kolomhead++, "KdXL");
	xlsWriteLabel($tablehead, $kolomhead++, "KdIsat");
	xlsWriteLabel($tablehead, $kolomhead++, "KdM8");
	xlsWriteLabel($tablehead, $kolomhead++, "KdFlexi");

	foreach ($this->M_rbt->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->artis);
	    xlsWriteNumber($tablebody, $kolombody++, $data->penciptaId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->partnerId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdTsel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdXL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdIsat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdM8);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kdFlexi);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

  public function printdoc(){
        $data = array(
            'c_rbt_data' => $this->M_rbt->get_all(),
            'start' => 0
        );
        $this->load->view('c_rbt/c_rbt_print', $data);
    }

}

/* End of file C_rbt.php */
/* Location: ./application/controllers/C_rbt.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-03 12:36:34 */
/* http://harviacode.com */