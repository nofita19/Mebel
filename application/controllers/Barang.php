<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    private $dataAdmin;

    function __construct() {
        parent::__construct();

        if(!$this->session->auth) {
            redirect(base_url("Login"));
        }

        $this->load->model("Model_login");
        $this->load->model("Model_barang");

        $this->dataAdmin = $this->Model_login->get(["id" => $this->session->auth['id']])->row();
    }


	public function index()
	{

        $data = [
            "pageTitle" => "Data Barang",
            "dataAdmin" => $this->dataAdmin 
        ];

		$this->load->view('header',$data);
		$this->load->view('barang',$data);
		$this->load->view('footer',$data);
    }
    
    public function json() {
        $this->load->model("datatables");
        $this->datatables->setTable("barang");
        $this->datatables->setColumn([
            '<index>',
            '<get-name>',
            '[rupiah=<get-price>]',
            '<div class="text-center"><button type="button" class="btn btn-primary btn-sm btn-edit" data-id="<get-id>" data-name="<get-name>" data-price="<get-price>"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="<get-id>" data-name="<get-name>"><i class="fa fa-trash"></i></button></div>'
        ]);
        $this->datatables->setOrdering(["barang_kode","name","price",NULL]);
        $this->datatables->setWhere("type","service");
        $this->datatables->setSearchField("name");
        $this->datatables->generate();
    }

    function insert() {
        $this->process();
    }

    function update($id) {
        $this->process("edit",$id);
    }

    private function process($action = "add",$id = 0) {
        $name = $this->input->post("name");
        $price = $this->input->post("price");

        if(!$name OR !$price) {
            $response['status'] = FALSE;
            $response['msg'] = "Periksa kembali data yang anda masukkan";
        } else {
            $insertData = [
                "id" => NULL,
                "name" => $name,
                "price" => $price,
                "type" => "service",
                "stock" => NULL
            ];

            $response['status'] = TRUE;

            if($action == "add") {
                $response['msg'] = "Data berhasil ditambahkan";
                $this->Model_barang->post($insertData);
            } else {
                unset($insertData['id']);
                unset($insertData['type']);
                unset($insertData['stock']);

                $response['msg'] = "Data berhasil diedit";
                $this->Model_barang->put($id,$insertData);
            }

        }

        echo json_encode($response);
    }

    function delete($id) {
        $response = [
            'status' => FALSE,
            'msg' => "Data gagal dihapus"
        ];

        if($this->Model_barang->delete($id)) {
            $response = [
                'status' => TRUE,
                'msg' => "Data berhasil dihapus"
            ];
        }

        echo json_encode($response);
    }
}