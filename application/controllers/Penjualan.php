<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_master', 'v');
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('Model_penjualan', 'm_penjualan');
		$this->load->model('Model_detail_penjualan', 'm_detail_penjualan');
		$this->load->model('M_pembayaran', 'm_pembayaran');
		$this->data['aktif'] = 'penjualan';
    }
    public function index()
    {
        
        $data['title'] = "Data penjualan";
        $data['penjualan'] = $this->v->getDatapenjualan('transaksi_penjualan');
        $this->load->view("template/header", $data);
        $this->load->view('penjualan', $data);
        $this->load->view("template/footer");
    }

    // public function detail($id)
    // {
    //     $data['title'] = "Data penjualan";
    //     $data['User'] = $this->db->get_where('user',['username' => 
    //     $this->session->userdata('username')])->row_array();
    //     $data['data'] = $this->v->getDetailData('transaksi_penjualan' , 'nomor_faktur' , $id);
    //     $this->load->view("template/header",$data);
    //     $this->load->view('penjualandetail',$data);
    //     $this->load->view("template/footer");
		
    // }

    public function tambah(){
		$data['title'] = 'Tambah Penjualan';
		$data['all_barang'] = $this->m_barang->lihat_stok();
		$data['all_pembayaran'] = $this->m_pembayaran->lihat();
		$data['all_penjualan'] = $this->m_penjualan->lihat();
		$data['barang'] = $this->v->getData('barang');

        $this->load->view("template/header", $data);
		$this->load->view('penjualaninsert', $data);
        $this->load->view("template/footer");
	}

	// public function proses_tambah(){
	// 	$jumlah_barang_dibeli = count($this->input->post('nama_barang_hidden'));
		
	// 	$data_penjualan = [
	// 		'nomor_faktur' => $this->input->post('nomor_faktur')
	// 	];

	// 	$data_detail_penjualan = [];

	// 	for ($i=0; $i < $jumlah_barang_dibeli ; $i++) { 
	// 		array_push($data_detail_penjualan, ['barang_nama' => $this->input->post('nama_barang_hidden')[$i]]);
	// 		$data_detail_penjualan[$i]['nomor_faktur'] = $this->input->post('nomor_faktur');
	// 		$data_detail_penjualan[$i]['harga_asli'] = $this->input->post('harga_barang_hidden')[$i];
	// 		$data_detail_penjualan[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
	// 		$data_detail_penjualan[$i]['sub_total'] = $this->input->post('sub_total_hidden')[$i];
	// 	}

	// 	if($this->m_penjualan->tambah($data_penjualan) && $this->m_detail_penjualan->tambah($data_detail_penjualan)){
	// 		for ($i=0; $i < $jumlah_barang_dibeli ; $i++) { 
	// 			$this->m_barang->min_stok($data_detail_penjualan[$i]['jumlah'], $data_detail_penjualan[$i]['barang_nama']) or die('gagal min stok');
	// 		}
	// 		$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
	// 		redirect('penjualan');
	// 	} else {
	// 		$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
	// 		redirect('penjualan');
	// 	}
	// }

	public function detail($nomor_faktur){
		$this->data['title'] = 'Detail Penjualan';
		$this->data['penjualan'] = $this->m_penjualan->lihat_nomor_faktur($nomor_faktur);
		$this->data['all_detail_penjualan'] = $this->m_detail_penjualan->lihat_nomor_faktur($nomor_faktur);
		$this->data['no'] = 1;

		$this->load->view('penjualan/detail', $this->data);
	}

    public function get_all_barang(){
		$data = $this->m_barang->lihat_nama_barang($_POST['barang_nama']);
		echo json_encode($data);
	}

    public function get_all_pembayaran(){
		$data = $this->m_pembayaran->lihat_pembayaran($_POST['nama_pembayaran']);
		echo json_encode($data);
	}

    public function keranjang_barang(){
		$this->load->view('keranjang');
	}

    public function delete($nomor_faktur){
        $nomor_faktur = array('nomor_faktur' => $nomor_faktur);
        $this->load->model('v');
        $this->v->Delete('transaksi_penjualan', $nomor_faktur);
        redirect(base_url('penjualan'),'refresh');
    }

    public function laporanpenjualan()
    {
        
        $data['title'] = "Laporan Data penjualan";
        $data['tahun'] = $this->v->gettahun();
        $this->load->view("template/header", $data);
        $this->load->view('report/report_penjualan', $data);
        $this->load->view("template/footer");
    }

    public function laporanbybulan()
    {
        $data['title'] = "Laporan Dari Bulan";
        // user data

        $tahun1 = htmlspecialchars($this->input->post('tahun1', true));
        $bulanawal1 = htmlspecialchars($this->input->post('bulanawal1', true));
        $bulanakhir = htmlspecialchars($this->input->post('bulanakhir', true));

        $data['bybulan'] = $this->m_penjualan->filterbybulan($tahun1, $bulanawal1, $bulanakhir);
        $this->load->view('report/laporan_by_bulan_penjualan', $data);
    }

    public function laporanbytahun()
    {
        $data['title'] = "Laporan Dari Tahun";
        // user data

        $tahun2 = htmlspecialchars($this->input->post('tahun2', true));

        $data['bytahun'] = $this->m_penjualan->filterbytahun($tahun2);
        $this->load->view('report/laporan_by_tahun_penjualan', $data);
    }
}