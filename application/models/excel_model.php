<?php
class Excel_model extends CI_Model{
	
	function add_profile($profile_list){			//fetch all data from the table 'profile' in database 'students'
		$this->db->from('profile');
		$this->db->insert('profile', $profile_list);
		
	}

	function check_profile($student_no, $data){
		$this -> db -> select('student_no, first_name, last_name, course');
		$this -> db -> from('profile');
		$this -> db -> where('student_no', $student_no);
		$query = $this -> db -> get();
		
		$account['student_no'] = $data['student_no'];
		
		if($query -> num_rows() > 0){
			$this->db->set($data);
			$this -> db -> where('student_no', $student_no);
			$this -> db -> update('profile', $account);			//updates data when student no. is existing in the database
			return false;
		}
		else{
			$this->db->insert('profile', $data);				//inserts new account to database if student no. is non-existing
		}
	}

}
?>