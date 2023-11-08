<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // ceklogin();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notif_terbeli'] = $this->modeluser->notif_terbeli();
        $this->load->view('dashboard_tw/index_view', $data);
    }

    // account

    public function account()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['notif_terbeli'] = $this->modeluser->notif_terbeli();
        $this->load->view('dashboard_tw/account_view', $data);
    }

    public function edit_profile()
    {
        $email = $this->session->userdata('email');
        $nama = $this->input->post('nama');
        $notelp = $this->input->post('notelp');
        $alamat = $this->input->post('alamat');
        $id_kabupaten = $this->input->post('id_kabupaten');
        $paypal = $this->input->post('paypal');
        
        $this->db->set('nama', $nama);
        $this->db->set('notelp', $notelp);
        $this->db->set('alamat', $alamat);
        $this->db->set('id_kabupaten', $id_kabupaten);
        $this->db->set('paypal', $paypal);
        $this->db->where('email', $email);
        $this->db->update('user');
        $this->session->set_flashdata('pesan', 'Update Profile');
        redirect('dashboard/account');
    }

    // product

    public function product($filter="")
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $data['produk_all'] = $this->modeluser->getproduk_all($filter);
            $data['notif_terbeli'] = $this->modeluser->notif_terbeli();
            $this->load->view('dashboard_tw/product_view', $data);
    }

    public function keranjang()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->session->userdata('email')) {
            $data['notif_terbeli'] = $this->modeluser->notif_terbeli();
            $this->load->view('dashboard_tw/keranjang_view', $data);
        } else {
            redirect('auth');
        }
    }

    public function tambahkeranjang($id_produk)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jamtangan'] = $this->modeluser->detailproduk($id_produk);
        $id = $data['jamtangan']['id_produk'];
        $price = $data['jamtangan']['harga'];
        $nama = $data['jamtangan']['nama'];
        $gambar = $data['jamtangan']['gambar'];
        $stok = $data['jamtangan']['stok'];
        $kategori = $data['jamtangan']['kategori'];
        $deskripsi = $data['jamtangan']['deskripsi'];
        $namauser = $this->session->userdata('email');
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
            'totprice'      => $price,
            'name'          => $nama,
            'picture'       => $gambar,
            'stock'         => $stok,
            'category'      => $kategori,
            'description'   => $deskripsi,
            'user'          => $namauser
        );

        if ($data) {
            $this->cart->insert($data);
            redirect('dashboard/keranjang');
        } else {
            redirect('dashboard');
        }
    }

    public function tambahqty($rowid,$qty,$price)
    {
        $data = array(
            'rowid' => $rowid,
            'qty'   => $qty+1,
            'totprice' => ($qty+1)*$price
        );
        $this->cart->update($data);
        redirect('dashboard/keranjang');
    }

    public function minqty($rowid,$qty,$price)
    {
        $data = array(
            'rowid' => $rowid,
            'qty'   => $qty-1,
            'totprice' => ($qty-1)*$price
        );
        $this->cart->update($data);
        redirect('dashboard/keranjang');
    }

    public function hapus_user()
    {
        $id = $this->input->get('id');
        $this->modeluser->hapus_user($id);
        redirect('customer');
    }

    public function bayar()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
            $this->modeluser->checkout($id_user);
            $this->cart->destroy();
            redirect('dashboard');
    }

}
