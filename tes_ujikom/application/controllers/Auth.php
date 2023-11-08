<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->input->post('email') == "" && $this->input->post('password')=="") {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {

        $email = htmlspecialchars($this->input->post('email'));
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {

            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else if ($user['role_id'] == 2) {
                    redirect('user');
                } else {
                    redirect('dashboard');
                }
            } else {
                $this->session->set_flashdata('error', 'Email Belum Diaktivasi');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Email Belum Terdaftar');
            redirect('auth');
        }
    }

    public function register()
    {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $this->modeluser->registrasi();
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        redirect('/');
    }

    public function blocked()
    {
        $data['title'] = 'Access Blocked';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('auth/blocked', $data);
    }
}
