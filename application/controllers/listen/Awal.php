<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Awal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('stok_model', 'stok');
    }
    public function index()
    {
        $data['mn'] = 'Listen';
        $data['title'] = 'List Stok Awal';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['awl'] = $this->stok->get_stokAwal()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('page/listen/listStokAwal', $data);
    }


    public function hapusStokAwal()
    {
        $this->stok->hapusStokAwal();
    }
    public function hapusDetilAwal()
    {
        $this->stok->hapusDetilAwal();
    }



    public function get_stok()
    {
        $msg['success'] = false;
        $id_sales = $this->input->get('id');
        $status = 'Pending';
        $cek = $this->db->get_where('transaksi', ['id_sales' => $id_sales, 'status' => $status]);
        if ($cek->num_rows() < 1) {
            $msg['success'] = true;
            $msg['type'] = 'kosong';
            echo json_encode($msg);
        } else {
            $msg['success'] = true;
            $msg['type'] = 'ada';
            echo json_encode($msg);
        }
    }




    public function tampil_stok()
    {
        $nomor = $this->input->get('nomor');
        $this->db->select('t.id as id_detil,t.awal,t.akhir,t.kode_produk,p.nama_produk,p.banding');
        $this->db->from('transaksi t');
        $this->db->join('produk p', 'p.kode=t.kode_produk', 'left');
        $this->db->where('t.nomor_stok', $nomor);
        $data = $this->db->get();
        $no = 1;
        $dos = 0;
        $bks = 0;
        $res = 0;
        $banding = 0;
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $t) {
                $banding = $t['banding'];
                if ($t['awal'] >= $banding) {
                    $dos = floor($t['awal'] / $banding);
                    $res = $banding * $dos;
                    $bks = $t['awal'] - $res;
                } else {
                    $dos = 0;
                    $bks = $t['awal'];
                }
                echo '
                <tr>
                <td>' . $no++ . '</td>
                <td>' . $t['kode_produk'] . '</td>
                <td>' . $t['nama_produk'] . '</td>
                <td class=" text-center text-primary"><b>' . $dos . '</b></td>
                <td class=" text-center text-primary"><b>' . $bks . '</b></td>
                <td class="text-center"><a href="javascript:;" class="item-edit text-success" data-id="' . $t['id_detil'] . '" data-banding="' . $t['banding'] . '"  data-dos="' . $dos . '" data-bks="' . $bks . '"><i class="fas fa-edit"></i></a></td>
                </tr>
                
                
                ';
            }
            echo '<input type="hidden" name="item" value="1">';
        } else {
            echo '
                <tr>
                <input type="hidden" name="item" >
                <td colspan="6" rowspan="3" class="text-center"> Belum Ada Stok</td>
                
                </tr>


                ';
        }
    }


    public function update_awal()
    {
        $this->stok->update_awal();
    }



    public function ubah($nomor)
    {
        $this->load->model('m_security');
        $this->m_security->getsecurity();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nomor'] = $this->stok->get_penjualan($nomor)->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('ubah_awal', $data);
    }

    public function getStok()
    {
        $nomorAwal = $this->input->get('nomor');
        $cek = $this->db->get('penjualan', ['nomor_transaksi' => $nomorAwal]);
        if ($cek->num_rows() > 0) {
            $result = $this->stok->getTbPenjualan($nomorAwal)->row_array();
            if ($result) {
                echo json_encode($result);
            }
        } else {
            $result['type'] = 'error';
            echo json_encode($result);
        }
    }
}
