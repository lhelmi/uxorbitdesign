<?php defined('BASEPATH') or exit('No direct script access allowed');

class Lms_courses extends My_App
{

    public $index = 'app/lms_courses/index';
    public $form = 'app/lms_courses/form';
    public $form_lesson = 'app/lms_courses/form-lesson';
    public $redirect = 'app/lms_courses';

    public function __construct()
    {
        parent::__construct();

        $this->load->model('app/M_LMS_Courses');
    }

    public function index()
    {

        $data = [
            'title' => 'Kelas Saya',
        ];

        $this->load->view($this->index, array_merge($data, $this->M_LMS_Courses->datatables()));
    }

    public function datatables()
    {

        $data = $this->M_LMS_Courses->data_table();

        echo $data;
    }

    public function create()
    {

        $data = array(
            'title' => 'Buat Kelas Baru',
            'ckeditor' => true,
            'onbeforeunload' => false,
            'dragula' => true,
        );

        $this->load->view($this->form, array_merge($data, $this->M_LMS_Courses->required()));
    }

    public function tarik_semua()
    {

        $data['id'] = $_POST['id'];

        $this->M_User_Transfer->process_tariks();
        $this->session->set_flashdata('message', 'Permintaan terkirim');
        echo json_encode($data);
    }

    public function update($id)
    {
        $data = array(
            'title' => 'Perbaharui Kelas',
            'ckeditor' => true,
            'onbeforeunload' => false,
            'dragula' => true,
            'data' => $this->M_LMS_Courses->data_update($id),
            'section' => $this->M_LMS_Courses->data_section($id),
        );

        $this->load->view($this->form, array_merge($data, $this->M_LMS_Courses->required()));
    }

    public function delete($id)
    {
        if ($this->M_LMS_Courses->process_delete($id) == TRUE) {
            echo true;
        } else {
            echo false;
        }
    }

    public function process()
    {

        if (!empty($this->input->post('id'))) {

            if ($this->M_LMS_Courses->process_update() == TRUE) {

                $this->session->set_flashdata([
                    'message' => true,
                    'message_type' => 'alert-success',
                    'message_text' => $this->lang->line('success_update'),
                ]);
            }

            if (!empty($this->input->post('save'))) {
                redirect($this->input->post('save'), 'refresh');
            } else {
                redirect(base_url($this->redirect));
            }
        } else {

            $create = $this->M_LMS_Courses->process_create();
            $this->session->set_flashdata([
                'message' => true,
                'message_type' => 'alert-success',
                'message_text' => 'Berhasil Membuat Kelas, Silahkan Tunggu Kelas Akan Segera Disetujui Oleh Admin',
            ]);
            if ($create) {
                redirect(base_url('app/lms_courses/update/' . $create . '?tab=material'));
            }
        }
    }

    public function process_multiple()
    {

        $id = explode(',', $this->input->post('id'));
        $action = $this->input->post('action');

        /**
         * Update Post to Published
         */
        if ($action == 'post') {

            foreach ($id as $key => $item) {
                $data[] = array(
                    'id' => $id[$key],
                    'status' => 'Published',
                );
            }

            if ($this->M_LMS_Courses->process_multiple_update($data) == TRUE) {
                echo true;
            } else {
                echo false;
            }
        }

        /**
         * Update Post to Draft
         */
        if ($action == 'draft') {

            foreach ($id as $key => $item) {
                $data[] = array(
                    'id' => $id[$key],
                    'status' => 'Draft',
                );
            }

            if ($this->M_LMS_Courses->process_multiple_update($data) == TRUE) {
                echo true;
            } else {
                echo false;
            }
        }

        /**
         * Delete Post
         */
        if ($action == 'delete') {

            if ($this->M_LMS_Courses->process_multiple_delete($id) == TRUE) {
                echo true;
            } else {
                echo false;
            }
        }
    }


