<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Lesson extends CI_Model
{

	public $table_lms_courses = 'tb_lms_courses';  

	public function get_submisi($id)
	{	
		$this->db->where('tb_lesson_upload.id_lms_courses_lesson',$id);
		$this->db->where('tb_lesson_upload.id_user', $this->session->userdata('id_user'));
		return $this->db->get('tb_lesson_upload')->row_array();
	}

	public function get_id($id)
	{	
		$this->db->where('tb_lesson_upload.id',$id);
		return $this->db->get('tb_lesson_upload')->row();
	}

	public function get_pertanyaan($id)
	{	
		$this->db->where('tb_pertanyaan.section_id',$id);
		return $this->db->get('tb_pertanyaan')->result_array();
	}

	public function get_jawaban()
	{	
		return $this->db->get('tb_jawaban')->result_array();
	}

	public function get_jawaban_user()
	{	
		$this->db->where('id_user', $this->session->userdata('id_user'));
		return $this->db->get('tb_jawaban_user')->result_array();
	}

	public function insert_jawaban_user($data)
	{	
		$this->db->insert_batch('tb_jawaban_user', $data);
	}

	public function update_jawaban_user($data)
	{	
		$this->db->update_batch('tb_jawaban_user', $data, 'id_pertanyaan');
	}

	public function get_jawaban_user_by_id($data)
	{	
		$this->db->where_in('id_pertanyaan', $data);
		return $this->db->get('tb_jawaban_user')->result_array();
	}

	public function update_description($id, $data)
	{	
		$this->db->where('id', $id);
		$this->db->update('tb_lesson_upload', $data);
	}

	public function get_tb_lms_user_lesson($id_user, $id_courses)
	{	
		$this->db->where('id_user', $id_user);
		$this->db->where('id_courses', $id_courses);
		return $this->db->get('tb_lms_user_lesson')->row_array();
	}
	
	public function get_all()
	{
		$this->db->select('tb_user.username as nama, tb_user.id as idusername, tb_lesson_upload.*,
		tb_lms_courses_lesson.title as lesson_title, tb_lms_courses.title as courses_title,
		tb_lms_courses_lesson.id_courses as courses_id');
		$this->db->join('tb_lms_courses_lesson', 'tb_lms_courses_lesson.id_courses = tb_lms_courses.id');
		$this->db->join('tb_lesson_upload', 'tb_lesson_upload.id_lms_courses_lesson = tb_lms_courses_lesson.id');
		$this->db->join('tb_user', ' tb_lesson_upload.id_user = tb_user.id');
		
		$this->db->where('tb_lms_courses.id_user',$this->session->userdata('id'));
		return $this->db->get('tb_lms_courses')->result_array();
	}

	public function is_mentor_valid($id_user, $id)
	{
		$this->db->join('tb_user', 'tb_lms_courses.id_user = tb_user.id');
		$this->db->where('tb_lms_courses.id_user',$id_user);
		$this->db->where('tb_lms_courses.id',$id);
		return $this->db->get('tb_lms_courses')->result_array();
	}

	public function is_user_valid($id_user, $id)
	{
		$this->db->join('tb_user', 'tb_lms_user_courses.id_user = tb_user.id');
		$this->db->where('tb_lms_user_courses.id_user',$id_user);
		$this->db->where('tb_lms_user_courses.id_courses',$id);
		return $this->db->get('tb_lms_user_courses')->result_array();
	}

	public function get_section($id)
	{
		$this->db->SELECT('tb_lms_courses_section.*');
		$this->db->join('tb_lms_courses', 'tb_lms_courses_section.id_courses = tb_lms_courses.id');
		$this->db->where('tb_lms_courses_section.id_courses',$id);
		$this->db->order_by('tb_lms_courses_section.id', 'asc');
		return $this->db->get('tb_lms_courses_section')->result_array();
	}

	public function get_qna($id)
	{
		$this->db->SELECT('tb_lms_courses_forum.*, tb_lms_courses_lesson.title as lesson_title, 
		tb_lms_courses_section.title as section_title, tb_user.username, tb_user.created as daftar, tb_user.photo as foto,
		tb_lms_courses.title as courses_title');
		$this->db->join('tb_user', 'tb_lms_courses_forum.user_id = tb_user.id');
		$this->db->join('tb_lms_courses_lesson', 'tb_lms_courses_forum.tb_lms_courses_lesson_id = tb_lms_courses_lesson.id');
		// $this->db->join('tb_lms_courses_section', 'tb_lms_courses_forum.tb_lms_courses_section_id = tb_lms_courses_section.id');
		$this->db->join('tb_lms_courses_section', 'tb_lms_courses_lesson.id_section = tb_lms_courses_section.id');
		$this->db->join('tb_lms_courses', 'tb_lms_courses_section.id_courses = tb_lms_courses.id');
		$this->db->where('tb_lms_courses.id', $id);
		$this->db->order_by('tb_lms_courses_forum.date', 'asc');
		return $this->db->get('tb_lms_courses_forum')->result_array();
	}

	public function get_qnaby_id($id)
	{
		$this->db->SELECT('tb_lms_courses_forum.*, tb_lms_courses_lesson.title as lesson_title, 
		tb_lms_courses_section.title as section_title, tb_user.username, tb_user.created as daftar, tb_user.photo as foto,
		tb_lms_courses.title as courses_title');
		$this->db->join('tb_user', 'tb_lms_courses_forum.user_id = tb_user.id');
		$this->db->join('tb_lms_courses_lesson', 'tb_lms_courses_forum.tb_lms_courses_lesson_id = tb_lms_courses_lesson.id');
		// $this->db->join('tb_lms_courses_section', 'tb_lms_courses_forum.tb_lms_courses_section_id = tb_lms_courses_section.id');
		$this->db->join('tb_lms_courses_section', 'tb_lms_courses_lesson.id_section = tb_lms_courses_section.id');
		$this->db->join('tb_lms_courses', 'tb_lms_courses_section.id_courses = tb_lms_courses.id');
		$this->db->where('tb_lms_courses.id', $id);
		$this->db->order_by('tb_lms_courses_forum.date', 'asc');
		return $this->db->get('tb_lms_courses_forum')->result_array();
	}

	public function get_post($id){
		$this->db->SELECT('tb_lms_courses_forum.*');
		$this->db->join('tb_user', 'tb_lms_courses_forum.user_id = tb_user.id');
		$this->db->where('tb_lms_courses_forum.user_id',$id);
		return $this->db->get('tb_lms_courses_forum')->count_all_results();
	}

	public function get_byid($id){
		$this->db->SELECT('tb_lms_courses_forum.*, tb_lms_courses_lesson.title as lesson_title, 
		tb_lms_courses_section.title as section_title, tb_user.username, tb_user.created as daftar, tb_user.photo as foto,
		tb_lms_courses.title as courses_title');
		$this->db->join('tb_user', 'tb_lms_courses_forum.user_id = tb_user.id');
		$this->db->join('tb_lms_courses_lesson', 'tb_lms_courses_forum.tb_lms_courses_lesson_id = tb_lms_courses_lesson.id');
		// $this->db->join('tb_lms_courses_section', 'tb_lms_courses_forum.tb_lms_courses_section_id = tb_lms_courses_section.id');
		$this->db->join('tb_lms_courses_section', 'tb_lms_courses_lesson.id_section = tb_lms_courses_section.id');
		$this->db->join('tb_lms_courses', 'tb_lms_courses_section.id_courses = tb_lms_courses.id');
		$this->db->where('tb_lms_courses_forum.id',$id);
		$this->db->order_by('tb_lms_courses_forum.date', 'asc');
		return $this->db->get('tb_lms_courses_forum')->row_array();
	}

	public function get_comment($id){
		$this->db->SELECT('tb_lms_courses_comment.*, tb_user.username, tb_user.photo as foto, tb_user.created as daftar, tb_user.grade as grade');
		$this->db->join('tb_lms_courses_comment', 'tb_lms_courses_comment.user_id = tb_user.id');
		$this->db->join('tb_lms_courses_forum', 'tb_lms_courses_comment.forum_id = tb_lms_courses_forum.id');
		$this->db->where('tb_lms_courses_forum.id',$id);
		$this->db->order_by('tb_lms_courses_comment.date', 'desc');
		return $this->db->get('tb_user')->result_array();
	}

	public function get_lesson($id)
	{
		$this->db->select('tb_lms_courses_lesson.*, tb_lms_courses_section.id as tbid_section');
		$this->db->order_by('tb_lms_courses_lesson.id', 'asc');
		$this->db->join('tb_lms_courses_section', 'tb_lms_courses_lesson.id_section = tb_lms_courses_section.id');
		$this->db->where('tb_lms_courses_lesson.id_section',$id);
		return $this->db->get('tb_lms_courses_lesson')->result_array();
	}

	public function insert($data)
	{
		$this->db->insert('tb_lms_courses_forum', $data);
	}

	public function insert_comment($data)
	{
		$this->db->insert('tb_lms_courses_comment', $data);
	}
	
	public function update_notif($id)
	{
		$this->db->set('is_read', '1');
		$this->db->where('id', $id);
		$this->db->update('tb_lesson_upload');
	}
		
	public function data_course($site,$slug,$section,$lesson){

		$courses =  $this->query_post($site,$slug);
		if($courses){
			/**
			 * check user courses 
			 */
			$user_courses = $this->_Courses->check_courses($courses);

			if ($site['lms_free_courses_readable'] == 'No') {
				if (empty($user_courses['user_courses'])) redirect(base_url('auth'));
			}

			if (empty($user_courses['user_courses']) AND !empty($courses['price'])) redirect(base_url('auth'));

			$build_lesson = $this->_Lesson->build_lesson($courses);

			$read_lesson = $this->_Lesson->read_lesson($lesson,$build_lesson,$section);

			return array_merge($courses,$build_lesson,$read_lesson);
		}
	}

	public function quiz_insert($data){
		$this->db->insert('tb_lesson_upload', $data);
	}

	public function update_file($id, $data)
	{	
		$this->db->where('id', $id);
		$this->db->update('tb_lesson_upload', $data);
	}

	public function query_post($site,$slug){
		$this->db->select('*');
		$this->db->from($this->table_lms_courses);		
		$this->db->where('permalink',urldecode($slug));
		$this->db->order_by('time','DESC');
		$query = $this->db->get();

		$read = $query->row_array();

		/**
	    * Build Course
	    */		
		$post = $this->_Courses->read_long_single($site,$read);

		return $post;
	}

}