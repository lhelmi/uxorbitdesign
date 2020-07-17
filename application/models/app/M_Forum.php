<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_Forum extends CI_Model
{
    public function get_all()
	{
		$this->db->SELECT('tb_lms_courses_forum.*, tb_lms_courses_lesson.title as lesson_title, 
		tb_lms_courses_section.title as section_title, tb_user.username, tb_user.created as daftar, tb_user.photo as foto,
		tb_lms_courses.title as courses_title, ');
		$this->db->join('tb_user', 'tb_lms_courses_forum.user_id = tb_user.id');
		$this->db->join('tb_lms_courses_lesson', 'tb_lms_courses_forum.tb_lms_courses_lesson_id = tb_lms_courses_lesson.id');
		// $this->db->join('tb_lms_courses_section', 'tb_lms_courses_forum.tb_lms_courses_section_id = tb_lms_courses_section.id');
		$this->db->join('tb_lms_courses_section', 'tb_lms_courses_lesson.id_section = tb_lms_courses_section.id');
        $this->db->join('tb_lms_courses', 'tb_lms_courses_section.id_courses = tb_lms_courses.id');
        $this->db->where('tb_lms_courses.id_user', $this->session->userdata('id'));
		$this->db->order_by('tb_lms_courses_forum.date', 'asc');
		return $this->db->get('tb_lms_courses_forum')->result_array();
    }
    
    public function get_byid($id)
	{
		$this->db->SELECT('tb_lms_courses_forum.*, tb_lms_courses_lesson.title as lesson_title, 
		tb_lms_courses_section.title as section_title, tb_user.username, tb_user.created as daftar, tb_user.photo as foto,
		tb_lms_courses.title as courses_title, ');
		$this->db->join('tb_user', 'tb_lms_courses_forum.user_id = tb_user.id');
		$this->db->join('tb_lms_courses_lesson', 'tb_lms_courses_forum.tb_lms_courses_lesson_id = tb_lms_courses_lesson.id');
		// $this->db->join('tb_lms_courses_section', 'tb_lms_courses_forum.tb_lms_courses_section_id = tb_lms_courses_section.id');
		$this->db->join('tb_lms_courses_section', 'tb_lms_courses_lesson.id_section = tb_lms_courses_section.id');
        $this->db->join('tb_lms_courses', 'tb_lms_courses_section.id_courses = tb_lms_courses.id');
        $this->db->where('tb_lms_courses_forum.id', $id);
		return $this->db->get('tb_lms_courses_forum')->result_array();
    }
    
    public function delete_forum($id)
	{
        $this->db->where('id', $id);
        $this->db->delete('tb_lms_courses_forum');
    }
    
    public function delete_comment($id)
	{
        $this->db->where('id', $id);
        $this->db->delete('tb_lms_courses_comment');
    }

    public function delete_comment_byforum($id)
	{
        $this->db->where('forum_id', $id);
        $this->db->delete('tb_lms_courses_comment');
    }
}