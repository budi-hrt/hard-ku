<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StokAwal extends CI_Controller
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
        $data['title'] = 'Stok Awal';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['produk'] = $this->stok->get_all()->result_array();
        // $data['sales'] = $this->db->get_where('sales',['is_active'=>1]);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('page/transaksi/stokAwal', $data);
    }

    public function nomor()
    {
        $data['nomor'] = $this->stok->nomor();
        echo json_encode($data);
    }


    public function simpanDetil()
    {

        $msg['success'] = false;
        $result = $this->stok->simpanDetil();
        if ($result) {
            $msg['success'] = true;
            $msg['type'] = 'ok';
            echo json_encode($msg);
        } else {
            $msg['success'] = true;
            $msg['type'] = 'err';
            echo json_encode($msg);
        }
    }



    public function tampil_stok()
    {
        $nomor = $this->input->get('nomor');
        $this->db->select('t.id as id_detil,t.awal,t.akhir,t.kode_produk,p.nama_produk,p.banding,t.harga_produk,t.retur');
        $this->db->from('transaksi t');
        $this->db->join('produk p', 'p.kode=t.kode_produk', 'left');
        $this->db->where('t.nomor_stok', $nomor);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            $dt['data'] = $data->result_array();
            $this->load->view('page/transaksi/detilStokAwal', $dt);
            $item = count($data->result_array());
            echo '<input type="hidden" name="itemHidden" value="' . $item . '">';
        } else {
            echo '
                <tr>
                <input type="hidden" name="itemHidden" >
                <td colspan="6" rowspan="3" class="text-center"> Belum Ada Stok</td>
                
                </tr>


                ';
        }
    }

    public function editHarga()
    {
        $this->stok->editHarga();
    }
    public function editDus()
    {
        $this->stok->editDus();
    }

    public function editBks()
    {
        $this->stok->editBks();
    }

    public function updateDetil()
    {

        $idDetil = $_POST['idDetil'];
        $idSales = $_POST['idSales'];
        $data = array();
        $index = 0; // Set index array awal dengan 0
        foreach ($idDetil as $id) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'id' => $id,
                'id_sales' => $idSales,  // Ambil dan set data nama sesuai index array dari $index

            ));

            $index++;
        }
        $this->db->update_batch('transaksi', $data, 'id');
    }


    public function hapusItemDetil()
    {
        $this->stok->hapusItemDetil();
    }

    public function simpanAwal()
    {
        $this->stok->simpanAwal();
    }




    public function ubahAwal()
    {
        $this->stok->ubahAwal();
    }



    public function getFormUbah($nomorAwal)
    {
        $cek = $this->db->get_where('penjualan', ['nomor_transaksi' => $nomorAwal, 'status_penjualan !=' => 'Pending']);
        if ($cek->num_rows() > 0) {
            redirect('listen/Awal');
        } else {
            $data['mn'] = 'Transaksi';
            $data['title'] = 'Ubah Stok Awal';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['data'] = $this->stok->getTbPenjualan($nomorAwal)->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('page/transaksi/ubahStokAwal', $data);
        }
    }
}
