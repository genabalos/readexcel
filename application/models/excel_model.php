<?php
class Excel_model extends CI_Model{
	
	function get_profile($student_no){
		$this->db->select('student_no, first_name, last_name, course');
		$this->db->from('profile');
		$this->db->where('student_no', $student_no);
		$query = $this->db->get();
		
		
			return $query->result(); 
		

	}
	
	function add_profile($profile_list){
		
		$this->db->from('profile');
		$this->db->insert('profile', $profile_list);
		
	}


}
?>