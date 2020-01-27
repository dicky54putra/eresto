<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan_model extends CI_Model {

	public function tambahMasakan()
	{
		$data = [
				'nama_masakan' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'status_masakan' => 1
			];
			$this->db->insert('masakan', $data);
	}

	public function getAllMasakan()
	{
		return $this->db->get('masakan')->result_array();
	}

	public function getMasakanById($id)
	{
		return $this->db->get_where('masakan', ['id_masakan' => $id])->row_array();
	}

	public function editMakanan()
	{
		$data = [
				'nama_masakan' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'status_masakan' => 1
			];
			$this->db->where('id_masakan', $this->input->post('id'));
			$this->db->update('masakan', $data);
	}

	public function hapusMasakan($id)
	{
		$this->db->delete('masakan', ['id_masakan' => $id]);
	}

	




	

}
