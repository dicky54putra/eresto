<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
		$session = $this->session->userdata('id_level');
		if ($this->session->userdata('username') != TRUE) {
			redirect(base_url());
		}elseif ($session != 1 && $session != 2) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "eRESTO | Kasir Home";
		$data['Pesanan'] = $this->Transaksi_model->getAllPesanan();
		// $data['transaksi'] = $this->Transaksi_model->getPesananById();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/admin_sidebar', $data);
		$this->load->view('transaksi/index', $data);
		$this->load->view('template/footer');
		
	}

	public function bayar($id)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "eRESTO | Kasir Home";
		
		$data['transaksi'] = $this->Transaksi_model->getPesananById($id);
		$data['detail'] = $this->Transaksi_model->getDetailPesananById($id);
		$data['jumlah_pesanan'] = $this->Transaksi_model->getJumlahPesanan($id);
		$data['cetak'] = $this->Transaksi_model->getCetakPesanan($id);

		$this->form_validation->set_rules('uang_customer', 'Uang Customer', 'required');

		if ($this->form_validation->run()==false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/admin_sidebar', $data);
			$this->load->view('transaksi/bayar', $data);
			$this->load->view('template/footer');
		}else{
			$uang['1'] = $this->input->post('uang_customer');
			$uang['2'] = $data['jumlah_pesanan']['jumlah_harga'];
			// var_dump($uang);
			// die();
			if ($uang['2']>$uang['1']) {
				$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Uang customer kurang!</div>');
				redirect('transaksi/bayar/'.$id);
			}else{
				$this->Transaksi_model->tambahTransaksi();
				$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Transaksi berhasil!</div>');
				redirect('transaksi/bayar/'.$id);
			}
		}

	}

	public function print($id)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "eRESTO | Kasir Home";
		
		$data['transaksi'] = $this->Transaksi_model->getPesananById($id);
		$data['detail'] = $this->Transaksi_model->getDetailPesananById($id);
		$data['jumlah_pesanan'] = $this->Transaksi_model->getJumlahPesanan($id);
		$data['cetak'] = $this->Transaksi_model->getCetakPesanan($id);
		$this->load->view('transaksi/print',$data);
	}




}
