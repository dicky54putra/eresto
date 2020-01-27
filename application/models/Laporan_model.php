<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function getAllPesanan()
	{
		return $this->db->select('id_pesanan, harga, total_bayar, kembalian, no_meja, customer, tanggal, nama_user, status_pesanan')->from('transaksi')->join('user', 'transaksi.id_user=user.id_user', 'INNER')->join('pesanan', 'pesanan.id_pesanan=transaksi.id_pesanan_index2', 'INNER')->join('meja', 'pesanan.id_meja=meja.id_meja', 'INNER')->order_by('id', 'DESC')->get()->result_array();		
	}

	public function getLaporanByDate()
	{
		$tanggal1 = $this->input->post('tanggal_awal');
		$tanggal2 = $this->input->post('tanggal_akhir');

		$query = "SELECT `id_pesanan`, `harga`, `total_bayar`, `kembalian`, `no_meja`, `customer`, `tanggal`, `nama_user`, `status_pesanan` FROM `transaksi` INNER JOIN `user` ON `transaksi`.`id_user`=`user`.`id_user` INNER JOIN `pesanan` ON `pesanan`.`id_pesanan`=`transaksi`.`id_pesanan_index2` INNER JOIN `meja` ON `pesanan`.`id_meja`=`meja`.`id_meja` WHERE `tanggal_transaksi` = ".$tanggal1." BETWEEN ".$tanggal2." ORDER BY `id` DESC";
		// $this->db->where('tanggal_transaksi', $tanggal1 );
		// return $this->db->select('id_pesana, harga, total_bayar, kembalian, no_meja, customer, tanggal, nama_user, status_pesanan')->from('transaksi')->join('user', 'transaksi.id_user=user.id_user', 'INNER')->join('pesanan', 'pesanan.id_pesanan=transaksi.id_pesanan_index2', 'INNER')->join('meja', 'pesanan.id_meja=meja.id_meja', 'INNER')->order_by('id', 'DESC')->get()->result_array();
	}



}