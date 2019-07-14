<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('accountmodel');
	}

	public function index()
	{
		//$this->load->model('accountmodel');
		$data['accounts'] = $this->accountmodel->getAll();
		$this->load->view('view_account', $data);
	}

	public function details($id = 0)
	{
		

		if($id == 0)
		{
			echo "Invalid id";
			return ;
		}

		//$id = $this->input->get('id');

		//$this->load->model('accountmodel');
		$acc = $this->accountmodel->getById($id);
		
		if(!$acc)
		{
			echo "No record found";
		}
		else
		{
			$this->load->view('view_details', $acc);
		}
		
	}

	public function addnew()
	{
		if(! $this->input->get_post('buttonSave'))
		{
			$this->load->view('view_addnew');
			return ;
		}
		

		$acc['accno'] = $this->input->get_post('accno');
		$acc['accname'] = $this->input->get_post('accname');
		$acc['balance'] = $this->input->get_post('balance');

		//$this->load->model('accountmodel');
		$this->accountmodel->insert($acc);

		$this->load->helper('url');
		redirect('http://localhost/ci226/account', 'refresh');

	}
}