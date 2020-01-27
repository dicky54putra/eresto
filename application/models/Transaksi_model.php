<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function getAllPesanan()
	{
		return $this->db->select('id_pesanan, no_meja, customer, tanggal, nama_user, status_pesanan')->from('pesanan')->join('user', 'pesanan.id_user=user.id_user', 'INNER')->join('meja', 'pesanan.id_meja=meja.id_meja', 'INNER')->order_by('id_pesanan', 'DESC')->get()->result_array();		
	}

	public function getPesananById($id)
	{
		return $this->db->get_where('pesanan', ['id_pesanan' => $id])->row_array();
	}

	public function getDetailPesananById($id)
	{
		$this->db->where('id_pesanan', $id);
		return $this->db->select('keterangan, jumlah_harga,id_meja, id_pesanan, id_pesan, harga, status_pesanan, jumlah_pesanan, nama_masakan, customer')->from('detail_pesan')->join('pesanan', 'pesanan.id_pesanan=detail_pesan.id_pesanan_index', 'INNER')->join('masakan', 'detail_pesan.id_masakan=masakan.id_masakan')->get()->result_array();
	}

	public function getCetakPesanan($id)
	{
		$this->db->where('id_pesanan_index', $id);
		return $this->db->select('nama_user, tanggal_transaksi, harga, total_bayar, kembalian')->from('transaksi')->join('pesanan', 'transaksi.id_pesanan_index2=pesanan.id_pesanan', 'INNER')->join('user', 'transaksi.id_user=user.id_user', 'INNER')->join('detail_pesan', 'pesanan.id_pesanan =detail_pesan.id_pesanan_index', 'INNER')->get()->row_array();
	}

	public function getJumlahPesanan($id)
	{
		$this->db->where('id_pesanan_index', $id);
		return $this->db->select_sum('jumlah_harga')->join('detail_pesan', 'detail_pesan.id_masakan=masakan.id_masakan', 'INNER')->get('masakan')->row_array();
	}

	public function tambahTransaksi()
	{
		$kembalian = $this->input->post('uang_customer') - $this->input->post('total_harga');
		$data = [
			'id_user' => $this->input->post('id_user'),
			'id_pesanan_index2' => $this->input->post('pesanan'),
			'tanggal_transaksi' => date('y-m-d'),
			'harga' => $this->input->post('total_harga') ,
			'total_bayar' => $this->input->post('uang_customer'), 
			'kembalian' => ''.$kembalian
		];
		// var_dump($data);
		// die();
		$this->db->insert('transaksi', $data);
		$this->db->where('id_pesanan', $this->input->post('pesanan'));
		$this->db->update('pesanan', ['status_pesanan' => '1']);
		$this->db->where('id_meja', $this->input->post('id_meja'));
		$this->db->update('meja', ['status_meja' => '0']);
	}


}