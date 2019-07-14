<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testmodel extends CI_Model {

	public function getName()
	{
		return "ABC";
	}

	public function getEmail()
	{
		return 'abc@aiub.edu';
	}

	public function getHobbies()
	{
		return array('Sports', 'Music', 'Travel', 'Books', 'Others');
	}
}






