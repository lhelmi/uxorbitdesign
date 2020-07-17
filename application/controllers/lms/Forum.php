<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends My_User{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('lms/_Lesson');
        $this->load->model('lms/_Courses');
        $this->load->model('user/M_Courses');
        $this->load->model('lms/M_Lesson');	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
	}  

	public function index($id)
	{
		$id_user = $this->session->userdata('id_user');
		$is_mentor_valid = $this->M_Lesson->is_mentor_valid($id_user, $id);
		$is_user_valid = $this->M_Lesson->is_user_valid($id_user, $id);
		if(!empty($is_mentor_valid) or !empty($is_user_valid)){
			$site = $this->site;
			$widget = $this->widget;
			$courses = $this->M_Courses->read($site);
			$id_courses = $id;

			$data = array(
				'site' => $site,
				'widget' => $widget,
				'courses' =>  $courses,
				'get_qna' => $this->M_Lesson->get_qna($id),
				'id_courses' => $id_courses,
			);
			// var_dump($id_user);
			$this->load->view('lms/default-app/forum/index', $data);
		}
	}

	public function add($id)
	{
		$id_user = $this->session->userdata('id_user');
		$is_mentor_valid = $this->M_Lesson->is_mentor_valid($id_user, $id);
		$is_user_valid = $this->M_Lesson->is_user_valid($id_user, $id);
		if(!empty($is_mentor_valid) or !empty($is_user_valid)){

			$id_courses = $id;
			$site = $this->site;
			$widget = $this->widget;
			$courses = $this->M_Courses->read($site);

			$data = [
				'site' => $site,
				'widget' => $widget,
				'courses' =>  $courses,
				'get_section' => $this->M_Lesson->get_section($id),
				'id_courses' => $id_courses,
			];
			$this->load->view('lms/default-app/forum/add', $data);
		}
	}

	public function detail($id, $idless)
	{
		$id_user = $this->session->userdata('id_user');
		$is_mentor_valid = $this->M_Lesson->is_mentor_valid($id_user, $idless);
		$is_user_valid = $this->M_Lesson->is_user_valid($id_user, $idless);
		if(!empty($is_mentor_valid) or !empty($is_user_valid)){
			$id = $id;
			$site = $this->site;
			$widget = $this->widget;
			$courses = $this->M_Courses->read($site);
			
			$data = [
				'site' => $site,
				'widget' => $widget,
				'courses' =>  $courses,
				'get_byid' => $this->M_Lesson->get_byid($id),
				'get_comment' => $this->M_Lesson->get_comment($id),
				'id' => $id,
				'idless' => $idless,
			];
			$this->load->view('lms/default-app/forum/detail', $data);
		}
	}

	public function insert()
	{
		$this->_rules();
		if ($this->form_validation->run() == false) {
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);
		}else{
			$id = $this->input->post('id_courses');
			$gg['success'] = true;
			$gg['redirect'] = site_url('Forum/'. $id);
			$data = [
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'date' => $this->input->post('description'),
				'tb_lms_courses_lesson_id' => $this->input->post('tb_lms_courses_lesson_id'),
				'tb_lms_courses_section_id' => $this->input->post('tb_lms_courses_section_id'),
				'date' => date('Y:m:d H:i:s'),
				'user_id' => $this->session->userdata('id_user'),
			];
			$this->M_Lesson->insert($data);
			echo json_encode($gg);
		}
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
			$idless = $this->input->post('idless');
			$idff = $this->input->post('id');
			$gg['success'] = true;
			$gg['redirect'] = site_url('pertanyaan/'. $idff.'/'. $idless);
			$data = [
				'forum_id' => $this->input->post('id'),
				'comment' => $this->input->post('comment'),
				'date' => date('Y:m:d H:i:s'),
				'user_id' => $this->session->userdata('id_user'),
			];
			$this->M_Lesson->insert_comment($data);
			echo json_encode($gg);

		}
	}
	
	public function get_lesson()
	{
        $id = $_POST['id'];
		$data = 
		[
			'get_lesson' => $this->M_Lesson->get_lesson($id),
		];
		echo json_encode($data);
	}
	
	public function addquiz()
	{
		if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = './storage/uploads/user/quiz/';
            $config['allowed_types'] = 'zip|rar';
			$config['max_size']  = '10240';
			$spacing = str_replace(' ', '', $_FILES["file"]['name']);
			$new_name = $this->session->userdata('username').time().$spacing;
			$config['file_name'] = $new_name;
			
			$checkfile = $this->M_Lesson->get_submisi($this->input->post('id_lesson'));
			$this->load->library('upload', $config);
			if($checkfile){
				if($checkfile['file'] !== '' or $checkfile['id_lms_courses_lesson'] !== '' or $checkfile['description'] !== '' or $checkfile['id_user'] !== ''){
					if($checkfile['file'] !== ''){
						array_map('unlink', glob(FCPATH."storage/uploads/user/quiz/". $checkfile['file']));
					}
					if ($this->upload->do_upload('file')) {
						$file = $new_name;
						$data = [
							'file' => $file,
							'is_read' => '0',
						];
						$this->M_Lesson->update_file($this->input->post('id'), $data);
						$this->M_Courses->process_quiz();
						$data['success'] = true;
						echo json_encode($data);
						
					}else{
						$data['message'] = 'Upload gagal, pastikan file yang anda kirim berekstensi .zip atau .rar ';
						$data['success'] = false;
						echo json_encode($data);
					}
				}
			}else{
				if ($this->upload->do_upload('file')) {
					$file = $this->upload->data('file_name');
					$data = [
						'file' => $file,
						'id_lms_courses_lesson' => $this->input->post('id_lesson'),
						'id_user' => $this->session->userdata('id_user'),
					];
					$this->M_Lesson->quiz_insert($data);
					$data['success'] = true;
					echo json_encode($data);
				}else{
					$data['message'] = 'Upload gagal, pastikan file yang anda kirim berekstensi .zip atau .rar ';
					$data['success'] = false;
					echo json_encode($data);
				}
			}
        }else{
			$data['message'] = 'File harus diisi';
            $data['success'] = false;
            echo json_encode($data);
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('title', 'title', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('description', 'description', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('tb_lms_courses_lesson_id', 'tb_lms_courses_lesson_id', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('tb_lms_courses_section_id', 'tb_lms_courses_section_id', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
	}

	public function _rules_comment()
	{
		$this->form_validation->set_rules('comment', 'comment', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
	}

}