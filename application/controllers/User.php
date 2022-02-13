<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{




    public function index()
    {
        $data['mn'] = 'User';
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('page/user/index');
    }
}
