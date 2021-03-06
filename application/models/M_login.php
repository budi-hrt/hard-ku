<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_model
{


    public function get_login($u, $p)
    {
        $pwd = md5($p);
        $this->db->join('user_role r', 'u.role_id=r.id', 'left');
        $this->db->where('u.username', $u);
        $this->db->where('u.password', $pwd);
        $query = $this->db->get('user u');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $sess  = array(
                    'id_user' => $row->id_user,
                    'nama_user' => $row->nama_user,
                    'username' => $row->username,
                    'password' => $row->password,
                    'role_id' => $row->role_id,
                    'photo' => $row->photo

                );
                $this->session->set_userdata($sess);
                if ($this->session->userdata('role') == 'admin') {
                    # code...
                } else {
                    redirect('home');
                }
            }
        } else {
            $this->session->set_flashdata('info', 'maaf username atau password salah');
            redirect('auth');
        }
    }
}
