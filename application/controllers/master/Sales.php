<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // is_logged_in();

    $this->load->model('sales_model', 'sales');
  }
  public function index()
  {
    is_logged_in();
    $data['mn'] = 'Master';
    $data['title'] = 'Sales';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['sales'] = $this->sales->get_all()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('page/master/sales/index', $data);
  }



  public function getAutocomplete()
  {
    if (isset($_GET['term'])) {
      $result = $this->sales->cari_sales($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row)
          $arr_result[] = array(
            'label' => $row->nama_sales,
            'description'    => $row->id,
            'value' => $row->nama_sales
          );
        echo json_encode($arr_result);
      }
    }
  }

  public function getStokAwal()
  {
    $id = $this->input->get('idSales');
    $nomorStok = $this->input->get('nomor');
    $cek = $this->db->get_where('penjualan', ['id_sales' => $id, 'status_penjualan' => 'Pending']);
    if ($cek->num_rows() > 0) {
      $result = 'err';
      echo json_encode($result);
    } else {
      $result = $this->sales->get();
      if ($result) {
        echo json_encode($result);
      }
    }
  }
  public function simpan()
  {
    $kode = $this->input->post('kode');
    $nama = $this->input->post('nama');
    $cek = $this->db->get_where('sales', ['kode_sales' => $kode]);
    if ($cek->num_rows() > 0) {
      $this->session->set_flashdata('message', 'kode');
      redirect('master/sales');
    } else {
      $this->sales->simpan($kode, $nama);
      $this->session->set_flashdata('message', 'simpan');
      redirect('master/sales');
    }
  }

  public function ubah()
  {
    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    $this->sales->ubah($id, $nama);
    $this->session->set_flashdata('message', 'ubah');
    redirect('master/sales');
  }

  public function hapus()
  {
    $id = $this->input->get('id');
    $this->sales->hapus($id);
  }
}
