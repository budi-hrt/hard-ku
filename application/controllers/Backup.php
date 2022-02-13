<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
    }



    public function index()
    {
        $this->load->dbutil();
        $db_format = array('format' => 'zip', 'filename' => 'kvs_backup.sql');
        $backup = $this->dbutil->backup($db_format);
        $dbname = 'backup-on-' . date('d-m-Y') . '.zip';
        $save = 'assets/backup/' . $dbname;
        write_file($save, $backup);
        force_download($dbname, $backup);
    }
}
