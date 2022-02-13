<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Area_model extends CI_model
{

    function cari_area($area)
    {
        $this->db->like('nama_area', $area, 'both');
        $this->db->order_by('id', 'ASC');
        $this->db->limit(10);
        return $this->db->get('area')->result();
    }
}
