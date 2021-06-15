<?php
class Home extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        
        $data['title'] = "Data Barang";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('template/header',$data);
        $this->load->view('dashboard',$data);
        $this->load->view('template/footer',$data);
    }
}