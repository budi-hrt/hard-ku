<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bbm_model extends CI_model
{

    function cari_area($bbm)
    {
        $this->db->like('nama_bbm', $bbm, 'both');
        $this->db->order_by('id', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_bbm')->result();
    }
}
