<?php
	
class Admin_model extends CI_model{

//********** delet notice  *************
	public function delet_notice($id)
	{
		return $this->db->delete('notice_board',['id'=>$id]);
	}

//*********  update notice retun data to form ***************
	public function put_update_notice($noticeid)
	{
		$q=$this->db->select()
            ->where('id',$noticeid)
            ->get('notice_board');
            return $q->row();
	}

	public function update_notice($notic_id,Array $post)
	{
		return $this->db->where('id',$notic_id)
                   ->update('notice_board',$post);
	}

//Login Details For Teacher
	public function teacherdata()
	{
		$q=$this->db->query("select * from master_user where status='Teacher'");
		return $q->result();
	}
	
//Login Details For studentdata
	public function studentdata()
	{
		$q=$this->db->query("select * from master_user where status='Student'");
		return $q->result();
	}
//Total no of row find kars pagination mate for teacher
	public function total_rec()
	{
		$q=$this->db->select()
            ->from('master_user')
            ->where(['status'=>'Teacher'])
            ->get();
           return $q->num_rows();
	}


	//Total no of row find kars pagination mate for Student
	public function total_rec_student()
	{
		$q=$this->db->select()
            ->from('master_user')
            ->where(['status'=>'Student'])
            ->get();
           return $q->num_rows();
	}
//notice list show
	public function articleList($limit,$offset)
  {
    $id=$this->session->userdata('id');
   $q=$this->db->select('')
            ->from('master_user')
            ->where(['status'=>'Teacher'])
            ->limit($limit,$offset)
            ->get();
           
           return $q->result();
  }
  //pagination list show
  public function articleListStudent($limit,$offset)
  {
    $id=$this->session->userdata('id');
   $q=$this->db->select('')
            ->from('master_user')
            ->where(['status'=>'Student'])
            ->limit($limit,$offset)
            ->get();
           
           return $q->result();
  }

  //*********  update Login Details retun data to form ***************
	public function get_user_data($noticeid)
	{
		$q=$this->db->select()
            ->where('id',$noticeid)
            ->get('master_user');
            return $q->row();
	}

	public function update_profile($stu_id,Array $post)
	{
		return $this->db->where('id',$stu_id)
                   ->update('master_user',$post);
	}

	//********** delet notice  *************
	public function delet_profile($id)
	{
		return $this->db->delete('master_user',['id'=>$id]);
	}
}
