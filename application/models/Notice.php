<?php
	
class Notice extends CI_model{

//***********  add notice *****************
	public function adminnotice($dd)
	{ 
		return $this->db->insert('notice_board',$dd);

	}
//********** end notice code  ***********

//*********  display notice **********
	public function notice_branch()
	{
		$branch=$this->session->userdata('branch'); 
		$q=$this->db->query("select * from notice_board where branch='$branch'");
				return $q->result();
	}

	public function notice_admin()
	{
		$q=$this->db->query("select * from notice_board where branch='Admin'");
				return $q->result();
	}

	public function notice_computer()
	{
		$q=$this->db->query("select * from notice_board where branch='Computer'");
				return $q->result();
	}

	public function notice_civil()
	{
		$q=$this->db->query("select * from notice_board where branch='Civil'");
				return $q->result();
	}

	public function notice_electrical()
	{
		$q=$this->db->query("select * from notice_board where branch='Electrical'");
				return $q->result();
	}

	public function notice_mechanical()
	{
		$q=$this->db->query("select * from notice_board where branch='Mechanical'");
				return $q->result();
	}
//******************  end notice display  ************
}
?>