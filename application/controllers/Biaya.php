<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biaya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('biaya_model', 'biaya');
    }


    public function index()
    {
        $data['mn'] = 'Biaya';
        $data['title'] = 'Input Biaya';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nomor'] = $this->biaya->nomor_by();
        // $data['nomor'] = $this->biaya->nomor_biaya();
        $this->session->set_userdata(['nomorBiaya' => 'BY2007003']);
        $data['bbm'] = $this->db->get('tb_bbm')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('page/Biaya/index', $data);
    }


    public function nomor()
    {
        $data['nomor'] = $this->biaya->nomor_biaya();
        echo json_encode($data);
    }


    // Autocomplete Nomor Stok
    public function getNomorStok()
    {
        if (isset($_GET['term'])) {
            $result = $this->biaya->cari_nomorStok($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nomor_transaksi,
                        'description'    => $row->id,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function get()
    {
        $nomor = $this->input->get('nomorBiaya');
        $cek = $this->db->get_where('biaya_kanvas', ['nomor_biaya' => $nomor, 'status' => 'Pending']);
        if ($cek->num_rows() > 0) {
            $result = $this->biaya->getBiaya($nomor);
            // $result['type'] = 'ok';
            echo json_encode($result);
        } else {
            $result['type'] = 'error';
            echo json_encode($result);
        }
    }





    public function getKmAwal()
    {
        $id = $this->input->get('id');
        $result = $this->biaya->cariKmAwal($id);
        if ($result) {
            echo json_encode($result);
        }
    }

    public function updateBiaya1()
    {
        $this->biaya->updateBiaya1();
    }
    public function updateBiaya2()
    {
        $this->biaya->updateBiaya2();
    }
    public function updateBiaya3()
    {
        $this->biaya->updateBiaya3();
    }
    public function updateBiaya4()
    {
        $this->biaya->updateBiaya4();
    }
    public function updateBiaya5()
    {
        $this->biaya->updateBiaya5();
    }




    // Bbm
    public function tampildetilbbm()
    {
        $nomor = $this->input->get('nomorBiaya');
        $this->db->select('d.id as id_detil,d.tanggal_isi,d.km_isi,d.id_bbm,d.harga_bbm,d.jumlah_liter,b.nama_bbm');
        $this->db->from('detil_bbm d');
        $this->db->join('tb_bbm b', 'b.id=d.id_bbm', 'left');
        $this->db->where('d.nomor_by', $nomor);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            $dt['data'] = $data->result_array();
            $this->load->view('page/biaya/detilBiayaBbm', $dt);
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

    public function simpanBbm()
    {
        $this->biaya->simpanBbm();
    }
    public function ubahBbm()
    {
        $this->biaya->ubahBbm();
    }


    public function getDetilBbm()
    {
        $id = $this->input->get('id');
        $row = $this->db->get_where('detil_bbm', ['id' => $id])->row_array();
        echo json_encode($row);
    }
    public function hapusDetilBbm()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('detil_bbm');
    }
    // Akhir Bbm
    // ==================================================== //



    // Hotel
    public function tampildetilHotel()
    {
        $nomor = $this->input->get('nomorBiaya');
        $this->db->select('*');
        $this->db->from('detil_hotel');
        $this->db->where('nomor_biaya', $nomor);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            $dt['data'] = $data->result_array();
            $this->load->view('page/biaya/detilBiayaHotel', $dt);
            // $item = count($data->result_array());
            // echo '<input type="hidden" name="itemHidden" value="' . $item . '">';
        } else {
            echo '
                <tr>
                <td colspan="4" rowspan="3" class="text-center"> Belum Ada Biaya Penginapan</td>
                </tr>
                ';
        }
    }

    public function simpanHotel()
    {
        $this->biaya->simpanHotel();
    }

    public function getDetilHotel()
    {
        $id = $this->input->get('id');
        $row = $this->db->get_where('detil_hotel', ['id' => $id])->row_array();
        echo json_encode($row);
    }

    public function ubahBiayaHotel()
    {
        $this->biaya->ubahBiayaHotel();
    }
    public function hapusDetilHotel()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('detil_hotel');
    }
    // 

    // Akhir Hotel
}
