<?php

class Model_barang extends CI_Model {
    function post($data) {
        $this->db->insert("barang",$data);
    }

    function delete($id) {
        $this->db->delete("barang",['barang_kode' => $id]);
        return $this->db->affected_rows();
    }

    function put($id,$data) {
        $this->db->where("barang_kode",$id);
        $this->db->update("barang",$data);
    }
}