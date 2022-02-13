<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{

    public function get_usr()
    {
        $this->db->select('u.id_user as u_id,u.nama_user,u.username,r.role');
        $this->db->from('user u');
        $this->db->join('user_role r', 'r.id=u.role_id', 'left');
        $query = $this->db->get();
        return $query;
    }
}
