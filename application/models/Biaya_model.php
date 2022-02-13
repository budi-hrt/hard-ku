<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biaya_model extends CI_model
{

    function nomor_biaya()
    {
        $thn = date('y');
        $bln = date('m');
        date_default_timezone_set('Asia/Jakarta');
        $thnBln = date('ym');
        $this->db->select('LEFT(biaya_kanvas.nomor_biaya,6) as nomor', FALSE);
        $this->db->order_by('nomor', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('biaya_kanvas');  //cek dulu apakah ada sudah ada kode di tabel.  
        if ($query->num_rows() <> 0) {    //cek kode jika telah tersedia   
            $data = $query->row();
            if ($data->nomor == "BY" . $thnBln) { // cek jika tahun dan bulan sama dengan tahun dan bulan sekarang
                $this->db->select('RIGHT(biaya_kanvas.nomor_biaya,3) as nomor_by ', FALSE);
                $this->db->where('LEFT(biaya_kanvas.nomor_biaya,6)', "BY" . $thnBln);
                $this->db->order_by('nomor_by', 'DESC');
                $this->db->limit(1);
                $query_nomor = $this->db->get('biaya_kanvas');
                $data_nomor = $query_nomor->row();
                $kode = intval($data_nomor->nomor_by) + 1;
            } else {

                $kode = "001";
            }
        } else {
            $kode = "001";  //cek jika kode belum terdapat pada table
        }

        $car = "BY";
        $kode_right = str_pad($kode, 3, "0", STR_PAD_LEFT);
        date_default_timezone_set('Asia/Jakarta');
        return $car . date('ym') . $kode_right;
        // return $thnBln;
    }


    public function nomor_by()
    {
        $this->db->select('nomor_biaya');
        $this->db->where('status', 'Pending');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('biaya_kanvas');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getBiaya($nomor)
    {
        $this->db->select('b.id as id_biaya,b.nomor_stok,b.id_kendaraan,b.id_area,b.id_driver,b.id_sales,b.km_awal,b.km_akhir,k.no_polisi,a.nama_area,s.nama_sales,d.nama_sales as nama_driver');
        $this->db->from('biaya_kanvas b');
        $this->db->join('tb_kendaraan k', 'k.id=b.id_kendaraan', 'left');
        $this->db->join('area a', 'a.id=b.id_area', 'left');
        $this->db->join('sales d', 'd.id=b.id_driver', 'left');
        $this->db->join('sales s', 's.id=b.id_sales', 'left');
        $this->db->where('b.nomor_biaya', $nomor);
        $query = $this->db->get()->row_array();
        return $query;
    }


    function cari_nomorStok($nomor)
    {
        $this->db->or_like('nomor_transaksi', $nomor, 'both');
        $this->db->order_by('id', 'ASC');
        $this->db->limit(10);
        return $this->db->get('penjualan')->result();
    }



    public function cariKmAwal($id)
    {
        $this->db->where('id_kendaraan', $id);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('biaya_kanvas');
        return $query->row();
    }


    public function updatebiaya1()
    {
        $nomorBiaya = $this->input->post('nomor_biaya');
        $nomorStok = $this->input->post('nomor_stok');
        $id_area = $this->input->post('id_area');
        $id_sales = $this->input->post('id_sales');
        $data = array(
            'nomor_stok' => $nomorStok,
            'id_area' => $id_area,
            'id_sales' => $id_sales
        );
        $this->db->where('nomor_biaya', $nomorBiaya);
        $this->db->update('biaya_kanvas', $data);
    }


    public function updatebiaya2()
    {
        $nomorBiaya = $this->input->post('nomor_biaya');
        $id_kendaraan = $this->input->post('idKendaraan');
        $kmAkhir = $this->input->post('kmAkhir');
        $data = array(
            'id_kendaraan' => $id_kendaraan,
            'km_awal' => $kmAkhir
        );
        $this->db->where('nomor_biaya', $nomorBiaya);
        $this->db->update('biaya_kanvas', $data);
    }
    public function updatebiaya3()
    {
        $nomorBiaya = $this->input->post('nomor_biaya');
        $id_area = $this->input->post('id_area');
        $data = array(
            'id_area' => $id_area
        );
        $this->db->where('nomor_biaya', $nomorBiaya);
        $this->db->update('biaya_kanvas', $data);
    }
    public function updatebiaya4()
    {
        $nomorBiaya = $this->input->post('nomor_biaya');
        $id_driver = $this->input->post('id_driver');
        $data = array(
            'id_driver' => $id_driver
        );
        $this->db->where('nomor_biaya', $nomorBiaya);
        $this->db->update('biaya_kanvas', $data);
    }


    public function updatebiaya5()
    {
        $nomorBiaya = $this->input->post('nomor_biaya');
        $id_sales = $this->input->post('id_sales');
        $data = array(
            'id_sales' => $id_sales
        );
        $this->db->where('nomor_biaya', $nomorBiaya);
        $this->db->update('biaya_kanvas', $data);
    }



    public function simpanBbm()
    {
        $nomorBiaya = $this->input->post('nomorBiaya');
        $tglIsi = date('Y-m-d', strtotime($this->input->post('tglIsi')));
        $idBbm = $this->input->post('idBbm');
        $liter = $this->input->post('liter');
        $hargaBbm = $this->input->post('hargaBbm');
        $ttlHrgBbm = str_replace('.', '', $this->input->post('ttlHrgBbm'));
        $id_user = $this->input->post('id_user');
        $data = array(
            'nomor_by' => $nomorBiaya,
            'tanggal_isi' => $tglIsi,
            'km_isi' => 0,
            'id_bbm' => $idBbm,
            'harga_bbm' => $hargaBbm,
            'jumlah_liter' => $liter,
            'total_hargabbm' => $ttlHrgBbm,
            'id_user' => $id_user
        );
        $this->db->insert('detil_bbm', $data);
    }
    public function ubahBbm()
    {
        $id = $this->input->post('idDetilBbm');
        $tglIsi = date('Y-m-d', strtotime($this->input->post('tglIsi')));
        $idBbm = $this->input->post('idBbm');
        $liter = $this->input->post('liter');
        $hargaBbm = $this->input->post('hargaBbm');
        $ttlHrgBbm = str_replace('.', '', $this->input->post('ttlHrgBbm'));
        $id_user = $this->input->post('id_user');
        $data = array(
            'tanggal_isi' => $tglIsi,
            'km_isi' => 0,
            'id_bbm' => $idBbm,
            'harga_bbm' => $hargaBbm,
            'jumlah_liter' => $liter,
            'total_hargabbm' => $ttlHrgBbm,
            'id_user' => $id_user
        );
        $this->db->where('id', $id);
        $this->db->update('detil_bbm', $data);
    }

    // End Bbm =============================== //


    //  Hotel ============== //


    public function simpanHotel()
    {
        $nomorBiaya = $this->input->post('nomorBiaya');
        $hari = $this->input->post('hari');
        $hargaHotel = $this->input->post('hargaHotel');
        $ttlHrgHotel = str_replace('.', '', $this->input->post('ttlHrgHotel'));
        $id_user = $this->input->post('id_user');
        $data = array(
            'nomor_biaya' => $nomorBiaya,
            'jumlah_hari' => $hari,
            'harga_hotel' => $hargaHotel,
            'total_biaya_hotel' => $ttlHrgHotel,
            'id_user' => $id_user
        );
        $this->db->insert('detil_hotel', $data);
    }

    public function ubahBiayaHotel()
    {
        $id = $this->input->post('idDetilHotel');
        $hari = $this->input->post('hari');
        $hargaHotel = $this->input->post('hargaHotel');
        $ttlHrgHotel = str_replace('.', '', $this->input->post('ttlHrgHotel'));
        $id_user = $this->input->post('id_user');
        $data = array(
            'jumlah_hari' => $hari,
            'harga_hotel' => $hargaHotel,
            'total_biaya_hotel' => $ttlHrgHotel,
            'id_user' => $id_user
        );
        $this->db->where('id', $id);
        $this->db->update('detil_hotel', $data);
    }
}
