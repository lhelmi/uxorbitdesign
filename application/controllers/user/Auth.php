<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends My_Site
{

	public $redirect_login = 'auth';
	public $redirect_register = 'auth/register';
	public $redirect_dashboard_user = 'user/courses';

	public $redirect_dashboard_instructor = 'app/lms_courses';
	public $redirect_dashboard_app = 'app/dashboard';

	public function __construct()
	{
		parent::__construct();

		$this->_Language->load();

		$this->load->library('form_validation');

		$this->load->model('user/M_Auth');
	}

	public function index()
	{

		if ($this->session->userdata('user')) {
			$this->M_Auth->check('exist','user','user/profile');
		}elseif ($this->session->userdata('status')) {
			$this->M_Auth->check('not_exist', 'status', 'auth');
		}

		$this->session->set_userdata('csrf_code', substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32));

		$site = $this->site;

		$data = array(
			'title' => $this->lang->line('login') . ' ' . $site['title'],
			'classbody' => 'o-page--center',
			'site' => $site
		);

		$this->load->view('user/auth/login', $data);
	}

	public function process_login()
	{
		$this->set_rules();
		if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
			$login = $this->M_Auth->login();

			if (!empty($this->input->post('redirect'))) {

				$redirect_url = $this->input->post('redirect');
				$redirect_status = false;

				if (filter_var($redirect_url, FILTER_VALIDATE_URL)) {

					$redirect_url = parse_url($redirect_url);
					$myurl = parse_url(base_url());

					if ($redirect_url['host'] == $myurl['host']) {
						$redirect_url = $this->input->post('redirect');
						$redirect_status = true;
					}
				}

				if ($redirect_status) {
					$redirect = '?' . http_build_query(['redirect' => $redirect_url]);
					$this->redirect_login = $this->redirect_login . $redirect;
					$this->redirect_dashboard = urldecode($redirect_url);
				} else {
					$this->redirect_dashboard = base_url($this->redirect_dashboard);
				}
			} else {
				$this->redirect_dashboard = base_url($this->redirect_dashboard);
			}

			if ($login == 'invalid') {

				$this->session->set_flashdata([
					'message' => true,
					'message_type' => 'alert-warning',
					'message_text' => $this->lang->line('invalid_csrf'),
				]);

				redirect(base_url($this->redirect_login));
			} elseif ($login == 'success_user') {

				redirect($this->redirect_dashboard_user);
			} elseif ($login == 'success_instructor') {

				redirect($this->redirect_dashboard_instructor);
			} elseif ($login == 'success_app') {

				redirect($this->redirect_dashboard_app);
			} elseif ($login == 'not_exist') {

				$this->session->set_flashdata([
					'message' => true,
					'message_type' => 'alert-danger',
					'message_text' => $this->lang->line('failed_login'),
				]);

				redirect(base_url($this->redirect_login));
			}
		}
	}

	public function register()
	{

		$this->M_Auth->check('exist', 'user', 'user/profile');

		$this->M_Auth->set_validation_register();

		$googlecaptcha = $this->M_Auth->googlecaptcha($this->site);

		if ($this->form_validation->run() != false and $googlecaptcha != false) {

			$register = $this->M_Auth->register();

			if ($register == 'invalid') {

				$this->session->set_flashdata([
					'message' => true,
					'message_type' => 'alert-warning',
					'message_text' => $this->lang->line('invalid_csrf'),
				]);

				redirect(base_url($this->redirect_register));
			} elseif ($register == 'success') {

				$email_vertification = $this->site['vertification_email'];

				$this->session->set_flashdata([
					'message' => true,
					'message_type' => 'alert-success',
					'message_text' => ($email_vertification == 'Yes') ? $this->lang->line('success_register_with_vertification') : $this->lang->line('success_register'),
				]);

				redirect(base_url($this->redirect_login));
			} else {

				$this->session->set_flashdata([
					'message' => true,
					'message_type' => 'alert-warning',
					'message_text' => $this->lang->line('failed_create'),
				]);

				redirect(base_url($this->redirect_register));
			}
		} else {

			$this->session->set_userdata('csrf_code', substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32));

			$site = $this->site;

			$data = array(
				'title' => $this->lang->line('register') . ' ' . $site['title'],
				'classbody' => 'o-page--center',
				'site' => $site
			);

			$this->load->view('user/auth/register', $data);
		}
	}

	public function confirm_email($code)
	{
		if ($this->M_Auth->verifyEmail($code)) {
			$this->session->set_flashdata([
				'message' => true,
				'message_type' => 'alert-success',
				'message_text' => $this->lang->line('success_confirm'),
			]);
		}

		redirect(base_url($this->redirect_login));
	}

	public function email_check($str)
	{
		$password = sha1($this->input->post('password'));
		$password_check = $this->M_Auth->password_checker($str, $password);
		$email_check = $this->M_Auth->email_check($str);
		if ($str)
		{
			if(!$email_check){
				$this->form_validation->set_message('email_check', 'Email yang Anda Masukan Tidak Terdaftar');
				return FALSE;
			}else{
				return TRUE;
			}
		}else{
			return FALSE;
		}
	}

	public function password_checker($str)
	{
		$email = $this->input->post('email');
		$password = sha1($this->input->post('password'));
		$password_check = $this->M_Auth->password_checker($email, $password);
		if ($str){
			if(!$password_check){
				$this->form_validation->set_message('password_checker', 'Password Salah');
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
	}

	public function set_rules()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_email_check');
		$this->form_validation->set_message('email', 'Field Email Tidak Boleh Kosong');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_password_checker');
		$this->form_validation->set_message('password', 'Field Password Tidak Boleh Kosong');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
	public function process_logout()
	{

		$logout = $this->M_Auth->logout();

		if ($logout == 'success') {
			redirect(base_url('auth'));
		}
	}
}
