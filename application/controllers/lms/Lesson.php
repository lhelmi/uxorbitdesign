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
		if($courses['status'] !=='Draft'){
			$data = [
				'site' => $site,
				'template' => $template,
				'widget' => $widget,			
				'courses' => $courses,
				'section' => $section,
				'get_submisi' => $this->M_Lesson->get_submisi($lesson),
			];
			$this->load->view('lms/'.$template['name'].'/lesson/index', $data);
		}else{
			$this->session->set_flashdata('Tutup', 'Maaf kelas yang anda akses sudah ditutup');
			redirect('user/courses');
		}
		
	}

}
