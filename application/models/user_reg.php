<?php
	
class User_reg extends CI_model{

	//registation login 
	public function regform($dd)
	{
		return $this->db->insert('master_user',$dd);
	}


	//login check username and password
	public function isvalidate($username,$password)
	{
		$qury=$this->db->where(['username'=>$username,'password'=>$password])
						->get('master_user');

			if ($qury->num_rows()) {
				# code...
				//return username
				return $qury->row()->username;
			}
			else{
				return False;
			}
	}


	//return status name
	public function status($u_details)
	{
		# code...
		$q=$this->db->query("select * from master_user where username = '$u_details' ");
		

		if ($q->num_rows()) {
				# code...
				return $q->row()->status;
			}
			else{
				return False;
			}
	}


	//return branch name
	public function branch($u_details)
	{
		# code...
		$q=$this->db->query("select * from master_user where username = '$u_details' ");
		

		if ($q->num_rows()) {
				# code...
				return $q->row()->branch;
			}
			else{
				return False;
			}
	}

}

?>