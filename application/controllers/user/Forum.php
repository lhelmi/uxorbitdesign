<?php defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends My_App
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('app/M_User_Forum');
        $this->load->model('lms/M_Lesson');
    }

    

}