    /**
     * process section
     */
    public function process_section()
    {

        if (!empty($this->input->post('id'))) {

            if ($this->M_LMS_Courses->process_section_update() == TRUE) {

                $this->session->set_flashdata([
                    'message' => true,
                    'message_type' => 'alert-success',
                    'message_text' => $this->lang->line('success_update'),
                ]);
            }
        } else {

            if ($this->M_LMS_Courses->process_section_create() == TRUE) {

                $this->session->set_flashdata([
                    'message' => true,
                    'message_type' => 'alert-success',
                    'message_text' => $this->lang->line('success_create'),
                ]);
            }
        }

        redirect($this->input->post('redirect'));
    }

    public function process_section_delete($id)
    {

        if ($this->M_LMS_Courses->process_section_delete($id) == TRUE) {
            $this->session->set_flashdata([
                'message' => true,
                'message_type' => 'alert-danger',
                'message_text' => $this->lang->line('success_delete'),
            ]);
        } else {
            $this->session->set_flashdata([
                'message' => true,
                'message_type' => 'alert-danger',
                'message_text' => $this->lang->line('failed_delete'),
            ]);
        }

        redirect($this->agent->referrer());
    }

    public function process_section_sort()
    {

        if ($this->M_LMS_Courses->process_section_sort() == TRUE) {

            $this->session->set_flashdata([
                'message' => true,
                'message_type' => 'alert-success',
                'message_text' => $this->lang->line('success_update'),
            ]);
        }

        redirect($this->input->post('redirect'));
    }


    /**
     * process lesson
     */
    public function create_lesson($id_section)
    {

        $data = array(
            'title' => 'Tambahkan Lesson',
            'ckeditor' => true,
            'id_section' => $id_section,
            'data' => $this->M_LMS_Courses->required_lesson($id_section),
        );

        $this->load->view($this->form_lesson, $data);
    }

    public function pertanyaanedit()
	{   
        $id_pertanyaan = $this->input->post('id');
        $pertanyaan = [
            'pertanyaan' => $this->input->post('pertanyaan'),
        ];
        $jawaban = [
            'is_true' => $this->input->post('is_true'),
            'jawabana' => $this->input->post('jawabana'),
            'jawabanb' => $this->input->post('jawabanb'),
            'jawabanc' => $this->input->post('jawabanc'),
            'jawaband' => $this->input->post('jawaband'),
        ];
        $data = [
            'pertanyaanubah' => $this->M_LMS_Courses->pertanyaanubah($_POST['id'], $pertanyaan),
            'jawabanubah' => $this->M_LMS_Courses->jawabanubah($_POST['id'], $jawaban),
            'success' => true,
        ];
        
		echo json_encode($data);
	}

    public function pertanyaanhapus()
	{   
        $data = [
            'pertanyaanhapus' => $this->M_LMS_Courses->pertanyaanhapus($_POST['id']),
            'jawabanhapus' => $this->M_LMS_Courses->jawabanhapus($_POST['id']),
        ];
        
		echo json_encode($data);
	}

    public function update_lesson($id_section, $id_lesson)
    {

        // $get_pertanyaan = $this->M_LMS_Courses->get_pertanyaan($id_lesson);
        // $get_jawaban = $this->M_LMS_Courses->get_jawaban();
        $data = array(
            'id_section' => $id_section,
            'get_pertanyaan' => $this->M_LMS_Courses->get_pertanyaan($id_lesson),
            'get_jawaban' => $this->M_LMS_Courses->get_jawaban(),
            'title' => 'Perbaharui Lesson',
            'ckeditor' => true,
            'data' => $this->M_LMS_Courses->required_lesson($id_section),
            'lesson' => $this->M_LMS_Courses->data_lesson_update($id_section, $id_lesson),
        );
        // foreach ($get_pertanyaan as $key => $value) {
        //     foreach ($get_jawaban as $kk => $vv) {
        //         if($value['idpertanyaan'] == $vv['id_pertanyaan']){
        //             echo $value['idpertanyaan'];
        //             echo '<br>';
        //         }
        //     }
        // }

        // echo "<pre>";
        //     var_dump($get_pertanyaan);
        // echo "<pre>";
        $this->load->view($this->form_lesson, $data);
    }

