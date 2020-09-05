 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                if(!$this->session->userdata("teach_status") == 'Teacher'){
			redirect('Login_Reg/login');

			}
        }
	

	public function index()
	{
		# code...
		$this->load->model('notice');
		$notice_list=$this->notice->notice_branch();
		$notice_admin=$this->notice->notice_admin();
		$this->load->view('teacher/teacherhome',['notice_list'=>$notice_list,'notice_admin'=>$notice_admin]);
	}

	public function teach_add_notice()
	{
		$this->load->view('teacher/teach_add_notice');
	}
	
	public function add_notice()
	{
		$this->form_validation->set_rules('subject','Subject Name','required');
		$this->form_validation->set_rules('notice','Notice','required');
		$this->form_validation->set_rules('photo','File');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		if ($this->form_validation->run()) {
			$dd= $this->input->post();

			$this->load->model('Notice');
			
			if ($this->Notice->adminnotice($dd)) { 
				$this->session->set_flashdata('msg','Notice Add Successfully');
          		$this->session->set_flashdata('msg_class','alert-success');
			}
			else{
				$this->session->set_flashdata('msg','Please try again..not Add Notice');
				$this->session->set_flashdata('msg_class','alert-danger');
			}
			redirect("teacher");

		}
		else{
			//redirect nay chale
			$this->load->view('teacher/teach_add_notice');
		}
	}

	public function logout()
	{
		# code...
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('teach_status');
		$this->session->unset_userdata('branch');
		redirect('Login_Reg/login');
	}
	

	//*************  update notice find details ****************
	public function teacher_find_notice($id)
	{
		$this->load->model('Admin_model');
		$notice=$this->Admin_model->put_update_notice($id);
		$this->load->view('teacher/teacher_edit_notice',['notice'=>$notice]);
	}

	//************ update notice  ******************
	public function update_noticeA($notice_id)
	{
		$this->form_validation->set_rules('subject','Subject Name','required');
		$this->form_validation->set_rules('notice','Notice','required');
		$this->form_validation->set_rules('photo','File');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		if ($this->form_validation->run()) {
			$post=$this->input->post(); 

			$this->load->model('Admin_model');

			if($this->Admin_model->update_notice($notice_id,$post)){
         		$this->session->set_flashdata('msg','Article Update successfully');
          		$this->session->set_flashdata('msg_class','alert-success');
      		}
      		else{
		         $this->session->set_flashdata('msg','Articles not update Please try again!!');
		         $this->session->set_flashdata('msg_class','alert-danger');
		     }

		    return redirect('teacher');
		}
		else{
		   echo "All filled required Go Back ";
		  }
	}

	//***************  delete notice  *************************
	public function teacher_delete_notice()
	{
		$id=$this->input->post('id');
    	$this->load->model('Admin_model');
      if($this->Admin_model->delet_notice($id))
      {
          $this->session->set_flashdata('msg','Delete Successfully');
          $this->session->set_flashdata('msg_class','alert-success');
      }
      else
      {
         $this->session->set_flashdata('msg','Please try again..not delete');
         $this->session->set_flashdata('msg_class','alert-danger');
      }
      return redirect('teacher');
	}

	public function student_data()
	{
		

		$this->load->model('Admin_model');
		$teacherdata=$this->Admin_model->teacherdata();
		$studentdata=$this->Admin_model->studentdata();

		$this->load->library('pagination');
		//************ teacher pagenation *******************
		  $config_t=[
		        'base_url' => base_url('admin/logindata'),
		        'per_page' =>2,
		        'total_rows' => $this->Admin_model->total_rec(),
		        'full_tag_open'=>"<ul class='pagination pagination-lg '>",
		        'full_tag_close'=>"</ul>",
		        'next_tag_open' =>"<li>",
		        'next_tag_close' =>"</li>",
		        'prev_tag_open' =>"<li>",
		        'prev_tag_close' =>"</li>",
		        'num_tag_open' =>"<li>",
		        'num_tag_close' =>"</li>",
		        'cur_tag_open' =>"<li class='active'><a>",
		        'cur_tag_close' =>"</a></li>"
		 	];
		 	$this->pagination->initialize($config_t);
		 	$teacherdata=$this->Admin_model->articleList($config_t['per_page'],$this->uri->segment(3));

		 	

		$this->load->view('teacher/student_data',['studentdata'=>$studentdata,'teacherdata'=>$teacherdata]);
	}
	
}
