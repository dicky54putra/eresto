<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {

	public function tambahPesanan()
	{
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		$data = [
				'customer' => $this->input->post('nama'),
				'id_meja' => $this->input->post('meja'),
				'tanggal' => date('y-m-d'),
				'id_user' => ($data['user']['id_user']),
				'status_pesanan' => '0'
			];
		
		
		$this->db->where('id_meja', $this->input->post('meja'));
		$this->db->update('meja', ['status_meja'=>1]);

		$this->db->insert('pesanan', $data);
	}

	public function getAllPesanan()
	{
		$this->db->where('status_pesanan', '0');
		return $this->db->select('id_pesanan, no_meja, customer, tanggal, nama_user, status_pesanan')->from('pesanan')->join('user', 'pesanan.id_user=user.id_user', 'INNER')->join('meja', 'pesanan.id_meja=meja.id_meja', 'INNER')->order_by('id_pesanan', 'DESC')->get()->result_array();
		
	}

	public function getPesananById($id)
	{
		return $this->db->get_where('pesanan', ['id_pesanan' => $id])->row_array();
	}

	public function getDetailPesananById($id)
	{
		$this->db->where('id_pesanan', $id);
		return $this->db->select('keterangan, id_pesanan, jumlah_harga, id_pesan, harga, status_pesanan, jumlah_pesanan, nama_masakan, customer')->from('detail_pesan')->join('pesanan', 'pesanan.id_pesanan=detail_pesan.id_pesanan_index', 'INNER')->join('masakan', 'detail_pesan.id_masakan=masakan.id_masakan')->get()->result_array();
	}

	public function getJumlahPesanan($id)
	{
		$this->db->where('id_pesanan_index', $id);
		return $this->db->select_sum('jumlah_harga')->join('detail_pesan', 'detail_pesan.id_masakan=masakan.id_masakan', 'INNER')->get('masakan')->row_array();
	}

	public function getPesananReady()
	{
		return $this->db->get('meja')->result_array();

	}

	public function getMasakanReady()
	{
		return $this->db->get('masakan')->result_array();

	}

	public function editPesanan()
	{
		$data = [
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'status' => '1'
			];
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('Pesanan', $data);
	}

	public function hapusPesanan($id)
	{
		$this->db->delete('Pesanan', ['id' => $id]);
	}

	public function tambahDetailPesanan()
	{
		$getharga['getharga'] = $this->db->get_where('masakan', ['id_masakan' => $this->input->post('nama_masakan')])->row_array();
		// var_dump($getharga);
		// die();
		$harga = $getharga['getharga']['harga'];
		$total_harga = $this->input->post('jumlah_pesanan')*$harga;

		$data = [
			'id_pesanan_index' => $this->input->post('id_pesanan'),
			'id_masakan' => $this->input->post('nama_masakan'),
			'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
			'jumlah_harga' => ''.$total_harga,
			'keterangan' => $this->input->post('keterangan')
		];
		
		$this->db->insert('detail_pesan',$data);
		$this->db->where('id_pesanan', $this->input->post('id_pesanan'));
		$this->db->update('pesanan', ['status_pesanan' => '0']);
	}

	





	

}
