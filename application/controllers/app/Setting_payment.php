<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setting_payment extends My_App
{

	public $index = 'app/setting_payment/index';
	public $redirect = 'app/setting_payment';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('app/M_Setting_General');
		$this->load->model('app/M_Setting_Payment');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}

	public function index()
	{

		$data = array(
			'databank' => $this->M_Setting_General->get_by_id(),
			'get_confirm_id' => $this->M_Setting_General->get_confirm_id(),
			'title' => 'Pengaturan Payment',
			'site' => $this->M_Setting_General->read_data(),
			'payment' => $this->M_Setting_Payment->read_data(),
		);

		$this->load->view($this->index, $data);
	}

	public function process_setting()
	{
		$process = $this->M_Setting_Payment->process_payment_setting();

		if ($process) {
			$this->session->set_flashdata([
				'message' => true,
				'message_type' => 'alert-success',
				'message_text' => $this->lang->line('success_update'),
			]);
		}

		redirect(base_url($this->redirect));
	}

	public function get_confirm()
	{
		echo json_encode($this->M_Setting_General->get_conf_id($_POST['id']));
	}

	public function get_trans()
	{
		echo json_encode($this->M_Setting_General->get_bank_id($_POST['id']));
	}
	
	// public function delete($type, $identity)
	public function delete()
	{
		echo json_encode($this->M_Setting_General->delete_trans($_POST['id']));
	}

	
	public function cont_delete()
	{
		echo json_encode($this->M_Setting_General->cont_delete($_POST['id']));
	}

	public function update(){
		$this->_rules();
		$id = $_POST['id'];
		if ($this->form_validation->run() == false) {
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);
		}else{
			$data['success'] = true;
			$data = [
				'id_user' => $this->session->userdata('id'),
				'type' => $this->input->post('type'),
				'account_number' => $this->input->post('account_number'),
				'receiver' => $this->input->post('receiver'),
			];
			$this->M_Setting_General->update($data, $id);
			echo json_encode($data);
		}
	}

	public function confirmation_create()
	{
		$this->_contarules();
		if ($this->form_validation->run() == false) {
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);
		}else{
			$data['success'] = true;
			$data = [
				'user_id' => $this->session->userdata('id'),
				'medium' => $this->input->post('medium'),
				'description' => $this->input->post('description'),
			];
			$this->M_Setting_General->containsert($data);
			echo json_encode($data);
		}
	}

	public function getconfirm()
	{
		echo json_encode($this->M_Setting_General->get_confirm($_POST['id']));
	}

	public function contupdate()
	{
		$id = $_POST['id'];
		$this->_contarules();
		if ($this->form_validation->run() == false) {
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);
		}else{
			$data['success'] = true;
			$data = [
				'user_id' => $this->session->userdata('id'),
				'medium' => $this->input->post('medium'),
				'description' => $this->input->post('description'),
			];
			$this->M_Setting_General->cont_update($data, $id);
			echo json_encode($data);
		}
	}

	public function create()
	{
		$this->_rules();
		if ($this->form_validation->run() == false) {
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);
		}else{
			$data['success'] = true;
			$data = [
				'id_user' => $this->session->userdata('id'),
				'type' => $this->input->post('type'),
				'account_number' => $this->input->post('account_number'),
				'receiver' => $this->input->post('receiver'),
			];
			$this->M_Setting_General->insert($data);
			echo json_encode($data);
		}
	}

	

	public function _contarules() 
    {
    	$this->form_validation->set_rules('medium', 'medium', 'required|trim');
		$this->form_validation->set_message('medium', 'Field Media Tidak Boleh Kosong');
		$this->form_validation->set_rules('description', 'description', 'required|trim');
		$this->form_validation->set_message('description', 'Field description Tidak Boleh Kosong');
		
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

	public function _rules() 
    {
    	$this->form_validation->set_rules('type', 'type', 'required|trim');
		$this->form_validation->set_message('type', 'Field Email Tidak Boleh Kosong');
		$this->form_validation->set_rules('account_number', 'account_number', 'required|trim');
		$this->form_validation->set_message('account_number', 'Field account number Tidak Boleh Kosong');
		$this->form_validation->set_rules('receiver', 'receiver', 'required|trim');
		$this->form_validation->set_message('receiver', 'Field Receiver Tidak Boleh Kosong');
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }
}
