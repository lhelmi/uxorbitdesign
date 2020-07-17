<?php defined('BASEPATH') or exit('No direct script access allowed');

class Courses extends My_User
{

    public $index = 'user/courses/index';
    public $redirect = 'user/courses';

    public function __construct()
    {
        parent::__construct();

        $this->load->model('lms/_Lesson');
        $this->load->model('lms/_Courses');
        $this->load->model('user/M_Courses');
        $this->load->model('lms/M_Lesson');	
    }

    public function certificate($id)
	{
        $data = [
            'title' => 'Cetak sertifikat',
            'div' => $this->M_Courses->certificate($id),
        ];

		$this->load->view('user/courses/certificate', $data);
	}   

    public function index()
    {

        $site = $this->site;
        $widget = $this->widget;
        $courses = $this->M_Courses->read($site);
        $courses['first_lesson'] = '';
        $data = array(
            'site' => $site,
            'widget' => $widget,
            'courses' =>  $courses
        );

        $this->load->view($this->index, $data);
    }

    public function add_courses()
    {

        /** check if ajax request */
        if ($this->input->is_ajax_request()) {

            $process = $this->M_Courses->add_courses();
            $courses =  'courses';
            if ($process) {
                echo json_encode([
                    'status' => true,
                    'message' => $this->lang->line('success_add_courses')
                ]);
            } else {
                echo json_encode([
                    'status' => false,
                    'message' => $this->lang->line('failed_add_courses')
                ]);
            }
        } else {
            redirect(base_url());
        }
    }

    public function process_lesson()
    {
        /** check if ajax request */
        if ($this->input->is_ajax_request()) {

            $process = $this->M_Courses->process_lesson();
        } else {
            redirect(base_url());
        }
    }
}
