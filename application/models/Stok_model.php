<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_model extends CI_model
{

    public function get_all()
    {
        $this->db->where('is_active', 1);
        $query =  $this->db->get('produk');
        return $query;
    }



    public function get_stokAwal()
    {
        $this->db->select('p.id as id_pj, p.tanggal,p.nomor_transaksi,p.jumlah,s.nama_sales');
        $this->db->from('penjualan p');
        $this->db->join('sales s', 's.id=p.id_sales', 'dsc');
        $this->db->order_by('p.id', 'asc');
        $this->db->where('status_penjualan', 'Pending');
        $query =  $this->db->get();
        return $query;
    }


    function nomor_stok()
    {
        $bln = date('m');
        $thn = date('Y');
        $q = $this->db->query("SELECT MAX(RIGHT(nomor_transaksi,3)) AS kd_max FROM penjualan WHERE MONTH(tanggal)=$bln AND YEAR(tanggal)=$thn ");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "001";
        }
        $car = "STOK";
        date_default_timezone_set('Asia/Jakarta');
        return $car . date('ym') . $kd;
    }

    public function nomor()
    {
        $thn = date('y');
        $bln = date('m');
        date_default_timezone_set('Asia/Jakarta');
        $thnBln = date('ym');
        $this->db->select('LEFT(penjualan.nomor_transaksi,8) as nomor', FALSE);
        $this->db->order_by('nomor', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('penjualan');  //cek dulu apakah ada sudah ada kode di tabel.  
        if ($query->num_rows() <> 0) {    //cek kode jika telah tersedia   
            $data = $query->row();
            if ($data->nomor == "STOK" . $thnBln) { // cek jika tahun dan bulan sama dengan tahun dan bulan sekarang
                $this->db->select('RIGHT(penjualan.nomor_transaksi,3) as nomor_stk ', FALSE);
                $this->db->where('LEFT(penjualan.nomor_transaksi,8)', "STOK" . $thnBln);
                $this->db->order_by('nomor_stk', 'DESC');
                $this->db->limit(1);
                $query_nomor = $this->db->get('penjualan');
                $data_nomor = $query_nomor->row();
                $kode = intval($data_nomor->nomor_stk) + 1;
            } else {

                $kode = "001";
            }
        } else {
            $kode = "001";  //cek jika kode belum terdapat pada table
        }

        $car = "STOK";
        $kode_right = str_pad($kode, 3, "0", STR_PAD_LEFT);
        date_default_timezone_set('Asia/Jakarta');
        return $car . date('ym') . $kode_right;
        // return $thnBln;
    }



    public function simpanDetil()
    {
        $field = array(
            'nomor_stok' => $this->input->post('nomorStok'),
            'kode_produk' => $this->input->post('kode'),
            'harga_produk' => $this->input->post('harga'),
            'date_created' => time(),
            'id_user' => $this->input->post('id_user')
        );
        $this->db->insert('transaksi', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function editHarga()
    {
        $id = $this->input->post('pk');
        $field = array(
            'harga_produk' => $this->input->post('value')
        );
        $this->db->where('id', $id);
        $this->db->update('transaksi', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function editDus()
    {
        $dos = 0;
        $res = 0;
        $crds = 0;
        $id = $this->input->post('pk');
        $val = $this->input->post('value');
        $explode = explode(",", $this->input->post('name'));
        $banding = $explode[0]; // banding
        $awal = $explode[1]; // stok awal
        $ds = $explode[2]; // jumlah dos sebelumnya
        $kurangiDus = $ds * $banding;
        $res = $val * $banding;
        $crds = $awal - $kurangiDus;
        if ($val == 0) {
            $dos = $awal - $kurangiDus;
        } else {
            if ($awal > $res) {
                $dos = $crds + $res;
            } elseif ($awal < $res) {
                $dos = $res - $kurangiDus + $awal;
            }
        }

        $field = array(
            'awal' => $dos
        );
        $this->db->where('id', $id);
        $this->db->update('transaksi', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function editBks()
    {
        $stok = 0;
        $res = 0;
        $id        = $this->input->post('pk');
        $value     = $this->input->post('value'); // 
        $data      = explode(",", $this->input->post('name'));
        $banding   = $data[0]; // banding produk
        $dosAwal   = $data[2]; // jumlah dos awal
        $res = $dosAwal * $banding; // jumlah dos awal * banding
        $stok = $res + $value;
        $field = array(
            'awal' => $stok
        );
        $this->db->where('id', $id);
        $this->db->update('transaksi', $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusItemDetil()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('transaksi');
    }

    public function simpanAwal()
    {

        $idSales = $this->input->post('idSales');
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $nomorStokAwal = $this->input->post('nomor');
        $id_user = $this->input->post('idUser');
        $data = array(
            'tanggal' => $tanggal,
            'nomor_transaksi' => $nomorStokAwal,
            'id_sales' => $idSales,
            'date_created' => time(),
            'id_user' => $id_user
        );
        $this->db->insert('penjualan', $data);
    }

    public function ubahAwal()
    {
        $idSales = $this->input->post('idSales');
        $idAwal = $this->input->post('idAwal');
        $id_user = $this->input->post('idUser');
        $data = array(
            'id_sales' => $idSales,
            'date_update' => time(),
            'id_user' => $id_user
        );
        $this->db->where('id', $idAwal);
        $this->db->update('penjualan', $data);
    }

    public function hapusStokAwal()
    {
        $nomor = $this->input->get('nomor');
        $this->db->where('nomor_transaksi', $nomor);
        $this->db->delete('penjualan');
    }
    public function hapusDetilAwal()
    {
        $nomor = $this->input->get('nomor');
        $this->db->where('nomor_stok', $nomor);
        $this->db->delete('transaksi');
    }


    public function updatePenjualan()
    {

        $subtotal = $this->input->get('subTotal');
        $nomor = $this->input->get('nomor');
        $id_user = $this->input->get('idUser');
        $data = array(
            'jumlah' => $subtotal,
            'date_update' => time(),
            'id_user' => $id_user
        );
        $this->db->where('nomor_transaksi', $nomor);
        $this->db->update('penjualan', $data);
    }

    public function getTbPenjualan($nomorAwal)
    {
        $this->db->select('p.id as idAwal, p.tanggal,p.nomor_transaksi,s.nama_sales,u.nama_user,a.nama_area,p.catatan,p.id_sales,a.id as id_area');
        $this->db->from('penjualan p');
        $this->db->join('sales s', 's.id=p.id_sales', 'left');
        $this->db->join('user u', 'u.id_user=p.id_user', 'left');
        $this->db->join('area a', 'a.kode_area=p.kode_area', 'left');
        $this->db->where('p.nomor_transaksi', $nomorAwal);
        $query = $this->db->get();
        return $query;
    }
}
