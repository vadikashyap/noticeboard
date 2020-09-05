<?php

class Login_Reg extends CI_Controller {

	
	//Login Page Open
	public function login()
	{
		$this->load->view('login');
	}

	//Registation Page Open
	public function reg_form()
	{
		$this->load->view('registation');
	}

	//Registation Add Data Database
	public function reg_db()
	{
		$this->form_validation->set_rules('username','User Name','required|alpha|is_unique[master_user.username]');//check database in value
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email','Email','required|valid_email'); 
		$this->form_validation->set_rules('mobile','Mobile','required'); 
		$this->form_validation->set_rules('branch','Branch','required'); 
		$this->form_validation->set_rules('erno','Enrollment No','required'); 			

		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		if ($this->form_validation->run()) {
			// $username=$this->input->post('username');
			// $password=$this->input->post('password');
			// $email=$this->input->post('email');
			// $mobile=$this->input->post('mobile');
			// $branch=$this->input->post('branch');
			// $erno=$this->input->post('erno');
			// $this->load->model('insert');

			// if($this->insert->reguser($username,$password,$email,$mobile,$branch,$erno)){
			// 	$this->load->view('home');
			// }
			

			$dd= $this->input->post(); //data get karya badha data add jate kari lese
			$this->load->model('user_reg');//model load
			if ($this->user_reg->regform($dd)) { 
				echo "Add Data Successfull";
				redirect('Login_Reg/login');
			}

		}
		else{
			//redirect nay chale
			$this->load->view('registation');
		}
	}


	public function LoginCondition()
	{
		$this->form_validation->set_rules('USERNAME','User Name','required');
		$this->form_validation->set_rules('PASSWORD','Password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		

		if ($this->form_validation->run()){

			$username=$this->input->post('USERNAME');
			$password=$this->input->post('PASSWORD');

			$this->load->model('User_reg');

			$u_details=$this->User_reg->isvalidate($username,$password);
			$branch=$this->User_reg->branch($u_details);



				
			// 	$this->load->view('admin/adminhome',['u_details'=>$u_details]);
			
			// die();
			if ($u_details) {
				# code...
				$this->load->library('session');
				 $this->session->set_userdata('username',$u_details);
				 $this->session->set_userdata('branch',$branch);

				 $status=$this->User_reg->status($u_details);
				 echo $status; 
				 
				 switch ($status) {
				 	case 'Student':
				 		$status=$this->User_reg->status($u_details);
				 		$this->session->set_userdata('stu_status',$status);
				 		//$this->load->view('student/studenthome');
				 		redirect('student');
				 		break;

				 	case 'Teacher':
				 	$this->session->set_userdata('teach_status',$status);
				 		//$this->load->view('teacher/teacherhome');
				 		redirect('teacher');
				 		break;

				 	case 'Admin':
				 		$this->session->set_userdata('admin_status',$status);
				 		//$this->load->view('admin/adminhome');
				 		redirect('admin');
				 		break;
				 	
				 	default:
				 		redirect('Login_Reg/login');
				 		break;
				 }

				

			}
			else{
				$this->session->set_flashdata('login_fail','Invelid Username & Password');
				return $this->load->view('login');
				
			}
		}
	}


	

}


?>