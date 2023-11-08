<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    // produk

    public function index()
    {
        $data['title'] = 'Jam Tangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $data['user']['id_user'];
        $data['produk'] = $this->modeluser->getproduk_all("");
        $this->load->view('user_tw/produk_view', $data);
    }

    public function editproduk()
    {

        $id_produk = $this->input->post('id_produk');
        $nama = $this->input->post('nama',);
        $kategori = $this->input->post('kategori');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        
        $this->db->set('nama', $nama);
        $this->db->set('kategori', $kategori);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('harga', $harga);
        $this->db->set('stok', $stok);

        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk_jam');
        $this->session->set_flashdata('pesan', 'Update Produk');
        redirect('produk');
    }

    public function hapusproduk()
    {
        $id = $this->input->get('id');
        $this->modeluser->hapusproduk($id);
        redirect('produk');
    }

    public function tambah_produk()
    {
        $nama = $this->input->Post('nama');
        $kategori = $this->input->Post('kategori');
        $harga = $this->input->Post('harga');
        $stok = $this->input->Post('stok');
        $deskripsi = $this->input->Post('deskripsi');

        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/fototoko';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data['error'] = $this->upload->display_errors();
        } else {
            $uploaded_data = $this->upload->data();
            $new_data = [
                'nama' => $nama,
                'kategori' => $kategori,
                'harga' => $harga,
                'stok' => $stok,
                'deskripsi' => $deskripsi,
                'create_at' => date('Y-m-d H:i:s'),
                'gambar' => $uploaded_data['file_name'],
            ];
            $this->modeluser->tambahprodukjam($new_data);
        }
    }


    // customer
    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $agen_id = $data['user']['id_user'];
        $data['pesanan'] = $this->modeluser->tampilpesanan($agen_id);

        $this->load->view('user_tw/pemesanan_view', $data);
    }

    public function hapus_pesanan($id)
    {
        $this->modeluser->hapus_pesanan($id);
        redirect('produk/pesanan');
    }

}
