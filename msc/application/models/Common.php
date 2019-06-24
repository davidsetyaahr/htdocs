<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Model {

    public function insert($tb,$values)
    {
        $this->db->insert($tb,$values);
    }

    public function update($tb,$values,$filter)
    {
        $this->db->update($tb,$values,$filter);
    }

    public function delete($tb,$filter)
    {
        $this->db->delete($tb,$filter);
    }

    public function getData($select,$tb,$join,$filter,$order)
    {
        $sql = $this->db->select($select);

        if($join!="") {
            for($i=0;$i<count($join);$i++){
                if($i%2!=0){
                    $sql = $this->db->join($join[$i-1],$join[$i]);
                }
            }
        }

        if($order!=""){
            $sql = $this->db->order_by($order[0],$order[1]);
        }
        if($filter!=""){
            $sql = $this->db->where($filter);
        }

        if(is_array($tb)){
            if(count($tb)==2){
                $sql = $this->db->get($tb[0],$tb[1]);
            }
            else{
                $sql = $this->db->get($tb[0],$tb[1],$tb[2]);
            }
        }
        else{
            $sql = $this->db->get($tb);
        }


        return $sql->result_array();
    }

    public function gaji(){
        $sql = $this->db->select("tentor.nama_tentor,pembayaran_gaji.*");
        $sql = $this->db->from("pembayaran_gaji");
        $sql = $this->db->join("tentor","pembayaran_gaji.kode_tentor = tentor.kode_tentor");
        return $this->db->get()->result_array();
    }

}
