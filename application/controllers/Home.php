<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{




    public function index()
    {
        $data['mn'] = 'Home';
        $data['title'] = 'Home';
        $this->load->model('m_security');
        $this->m_security->getsecurity();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['sales'] = $this->db->get_where('sales', ['is_active' => 1])->num_rows();
        $data['produk'] = $this->db->get_where('produk', ['is_active' => 1])->num_rows();
        $data['penjualan'] = $this->db->get_where('penjualan', ['status_penjualan !=' => 'Pending'])->num_rows();
        $data['pending'] = $this->db->get_where('penjualan', ['status_penjualan' => 'Pending'])->num_rows();
        $data['admin'] = $this->db->get_where('user', ['is_active' => 1])->num_rows();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('page/home/index');
    }

    public function penjualan()
    {
        $this->load->model('m_security');
        $this->m_security->getsecurity();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('sales/header', $data);
        $this->load->view('sales/sidebar');
        $this->load->view('sales/topbar', $data);
        $this->load->view('sales/penjualan');
    }
}
