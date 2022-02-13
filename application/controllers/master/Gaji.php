<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gaji extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // is_logged_in();

    $this->load->model(array(
      'Gaji_model' => 'gaji',
      'Karyawan_model' => 'karyawan'
    ));
  }
  public function index()
  {
    is_logged_in();
    $data['mn'] = 'Master';
    $data['title'] = 'Gaji';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['gaji'] = $this->gaji->get_all()->result_array();
    $data['karyawan'] = $this->karyawan->get_all()->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('page/master/gaji/index', $data);
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




  public function simpan()
  {
    $idKry = $this->input->post('nama');
    $gp = $this->input->post('gaji_pokok');
    $tj = $this->input->post('tunjangan');
    $um = $this->input->post('um');
    $cek = $this->db->get_where('tb_gaji', ['id_kry' => $idKry]);
    if ($cek->num_rows() > 0) {
      $this->session->set_flashdata('message', 'kode');
      redirect('master/gaji');
    } else {
      $this->gaji->simpan($idKry, $gp, $tj, $um);
      $this->session->set_flashdata('message', 'simpan');
      redirect('master/gaji');
    }
  }

  public function ubah()
  {
    $id = $this->input->post('id');
    $idKry = $this->input->post('idKry');
    $gp = $this->input->post('gaji_pokok');
    $tj = $this->input->post('tunjangan');
    $um = $this->input->post('um');
    $this->gaji->ubah($id, $idKry, $gp, $tj, $um);
    $this->session->set_flashdata('message', 'ubah');
    redirect('master/gaji');
  }

  public function hapus()
  {
    $id = $this->input->get('id');
    $this->sales->hapus($id);
  }
}
