 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class student extends CI_Controller {

public function __construct()
        {
                parent::__construct();
                if(!$this->session->userdata("stu_status") == 'Student'){
			redirect('Login_Reg/login');

			}
        }
	


	public function index()
	{
		# code...
		$this->load->model('notice');
		$notice_list=$this->notice->notice_branch();
		$notice_admin=$this->notice->notice_admin();
		$this->load->view('student/studenthome',['notice_list'=>$notice_list,'notice_admin'=>$notice_admin]);
	}
	
	public function logout()
	{
		# code...
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('stu_status');
		$this->session->unset_userdata('branch');
		redirect('Login_Reg/login');
	}


	
}