    public function process_lesson()
    {

        if (!empty($this->input->post('id'))) {

            if ($this->M_LMS_Courses->process_lesson_update() == TRUE) {
                $pertanyaan = array();
                $jawaban = array();
                $postx = $this->input->post();
                
                if($this->input->post('type') == 'PG'){
                    if(!empty($postx['pertanyaan'])){
                        foreach($postx['pertanyaan'] AS $key => $val){
                            $pertanyaan[] = array(
                                "pertanyaan" => $postx['pertanyaan'][$key],
                                "lesson_id" => $postx['id'],
                                "idpertanyaan" => $postx['idpertanyaan'][$key]
                            );
        
                            $jawaban[] = array(
                                "jawabana" => $postx['jawabana'][$key],
                                "jawabanb" => $postx['jawabanb'][$key],
                                "jawabanc" => $postx['jawabanc'][$key],
                                "jawaband" => $postx['jawaband'][$key],
                                "is_true" => $postx['is_true'][$key],
                                "id_pertanyaan" => $postx['idpertanyaan'][$key]
                            );
                        }
                    
                        // echo "<pre>";
                        // var_dump($jawaban);
                        // echo "</pre>";
    
                        $this->M_LMS_Courses->pertanyaan_insert($pertanyaan);
                        $this->M_LMS_Courses->jawaban_insert($jawaban);    
                    }
                }
                $this->session->set_flashdata([
                    'message' => true,
                    'message_type' => 'alert-success',
                    'message_text' => $this->lang->line('success_update'),
                ]);
            }
        } else {

            if ($xxo = $this->M_LMS_Courses->process_lesson_create()) {
                
                $pertanyaan = array();
                $jawaban = array();
                $postx = $this->input->post();
                
                if(!empty($postx['pertanyaan'])){
                    foreach($postx['pertanyaan'] AS $key => $val){
                        $pertanyaan[] = array(
                            "pertanyaan" => $postx['pertanyaan'][$key],
                            "lesson_id" => $xxo,
                            "idpertanyaan" => $postx['idpertanyaan'][$key]
                        );
    
                        $jawaban[] = array(
                            "jawabana" => $postx['jawabana'][$key],
                            "jawabanb" => $postx['jawabanb'][$key],
                            "jawabanc" => $postx['jawabanc'][$key],
                            "jawaband" => $postx['jawaband'][$key],
                            "is_true" => $postx['is_true'][$key],
                            "id_pertanyaan" => $postx['idpertanyaan'][$key]
                        );
                    }
                    $this->M_LMS_Courses->pertanyaan_insert($pertanyaan);
                    $this->M_LMS_Courses->jawaban_insert($jawaban);
                }
                
                
                // echo "<pre>";
                // var_dump($pertanyaan);
                // echo "</pre>";

                
                $this->session->set_flashdata([
                    'message' => true,
                    'message_type' => 'alert-success',
                    'message_text' => $this->lang->line('success_create'),
                ]);
            }
        }

        redirect(base_url('app/lms_courses/update/' . $this->input->post('id_courses') . "?tab=material"));
    }

    public function process_lesson_delete($id)
    {

        if ($this->M_LMS_Courses->process_lesson_delete($id) == TRUE) {
            $this->session->set_flashdata([
                'message' => true,
                'message_type' => 'alert-danger',
                'message_text' => $this->lang->line('success_delete'),
            ]);
        } else {
            $this->session->set_flashdata([
                'message' => true,
                'message_type' => 'alert-danger',
                'message_text' => $this->lang->line('failed_delete'),
            ]);
        }

        redirect($this->agent->referrer());
    }

    public function process_lesson_sort()
    {

        if ($this->M_LMS_Courses->process_lesson_sort() == TRUE) {

            $this->session->set_flashdata([
                'message' => true,
                'message_type' => 'alert-success',
                'message_text' => $this->lang->line('success_update'),
            ]);
        }

        redirect($this->input->post('redirect'));
    }
}
