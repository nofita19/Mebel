<?php

class Model_detail_penjualan extends CI_Model {
	protected $_table = 'transaksi_penjualan';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_nomor_faktur($nomor_faktur){
		return $this->db->get_where($this->_table, ['nomor_faktur' => $nomor_faktur])->result();
	}

	public function hapus($nomor_faktur){
		return $this->db->delete($this->_table, ['nomor_faktur' => $nomor_faktur]);
	}
}