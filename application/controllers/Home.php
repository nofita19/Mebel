<?php
class Home extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_master', 'v');
        
    }

    public function index()
    {
        $data = [
            "today_income" => $this->v->get_today_income(),
            "today_incoma" => $this->v->get_today_incoma(),
            "total_transaksipenjualan" => $this->v->count(),
            "total_transaksipembelian" => $this->v->countt()
        ];
        $now = date("m");

        $arrayTitle = [];
        $before = $now - 5;
        $arrayNumber = [];
        $arrayValuepembelian = [];
        $arrayValuepenjualan = [];
    
        $month = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    
        for($i = $before;$i <= $now;$i++) {
            if($i <= 0) {
                $temp = 12 + $i;
                $arrayTitle[] = '"'.$month[$temp - 1]." ".(date("Y") - 1).'"';
            } else {
                $temp = $i;
                $arrayTitle[] = '"'.$month[$temp - 1]." ".date("Y").'"';
            }
            $arrayNumber[] = str_pad($temp,2,0,STR_PAD_LEFT);
            $arrayValuepembelian[] = 0;
            $arrayValuepenjualan[] = 0;
        }
    
        
        $data1 = $this->v->get_graph($arrayNumber)->result();
        $data2 = $this->v->get_graphh($arrayNumber)->result();
    
        foreach($data1 as $row) {
            $key = array_search(str_pad($row->tanggal,2,0,STR_PAD_LEFT),$arrayNumber);
            // var_dump($row->tanggal);
            // die;
            $arrayValuepembelian[$key] = $row->total;
        }
        foreach($data2 as $row) {
            $key = array_search(str_pad($row->tanggal,2,0,STR_PAD_LEFT),$arrayNumber);
            $arrayValuepenjualan[$key] = $row->total;
        }

        $data["title"] = $arrayTitle;
        $data["valuepembelian"] = $arrayValuepembelian;
        $data["valuepenjualan"] = $arrayValuepenjualan;
        // var_dump($data);
        // die;
        $this->load->view('template/header',$data);
        $this->load->view('dashboard',$data);
        $this->load->view('template/footer',$data);
    }
}