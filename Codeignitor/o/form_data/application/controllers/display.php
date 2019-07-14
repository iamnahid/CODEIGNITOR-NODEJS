<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Display extends CI_Controller {

	public function index()
	{
		
		
		/*$data['email'] = strtolower($this->input->get_post('myemail'));
		$data['name'] = $this->input->get_post('myname');
		$data['hobbies'] = $this->input->get_post('hobbies');
		*/

		$this->load->model('testmodel');

		$data['email'] = $this->testmodel->getEmail();
		$data['name'] = $this->testmodel->getName();
		$data['hobbies'] = $this->testmodel->getHobbies();
		$this->load->view('view_display', $data);
	}

}





