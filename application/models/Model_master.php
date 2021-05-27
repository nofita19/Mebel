<?php

class Model_master extends CI_Model {
    public function index($tabel)
      {
        return $query = $this->db->query("SELECT * FROM $tabel ")->result_array();
      }
    public function getData($tb)
      {
        return $query = $this->db->query("SELECT * FROM $tb")->result_array();
      }
      public function getDetailData($tb , $column , $id){
        return $query = $this->db->query("SELECT * FROM $tb  WHERE $column = '$id' GROUP BY $column")->result_array();
      }
    public function GetWhere($table, $data)
      {
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
      }
    public function insert($tabel, $arr)
      {
          $cek = $this->db->insert($tabel, $arr);
          return $cek;
      }
    public function Delete($table, $where)
      {
      $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
      return $res;
      }
    public function Update($table, $data, $where)
      {
      $res = $this->db->update($table, $data, $where); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
      return $res;
      }
}