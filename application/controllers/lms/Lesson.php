<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson extends My_Lms{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('lms/_Lesson');
		$this->load->model('lms/_Courses');
		$this->load->model('lms/M_Lesson');
	}  

	public function index($slug,$section,$lesson)
	{
		
		$site = $this->site;
		$template = $this->template;
		$widget= $this->widget;
		$courses = $this->M_Lesson->data_course($site,$slug,$section,$lesson);
		$get_pertanyaan = $this->M_Lesson->get_pertanyaan($section);
		

		$post_data = [
			'id_user' => $this->session->userdata('id_user'),
			'id_courses' => $courses['id'],
		];
		$id_lesson = $lesson;

		$user_lesson = $this->_Process_MYSQL->get_data('tb_lms_user_lesson',$post_data);
		if ($user_lesson->num_rows() > 0) {
			$user_lesson = json_decode($user_lesson->row()->data,TRUE);		
			
			$previous_data = false;
			$status = false;
			$lesson_data_temp = [];
			foreach ($user_lesson as $lesson_data) {
				$lesson_data_temp[] = $lesson_data['id_lesson'];

				if ($lesson_data['id_lesson'] == $id_lesson) {	
					if ($lesson_data['status'] == true) {
						$is_lulus = true;
					}else{
						$is_lulus = '';
					}
				}else{
					$is_lulus = '';
				}
			}
		}else{
			$is_lulus = '';
		}

		if($courses['status'] !=='Draft'){
			$data = [
				'site' => $site,
				'template' => $template,
				'widget' => $widget,			
				'courses' => $courses,
				'section' => $section,
				'get_submisi' => $this->M_Lesson->get_submisi($lesson),
				'get_pertanyaan' => $this->M_Lesson->get_pertanyaan($lesson),
				'get_jawaban' => $this->M_Lesson->get_jawaban(),
				'is_lulus' => $is_lulus,
				'get_jawaban_user' => $this->M_Lesson->get_jawaban_user(),
			];
			// echo "<pre>";
			// 	var_dump($is_lulus);
			// echo "</pre>";
			$this->load->view('lms/'.$template['name'].'/lesson/index', $data);
		}else{
			$this->session->set_flashdata('Tutup', 'Maaf kelas yang anda akses sudah ditutup');
			redirect('user/courses');
		}
		
	}

}
