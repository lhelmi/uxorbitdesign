<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_forum extends My_App 
{

    public $index = 'app/forum/index';
    public $detail = 'app/forum/detail';
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model('app/M_Forum');
        $this->load->model('lms/M_Lesson');
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'title' => 'Forum',
            'div' => $this->M_Forum->get_all(),
        ];
        $this->load->view($this->index, $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Forum',
            'get_byid' => $this->M_Lesson->get_byid($id),
            'get_comment' => $this->M_Lesson->get_comment($id),
            'id' => $id,
			
        ];
        $this->load->view($this->detail, $data);
    }

    public function add_comment()
	{
		$this->_rules_comment();
		if ($this->form_validation->run() == false) {
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);
		}else{
			$idff = $this->input->post('id');
			$gg['success'] = true;
			$gg['redirect'] = site_url('app/user_forum/detail/'.$idff);
			$data = [
				'forum_id' => $this->input->post('id'),
				'comment' => $this->input->post('comment'),
				'date' => date('Y:m:d H:i:s'),
				'user_id' => $this->session->userdata('id'),
			];
			$this->M_Lesson->insert_comment($data);
			echo json_encode($gg);

		}
    }

    public function delete_comment()
    {
        $this->M_Forum->delete_forum($_POST['id']);
        $this->M_Forum->delete_comment_byforum($_POST['id']);
        $data['success'] = true;
        echo json_encode($data);
    }

    public function delete()
    {
        $this->M_Forum->delete_forum($_POST['id']);
        $this->M_Forum->delete_comment_byforum($_POST['id']);
        $data['success'] = true;
        echo json_encode($data);
    }
    
    public function _rules_comment()
	{
		$this->form_validation->set_rules('comment', 'comment', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
	}
    
}
