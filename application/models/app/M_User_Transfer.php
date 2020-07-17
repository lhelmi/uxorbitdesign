<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_User_Transfer extends CI_Model
{
    function get_all()
	{
        $this->db->select('tb_lms_user_payment.id, tb_user.username, tb_lms_user_payment.id_courses_user,
        tb_lms_user_payment.token,
        tb_lms_user_payment.*, tb_tarik.bukti_transfer as bukti_tf, tb_tarik.tgl_permintaan,
        tb_user.payment, tb_tarik.permintaan_id, tb_tarik.is_read as sudah_dibaca, tb_tarik.permintaan_id as permintaan_id');
        $this->db->from('tb_lms_user_payment');
        $this->db->where('tb_lms_user_payment.status', 'Purchased');
        $this->db->join('tb_tarik', 'tb_tarik.id_lms_user_payment = tb_lms_user_payment.id');
        $this->db->join('tb_user', 'tb_lms_user_payment.id_courses_user = tb_user.id');
        $this->db->group_by("tb_tarik.permintaan_id");
    	return $this->db->get()->result_array();
    }

    function tarik_semua($data)
	{
        $this->db->select('tb_lms_user_payment.id, tb_user.username, tb_lms_user_payment.id_courses_user,
        tb_lms_user_payment.token, tb_lms_user_payment.*, tb_user.payment');
        $this->db->from('tb_lms_user_payment');
        $this->db->join('tb_user', 'tb_lms_user_payment.id_courses_user = tb_user.id');
        $this->db->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id');
        $this->db->where('tb_lms_user_payment.status', 'Purchased');
        $this->db->where('tb_lms_courses.id_user', $this->session->userdata('id'));
        $this->db->where_not_in('tb_lms_user_payment.id', $data);
    	return $this->db->get()->result_array();
    }

    function get_requstlist()
	{
        $this->db->select('tb_lms_user_payment.*, tb_user.username');
        // $this->db->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id');
        $this->db->join('tb_user', 'tb_lms_user_payment.id_user = tb_user.id');
        $this->db->where('tb_lms_user_payment.status', 'Purchased');
        $this->db->where('tb_lms_user_payment.id_courses_user', $this->session->userdata('id'));
        return $this->db->get('tb_lms_user_payment')->result_array();
    }

    function get_tb_tarik_list($id)
	{
        $this->db->select('tb_tarik.*');
        $this->db->where('id_lms_user_payment', $id);
        return $this->db->get('tb_tarik')->result_array();
    }

    function user_get_all()
	{
        $this->db->select('tb_lms_user_payment.id, tb_user.username, tb_lms_user_payment.id_courses_user,
        tb_lms_user_payment.token,
        tb_lms_user_payment.*, tb_tarik.bukti_transfer as bukti_tf,
         tb_user.payment, tb_tarik.permintaan_id, tb_tarik.is_read as sudah_dibaca, tb_tarik.permintaan_id as permintaan_id, tb_tarik.status_penarikan');
        $this->db->from('tb_lms_user_payment');
        $this->db->where('tb_lms_user_payment.status', 'Purchased');
        $this->db->join('tb_tarik', 'tb_tarik.id_lms_user_payment = tb_lms_user_payment.id');
        $this->db->join('tb_user', 'tb_lms_user_payment.id_courses_user = tb_user.id');
        $this->db->join('tb_lms_courses', 'tb_lms_user_payment.id_courses = tb_lms_courses.id');
        $this->db->group_by("tb_tarik.permintaan_id");
        $this->db->where('tb_lms_courses.id_user', $this->session->userdata('id'));
    	return $this->db->get()->result_array();
    }

    function get_tb_tarik($id)
	{	
        $this->db->where('id_lms_user_payment', $id);
    	return $this->db->get('tb_tarik')->result_array();
    }

    function get_user_bank($id)
	{	
        $this->db->where('id_user', $id);
    	return $this->db->get('tb_bank_account')->result_array();
    }

    function get_user_contact($id)
	{	
        $this->db->where('user_id', $id);
    	return $this->db->get('tb_user_contacts')->result_array();
    }
    
    public function process_tarik($id)
    {
        $this->db->set('status_penarikan', '1');
        $this->db->set('tgl_permintaan', date('Y:m:d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tb_lms_user_payment');
    }
    
    public function process($id, $data)
	{
        $this->db->where('permintaan_id', $id);
        $this->db->update('tb_tarik', $data);
    }

    function belum_tarik($id)
	{	
        $this->db->select('tb_lms_user_payment.id, tb_lms_user_payment.amount');
        $this->db->where('tb_lms_user_payment.id', $id);
    	return $this->db->get('tb_lms_user_payment')->row_array();
    }

    function get_by_id($id)
	{	
        $this->db->select('tb_tarik.*, tb_tarik.permintaan_id , tb_lms_user_payment.amount as bayar, tb_tarik.bukti_transfer as bukti');
        $this->db->join('tb_tarik', 'tb_tarik.id_lms_user_payment = tb_lms_user_payment.id');
        $this->db->where('tb_tarik.permintaan_id', $id);
    	return $this->db->get('tb_lms_user_payment')->result_array();
    }
    
}
