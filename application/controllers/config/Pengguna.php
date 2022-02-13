<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('user_model', 'usr');
    }

    public function index()
    {
        $data['mn'] = 'Config';
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengguna'] = $this->usr->get_usr()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('page/config/pengguna/index', $data);
    }

        public function Access($user_id)
    {
        $data['mn'] = 'Config';
        $data['title'] = 'User Access';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pengguna'] = $this->db->get_where('user', ['id_user' => $user_id])->row_array();

        // $this->db->where('id_user !=', 1);
        $data['submenu'] = $this->db->get('user_sub_menu')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('page/config/pengguna/menu-access', $data);
    }

 public function userchangeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $submenu_id = $this->input->post('submenuId');
        $user_id = $this->input->post('userId');
        $data = [
            'user_id' => $user_id,
            'submenu_id' => $submenu_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_sub_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_sub_menu', $data);
        } else {
            $this->db->delete('user_access_sub_menu', $data);
        }
        $this->session->set_flashdata('massege', 'useraccess');
    }
    
}
