<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('stok_model', 'stok');
  }
  public function index()
  {

    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['sales'] = $this->stok->data_sales()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('stok_akhir', $data);
  }

  public function pdfPenjualanKanvas($nomorAwal)
  {

    $this->db->select('t.id as id_detil,t.awal,t.akhir,t.kode_produk,p.nama_produk,p.banding,t.harga_produk');
    $this->db->from('transaksi t');
    $this->db->join('produk p', 'p.kode=t.kode_produk', 'left');
    $this->db->where('t.nomor_stok', $nomorAwal);
    $data = $this->db->get();

    if ($data->num_rows() > 0) {
      $dt['nomor'] = $this->stok->getTbPenjualan($nomorAwal)->row_array();
      $dt['data'] = $data->result_array();
      $this->load->view('page/laporan/pdf/kanvas', $dt);
    } else {
      $this->load->view('pdf/erorr_pdf');
    }
  }

  public function updatePenjualan()
  {
    $this->stok->updatePenjualan();
  }
}
