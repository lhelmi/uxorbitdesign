<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mentor extends My_App
{

    public $index = 'app/mentor/index';
    public $form = 'app/mentor/form';
    public $redirect = 'app/mentor';

    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');

        $this->load->model('app/M_Mentor');         
    }    

    public function index()
    {

        $data = [
        'title' => 'Mentor',
        ];

        $this->load->view($this->index, array_merge($data,$this->M_Mentor->datatables()));
    }    


    public function datatables()
    {

        $data = $this->M_Mentor->data_table();

        echo $data;
    }

    public function create()
    {

        $this->M_Mentor->set_validation();

        if($this->form_validation->run() != false){

            $this->process();

        }else{            

            $data = array(
                'title' => 'Create',
                );

            $this->load->view($this->form, $data);
        }

    }    

    public function update($id){

        $this->M_Mentor->set_validation();

        if($this->form_validation->run() != false){

            $this->process();
            
        }else{    
            
            $data = array(
                'title' => 'Update',
                'user' => $this->M_Mentor->data_update($id),
                );

            $this->load->view($this->form, $data);
        }
    }    

    public function delete($id)
    {
        if ($this->M_Mentor->process_delete($id) == TRUE) {
            echo true;
        }else {
            echo false;
        }
    }

    public function process(){       

        if (!empty($this->input->post('id'))) {

            if ($this->M_Mentor->process_update() == TRUE) {

                $this->session->set_flashdata([
                    'message' => true,
                    'message_type' => 'alert-success',
                    'message_text' => $this->lang->line('success_update'),
                    ]);
            }   

        }else {

            if ($this->M_Mentor->process_create() == TRUE) {

                $this->session->set_flashdata([
                    'message' => true,
                    'message_type' => 'alert-success',
                    'message_text' => $this->lang->line('success_create'),
                    ]);
            }   

        }

        if (!empty($this->input->post('save'))) {
            redirect($this->input->post('save'),'refresh');
        }else {                
            redirect(base_url($this->redirect));
        }
    }

    public function process_multiple()
    {

        $id = explode(',', $this->input->post('id'));
        $action = $this->input->post('action');

        /**
         * Update user to active
         */
        if ($action == 'active') {

            if ($this->M_Mentor->process_multiple_update($id,'Active') == TRUE) {
                echo true;
            }else {
                echo false;
            }
        }        

        /**
         * Update user to block
         */
        if ($action == 'block') {

            if ($this->M_Mentor->process_multiple_update($id,'Blocked') == TRUE) {
                echo true;
            }else {
                echo false;
            }
        }

        /**
         * Delete user
         */
        if ($action == 'delete') {

            if ($this->M_Mentor->process_multiple_delete($id) == TRUE) {
                echo true;
            }else {
                echo false;
            }
        }

    }    

}
