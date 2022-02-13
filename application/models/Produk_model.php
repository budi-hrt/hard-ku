<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_model
{

  public function get_all()
  {
    $this->db->where('is_active', 1);
    $query =  $this->db->get('produk');
    return $query;
  }

  public function get_transaksi()
  {
    $this->db->select('t.id as id_tr,t.kode_produk,t.harga_produk,p.nama_produk,p.harga');
    $this->db->from('transaksi t');
    $this->db->join('produk p', 'p.kode=t.kode_produk', 'left');
    $this->db->order_by('t.id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  function cari_produk($produk)
  {
    $this->db->or_like('nama_produk', $produk, 'both');
    $this->db->or_like('kode', $produk, 'both');
    $this->db->order_by('nama_produk', 'ASC');
    $this->db->limit(10);
    return $this->db->get('produk')->result();
  }


  public function get()
  {
    $kode = $this->input->get('kodeProduk');
    $this->db->where('kode', $kode);
    $query = $this->db->get('produk');
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function simpan($kode, $nama, $alias, $banding, $harga)
  {
    $data = array(
      'kode' => $kode,
      'nama_produk' => $nama,
      'alias' => $alias,
      'banding' => $banding,
      'harga' => $harga,
      'is_active' => 1
    );
    $this->db->insert('produk', $data);
  }

  public function ubah()
  {
    $id = $this->input->post('id');
    $data = array(
      'nama_produk' => $this->input->post('nama'),
      'alias' => $this->input->post('alias'),
      'banding' => $this->input->post('banding'),
      'harga' => $this->input->post('harga')
    );
    $this->db->where('id', $id);
    $this->db->update('produk', $data);
  }

  public function hapus()
  {
    $id = $this->input->get('id');
    $data = array('is_active' => 2);
    $this->db->where('id', $id);
    $this->db->update('produk', $data);
  }
}
