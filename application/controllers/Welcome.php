 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	 public function user()
	{
		$this->load->model('userdata');
		$data['details']=$this->userdata->getuser();
		$this->load->view('user/userdetails',$data);
	}


	public function user_where()
	{
		
		$data['details']=$this->userdata->where();
		$this->load->view('user/userdetails',$data);
	}


	public function user_select()
	{
		
		$data['details']=$this->userdata->select();
		$this->load->view('user/userdetails',$data);
	}


	public function user_limit()
	{
		$this->load->model('userdata');
		$data['details']=$this->userdata->limit();
		$this->load->view('user/userdetails',$data);
	}
}
