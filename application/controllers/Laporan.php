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
		$this->form_validation->set_rules('tanggal_awal', 'Date start', 'required');
		$this->form_validation->set_rules('tanggal_akhir', 'Date end', 'required');

		if ($this->form_validation->run()==false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/admin_sidebar', $data);
			$this->load->view('laporan/index', $data);
			$this->load->view('template/footer');
		}else{
			$this->Laporan_model->getLaporanByDate();
			redirect('laporan');
		}

	}

	public function print()
	{

		$data['Pesanan'] = $this->Laporan_model->getAllPesanan();
		$this->load->view('laporan/print', $data);
	}





}