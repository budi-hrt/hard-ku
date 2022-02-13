<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_model extends CI_model
{

    public function get_all()
    {
        $this->db->select('k.id as id_kd, k.no_polisi,k.masa_stnk,k.masa_keur,k.banding,t.id as id_tp,t.nama_type');
        $this->db->from('tb_kendaraan k');
        $this->db->join('tb_type_kendaraan t', 't.id=id_type', 'left');
        $this->db->where('k.is_active', 1);
        $query =  $this->db->get();
        return $query;
    }


    function cari_kendaraan($plat)
    {
        $this->db->or_like('no_polisi', $plat, 'both');
        $this->db->order_by('id', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_kendaraan')->result();
    }
}
