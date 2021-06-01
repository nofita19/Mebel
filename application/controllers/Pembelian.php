<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_master', 'v');
    }
    public function index()
    {
        
        $data['title'] = "Data Pembelian";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array();
        $data['pembelian'] = $this->v->getData('transaksi_pembelian');
        $this->load->view("template/header", $data);
        $this->load->view('pembelian', $data);
        $this->load->view("template/footer");
    }

    public function detail($id)
    {
        $data['title'] = "Data Pembelian";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array();
        $data['data'] = $this->v->getDetailData('transaksi_pembelian' , 'kode_pembelian' , $id);
        $this->load->view("template/header",$data);
        $this->load->view('pembeliandetail',$data);
        $this->load->view("template/footer");
		
    }

    public function tambah(){
        $data['title'] = "Data Pembelian";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array(); 
        $this->form_validation->set_rules('kode_pembelian' , 'kode_pembelian' , 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view("template/header",$data);
            $this->load->view('pembelianinsert',$data);
            $this->load->view("template/footer");
        } else {
            $tambah = $this->v->insert("transaksi_pembelian" , array(
                'kode_pembelian' =>$this->input->post('kode_pembelian'),
                'nama_barang' =>$this->input->post('nama_barang'),
                'jenis_barang' =>$this->input->post('jenis_barang'),
                'type_barang' =>$this->input->post('type_barang'),
                'harga' =>$this->input->post('harga'),
                'jumlah' =>$this->input->post('jumlah'),
                'sub_total' =>$this->input->post('sub_total'),
                'tanggal' =>$this->input->post('tanggal')
            ));

            if($tambah){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil Menambahkan Data !
            </div>');
            redirect('pembelian');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Menambahkan Data!
                </div>');
                redirect('pembelian');
            }
        }
    }

    public function edit_data($kode_pembelian){
        $this->load->model('v');
        $pembalian = $this->v->GetWhere('transaksi_pembelian', array('kode_pembelian' => $kode_pembelian));
        $data = array(
            'kode_pembelian' => $pembalian[0]['kode_pembelian'],
            'nama_barang' => $pembalian[0]['nama_barang'],
            'jenis_barang' => $pembalian[0]['jenis_barang'],
            'type_barang' => $pembalian[0]['type_barang'],
            'harga' => $pembalian[0]['harga'],
            'jumlah' => $pembalian[0]['jumlah'],
            'sub_total' => $pembalian[0]['sub_total'],
            'tanggal' => $pembalian[0]['tanggal']
            );
        $this->load->view("template/header",$data);
        $this->load->view('pembelianupdate',$data);
        $this->load->view("template/footer");
    }

    public function update_data(){
        $kode_pembelian = $_POST['kode_pembelian'];
        $nama_barang = $_POST['nama_barang'];
        $jenis_barang = $_POST['jenis_barang'];
        $type_barang = $_POST['type_barang'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $sub_total = $_POST['sub_total'];
        $tanggal = $_POST['tanggal'];

        $data = array(
            'nama_barang' => $nama_barang,
            'jenis_barang' => $jenis_barang,
            'type_barang' => $type_barang,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'sub_total' => $sub_total,
            'tanggal' => $tanggal
         );
        $where = array(
            'kode_pembelian' => $kode_pembelian,
        );
        $this->load->model('v');
        $res = $this->v->Update('transaksi_pembelian', $data, $where);
        if ($res>0) {
            redirect('pembelian','refresh');
        }
    }

    public function delete($kode_pembelian){
        $kode_pembelian = array('kode_pembelian' => $kode_pembelian);
        $this->load->model('v');
        $this->v->Delete('transaksi_pembelian', $kode_pembelian);
        redirect(base_url('pembelian'),'refresh');
    }
}