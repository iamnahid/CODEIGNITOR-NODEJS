<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome');
	}

	public function validateData()
	{

	}

	public function signin()
	{
		$this->form_validation->set_rules('Uname', 'User Name', 'required');
		$this->form_validation->set_rules('Pass', 'Password', 'required');

		if ($this->form_validation->run())
		{
			$this->load->model('QueCheck');
			$Uname = $this->input->post('Uname');
			$Pass = $this->input->post('Pass');
			$user = $this->QueCheck->login($Uname, $Pass);
			//this->load->view();
			/*echo '<pre>';
			print_r($user);
			echo '</pre>';*/
			if ($user)
			{
				$session_data = array(
					'Fname' => $user -> Fname,
					'Lname' => $user -> Lname,
					'Uname' => $user -> Uname,
					'Email' => $user -> Email,
					
					);
				$this->session->set_userdata('session_data');
				return redirect('admin');
			}
		}
		else
		{
			$this->load->view('welcome');
		}
		

	}

	/*public function signup()
	{
		$this->form_validation->set_rules('FName', 'First Name', 'required');
		$this->form_validation->set_rules('LName', 'Last Name', 'required');
		$this->form_validation->set_rules('Email', 'Email', 'required');
		$this->form_validation->set_rules('Uname', 'User Name', 'required');		
		$this->form_validation->set_rules('Pass', 'Password', 'required');

		if($this->form_validation->run())
		{
			$this->load->model('QueCheck');
			$data = $this->input->post();

			echo  '<pre>';
			print_r($data);
			echo '</pre>';
			exit();

			unset($data['submit']);
			if($this->QueCheck->register($data))
			{
				$this->session->set_flashdata('response','Registered Succesdfully');
			}
			else
			{
				$this->session->set_flashdata('response','Registration Failed');
			}
			return redirect('welcome');
			//echo "Success";
		}
		else
		{
			return $this->index();
		}


	}*/
}
