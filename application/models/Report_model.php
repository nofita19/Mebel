<?php
class Report_model extends CI_Model {
    function get($start = 0,$end = 0) {
        $this->db->select("transaksi_pembelian.* ");
        $this->db->where("transaksi_pembelian.jenis_barang");

        if($start AND $end) {
            $this->db->where("DATE(date) >=",$start);
            $this->db->where("DATE(date) <=",$end);
        } else {
            $this->db->where("MONTH(date)",date("m"));
            $this->db->where("YEAR(date)",date("Y"));
        }

        $this->db->group_by("id_pembelian");

        return $this->db->get("transaksi_pembelian");
    }
    
    function get_purchase($start = 0,$end = 0) {
        $this->db->select("purchase.*,SUM(purchase_transaksi_pembelian.qty) as items,suppliers.name");
        $this->db->join("purchase","purchase.id=purchase_transaksi_pembelian.purchase_id","left");
        $this->db->join("suppliers","suppliers.id=purchase.supplier_id","left");

        if($start AND $end) {
            $this->db->where("DATE(date) >=",$start);
            $this->db->where("DATE(date) <=",$end);
        } else {
            $this->db->where("MONTH(date)",date("m"));
            $this->db->where("YEAR(date)",date("Y"));
        }

        $this->db->group_by("purchase_id");

        return $this->db->get("purchase_transaksi_pembelian");
    }

    function get_today_income() {
        $date = date("Y-m-d");

        $this->db->select("SUM(total) as income,DATE(date)");
        $this->db->group_by("date");
        $income = $this->db->get_where("transactions",["DATE(date)" => $date])->row();
        if($income) {
            return $income->income;
        } else {
            return 0;
        }
    }

    function get_today_transaction($type = "sparepart") {
        $date = date("Y-m-d");

        $this->db->select("SUM(qty) as count,DATE(date) as date,barang.type");
        $this->db->join("barang","barang.id=transaksi_pembelian.product_id","left");
        $this->db->join("transactions","transactions.id=transaksi_pembelian.transaction_id","left");
        $this->db->group_by("date");
        $count = $this->db->get_where("transaksi_pembelian",["DATE(date)" => $date,"barang.type" => $type])->row();
        if($count) {
            return $count->count;
        } else {
            return 0;
        }
    }

    function get_sold_out() {
        return $this->db->get_where("barang",["stock" => 0,"type" => "sparepart"])->num_rows();
    }

    function get_graph($month,$type = "sparepart") {

        $count = count($month) - 1;
        $start_month = $month[0];
        $end_month = $month[$count];

        if($start_month > $end_month) {
            $date = (date("Y") - 1)."-".$start_month."-01 00:00:00";
        } else {
            $date = date("Y")."-".$start_month."-01 00:00:00";
        }

        $this->db->select("SUM(transaksi_pembelian.qty * transaksi_pembelian.price) as total,MONTH(date) as date,barang.type");
        $this->db->join("barang","barang.id=transaksi_pembelian.product_id","left");
        $this->db->join("transactions","transactions.id=transaksi_pembelian.transaction_id","left");
        $this->db->group_by("MONTH(date)");
        $this->db->where("barang.type",$type);
        $this->db->where("transactions.date >=",$date);
        $this->db->where_in("MONTH(date)",$month);

        return $this->db->get("transaksi_pembelian");
        
    }
}