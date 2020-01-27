<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Masakan_model');
		if ($this->session->userdata('username') != TRUE) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "eRESTO | Kasir Home";
		$data['masakan'] = $this->Masakan_model->getAllMasakan();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run()==false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/admin_sidebar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('template/footer');
		}else{
			$this->Masakan_model->tambahMasakan();
			$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Menu makanan berhasil ditambahkan!</div>');
			redirect('masakan');
		}
	}

	public function hapus($id)
	{
		$this->Masakan_model->hapusMasakan($id);
		$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Menu makanan berhasil dihapus!</div>');
		redirect('masakan');
	}

	public function status($id)
	{
		$data['masakan'] = $this->Masakan_model->getMasakanById($id);
		// $this->Masakan_model->statusMakanan($id);
		if ($data['masakan']['status_masakan']=='1') {
			$this->db->where('id_masakan', $id);
			$this->db->update('masakan', ['status_masakan' => '0']);
			redirect('masakan');
		}else if ($data['masakan']['status_masakan']=='0'){
			$this->db->where('id_masakan', $id);
			$this->db->update('masakan', ['status_masakan' => '1']);
			redirect('masakan');
		}
	}

	public function getedit()
	{
		echo json_encode($this->Masakan_model->getMasakanById($_POST['id']));
	}

	public function edit()
	{
		$this->form_validation->set_rules('nama_masakan', 'Nama', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');

		if ($this->form_validation->run() == false) {
			redirect('masakan');
		}else{
			$this->Masakan_model->editMakanan();
			$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Menu makanan berhasil ditambahkan!</div>');
			redirect('masakan');
		}
	}






}