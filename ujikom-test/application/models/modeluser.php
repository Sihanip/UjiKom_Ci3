<?php

class modeluser extends CI_Model
{
    // Registrasi Semua User
    public function registrasi()
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "email" => htmlspecialchars($this->input->post('email', true)),
            "password" => htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)),
            "alamat" => htmlspecialchars($this->input->post('alamat', true)),
            "id_kabupaten" => htmlspecialchars($this->input->post('kabupaten', true)),
            "notelp" => htmlspecialchars($this->input->post('notelp', true)),
            "paypal" => htmlspecialchars($this->input->post('paypal', true)),
            'date_created' => time()
        ];
        $this->db->insert('user', $data);
    }

    // Menu Role
    public function hapusrole($id)
    {
        $this->db->where('id_role', $id);
        $this->db->delete('user_role');
    }

    public function updaterole($id)
    {
        $data = [
            "role" => htmlspecialchars($this->input->post('role', true))
        ];
        $this->db->where('id_role', $id);
        $this->db->update('user_role', $data);
    }

    public function notif_terbeli()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user = pesanan.user_id');
        $this->db->from('pesanan');
        $this->db->where('user.email',$this->session->userdata('email'));

        $query = $this->db->get();
        return $query->result();
    }

    public function getproduk_all($filter)
    {
        if($filter == ''){
        return $this->db->get('produk_jam')->result_array();
        }else{
            return $this->db->get_where('produk_jam', ['kategori' => $filter])->result_array();
        }
    }

    // model akun user
    public function getaccount_view()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    // get akun terdaftar
    public function getcustomer()
    {
        return $this->db->get_where('user', ['role_id' => '3'])->result_array();
    }

    public function tambahprodukjam($data)
    {
        $this->db->insert('produk_jam', $data);
        redirect('produk');
    }

    public function hapusproduk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk_jam');
    }

    public function hapus_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    // Pesanan


    // hapus_pesanan
    public function hapus_pesanan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pesanan');
    }


    //Tampilkan Pesanan user
    public function tampilpesanan($agen_id)
    {
        $this->db->join('user pj', 'pj.id_user = ps.user_id');
        return $this->db->get('pesanan ps')->result_array();
    }

    // -------------------------------------------------------------------------------/

    // Detail Produk
    public function detailproduk($id_produk)
    {
        $query = "SELECT `produk_jam`.*
                FROM `produk_jam` 
                WHERE `produk_jam`.`id_produk` = $id_produk";
        return $this->db->query($query)->row_array();
    }

    // Checkout
    public function checkout($id_user)
    {
        foreach ($this->cart->contents() as $item) {
            $id_produk = $item['id'];
            $data = array(
                'barang_id' => $id_produk,
                'qty' => $item['qty'],
                'harga' => $item['price'],
                'user_id' => $id_user,
                'subtotal' => ($item['totprice']+5000),
                'tgl_pesanan' =>  date('Y-m-d H:i:s'),
            );
            $this->db->insert('pesanan', $data);
        }
        return true;
    }

    //Pesanan Customer

    public function pesanancustomer($user_id)
    {
        $query = "SELECT `pesanan`.*, `produk_jam`.`nama` as namajam, `produk_jam`.`id_produk` as idproduk
        FROM `pesanan` JOIN `produk_jam`
        ON `pesanan`.`barang_id` = `produk_jam`.`id_produk`
        WHERE `pesanan`.`user_id` = $user_id AND `pesanan`.`status` != 'Selesai' ORDER BY `pesanan`.`id` DESC";
        return $this->db->query($query)->result_array();
    }

}
