<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_master', 'v');
    }
    public function index()
    {
        
        $data['title'] = "Data Barang";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->v->getData('barang');
        $this->load->view("template/header", $data);
        $this->load->view('barang', $data);
        $this->load->view("template/footer");
    }

    public function detail($id)
    {
        $data['title'] = "Data Barang";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array();
        $data['data'] = $this->v->getDetailData('barang' , 'barang_kode' , $id);
        $this->load->view("template/header",$data);
        $this->load->view('barangdetail',$data);
        $this->load->view("template/footer");
		
    }

    public function tambah(){
        $data['title'] = "Data Barang";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array(); 
        $this->form_validation->set_rules('barang_kode' , 'barang_kode' , 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view("template/header",$data);
            $this->load->view('baranginsert',$data);
            $this->load->view("template/footer");
        } else {
            $foto = $_FILES['foto']['name'];
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './img/barang/';
            $this->load->library('upload' , $config);

            if ($this->upload->do_upload('foto')) {

            $tambah = $this->v->insert("barang" , array(
                'barang_kode' =>$this->input->post('barang_kode'),
                'barang_nama' =>$this->input->post('barang_nama'),
                'jenis_bahan' =>$this->input->post('jenis_bahan'),
                'type_barang' =>$this->input->post('type_barang'),
                'harga_asli' =>$this->input->post('harga_asli'),
                'biaya_produksi' =>$this->input->post('biaya_produksi'),
                'biaya_tukang' =>$this->input->post('biaya_tukang'),
                'biaya_distribusi' =>$this->input->post('biaya_distribusi'),
                'biaya_lainlain' =>$this->input->post('biaya_lainlain'),
                'keuntungan' =>$this->input->post('keuntungan'),
                // 'harga_tunai' =>$this->input->post('harga_tunai'),
                // 'harga_kredit_bulananan' =>$this->input->post('harga_kredit_bulananan'),
                // 'harga_kredit_musiman' =>$this->input->post('harga_kredit_musiman'),
                'stok' =>$this->input->post('stok'),
                'foto' =>$foto
            ));

            if($tambah){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil Menambahkan Data !
            </div>');
            redirect('barang');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Menambahkan Data!
                </div>');
                redirect('barang');
            }
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">'
            . $this->upload->display_errors() .
            '</div>');
            redirect('barang');
        }
        }
    }

    public function edit_data($barang_kode){
        $this->load->model('v');
        // $foto = $_FILES['foto']['name'];
        // $config['allowed_types'] = 'jpg|png|gif|jpeg';
        // $config['max_size'] = '2048';
        // $config['upload_path'] = './img/barang/';
        // $this->load->library('upload' , $config);
        $barang = $this->v->GetWhere('barang', array('barang_kode' => $barang_kode));
        $data = array(
            'barang_kode' => $barang[0]['barang_kode'],
            'barang_nama' => $barang[0]['barang_nama'],
            'jenis_bahan' => $barang[0]['jenis_bahan'],
            'type_barang' => $barang[0]['type_barang'],
            'harga_asli' => $barang[0]['harga_asli'],
            'biaya_produksi' => $barang[0]['biaya_produksi'],
            'biaya_tukang' => $barang[0]['biaya_tukang'],
            'biaya_distribusi' => $barang[0]['biaya_distribusi'],
            'biaya_lainlain' => $barang[0]['biaya_lainlain'],
            'keuntungan' => $barang[0]['keuntungan'],
            // 'harga_tunai' => $barang[0]['harga_tunai'],
            // 'harga_kredit_bulananan' => $barang[0]['harga_kredit_bulananan'],
            // 'harga_kredit_musiman' => $barang[0]['harga_kredit_musiman'],
            'stok' => $barang[0]['stok'],
            'foto' => $barang[0]['foto']
            );
        $this->load->view("template/header",$data);
        $this->load->view('barangupdate',$data);
        $this->load->view("template/footer");
    }

    public function update_data(){
        // $foto = $_FILES['foto']['name'];
        //     $config['allowed_types'] = 'jpg|png|gif|jpeg';
        //     $config['max_size'] = '2048';
        //     $config['upload_path'] = './img/barang/';
        //     $this->load->library('upload' , $config);
        $barang_kode = $_POST['barang_kode'];
        $barang_nama = $_POST['barang_nama'];
        $jenis_bahan = $_POST['jenis_bahan'];
        $type_barang = $_POST['type_barang'];
        $harga_asli = $_POST['harga_asli'];
        $biaya_produksi = $_POST['biaya_produksi'];
        $biaya_tukang = $_POST['biaya_tukang'];
        $biaya_distribusi = $_POST['biaya_distribusi'];
        $biaya_lainlain = $_POST['biaya_lainlain'];
        $keuntungan = $_POST['keuntungan'];
        // $harga_tunai = $_POST['harga_tunai'];
        // $harga_kredit_bulananan = $_POST['harga_kredit_bulananan'];
        // $harga_kredit_musiman = $_POST['harga_kredit_musiman'];
        $stok = $_POST['stok'];
        $foto = $_POST['foto'];
        $data = array(
            'barang_nama' => $barang_nama,
            'jenis_bahan' => $jenis_bahan,
            'type_barang' => $type_barang,
            'harga_asli' => $harga_asli,
            'biaya_produksi' => $biaya_produksi,
            'biaya_tukang' => $biaya_tukang,
            'biaya_distribusi' => $biaya_distribusi,
            'biaya_lainlain' => $biaya_lainlain,
            'keuntungan' => $keuntungan,
            // 'harga_tunai' => $harga_tunai,
            // 'harga_kredit_bulananan' => $harga_kredit_bulananan,
            // 'harga_kredit_musiman' => $harga_kredit_musiman,
            'stok' => $stok,
            'foto' => $foto
         );
        $where = array(
            'barang_kode' => $barang_kode,
        );
        $this->load->model('v');
        $res = $this->v->Update('barang', $data, $where);
        if ($res>0) {
            redirect('barang','refresh');
        }
    }

    public function delete($barang_kode){
        $barang_kode = array('barang_kode' => $barang_kode);
        $this->load->model('v');
        $this->v->Delete('barang', $barang_kode);
        redirect(base_url('barang'),'refresh');
    }
}