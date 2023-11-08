<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklogin();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $data['user']['id_user'];
        $data['customer'] = $this->modeluser->getcustomer();
        $this->load->view('user_tw/customer_view', $data);
    }

    public function hapus_user()
    {
        $id = $this->input->get('id');
        $this->modeluser->hapus_user($id);
        redirect('customer');
    }

}
