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
        $data['title'] = 'Jam Tangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $data['user']['id_user'];
        $data['customer'] = $this->modeluser->getcustomer();
        $this->load->view('user_tw/customer_view', $data);

    }

    public function tambahkeranjang($id_produk)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jamtangan'] = $this->modeluser->detailproduk($id_produk);
        $id = $data['jamtangan']['id_produk'];
        $price = $data['jamtangan']['harga'];
        $nama = $data['jamtangan']['nama'];
        $gambar = $data['jamtangan']['gambar'];
        $namauser = $data['jamtangan']['nama_user'];
        $qty = $this->input->post('qty');
        if ($qty > 1) {
            $qty = $qty;
        } else {
            $qty = 1;
        }
        $data = array(
            'id'            => $id,
            'qty'           => $qty,
            'price'         => $price,
            'name'          => $nama,
            'picture'       => $gambar,
            'user'          => $namauser
        );

        if ($data) {
            $this->cart->insert($data);
            redirect('customer/keranjang');
        } else {
            redirect('customer');
        }
    }

    public function hapuskeranjang()
    {
        $this->cart->destroy();
        redirect('customer/keranjang');
    }

    public function hapus_user()
    {
        $id = $this->input->get('id');
        $this->modeluser->hapus_user($id);
        redirect('customer');
    }

}
