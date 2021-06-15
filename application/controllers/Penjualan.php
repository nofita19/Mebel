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

    public function keranjang_barang(){
		$this->load->view('keranjang');
	}


    // public function edit_data($nomor_faktur){
    //     $this->load->model('v');
    //     $pembalian = $this->v->GetWhere('transaksi_penjualan', array('nomor_faktur' => $nomor_faktur));
    //     $data = array(
    //         'nomor_faktur' => $pembalian[0]['nomor_faktur'],
    //         'nama_barang' => $pembalian[0]['nama_barang'],
    //         'jenis_barang' => $pembalian[0]['jenis_barang'],
    //         'type_barang' => $pembalian[0]['type_barang'],
    //         'harga' => $pembalian[0]['harga'],
    //         'jumlah' => $pembalian[0]['jumlah'],
    //         'sub_total' => $pembalian[0]['sub_total'],
    //         'tanggal' => $pembalian[0]['tanggal']
    //         );
    //     $this->load->view("template/header",$data);
    //     $this->load->view('penjualanupdate',$data);
    //     $this->load->view("template/footer");
    // }

    // public function update_data(){
    //     $nomor_faktur = $_POST['nomor_faktur'];
    //     $nama_barang = $_POST['nama_barang'];
    //     $jenis_barang = $_POST['jenis_barang'];
    //     $type_barang = $_POST['type_barang'];
    //     $harga = $_POST['harga'];
    //     $jumlah = $_POST['jumlah'];
    //     $sub_total = $_POST['sub_total'];
    //     $tanggal = $_POST['tanggal'];

    //     $data = array(
    //         'nama_barang' => $nama_barang,
    //         'jenis_barang' => $jenis_barang,
    //         'type_barang' => $type_barang,
    //         'harga' => $harga,
    //         'jumlah' => $jumlah,
    //         'sub_total' => $sub_total,
    //         'tanggal' => $tanggal
    //      );
    //     $where = array(
    //         'nomor_faktur' => $nomor_faktur,
    //     );
    //     $this->load->model('v');
    //     $res = $this->v->Update('transaksi_penjualan', $data, $where);
    //     if ($res>0) {
    //         redirect('penjualan','refresh');
    //     }
    // }

    public function delete($nomor_faktur){
        $nomor_faktur = array('nomor_faktur' => $nomor_faktur);
        $this->load->model('v');
        $this->v->Delete('transaksi_penjualan', $nomor_faktur);
        redirect(base_url('penjualan'),'refresh');
    }
}