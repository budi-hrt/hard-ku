<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Korawal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('stok_model', 'stok');
    }
    public function index()
    {
        $data['mn'] = 'Transaksi';
        $data['title'] = 'Koreksi Stok Awal';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->stok->get_all()->result_array();
        // $data['sales'] = $this->db->get_where('sales',['is_active'=>1]);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('page/transaksi/koreksi-awal', $data);
    }

    public function getnomor()
    {

        $nomorAwal = $this->input->get('nomor');
        $query = $this->db->get_where('penjualan', ['nomor_transaksi' => $nomorAwal]);
        if ($query->num_rows() > 0) {
            $result = $this->stok->getTbPenjualan($nomorAwal)->row_array();
            echo json_encode($result);
        } else {
            $result['type'] = 'err';
            echo json_encode($result);
        }
    }



    public function formKoreksi($nomorAwal)
    {
        $data['mn'] = 'Transaksi';
        $data['title'] = 'Ubah Stok Awal';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['data'] = $this->stok->getTbPenjualan($nomorAwal)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('page/transaksi/ubahStokAwal', $data);
    }
}
