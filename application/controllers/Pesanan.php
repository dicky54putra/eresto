<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesanan_model');
		if ($this->session->userdata('username') != TRUE) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "eRESTO | Kasir Home";
		$data['Pesanan'] = $this->Pesanan_model->getAllPesanan();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/admin_sidebar', $data);
		$this->load->view('pesanan/index', $data);
		$this->load->view('template/footer');
		
	}

	public function tambah()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "eRESTO | Kasir Home";
		$data['Pesanan'] = $this->Pesanan_model->getPesananReady();

		$this->form_validation->set_rules('nama', 'Nama Customer', 'required');
		$this->form_validation->set_rules('meja', 'Nomor Meja', 'required');

		if ($this->form_validation->run()==false) {
		
		$this->load->view('template/header', $data);
		$this->load->view('template/admin_sidebar', $data);
		$this->load->view('pesanan/tambah', $data);
		$this->load->view('template/footer');
		}else{
			
			$this->Pesanan_model->tambahPesanan();
			$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Pesanan berhasil!</div>');
			redirect('pesanan');
		}


	}

	public function detail($id)
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "eRESTO | Kasir Home";

		$data['Detail_pesanan'] = $this->Pesanan_model->getMasakanReady();

		$data['detail'] = $this->Pesanan_model->getDetailPesananById($id);
		$data['pesanan'] = $this->Pesanan_model->getPesananById($id);
		$data['jumlah_pesanan'] = $this->Pesanan_model->getJumlahPesanan($id);

		$this->form_validation->set_rules('nama_masakan', 'Masakan', 'required');
		$this->form_validation->set_rules('jumlah_pesanan', 'Jumlah Pesanan', 'required');

		if ($this->form_validation->run()==false)
		{
			$this->load->view('template/header', $data);
			$this->load->view('template/admin_sidebar', $data);
			$this->load->view('pesanan/detail', $data);
			$this->load->view('template/footer');
			
		}else{
			$this->Pesanan_model->tambahDetailPesanan();
			redirect('pesanan/detail/'.$id);
		}
		
	}


	public function hapus($id)
	{
		$this->Pesanan_model->hapusPesanan($id);
		$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Menu makanan berhasil dihapus!</div>');
		redirect('Pesanan');
	}

	public function status($id)
	{
		$data['Pesanan'] = $this->Pesanan_model->getPesananById($id);
		// $this->Pesanan_model->statusMakanan($id);
		if ($data['Pesanan']['status_pesanan']=='0') {

			$this->db->where('id_pesanan', $id);
			$this->db->update('pesanan', ['status_pesanan' => '1']);
			redirect('transaksi');
		}
	}

	public function edit()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == false) {
			redirect('Pesanan');
		}else{
			$this->Pesanan_model->editMakanan();
			$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Menu makanan berhasil ditambahkan!</div>');
			redirect('Pesanan');
		}
	}



}