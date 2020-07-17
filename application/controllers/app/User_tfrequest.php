<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_tfrequest extends My_App
{

    public $index = 'app/user_invoice_history/transfer';
    

    public function __construct()
    {
        parent::__construct();

        $this->load->model('app/M_User_Transfer');
    }

    public function index()
    {
        $data = [
            'title' => 'Kelas Saya',
            'div' => $this->M_User_Transfer->get_all(),
            // 'get_user' => $this->M_User_Transfer->get_user(),
        ];
        // echo '<pre>';
        // var_dump($get_user[0]['payment']);
        // echo '</pre>';
        // $xxo = $this->M_Dashboard->get_notif();
        // echo '<pre>';
        //     var_dump($xxo);
        // echo '</pre>';
        $this->load->view($this->index, $data);
    }
    
    public function get_id()
	{
        $this->M_Dashboard->update_notif($_POST['id']);
        $data= [
            'notif' => $this->M_Dashboard->get_notif(),
            'idx' => $this->M_User_Transfer->get_by_id($_POST['id']),
            'bank' => $this->M_User_Transfer->get_user_bank($_POST['user']),
            'contact' => $this->M_User_Transfer->get_user_contact($_POST['user'])
        ];
        echo json_encode($data);
    }

    public function add()
	{
        $post = $this->input->post();

		$post_data = array();
			
		/**
		 * if new image
		 */
		if (!empty($_FILES['bukti_transfer']['name'])) {
            $config['upload_path'] = './storage/uploads/user/transfer/';
            $config['allowed_types'] = 'jpg|png|PNG|jpeg|gif';
            $config['max_size']  = '5048';
            $config['overwrite'] = true;
            
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti_transfer')) {
                $file = $this->upload->data('file_name');
                // $upate = array();
                // foreach($post['nama_fasilitas1'] AS $key => $val){
                //     $upate[] = array(
                //         "id_fasilitas" => $post['id_fasilitas1'][$key],
                //         "nama_fasilitas" => $post['nama_fasilitas1'][$key],
                //         "harga_fasilitas" => $post['harga_fasilitas1'][$key]
                //     );
                // }
                $update = [
                    'bukti_transfer' => $file,
                    'tgl_kirim' => date('Y-m-d H:i:s'),
                ];
                $this->M_User_Transfer->process($_POST['id'], $update);
                if($data['success'] = true){
                    echo json_encode($data);
                }
                
            }else{
                $data['success'] = false;
                echo json_encode($data);
            }
        }else{
            $data['success'] = false;
            echo json_encode($data);
        }
        
    }
    
    public function _detail_rules() 
    {
    	
    	$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

    
}
