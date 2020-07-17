<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_User_Invoice_History extends CI_Model
{

    public $table_user = 'tb_user';  

    public $table_lms_courses = 'tb_lms_courses';

    public $table_lms_user_courses = 'tb_lms_user_courses';
    public $table_lms_user_payment = 'tb_lms_user_payment';

    public function datatables(){

        return [
            'datatable' => true,
            'datatables_data' => "
            [{'data': 'checkbox',className:'c-table__cell u-pl-small'},
            {'data': 'id',className:'c-table__cell'},
            {'data': 'username',className:'c-table__cell',width:'100%'},         
            {'data': 'transaction',className:'c-table__cell'},                    
            {'data': 'amount',className:'c-table__cell'},            
            {'data': 'time',className:'c-table__cell'}
            ]
            ",
        ];        
        
    }    

    public function data_table(){

        $this->load->model('_Currency');

        header('Content-Type: application/json');        

        $this->datatables->select('
            tb_user.username as username,

            tb_lms_courses.title as product_name,
            tb_lms_user_payment.amount as fvck,
            tb_lms_user_payment.id,
            tb_lms_user_payment.amount,
            tb_lms_user_payment.token as transaction,            
            DATE_FORMAT(tb_lms_user_payment.time, "%d %M %Y %H:%i %p") as time
            ');
        $this->datatables->from($this->table_lms_user_payment);
        $this->datatables->join($this->table_user, 'tb_lms_user_payment.id_user = tb_user.id', 'LEFT');
        $this->datatables->join($this->table_lms_courses, 'tb_lms_user_payment.id_courses = tb_lms_courses.id', 'LEFT');  
        if ($this->session->userdata('app_grade') == 'Instructor') {
            $this->datatables->where('tb_lms_user_payment.id_courses_user', $this->session->userdata('id'));
        }
        $this->datatables->where('tb_lms_user_payment.status', 'Purchased');

        $this->datatables->add_column('checkbox', '
            <td>
                <div class="c-choice c-choice--checkbox">
                    <input type="checkbox" id="checkbox-$1" class="c-choice__input" name="id[]" value="$1">
                    <label for="checkbox-$1" class="c-choice__label">&nbsp;</label>
                </div>
            </td>
            ', 'id');

        $this->datatables->edit_column('username', '
            <div class="o-media">
                <div class="o-media__body">
                    $1
                    <small class="u-block u-text-mute">
                        Buy : $2
                    </small>
                </div>
            </div>
            ', 'username,product_name');
        
        
        return $this->datatables->generate();
    } 

    public function is_empty(){
        $this->db->select('*');
        return $this->db->get('tb_lms_user_payment')->result();
    }
    
    public function process_tariks($data){
        $this->db->insert_batch('tb_tarik', $data);
    }

    function tb_tarik()
    {
        return $this->db->get('tb_tarik')->result_array();
    }

    function tb_tarik_has_tf()
    {
        $this->db->where('tb_tarik.bukti_transfer <>', '');
        return $this->db->get('tb_tarik')->result_array();
    }

    function proses_tarik($data)
    {
        $this->db->select('tb_lms_user_payment.*, tb_user.username');
        $this->db->from('tb_lms_user_payment');		
        $this->db->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id');
        $this->db->join('tb_user', 'tb_lms_courses.id_user = tb_user.id');
        $this->db->where('tb_lms_courses.id_user', $this->session->userdata('id'));
        $this->db->where('tb_lms_user_payment.status', 'Purchased');
        $this->db->where_not_in('tb_lms_user_payment.id', $data);
        return $this->db->get()->result_array();
    }

    function tb_lms_user_payment()
    {
        $this->db->select('tb_lms_user_payment.id_courses as nying, tb_lms_user_payment.id');
        $this->db->from('tb_lms_user_payment');
        $this->db->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id');
        $this->db->join('tb_user', 'tb_lms_courses.id_user = tb_user.id');
        $this->db->where('tb_lms_courses.id_user', $this->session->userdata('id'));
        $this->db->where('tb_lms_user_payment.status', 'Purchased');
        return $this->db->get()->result_array();
    }
    

    // function process_tariks()
    // {
    //     $this->db->set('status_penarikan', '1');
    //     $this->db->set('tgl_permintaan', date('Y:m:d H:i:s'));
    //     $this->db->where('id_courses_user', $this->session->userdata('id'));
    //     $this->db->update('tb_lms_user_payment');
    // }

    function get_by_id($id)
	{	
        $this->db->where('id', $id);
    	return $this->db->get('tb_lms_user_payment')->row_array();
    }
    
    public function process_tarik($data)
    {
        $this->db->insert('tb_tarik', $data);
    }

    public function statistic($data){
        /**
         * total amount 
         */
        
        if ($this->session->userdata('app_grade') == 'Instructor') {
            $this->db->select("0.4 * sum(amount) as data");
            $this->db->from($this->table_lms_user_payment);
            $this->db->where('id_courses_user', $this->session->userdata('id'));
            $this->db->where_not_in('tb_lms_user_payment.id', $data);
            $total_amount = $this->db->where('status', 'Purchased')->get()->row_array();
            $total_amount = set_currency($total_amount['data']);
        }else{
            $xxo = $this->db->select("sum(amount) as data")->from('tb_lms_user_payment')->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id')->join('tb_user', 'tb_lms_courses.id_user = tb_user.id')->where('tb_user.grade', 'app')->where('tb_lms_user_payment.status', 'Purchased')->get()->row_array();
            $xx1 = $this->db->select("0.6 * sum(amount) as data")->from('tb_lms_user_payment')->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id')->join('tb_user', 'tb_lms_courses.id_user = tb_user.id')->where('tb_user.grade <>', 'app')->where('tb_lms_user_payment.status', 'Purchased')->get()->row_array();
            $total_amount = set_currency($xxo['data'] + $xx1['data']);
        }
        

        $this->db->select("id");
        $this->db->from($this->table_lms_user_payment);
        if ($this->session->userdata('app_grade') == 'Instructor') {
            $this->db->where_not_in('tb_lms_user_payment.id', $data);
            $this->db->where('id_courses_user', $this->session->userdata('id'));
            
        }  
        $total_invoice = $this->db->where('status', 'Purchased')->count_all_results();

        return [
        'total_amount' => $total_amount,
        'total_invoice' => $total_invoice
        ];
    }

    public function transfer_statistic($data){
        if ($this->session->userdata('app_grade') == 'Instructor') {
            $this->db->select("0.4 * sum(amount) as data");
            $this->db->from($this->table_lms_user_payment);
            $this->db->where('id_courses_user', $this->session->userdata('id'));
            $this->db->where_not_in('tb_lms_user_payment.id', $data);
            $total_amount = $this->db->where('status', 'Purchased')->get()->row_array();
            $total_amount = set_currency($total_amount['data']);
        }else{
            $xxo = $this->db->select("sum(amount) as data")->from('tb_lms_user_payment')->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id')->join('tb_user', 'tb_lms_courses.id_user = tb_user.id')->where('tb_user.grade', 'app')->where('tb_lms_user_payment.status', 'Purchased')->get()->row_array();
            $xx1 = $this->db->select("0.6 * sum(amount) as data")->from('tb_lms_user_payment')->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id')->join('tb_user', 'tb_lms_courses.id_user = tb_user.id')->where('tb_user.grade <>', 'app')->where('tb_lms_user_payment.status', 'Purchased')->get()->row_array();
            $total_amount = set_currency($xxo['data'] + $xx1['data']);
        }
        

        $this->db->select("id");
        $this->db->from($this->table_lms_user_payment);
        if ($this->session->userdata('app_grade') == 'Instructor') {
            $this->db->where_not_in('tb_lms_user_payment.id', $data);
            $this->db->where('id_courses_user', $this->session->userdata('id'));
            
        }  
        $total_invoice = $this->db->where('status', 'Purchased')->count_all_results();

        return [
        'total_amount' => $total_amount,
        'total_invoice' => $total_invoice
        ];
    }    

}
