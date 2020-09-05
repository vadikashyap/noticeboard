 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                if(!$this->session->userdata("admin_status") == 'Admin'){
			redirect('Login_Reg/login');

			}
        }

//**************  main page **************
	public function index()
	{
		
		
			$this->load->model('notice');
		$notice_admin=$this->notice->notice_admin();
		$notice_computer=$this->notice->notice_computer();
		$notice_civil=$this->notice->notice_civil();
		$notice_electrical=$this->notice->notice_electrical();
		$notice_mechanical=$this->notice->notice_mechanical();
		$this->load->view('admin/adminhome',['notice_admin'=>$notice_admin,
											'notice_computer'=>$notice_computer,
											'notice_electrical'=>$notice_electrical,
											'notice_mechanical'=>$notice_mechanical,
											'notice_civil'=>$notice_civil,]);
		
	
		
	}

//******************  add notice admin view *********************
	public function addnotice()
	{
		$this->load->view('admin/addnotice');
	}
	
//*************   logout admin ********************************
	public function logout()
	{
		# code...
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('admin_status');
		$this->session->unset_userdata('branch');
		redirect('Login_Reg/login');
	}

//************* add notice ******************
	public function notice()
	{
		$this->load->helper(array('form', 'url')); 


		$this->form_validation->set_rules('subject','Subject Name','required');
		$this->form_validation->set_rules('notice','Notice','required');
		

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

		$config['upload_path']   = './upload/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
        $this->load->library('upload', $config);
		if ($this->form_validation->run() && $this->upload->do_upload('photo')) 
		{
			$dd= $this->input->post();
			$data=$this->upload->data();
			echo "<pre>";
			$img_path=base_url("upload/".$data['orig_name']);
			$dd['photo']=$img_path;
			$this->load->model('Notice');
			
			if ($this->Notice->adminnotice($dd)) { 

					redirect('Admin/sendmail');
			}
			else{
				
				echo "not add";
			} 

		}
		else{
			//redirect nay chale
			$upload_error=$this->upload->display_errors();	
			$this->load->view('admin/addnotice', compact('upload_error'));
		}
	}

public function sendmail($value='')
{
	$this->load->library('email');
				    $this->email->from(set_value('email'),set_value('fname'));
				    $this->email->to("ajay.suneja1993@gmail.com");
				    $this->email->subject("Registratiion Greeting..");

				    $this->email->message("Thank  You for Registratiion");
				    $this->email->set_newline("\r\n");
				    $this->email->send();

				     if (!$this->email->send()) {
				    show_error($this->email->print_debugger()); }
				  else {
				    echo "Your e-mail has been sent!";
				  }
}


//***************  delete notice  *************************
	public function admin_delete_notice()
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
      return redirect('admin');
	}

//********************* edit notice page view *****************
	public function admin_edit_notice()
	{
		$this->load->view('admin/admin_edit_notice');
	}
//*************  update notice find details ****************
	public function admin_find_notice($id)
	{
		$this->load->model('Admin_model');
		$notice=$this->Admin_model->put_update_notice($id);
		$this->load->view('admin/admin_edit_notice',['notice'=>$notice]);
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

		    return redirect('admin');
		}
		else{
		   echo "All filled required Go Back ";
		  }
	}


//login details page
	public function logindata()
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

		 	

		$this->load->view('admin/logindata',['studentdata'=>$studentdata,'teacherdata'=>$teacherdata]);
	}

	//********* update profile get details HTML Page for update data **************
	public function Profile_data($id)
	{

		$this->load->model('Admin_model');
		$userdata=$this->Admin_model->get_user_data($id);
		$this->load->view('admin/update_profile',['userdata'=>$userdata]);
	}

	//********** update to db  **************
	public function update_details($id)
	{
		$this->form_validation->set_rules('username','User Name','required|alpha');//check database in value
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email','Email','required|valid_email'); 
		$this->form_validation->set_rules('mobile','Mobile','required'); 
		$this->form_validation->set_rules('branch','Branch','required'); 
		$this->form_validation->set_rules('erno','Enrollment No','required'); 			

		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
		
		if ($this->form_validation->run()) {
			$post=$this->input->post(); 

			$this->load->model('Admin_model');

			if($this->Admin_model->update_profile($id,$post)){
         		$this->session->set_flashdata('msg','Details Update successfully');
          		$this->session->set_flashdata('msg_class','alert-success');
      		}									
      		else{
		         $this->session->set_flashdata('msg','Details not update Please try again!!');
		         $this->session->set_flashdata('msg_class','alert-danger');
		     }

		    return redirect('admin/logindata');
		}
		else{
		   redirect('admin/logindata');
		  }
	}

	///********************** delete data //******************

	public function Profile_delete($value)
	{
		if($this->Admin_model->delet_profile($value))
      {
          $this->session->set_flashdata('msg','Delete Successfully');
          $this->session->set_flashdata('msg_class','alert-danger');
      }
      else
      {
         $this->session->set_flashdata('msg','Please try again..not delete');
         $this->session->set_flashdata('msg_class','alert-danger');
      }
      return redirect('admin/logindata');
	}
	
}
