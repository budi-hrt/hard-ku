<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();


    $this->load->model('produk_model', 'produk');
  }
  public function index()
  {
    is_logged_in();
    $data['mn'] = 'Master';
    $data['title'] = 'Produk';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['produk'] = $this->produk->get_all()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('page/master/produk/index', $data);
  }


  public function simpan()
  {
    $kode = $this->input->post('kode');
    $nama = $this->input->post('nama');
    $alias = $this->input->post('alias');
    $banding = $this->input->post('banding');
    $harga = $this->input->post('harga');
    $cek = $this->db->get_where('produk', ['kode' => $kode]);
    if ($cek->num_rows() > 0) {
      $this->session->set_flashdata('message', 'kode');
      redirect('master/produk');
    } else {
      $this->produk->simpan($kode, $nama, $alias, $banding, $harga);
      $this->session->set_flashdata('message', 'simpan');
      redirect('master/produk');
    }
  }
  public function ubah()
  {
    $this->produk->ubah();
    $this->session->set_flashdata('message', 'ubah');
    redirect('master/produk');
  }

  public function hapus()
  {
    $this->produk->hapus();
    $this->session->set_flashdata('message', 'hapus');
    redirect('master/produk');
  }


  public function update_harga()
  {
    $this->load->model('m_security');
    $this->m_security->getsecurity();
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['produk'] = $this->produk->get_transaksi()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar', $data);
    $this->load->view('update_harga', $data);
  }

  public function ubah_harga()
  {
    $id = $_POST['id_tr'];
    $harga = $_POST['harga'];

    $data = array();
    $index = 0; // Set index array awal dengan 0
    foreach ($id as $k) { // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id' => $k,
        'harga_produk' => $harga[$index]  // Ambil dan set data telepon sesuai index array dari $index
      ));

      $index++;
    }
    $this->db->update_batch('transaksi', $data, 'id');
  }


  public function getAutoComplete()
  {
    if (isset($_GET['term'])) {
      $result = $this->produk->cari_produk($_GET['term']);
      if (count($result) > 0) {
        foreach ($result as $row)
          $arr_result[] = array(
            'label' => $row->nama_produk,
            'description'    => $row->kode,
          );
        echo json_encode($arr_result);
      }
    }
  }
  public function get()
  {
    $msg['success'] = false;
    $kode = $this->input->get('kodeProduk');
    $nomorStok = $this->input->get('nomor');
    $cek = $this->db->get_where('transaksi', ['nomor_stok' => $nomorStok, 'kode_produk' => $kode]);
    if ($cek->num_rows() > 0) {
      $result['type'] = 'err';
      echo json_encode($result);
    } else {
      $result = $this->produk->get();
      if ($result) {
        echo json_encode($result);
      }
    }
  }
}
