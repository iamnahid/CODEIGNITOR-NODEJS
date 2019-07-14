<?php

class QueCheck extends CI_Model
{
	public function register($data)
	{
		return $this->db->insert('admin', $data);
	}

	public function login($Uname, $Pass)
	{
		$query = $this->db->where(['Uname'=>$Uname, 'Pass'=>$Pass])->get('admin');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
	}

	
}