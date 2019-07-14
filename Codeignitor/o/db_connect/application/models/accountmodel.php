<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accountmodel extends CI_Model {

	public function getAll()
	{
		/*$con = mysql_connect('localhost', 'root', '');
		mysql_select_db('bankdb', $con);*/
		$this->load->database();

		$sql = "SELECT * FROM accounts";
		

		//$result = mysql_query($sql);
		$result = $this->db->query($sql);
		
		/*foreach($row = mysql_fetch_array($result))
		{
			
		}*/
		//$result->row_array();
		return $result->result_array();


	}

	public function getById($id)
	{
		$this->load->database();
		$sql = "SELECT * FROM accounts WHERE id=$id";
		$result = $this->db->query($sql);
		return $result->row_array();

	}

	public function insert($acc)
	{
		$this->load->database();
		$sql = "INSERT INTO accounts VALUES (null, '$acc[accno]', '$acc[accname]', $acc[balance])";
		return $this->db->query($sql);
	}
}