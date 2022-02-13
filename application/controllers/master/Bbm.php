<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bbm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bbm_model', 'bbm');
    }

    public function get()
    {
        $id = $this->input->get('idBbm');
        $query = $this->db->get_where('tb_bbm', ['id' => $id]);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            echo json_encode($result);
        } else {
            $result['type'] = 'error';
            echo json_encode($result);
        }
    }

    public function getAutoComplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->bbm->cari_bbm($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_bbm,
                        'description'    => $row->id,
                    );
                echo json_encode($arr_result);
            }
        }
    }
}
