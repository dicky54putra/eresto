<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Waiter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// jika tidak ada validasi
		if ($this->session->userdata('username') != TRUE) {
			redirect(base_url());
		}elseif (!$data['user'] = $this->db->get_where('user', ['id_level' => $this->session->userdata('id_level')=='3'])->row_array()) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "eRESTO | Kasir Home";

		// echo $data['user']['nama'];
		$this->load->view('template/header', $data);
		$this->load->view('template/admin_sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer');
	}

	public function changePassword()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = "eRESTO | Admin change Password";

		$this->form_validation->set_rules('c_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('password1', 'New Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Confirm New Password', 'trim|required|min_length[3]|matches[password2]');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/admin_sidebar', $data);
			$this->load->view('waiter/change_password', $data);
			$this->load->view('template/footer');
			// echo $data['user']['password'];
		}else{
			$c_password = $this->input->post('c_password');
			$n_password = $this->input->post('password2');
			if (!password_verify($c_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Current password salah!</div>');
				redirect('waiter/changepassword');
			}else{
				if ($c_password == $n_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> New password sama dengan current password!</div>');
					redirect('waiter/changepassword');
				}else{
					// password sudah benar
					$password_hash = password_hash($n_password, PASSWORD_DEFAULT);

					// nginput ke database
					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Password berhasil dirubah!</div>');
					redirect('waiter/changepassword');
				}
			}
		}
	}





}