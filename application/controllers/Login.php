<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
    {
        if ($this->session->userdata('id_level')==1) {
            redirect('admin');
        }elseif ($this->session->userdata('id_level')==2) {
            redirect('kasir');
        }elseif ($this->session->userdata('id_level')==3) {
            redirect('waiter');
        }elseif ($this->session->userdata('id_level')==4) {
            redirect('owner');
        }


        $data['title'] = "eRESTO | Login";

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('login/index');
            $this->load->view('template/footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');

    	$user = $this->db->get_where('user', ['username' => $username])->row_array();

    	// jika usernya ada
    	if ($user) {
    		// cek password
    		if (password_verify($password, $user['password'])) {
    			$data = [
    				'username' => $user['username'],
    				'id_level' => $user['id_level'],
    			];
    			$this->session->set_userdata($data);
                if ($user['id_level'] == 1) {
    			     redirect('admin');
                }else if ($user['id_level'] == 2) {
                    redirect('kasir');
                }else if ($user['id_level'] == 3) {
                    redirect('waiter');
                }else if ($user['id_level'] == 4) {
                    redirect('owner');
                }else{
                    redirect('pelanggan');
                }
    		}else{
    			$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Password salah!</div>');
                redirect('login');
    		}


    	}else{
    		$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Username tidak terdaftar!</div>');
                redirect('login');
    	}
    }




    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_level');

        $this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> You have been logged out!</div>');
        redirect('login');
    }






}

	