<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Area extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('area_model', 'area');
    }

    public function getAutoComplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->area->cari_area($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->nama_area,
                        'description'    => $row->id,
                    );
                echo json_encode($arr_result);
            }
        }
    }
}
