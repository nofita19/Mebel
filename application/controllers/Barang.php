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
    
    public function tampil() {
        $this->load->model("Datatables");
        $this->Datatables->setTable("barang");
        $this->Datatables->setColumn([
            '<index>',
            '<get-barang_nama>',
            '[rupiah=<get-harga_tunai>]',
            '<div class="text-center">
            <button type="button" class="btn btn-primary btn-sm btn-edit" data-id="<get-barang_kode>" data-name="<get-barang_nama>" data-price="<get-harga_tunai>"><i class="fa fa-edit"></i></button>
            <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="<get-barang_kode>" data-name="<get-barang_nama>"><i class="fa fa-trash"></i></button></div>'
        ]);
        // $this->datatables->setOrdering(["barang_kode","barang_nama","harga_tunai",Null]);
        // $this->datatables->setWhere("type_barang");
        $this->Datatables->setSearchField("barang_kode");
        $this->Datatables->generate();
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