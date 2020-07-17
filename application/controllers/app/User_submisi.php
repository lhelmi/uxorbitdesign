<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_submisi extends My_App 
{

    public $index = 'app/submisi/index';
    // public $detail = 'app/subm/detail';
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model('lms/M_Lesson');
        $this->load->model('user/M_Courses');
        $this->load->helper(array('form', 'url', 'download'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [
            'title' => 'Submisi',
            'div' => $this->M_Lesson->get_all(),
        ];
        $this->load->view($this->index, $data);
    }

    public function add_description()
	{
		$this->form_validation->set_rules('description', 'description', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
		if ($this->form_validation->run() == false) {
			$data['success'] = false;
			foreach ($_POST as $key => $value) {
				$data['messages'][$key]= form_error($key);
			}
			echo json_encode($data);
		}else{
			$gg['success'] = true;
			$gg['redirect'] = site_url('app/user_submisi');
			$data = [
				'description' => $this->input->post('description'),
			];
			$this->M_Lesson->update_description($this->input->post('id'), $data);
			echo json_encode($gg);

		}
    }

    public function get_id()
    {
        $this->M_Lesson->update_notif($_POST['id']);
        echo json_encode($this->M_Lesson->get_id($_POST['id']));
    }

    public function download($data)
    {
        force_download('storage/uploads/user/quiz/'.$data, null);
    }

    public function process_lesson()
    {
        /** check if ajax request */
        if ($this->input->is_ajax_request()) {

            $process = $this->M_Courses->process_lessons();
        } else {
            redirect(base_url());
        }
    }

    public function is_lulus()
    {

        if ($this->input->is_ajax_request()) {

            $post_data = [
                'id_user' => $_POST['id_member'],
                'id_courses' => $_POST['id_kursus'],
            ];
            $id_lesson = $this->input->post('id_lesson');
    
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
                            $data['status'] = true;
                            echo json_encode($data);
                        }else{
                            $data['status'] = false;
                            echo json_encode($data);
                        }
                    }
                }
            }
            
        } else {
            redirect(base_url());
        }
        
    }

}
