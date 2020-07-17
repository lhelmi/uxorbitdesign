<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_invoice_history extends My_App
{

    public $index = 'app/user_invoice_history/index';
    public $userindex = 'app/user_invoice_history/user_index';
    public $form = 'app/user_invoice_history/user_request';
    public $redirect = 'app/user_invoice_history';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('app/M_User_Transfer');
        $this->load->model('app/M_User_Invoice_History');

        if ($this->site['payment_method'] != 'Manual') {
            redirect(base_url('app'));
        }
    }

    public function index()
    {
        $data = '';
        $data = [
            'title' => 'Histori Bayar',
            'statistic' => $this->M_User_Invoice_History->statistic($data),
            'is_empty' => $this->M_User_Invoice_History->is_empty(),
        ];

        $this->load->view($this->index, array_merge($data, $this->M_User_Invoice_History->datatables()));
    }

    public function userindex()
    {
        $data = array();
        $wow = array();
        $tb_lms_user_payment = $this->M_User_Invoice_History->tb_lms_user_payment();
        $tb_tarik = $this->M_User_Invoice_History->tb_tarik();
        foreach ($tb_lms_user_payment as $key => $value) {
            foreach ($tb_tarik as $kk => $vv) {
                if($vv['id_lms_user_payment'] == $value['id']){
                    $data[] = array(
                        $value['id'],
                    );
                    
                }
            }
        }
        foreach ($data as $key => $value) {
            array_push($wow, $data[$key][0]);
        }
        if(empty($wow)){
            $wow = '';
        }
        $div = $this->M_User_Invoice_History->proses_tarik($wow);
        $data = [
            'title' => 'Histori Bayar',
            'transfer_statistic' => $this->M_User_Invoice_History->statistic($wow),
            'div' => $div,
            'tarik_semua' => $this->M_User_Transfer->tarik_semua($wow),
        ];

        $this->load->view($this->userindex, $data);
    }

    public function form()
    {
        $data = array();
        $wow = array();
        $tb_lms_user_payment = $this->M_User_Invoice_History->tb_lms_user_payment();
        $tb_tarik = $this->M_User_Invoice_History->tb_tarik();
        foreach ($tb_lms_user_payment as $key => $value) {
            foreach ($tb_tarik as $kk => $vv) {
                if($vv['id_lms_user_payment'] == $value['id']){
                    $data[] = array(
                        $value['id'],
                    );
                    
                }
            }
        }
        foreach ($data as $key => $value) {
            array_push($wow, $data[$key][0]);
        }
        if(empty($wow)){
            $wow = '';
        }

        $data1 = array();
        $wow1 = array();
        $tb_lms_user_payment1 = $this->M_User_Invoice_History->tb_lms_user_payment();
        $tb_tarik1 = $this->M_User_Invoice_History->tb_tarik_has_tf();
        foreach ($tb_lms_user_payment1 as $key => $value) {
            foreach ($tb_tarik1 as $kk => $vv) {
                if($vv['id_lms_user_payment'] == $value['id']){
                    $data1[] = array(
                        $value['id'],
                    );
                    
                }
            }
        }
        foreach ($data1 as $key => $value) {
            array_push($wow1, $data1[$key][0]);
        }
        if(empty($wow1)){
            $wow1 = '';
        }
        $data = [
            'title' => 'Permintaan Tarik',
            // 'get_tb_tarik_list' => $this->M_User_Transfer->get_tb_tarik_list(),
            'div' => $this->M_User_Transfer->get_requstlist(),
            'transfer_statistic' => $this->M_User_Invoice_History->transfer_statistic($wow1),
            'tarik_semua' => $this->M_User_Transfer->tarik_semua($wow),
        ];
        $this->load->view($this->form, $data);
    }
    
    public function belum_tarik()
    {
        $data = [
            'idx' => $this->M_User_Transfer->belum_tarik($_POST['id']),
        ];
        echo json_encode($data);
    }

    public function user_get_id()
    {
        $data = [
            'idx' => $this->M_User_Transfer->get_by_id($_POST['id']),
        ];
        echo json_encode($data);
    }

    public function tarik()
    {
        $id_payment = $_POST['id'];
        $permintaan_id = $this->session->userdata('id') . $this->session->userdata('app_username') . date('Ymd-His');
        $data = [
            'id_lms_user_payment' => $id_payment,
            'status_penarikan' => '1',
            'permintaan_id' => $permintaan_id,
            'tgl_permintaan' =>  date('Y:m:d H:i:s'),
            'is_read' => '0',
        ];
        $this->session->set_flashdata('message', 'Permintaan terkirim');
        $data['result'] = $this->M_User_Invoice_History->process_tarik($data);
        echo json_encode($data);
    }


    public function test()
    {
        // $data['id'] = $_POST['id'];
        $data = array();
        $wow = array();
        $tb_lms_user_payment = $this->M_User_Invoice_History->tb_lms_user_payment();
        $tb_tarik = $this->M_User_Invoice_History->tb_tarik();
        foreach ($tb_lms_user_payment as $key => $value) {
            foreach ($tb_tarik as $kk => $vv) {
                if($vv['id_lms_user_payment'] == $value['id']){
                    $data[] = array(
                        $value['id'],
                    );
                    
                }
            }
        }
        foreach ($data as $key => $value) {
            array_push($wow, $data[$key][0]);
        }
        if(empty($wow)){
            $wow = '';
        }
        $proses_tarik = $this->M_User_Invoice_History->proses_tarik($wow);
        $create = array();
        $permintaan_id = $this->session->userdata('id') . $this->session->userdata('app_username') . date('Ymd-His');
        foreach($proses_tarik AS $key => $val){
            $create[] = array(
                "id_lms_user_payment" => $val['id'],
                'status_penarikan' => '1',
                'permintaan_id' => $permintaan_id,
                'tgl_permintaan' =>  date('Y:m:d H:i:s'),
                'is_read' => '0',
            );
        }

        $this->M_User_Invoice_History->process_tariks($create);
        $this->session->set_flashdata('message', 'Permintaan terkirim');
        echo json_encode($data);
        
    }


    public function datatables()
    {

        $data = $this->M_User_Invoice_History->data_table();

        echo $data;
    }
    

    // public function tarik_semua()
    // {

    //     $data['id'] = $_POST['id'];

    //     $this->M_User_Invoice_History->process_tariks();
    //     $this->session->set_flashdata('message', 'Permintaan terkirim');
    //     echo json_encode($data);
    // }
}
