<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		
		if($this->input->get_post('buttonSubmit'))
		{
			$depts = $this->input->get_post('depts');
			foreach($depts as $d)
			{
				echo $d, '<br/>';
			}
		}
		else
		{
			
			

			echo $this->input->get_post('a');

			$this->load->view('view_home');
		}
	}

}