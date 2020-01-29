<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan_model');
		if ($this->session->userdata('username') != TRUE) {
			redirect(base_url());
		}
	}

	public function index(){
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "eRESTO | Kasir Home";
		$data['Pesanan'] = $this->Laporan_model->getAllPesanan();
		// $data['transaksi'] = $this->Transaksi_model->getPesananById();
		if ($this->input->post('tanggal_awal') && $this->input->post('tanggal_akhir')) {
			$data['Pesanan'] = $this->Laporan_model->getLaporanByDate();
			// var_dump($data['Pesanan']);
			// die();
		}
			$this->load->view('template/header', $data);
			$this->load->view('template/admin_sidebar', $data);
			$this->load->view('laporan/index', $data);
			$this->load->view('template/footer');
		

	}

	public function print()
	{

		$data['Pesanan'] = $this->Laporan_model->getAllPesanan();
		$this->load->view('laporan/print', $data);
	}





}