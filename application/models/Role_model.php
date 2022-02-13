<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_model
{

  public function tambah()
  {
    $field = array(
      'role' => $this->input->post('role')
    );
    $this->db->insert('user_role', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function ubah()
  {
    $id = $this->input->post('id');
    $field = array(
      'role' => $this->input->post('role')
    );
    $this->db->where('id', $id);
    $this->db->update('user_role', $field);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function hapus()
  {
    $id = $this->input->get('id');
    $this->db->where('id', $id);
    $query = $this->db->delete('user_role');
    return $query;
  }
}
