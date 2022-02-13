<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function index()
    {
        $this->load->view('page/auth/login/index');
    }


    function getlogin()
    {
        $u = $_POST['username'];
        $p = $_POST['pwd'];
        $this->load->model('m_login');
        $this->m_login->get_login($u, $p);
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }


    public function blocked()
    {
        $data['mn'] = 'Dashboard';
        $data['title'] = 'Blocked';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('page/auth/blocked', $data);
    }
}

