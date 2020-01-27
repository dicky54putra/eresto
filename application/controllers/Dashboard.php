<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login'))
		{
			redirect('login', 'refresh');
		}
	}

	public function index(){
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		echo 'selamat datang ' . $data['user']['nama'];
	}
}
